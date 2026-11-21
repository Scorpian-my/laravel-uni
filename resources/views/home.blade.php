<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بلیط آسمان — مستندات API</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --bg:#f6f8fc; --panel:#fff; --ink:#0f172a; --muted:#64748b; --line:#e2e8f0; --accent:#0284c7; --ok:#16a34a; --bad:#dc2626; }
        * { box-sizing: border-box; }
        body { margin:0; font-family:'Vazirmatn',Tahoma,sans-serif; background:var(--bg); color:var(--ink); line-height:1.7; }
        .wrap { max-width:1080px; margin:0 auto; padding:30px 20px 80px; }
        header { padding:34px; border-radius:20px; background:linear-gradient(135deg,#0369a1,#4f46e5); color:#fff; margin-bottom:26px; }
        header h1 { margin:0 0 8px; font-size:28px; }
        header p { margin:0; opacity:.92; }
        .badges { margin-top:16px; display:flex; gap:8px; flex-wrap:wrap; }
        .badge { background:rgba(255,255,255,.18); padding:4px 12px; border-radius:99px; font-size:13px; }
        .grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:18px; margin-bottom:26px; }
        .card { background:var(--panel); border:1px solid var(--line); border-radius:16px; padding:22px; }
        .card h2 { margin:0 0 14px; font-size:18px; color:var(--accent); }
        .kv { display:flex; justify-content:space-between; gap:12px; padding:6px 0; border-bottom:1px dashed var(--line); font-size:13px; }
        .kv:last-child { border:0; }
        code { font-family:ui-monospace,Consolas,monospace; background:#0b1220; padding:2px 6px; border-radius:6px; color:#a5f3fc; }
        table { width:100%; border-collapse:collapse; font-size:13px; }
        th, td { text-align:right; padding:9px 8px; border-bottom:1px solid var(--line); }
        th { color:var(--muted); font-weight:700; }
        .method { display:inline-block; min-width:56px; text-align:center; border-radius:6px; padding:2px 8px; font-weight:700; font-size:11px; }
        .get { background:#0c4a6e; color:#bae6fd; } .post { background:#14532d; color:#bbf7d0; }
        .put { background:#713f12; color:#fde68a; } .del { background:#7f1d1d; color:#fecaca; }
        .section-title { margin:32px 0 14px; font-size:20px; }
        .toolbar { display:flex; gap:8px; flex-wrap:wrap; margin-bottom:14px; }
        button { cursor:pointer; border:0; border-radius:9px; padding:9px 14px; font-size:13px; font-weight:700; background:var(--accent); color:#fff; }
        button.secondary { background:#e0f2fe; color:var(--accent); }
        button:hover { filter:brightness(1.1); }
        input { background:#f8fafc; border:1px solid var(--line); color:var(--ink); border-radius:8px; padding:8px 10px; font-size:13px; }
        pre { background:#0b1220; border:1px solid var(--line); border-radius:12px; padding:16px; overflow:auto; max-height:420px; font:12px/1.55 ui-monospace,Consolas,monospace; color:#cbd5e1; white-space:pre-wrap; word-break:break-all; }
        .status { font-size:13px; margin-bottom:8px; color:var(--muted); }
        .status b.ok { color:var(--ok); } .status b.bad { color:var(--bad); }
        .hint { font-size:13px; color:var(--muted); margin-top:10px; }
        a.back { display:inline-block; margin-bottom:16px; color:var(--accent); text-decoration:none; font-size:13px; font-weight:700; }
    </style>
</head>
<body>
<div class="wrap">
    <a class="back" href="/">← بازگشت به سایت رزرو بلیط</a>
    <header>
        <h1>✈️ بلیط آسمان — مستندات API</h1>
        <p>سایت رزرو بلیط هواپیما با Laravel 13 + احراز هویت Sanctum — شامل دو CRUD و توکن</p>
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
            <p class="hint">با دکمه «ورود» توکن بگیرید؛ بقیه درخواستها خودکار از آن استفاده میکنند.</p>
        </div>
        <div class="card">
            <h2>📊 ساختار پروژه</h2>
            <div class="kv"><span>احراز هویت</span><span>AuthController + Sanctum</span></div>
            <div class="kv"><span>CRUD شماره ۱</span><span>شرکتهای هواپیمایی (Categories)</span></div>
            <div class="kv"><span>CRUD شماره ۲</span><span>پروازها (Tasks)</span></div>
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
                <tr><td><span class="method get">GET</span></td><td><code>/api/categories</code></td><td>لیست شرکتهای هواپیمایی 🔒</td></tr>
                <tr><td><span class="method post">POST</span></td><td><code>/api/categories</code></td><td>ایجاد شرکت 🔒</td></tr>
                <tr><td><span class="method get">GET</span></td><td><code>/api/categories/{id}</code></td><td>نمایش شرکت 🔒</td></tr>
                <tr><td><span class="method put">PUT</span></td><td><code>/api/categories/{id}</code></td><td>ویرایش شرکت 🔒</td></tr>
                <tr><td><span class="method del">DEL</span></td><td><code>/api/categories/{id}</code></td><td>حذف شرکت 🔒</td></tr>
                <tr><td><span class="method get">GET</span></td><td><code>/api/tasks?category_id=</code></td><td>لیست پروازها 🔒</td></tr>
                <tr><td><span class="method post">POST</span></td><td><code>/api/tasks</code></td><td>ایجاد پرواز 🔒</td></tr>
                <tr><td><span class="method get">GET</span></td><td><code>/api/tasks/{id}</code></td><td>نمایش پرواز 🔒</td></tr>
                <tr><td><span class="method put">PUT</span></td><td><code>/api/tasks/{id}</code></td><td>ویرایش پرواز / کسر صندلی 🔒</td></tr>
                <tr><td><span class="method del">DEL</span></td><td><code>/api/tasks/{id}</code></td><td>حذف پرواز 🔒</td></tr>
            </tbody>
        </table>
        <p class="hint">🔒 یعنی نیاز به هدر <code>Authorization: Bearer &lt;token&gt;</code> دارد.</p>
    </div>

    <h2 class="section-title">🧪 تست زنده API</h2>
    <div class="card">
        <div class="toolbar">
            <button onclick="doLogin()">ورود</button>
            <button class="secondary" onclick="callApi('GET','/api/categories')">لیست شرکتهای هواپیمایی</button>
            <button class="secondary" onclick="callApi('GET','/api/tasks')">لیست پروازها</button>
            <button class="secondary" onclick="createCategory()">ساخت شرکت</button>
            <button class="secondary" onclick="callApi('POST','/api/logout')">خروج</button>
        </div>
        <div class="toolbar">
            <input id="catName" placeholder="نام شرکت جدید" value="شرکت تست">
            <input id="taskTitle" placeholder="مسیر پرواز" value="تهران → تبریز">
            <input id="taskPrice" type="number" placeholder="قیمت بلیت" value="990000">
            <input id="taskCat" type="number" placeholder="category_id" value="1" style="width:120px">
            <button class="secondary" onclick="createFlight()">ساخت پرواز</button>
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
            const text = await res.text();
            let data;
            try { data = text ? JSON.parse(text) : {}; } catch (e) { data = text; }
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

        async function createFlight() {
            await callApi('POST', '/api/tasks', {
                title: document.getElementById('taskTitle').value,
                price: Number(document.getElementById('taskPrice').value),
                category_id: Number(document.getElementById('taskCat').value)
            });
        }
    </script>
</div>
</body>
</html>
