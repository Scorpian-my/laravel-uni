<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>کتاب باز — مستندات API</title>
    <style>
        :root { --bg:#0f172a; --panel:#1e293b; --line:#334155; --accent:#38bdf8; --text:#e2e8f0; --muted:#94a3b8; --ok:#4ade80; --bad:#f87171; }
        * { box-sizing: border-box; }
        body { margin:0; font-family: ui-sans-serif, system-ui, "Segoe UI", Tahoma, sans-serif; background:var(--bg); color:var(--text); line-height:1.6; }
        .wrap { max-width:1080px; margin:0 auto; padding:32px 20px 80px; }
        header { padding:38px; border-radius:20px; background:linear-gradient(135deg,#0ea5e9,#6366f1); color:#fff; margin-bottom:28px; }
        header h1 { margin:0 0 8px; font-size:30px; }
        header p { margin:0; opacity:.9; }
        .badges { margin-top:18px; display:flex; gap:8px; flex-wrap:wrap; }
        .badge { background:rgba(255,255,255,.18); padding:4px 12px; border-radius:99px; font-size:13px; }
        .grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:18px; margin-bottom:28px; }
        .card { background:var(--panel); border:1px solid var(--line); border-radius:16px; padding:22px; }
        .card h2 { margin:0 0 14px; font-size:18px; color:var(--accent); }
        .kv { display:flex; justify-content:space-between; gap:12px; padding:6px 0; border-bottom:1px dashed var(--line); font-size:14px; }
        .kv:last-child { border:0; }
        code { font-family:ui-monospace,Consolas,monospace; background:#0b1220; padding:2px 6px; border-radius:6px; color:#a5f3fc; }
        table { width:100%; border-collapse:collapse; font-size:14px; }
        th, td { text-align:right; padding:10px 8px; border-bottom:1px solid var(--line); }
        th { color:var(--muted); font-weight:600; }
        .method { display:inline-block; min-width:58px; text-align:center; border-radius:6px; padding:2px 8px; font-weight:700; font-size:12px; }
        .get { background:#0c4a6e; color:#bae6fd; } .post { background:#14532d; color:#bbf7d0; }
        .put { background:#713f12; color:#fde68a; } .del { background:#7f1d1d; color:#fecaca; }
        .section-title { margin:36px 0 14px; font-size:20px; }
        .toolbar { display:flex; gap:8px; flex-wrap:wrap; margin-bottom:14px; }
        button { cursor:pointer; border:0; border-radius:9px; padding:9px 14px; font-size:13px; font-weight:600; background:var(--accent); color:#082f49; }
        button.secondary { background:#334155; color:#e2e8f0; }
        button:hover { filter:brightness(1.12); }
        input { background:#0b1220; border:1px solid var(--line); color:var(--text); border-radius:8px; padding:8px 10px; font-size:13px; }
        pre { background:#0b1220; border:1px solid var(--line); border-radius:12px; padding:16px; overflow:auto; max-height:420px; font:12px/1.55 ui-monospace,Consolas,monospace; color:#cbd5e1; white-space:pre-wrap; word-break:break-all; }
        .status { font-size:13px; margin-bottom:8px; color:var(--muted); }
        .status b.ok { color:var(--ok); } .status b.bad { color:var(--bad); }
        .hint { font-size:13px; color:var(--muted); margin-top:10px; }
    </style>
</head>
<body>
<div class="wrap">
    <header>
        <h1>📚 کتاب باز — مستندات API</h1>
        <p>فروشگاه کتاب با Laravel 13 + احراز هویت Sanctum — شامل دو CRUD و توکن</p>
        <div class="badges">
            <span class="badge">Laravel 13</span>
            <span class="badge">PHP 8.5</span>
            <span class="badge">Sanctum 4</span>
            <span class="badge">SQLite</span>
            <span class="badge">33 تست ✅</span>
        </div>
    </header>

    <div class="grid">
        <div class="card">
            <h2>🔑 حساب تست</h2>
            <div class="kv"><span>ایمیل</span><code>test@example.com</code></div>
            <div class="kv"><span>رمز عبور</span><code>password</code></div>
            <div class="kv"><span>پایه آدرس</span><code>/api</code></div>
            <p class="hint">روی دکمه «ورود» کلیک کنید تا توکن بگیرید؛ بقیه درخواستها خودکار از آن استفاده میکنند.</p>
        </div>
        <div class="card">
            <h2>📊 ساختار پروژه</h2>
            <div class="kv"><span>احراز هویت</span><span>AuthController + Sanctum</span></div>
            <div class="kv"><span>CRUD شماره ۱</span><span>دستهبندیها (Categories)</span></div>
            <div class="kv"><span>CRUD شماره ۲</span><span>کتابها (Tasks)</span></div>
            <div class="kv"><span>امنیت</span><span>Policy + 404 برای کاربر دیگه</span></div>
            <div class="kv"><span>خروجی</span><span>API Resource</span></div>
        </div>
    </div>

    <h2 class="section-title">📡 لیست Endpointها</h2>
    <div class="card">
        <table>
            <thead><tr><th>متد</th><th>مسیر</th><th>توضیح</th></tr></thead>
            <tbody>
                <tr><td><span class="method post">POST</span></td><td><code>/api/register</code></td><td>ثبتنام + توکن</td></tr>
                <tr><td><span class="method post">POST</span></td><td><code>/api/login</code></td><td>ورود + توکن</td></tr>
                <tr><td><span class="method post">POST</span></td><td><code>/api/logout</code></td><td>باطلکردن توکن 🔒</td></tr>
                <tr><td><span class="method get">GET</span></td><td><code>/api/categories</code></td><td>لیست دستهها 🔒</td></tr>
                <tr><td><span class="method post">POST</span></td><td><code>/api/categories</code></td><td>ایجاد دسته 🔒</td></tr>
                <tr><td><span class="method get">GET</span></td><td><code>/api/categories/{id}</code></td><td>نمایش دسته 🔒</td></tr>
                <tr><td><span class="method put">PUT</span></td><td><code>/api/categories/{id}</code></td><td>ویرایش دسته 🔒</td></tr>
                <tr><td><span class="method del">DEL</span></td><td><code>/api/categories/{id}</code></td><td>حذف دسته 🔒</td></tr>
                <tr><td><span class="method get">GET</span></td><td><code>/api/tasks?category_id=</code></td><td>لیست وظایف 🔒</td></tr>
                <tr><td><span class="method post">POST</span></td><td><code>/api/tasks</code></td><td>ایجاد وظیفه 🔒</td></tr>
                <tr><td><span class="method get">GET</span></td><td><code>/api/tasks/{id}</code></td><td>نمایش وظیفه 🔒</td></tr>
                <tr><td><span class="method put">PUT</span></td><td><code>/api/tasks/{id}</code></td><td>ویرایش وظیفه 🔒</td></tr>
                <tr><td><span class="method del">DEL</span></td><td><code>/api/tasks/{id}</code></td><td>حذف وظیفه 🔒</td></tr>
            </tbody>
        </table>
        <p class="hint">🔒 یعنی نیاز به هدر <code>Authorization: Bearer &lt;token&gt;</code> دارد.</p>
    </div>

    <h2 class="section-title">🧪 تست زنده API</h2>
    <div class="card">
        <div class="toolbar">
            <button onclick="doLogin()">ورود</button>
            <button class="secondary" onclick="callApi('GET','/api/categories')">لیست دستهها</button>
            <button class="secondary" onclick="callApi('GET','/api/tasks')">لیست وظایف</button>
            <button class="secondary" onclick="createCategory()">ساخت دسته</button>
            <button class="secondary" onclick="createTask()">ساخت وظیفه</button>
            <button class="secondary" onclick="callApi('POST','/api/logout')">خروج</button>
        </div>
        <div class="toolbar">
            <input id="catName" placeholder="نام دستهٔ جدید" value="دسته تست">
            <input id="taskTitle" placeholder="عنوان وظیفه" value="وظیفه تست">
            <input id="taskCat" type="number" placeholder="category_id" value="1" style="width:120px">
        </div>
        <div class="status" id="status">منتظر درخواست…</div>
        <pre id="out">پاسخ اینجا نمایش داده میشود.</pre>
    </div>

    <script>
        const out = document.getElementById('out');
        const statusEl = document.getElementById('status');
        let token = localStorage.getItem('task_api_token') || '';

        function show(label, data, ok) {
            statusEl.innerHTML = label + ' → <b class="' + (ok ? 'ok' : 'bad') + '">' + (ok ? 'موفق' : 'خطا') + '</b>';
            out.textContent = typeof data === 'string' ? data : JSON.stringify(data, null, 2);
        }

        async function raw(method, path, body) {
            const headers = { 'Accept': 'application/json' };
            if (body) headers['Content-Type'] = 'application/json';
            if (token && path !== '/api/login') headers['Authorization'] = 'Bearer ' + token;
            const res = await fetch(path, { method, headers, body: body ? JSON.stringify(body) : undefined });
            let data;
            try { data = await res.json(); } catch (e) { data = await res.text(); }
            return { res, data };
        }

        async function doLogin() {
            const { res, data } = await raw('POST', '/api/login', { email: 'test@example.com', password: 'password' });
            if (res.ok) { token = data.token; localStorage.setItem('task_api_token', token); }
            show('ورود', data, res.ok);
        }

        async function callApi(method, path, body) {
            const { res, data } = await raw(method, path, body);
            show(method + ' ' + path, data, res.ok);
        }

        async function createCategory() {
            await callApi('POST', '/api/categories', { name: document.getElementById('catName').value });
        }

        async function createTask() {
            await callApi('POST', '/api/tasks', {
                title: document.getElementById('taskTitle').value,
                category_id: Number(document.getElementById('taskCat').value)
            });
        }
    </script>
</div>
</body>
</html>

