# 📚 کتاب باز — فروشگاه کتاب (Laravel API)

فروشگاه کتابی ساختهشده با **Laravel 13** که سه تمرین استاد را در یک پروژه ترکیب میکند:
دو **CRUD** (مدیریت دیتابیس) + یک **احراز هویت با توکن** (Sanctum).

همه اندپوینتها از طریق صفحه اصلی سایت (`/`) هم قابل استفادهاند: لیست کتابها، فیلتر دستهبندی، سبد خرید، ثبت سفارش و پنل کامل ادمین.

---

## 🎯 نقشه تسکها

| تسک استاد | پیادهمسازی در پروژه |
|---|---|
| CRUD شماره ۱ | `categories` — ایجاد / لیست / ویرایش / حذف دستهبندی |
| CRUD شماره ۲ | `tasks` — ایجاد / لیست / ویرایش / حذف کتاب (با فیلتر بر اساس دسته) |
| احراز هویت با توکن | `laravel/sanctum` — ثبتنام، ورود، خروج و محافظت از تمام روتها |

هر دو CRUD پشت `auth:sanctum` قرار دارند و هر کاربر فقط رکوردهای خودش را میبیند.

---

## 🛠️ تکنولوژیها

- PHP 8.5 / Laravel 13
- Sanctum 4 (Personal Access Token)
- SQLite (قابل تعویض با MySQL)
- Eloquent API Resource + Form Request + Policy
- PHPUnit 12 (۳۳ تست)
- Laravel Pint (فرمت کد)
- واسطه کاربری تکصفحهای (Vanilla JS) بدون نیاز به Vite

---

## 🚀 نصب و اجرا

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

سپس:

| آدرس | توضیح |
|---|---|
| `http://127.0.0.1:8000/` | صفحه فروشگاه |
| `http://127.0.0.1:8000/docs` | مستندات اندپوینتها |

> حساب تست: `test@example.com` / `password`
> (صفحه فروشگاه به صورت خودکار با این حساب وارد میشود)

### اجرای تستها

```bash
php artisan test --compact
vendor/bin/pint --format agent
```

---

## 📡 اندپوینتهای API

پایه آدرس: `/api`

### احراز هویت

| متد | مسیر | توضیح |
|---|---|---|
| POST | `/register` | ثبتنام و صدور توکن |
| POST | `/login` | ورود و صدور توکن |
| POST | `/logout` | باطلکردن توکن فعلی 🔒 |

### دستهبندیها 🔒

| متد | مسیر | توضیح |
|---|---|---|
| GET | `/categories` | لیست دستههای من |
| POST | `/categories` | ایجاد دسته |
| GET | `/categories/{id}` | نمایش دسته |
| PUT | `/categories/{id}` | ویرایش دسته |
| DELETE | `/categories/{id}` | حذف دسته (همراه کتابهایش) |

### کتابها 🔒

| متد | مسیر | توضیح |
|---|---|---|
| GET | `/tasks` | لیست کتابها (`?category_id=` هم میپذیرد) |
| POST | `/tasks` | ایجاد کتاب |
| GET | `/tasks/{id}` | نمایش کتاب |
| PUT | `/tasks/{id}` | ویرایش کتاب (کسر موجودی موقع خرید هم از همینجا است) |
| DELETE | `/tasks/{id}` | حذف کتاب |

🔒 = نیاز به هدر `Authorization: Bearer <token>`

### مثال درخواست

```powershell
$login = Invoke-RestMethod "http://127.0.0.1:8000/api/login" -Method Post `
  -ContentType "application/json" `
  -Body '{"email":"test@example.com","password":"password"}'

$h = @{ Authorization = "Bearer $($login.token)" }
Invoke-RestMethod "http://127.0.0.1:8000/api/tasks" -Headers $h
```

---

## 🗂️ ساختار دیتابیس

```
users
  id, name, email, password

categories
  id, user_id (FK → users, cascade), name, timestamps

tasks  (کتابها)
  id, user_id (FK → users, cascade)
  category_id (FK → categories, cascade)
  title, price, stock, image, description, is_done, timestamps

personal_access_tokens   (Sanctum)
```

---

## 🧱 ساختار کد

```
app/
├── Http/
│   ├── Controllers/Api/   AuthController, CategoryController, TaskController
│   ├── Requests/          StoreCategoryRequest, StoreTaskRequest, UpdateTaskRequest
│   └── Resources/         CategoryResource, TaskResource
├── Models/                User, Category, Task
├── Policies/              CategoryPolicy, TaskPolicy
└── Providers/             AppServiceProvider (rate-limit ورود + Resource بدون data wrapper)
routes/
├── api.php                ۱۳ روت API
└── web.php                / (فروشگاه) و /docs (مستندات)
resources/views/
├── shop.blade.php         رابط فروشگاه
└── home.blade.php         صفحه مستندات
tests/Feature/…            تستهای احراز هویت، CRUD، Policy و سناریوهای 404
database/seeders/          دیتای نمونه: ۳ دسته + ۹ کتاب
```

### نکات امنیتی پیادهمشده

- تمام روتهای CRUD پشت `auth:sanctum`اند.
- Policyها دسترسی کاربر دیگر را با **404** رد میکنند (وجود رکورد لو نمیرود).
- `category_id` هنگام ایجاد کتاب فقط در صورتی معتبر است که متعلق به کاربر جاری باشد.
- مالکیت رکوردها با `user_id` در کوئریها محدود شده است.
- ورود و ثبتنام دارای rate-limit (`throttle:login`)اند.

---

## 📦 وضعیت فعلی

- ✅ ۳۳ تست / ۹۵ assertion — همه پاس
- ✅ Pint تمیز
- ✅ فونت Vazirmatn در رابط کاربری
- ✅ گیت آماده و پوششدهشده در `origin/main`
