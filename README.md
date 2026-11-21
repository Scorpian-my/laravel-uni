# ✈️ بلیط آسمان — سایت رزرو بلیط هواپیما

سازگارشده از پروژه قبلی: یک سایت فروش بلیط هواپیما با **Laravel 13** که سه تمرین استاد را در کنار هم پیاده میکند:
دو **CRUD** (مدیریت دیتابیس) + یک **احراز هویت با توکن** (Sanctum).

رابط کاربری تکصفحهای سایت شامل جستجوی پرواز (مبدأ / مقصد / تاریخ)، فیلتر شرکت هواپیمایی، جزئیات پرواز، سبد بلیت و ثبت رزرو است. تمام ۱۳ اندپوینت API از همین صفحه صدا زده میشوند.

---

## 🎯 نقشه تسکها

| تسک استاد | پیادهمسازی در پروژه |
|---|---|
| CRUD شماره ۱ | `categories` — ایجاد / لیست / ویرایش / حذف **شرکت هواپیمایی** |
| CRUD شماره ۲ | `tasks` — ایجاد / لیست / ویرایش / حذف **پرواز** (با فیلتر بر اساس شرکت) |
| احراز هویت با توکن | `laravel/sanctum` — ثبتنام، ورود، خروج و محافظت از تمام روتها |

---

## 🛠️ تکنولوژیها

- PHP 8.5 / Laravel 13
- Sanctum 4 (Personal Access Token)
- SQLite
- Eloquent API Resource + Form Request + Policy
- PHPUnit 12 (۳۳ تست) + Laravel Pint
- رابط کاربری Vanilla JS بدون نیاز به Vite — فونت Vazirmatn

---

## 🚀 نصب و اجرا

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

| آدرس | توضیح |
|---|---|
| `http://127.0.0.1:8000/` | سایت رزرو بلیط |
| `http://127.0.0.1:8000/docs` | مستندات اندپوینتها |

حساب تست: `test@example.com` / `password` (ورود اولیه به صورت خودکار است).

```bash
php artisan test --compact
vendor/bin/pint --format agent
```

---

## 📡 اندپوینتهای API

پایه آدرس: `/api`

| متد | مسیر | توضیح |
|---|---|---|
| POST | `/register` | ثبتنام + توکن |
| POST | `/login` | ورود + توکن |
| POST | `/logout` | باطلکردن توکن فعلی 🔒 |
| GET | `/categories` | لیست شرکتهای هواپیمایی 🔒 |
| POST | `/categories` | ایجاد شرکت 🔒 |
| GET | `/categories/{id}` | نمایش شرکت 🔒 |
| PUT | `/categories/{id}` | ویرایش شرکت 🔒 |
| DELETE | `/categories/{id}` | حذف شرکت (همراه پروازهایش) 🔒 |
| GET | `/tasks` | لیست پروازها (`?category_id=` فیلتر بر اساس شرکت) 🔒 |
| POST | `/tasks` | ایجاد پرواز 🔒 |
| GET | `/tasks/{id}` | نمایش پرواز 🔒 |
| PUT | `/tasks/{id}` | ویرایش پرواز / کسر صندلی هنگام رزرو 🔒 |
| DELETE | `/tasks/{id}` | حذف پرواز 🔒 |

🔒 = نیاز به هدر `Authorization: Bearer <token>`

```powershell
$login = Invoke-RestMethod "http://127.0.0.1:8000/api/login" -Method Post `
  -ContentType "application/json" `
  -Body '{"email":"test@example.com","password":"password"}'

$h = @{ Authorization = "Bearer $($login.token)" }
Invoke-RestMethod "http://127.0.0.1:8000/api/tasks" -Headers $h
```

---

## 🗂️ دیتابیس

```
users
  id, name, email, password

categories  (شرکتهای هواپیمایی)
  id, user_id (FK → users, cascade), name, timestamps

tasks  (پروازها)
  id, user_id (FK → users, cascade)
  category_id (FK → categories, cascade)
  title, origin, destination, departure_at, arrival_at, flight_number
  price, stock, image, description, is_done, timestamps

personal_access_tokens   (Sanctum)
```

دیتای نمونه: ۳ شرکت هواپیمایی (ایرانایر، ماهان ایر، زاگرس ایر) + ۹ پرواز داخلی و خارجی.

---

## 🧱 ساختار کد

```
app/
├── Http/Controllers/Api/   AuthController, CategoryController, TaskController
├── Http/Requests/          StoreCategoryRequest, StoreTaskRequest, UpdateTaskRequest
├── Http/Resources/         CategoryResource, TaskResource
├── Models/                 User, Category, Task
├── Policies/               CategoryPolicy, TaskPolicy
└── Providers/              AppServiceProvider (rate-limit ورود + Resource بدون data wrapper)
routes/
├── api.php                 ۱۳ روت API
└── web.php                 / (رزرو بلیط) و /docs (مستندات)
resources/views/
├── shop.blade.php          رابط سایت
└── home.blade.php          صفحه مستندات
database/seeders/           دیتای نمونه پروازها
tests/Feature/…             تستهای احراز هویت، CRUD، Policy و سناریوهای 404
```

### امنیت

- تمام روتهای CRUD پشت `auth:sanctum`اند.
- Policyها دسترسی کاربر دیگه را با **404** رد میکنند.
- `category_id` هنگام ایجاد پرواز فقط زمانی معتبر است که متعلق به کاربر جاری باشد.
- کوئریها با `user_id` محدود به مالک رکورداند.
- ورود و ثبتنام دارای `throttle:login`اند.

---

## ✅ وضعیت فعلی

- ۳۳ تست / ۹۵ assertion — همه پاس
- Pint تمیز
- گیت متصل به `origin/main`
