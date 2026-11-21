<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>بلیط آسمان | رزرو آنلاین بلیط هواپیما</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--blue:#0b7fe8;--blue-dark:#075bb0;--sky:#eaf4ff;--ink:#0f172a;--muted:#64748b;--line:#e2e8f0;--ok:#16a34a;--gold:#b7791f}
*{box-sizing:border-box}
body{margin:0;font-family:'Vazirmatn',Tahoma,sans-serif;background:#f5f8fc;color:var(--ink)}
button,input,select{font-family:inherit}
.topnav{height:64px;background:linear-gradient(90deg,#0a6fd6,#0b8cf0);display:flex;align-items:center;justify-content:space-between;padding:0 5%;color:#fff;gap:16px}
.logo{font-size:23px;font-weight:800;letter-spacing:-.5px;white-space:nowrap}
.logo small{display:block;font-size:9px;font-weight:500;opacity:.8;margin-top:-4px}
.navlinks{display:flex;gap:18px;align-items:center;font-size:13px;flex-wrap:wrap}
.navlinks a,.navlinks button{background:none;border:0;color:#fff;cursor:pointer;font-size:13px;font-weight:600;text-decoration:none;padding:4px}
.navlinks a:hover,.navlinks button:hover{opacity:.8}
.hero{height:230px;background:linear-gradient(120deg,#0a72dc,#1490f2 60%,#37a6f7);position:relative;overflow:hidden}
.hero:before,.hero:after{content:"";position:absolute;border:1px solid #ffffff2b;transform:skewX(-22deg)}
.hero:before{width:38%;height:150%;right:8%;top:-30%}
.hero:after{width:26%;height:150%;right:32%;top:-30%}
.hero .plane{position:absolute;font-size:64px;left:14%;top:48px;opacity:.85;transform:rotate(-12deg)}
.hero .traveler{position:absolute;right:20%;bottom:34px;font-size:40px;opacity:.9}
.hero .cloud{position:absolute;background:#ffffff18;border-radius:99px;width:180px;height:26px;left:34%;top:36px}
.services{position:relative;z-index:2;display:flex;gap:12px;justify-content:center;margin:-56px auto 0;max-width:920px;padding:0 20px}
.service{background:#fff;border-radius:16px;box-shadow:0 6px 22px #0f172a1a;width:120px;height:108px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:5px;cursor:pointer;border:2px solid transparent}
.service .ic{font-size:30px}
.service .lb{font-size:13px;font-weight:700;color:var(--ink)}
.service.active{border-color:#f0c05a;background:#fffdf5}
.service.active .lb{color:var(--gold)}
.searchpanel{background:#fff;border-radius:16px;box-shadow:0 6px 24px #0f172a12;max-width:1120px;margin:22px auto 0;padding:20px 22px}
.opts{display:flex;gap:22px;justify-content:center;align-items:center;flex-wrap:wrap;font-size:13px;margin-bottom:18px;color:var(--ink)}
.opts label{display:flex;align-items:center;gap:6px;cursor:pointer}
.opts input{accent-color:var(--blue)}
.opts .sep{color:var(--line)}
.fields{display:grid;grid-template-columns:1.2fr 1.2fr 1fr .9fr auto;gap:10px;align-items:end}
.fld label{display:block;font-size:11px;color:var(--muted);margin-bottom:5px;font-weight:600}
.fld input,.fld select{width:100%;padding:11px 12px;border:1px solid var(--line);border-radius:9px;font-size:14px;outline:none;background:#f9fbfd}
.fld input:focus{border-color:var(--blue)}
.btn-main{background:var(--blue);color:#fff;border:0;border-radius:9px;padding:12px 30px;font-size:14px;font-weight:800;cursor:pointer;height:44px}
.btn-main:hover{background:var(--blue-dark)}
.results{max-width:1120px;margin:26px auto 70px;padding:0 20px}
.rhead{display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;flex-wrap:wrap;gap:10px}
.rhead h2{font-size:18px;margin:0}
.count{font-size:13px;color:var(--muted)}
.chips{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:16px}
.chip{background:#fff;border:1px solid var(--line);border-radius:99px;padding:6px 14px;font-size:12px;font-weight:700;color:var(--muted);cursor:pointer}
.chip.active{background:var(--blue);border-color:var(--blue);color:#fff}
.list{display:flex;flex-direction:column;gap:12px}
.fcard{background:#fff;border:1px solid var(--line);border-radius:13px;padding:16px 18px;display:grid;grid-template-columns:150px 1fr 170px;gap:16px;align-items:center;cursor:pointer;transition:.15s}
.fcard:hover{box-shadow:0 8px 24px #0f172a14;border-color:#bcd8f5}
.airline{display:flex;align-items:center;gap:9px}
.alogo{width:38px;height:38px;border-radius:50%;background:var(--sky);display:flex;align-items:center;justify-content:center;font-size:18px}
.aname{font-size:13px;font-weight:800}
.anumb{font-size:11px;color:var(--muted)}
.route{display:flex;align-items:center;justify-content:center;gap:14px}
.tm{font-size:20px;font-weight:800;min-width:58px;text-align:center}
.ct{font-size:11px;color:var(--muted);text-align:center}
.line{flex:1;height:1px;background:repeating-linear-gradient(90deg,#94a3b8 0 5px,transparent 5px 10px);position:relative;max-width:110px}
.line:after{content:"✈";position:absolute;top:-12px;right:45%;color:var(--blue);font-size:15px}
.duration{font-size:10px;color:var(--muted);text-align:center;margin-top:3px}
.pricebox{text-align:left;border-right:1px dashed var(--line);padding-right:16px}
.price{font-size:19px;font-weight:800;color:var(--ok)}
.seats{font-size:11px;color:var(--muted);margin:2px 0 8px}
.pick{width:100%;background:var(--blue);color:#fff;border:0;border-radius:8px;padding:8px;font-size:12px;font-weight:800;cursor:pointer}
.empty{background:#fff;border:1px solid var(--line);border-radius:13px;text-align:center;padding:50px;color:var(--muted)}
.overlay{position:fixed;inset:0;background:#0f172a99;z-index:40;display:none;align-items:center;justify-content:center;padding:20px}
.overlay.show{display:flex}
.modal{background:#fff;border-radius:16px;width:min(540px,100%);max-height:88vh;overflow:auto;padding:24px}
.modal h2{margin:0 0 16px;font-size:19px}
.field{display:block;margin:9px 0;font-size:13px;font-weight:600}
.field input,.field select,.field textarea{display:block;width:100%;margin-top:5px;padding:10px;border:1px solid var(--line);border-radius:9px;font:inherit;font-size:14px}
.mrow{display:flex;gap:8px;justify-content:flex-end;margin-top:18px;flex-wrap:wrap}
.drawer{position:fixed;top:0;left:0;bottom:0;width:min(400px,100%);background:#fff;z-index:50;box-shadow:8px 0 30px #0002;padding:22px;transform:translateX(-105%);transition:.25s;overflow:auto}
.drawer.show{transform:none}
.citem{display:flex;gap:8px;align-items:center;border-bottom:1px solid var(--line);padding:10px 0;font-size:12px;flex-wrap:wrap}
.citem b{flex:1}
.citem button{border:0;background:#f1f5f9;border-radius:6px;padding:3px 8px;font-weight:700;cursor:pointer}
.total{font-size:18px;font-weight:800;margin:18px 0}
.toast{position:fixed;bottom:24px;right:24px;z-index:99;background:#0f172a;color:#fff;padding:12px 18px;border-radius:10px;font-size:13px;opacity:0;transition:.25s;pointer-events:none}
.toast.show{opacity:1}
.admin{max-width:1120px;margin:0 auto 70px;background:#fff;border:1px solid var(--line);border-radius:14px;padding:20px;display:none}
.admin.show{display:block}
.admin h3{margin:18px 0 8px;font-size:15px}
.arow{display:flex;gap:8px;align-items:center;padding:7px 0;border-bottom:1px dashed var(--line);font-size:13px;flex-wrap:wrap}
.arow span{flex:1}
.formgrid{display:grid;grid-template-columns:repeat(auto-fit,minmax(130px,1fr));gap:8px;margin-top:10px}
.btn{border:0;border-radius:9px;padding:9px 14px;font-size:12px;font-weight:700;cursor:pointer;background:var(--blue);color:#fff}
.btn.ghost{background:var(--sky);color:var(--blue)}
.btn.danger{background:#fee2e2;color:#dc2626}
.btn.gray{background:#f1f5f9;color:var(--ink)}
.btn.slim{padding:5px 9px;font-size:11px}
input[placeholder]{padding:9px;border:1px solid var(--line);border-radius:8px;font:inherit;font-size:13px}
@media(max-width:820px){.fields{grid-template-columns:1fr 1fr}.fcard{grid-template-columns:1fr}.pricebox{border:0;padding:0;text-align:right}.services{overflow-x:auto;justify-content:flex-start}}
</style>
</head>
<body>

<header class="topnav">
    <div class="logo">مِستربلیط<small>بلیط آسمان — سامانه رزرو بلیط سفر</small></div>
    <nav class="navlinks">
        <button onclick="toggleAdmin()" id="adminBtn">⚙️ پنل ادمین</button>
        <a href="/docs">📖 مستندات</a>
        <button id="authBtn" onclick="token ? logout() : openAuth()">ورود به حساب کاربری</button>
        <button onclick="toggleCart()">🎫 بلیتهای من (<span id="cartCount">0</span>)</button>
    </nav>
</header>

<div class="hero">
    <div class="plane">✈️</div>
    <div class="cloud"></div>
    <div class="traveler">🧳</div>
</div>

<div class="services">
    <div class="service active"><span class="ic">✈️</span><span class="lb">هواپیما</span></div>
    <div class="service" onclick="soon()"><span class="ic">🏨</span><span class="lb">هتل</span></div>
    <div class="service" onclick="soon()"><span class="ic">🚆</span><span class="lb">قطار</span></div>
    <div class="service" onclick="soon()"><span class="ic">🚌</span><span class="lb">اتوبوس</span></div>
    <div class="service" onclick="soon()"><span class="ic">🚕</span><span class="lb">سواری</span></div>
</div>

<div class="searchpanel">
    <div class="opts">
        <label><input type="radio" name="trip" checked> داخلی</label>
        <label><input type="radio" name="trip"> خارجی</label>
        <span class="sep">|</span>
        <label><input type="radio" name="way" checked> یکطرفه</label>
        <label><input type="radio" name="way"> رفت و برگشت</label>
    </div>
    <div class="fields">
        <div class="fld"><label>فرودگاه مبدأ</label><input id="fromCity" placeholder="مثلاً تهران"></div>
        <div class="fld"><label>فرودگاه مقصد</label><input id="toCity" placeholder="مثلاً مشهد"></div>
        <div class="fld"><label>تاریخ حرکت</label><input id="flyDate" type="date"></div>
        <div class="fld"><label>مسافر</label><select id="passengers"><option>1 مسافر</option><option>2 مسافر</option><option>3 مسافر</option></select></div>
        <button class="btn-main" onclick="renderProducts()">جستجو</button>
    </div>
</div>

<div class="results">
    <div class="rhead">
        <h2>پروازهای موجود</h2>
        <span class="count" id="summary">در حال بارگذاری…</span>
    </div>
    <div class="chips" id="chips"></div>
    <div class="list" id="grid"></div>
</div>

<div class="admin" id="admin">
    <h2>⚙️ پنل مدیریت بلیط آسمان</h2>
    <p style="color:#64748b;font-size:13px">تمام اندپوینتهای CRUD در اینجا استفاده میشوند.</p>
    <h3>شرکتهای هواپیمایی</h3>
    <div id="adminCats"></div>
    <div style="display:flex;gap:8px;margin-top:10px">
        <input id="newCat" placeholder="نام شرکت هواپیمایی" style="flex:1">
        <button class="btn" onclick="addCategory()">افزودن شرکت</button>
    </div>
    <h3>پروازها</h3>
    <div id="adminProducts"></div>
    <div class="formgrid">
        <input id="pTitle" placeholder="مسیر پرواز">
        <input id="pFrom" placeholder="مبدأ">
        <input id="pTo" placeholder="مقصد">
        <input id="pNumber" placeholder="شماره پرواز">
        <input id="pPrice" type="number" placeholder="قیمت بلیت">
        <input id="pStock" type="number" placeholder="تعداد صندلی">
        <input id="pDeparture" type="datetime-local" title="زمان حرکت">
        <select id="pCat"></select>
    </div>
    <div style="margin-top:8px;display:flex;gap:8px;flex-wrap:wrap">
        <input id="pDesc" placeholder="توضیحات (اختیاری)" style="flex:1;min-width:180px">
        <button class="btn" id="productSubmit" onclick="saveProduct()">افزودن پرواز</button>
        <button class="btn gray" onclick="resetProductForm()" style="display:none" id="productCancel">لغو</button>
    </div>
</div>

<div class="drawer" id="drawer">
    <h2>🎫 بلیتهای من</h2>
    <div id="cartItems"></div>
    <div class="total" id="cartTotal">جمع: ۰ تومان</div>
    <button class="btn" style="width:100%" onclick="checkout()">ثبت رزرو</button>
    <button class="btn gray" style="width:100%;margin-top:8px" onclick="toggleCart()">بستن</button>
</div>

<div class="overlay" id="overlay" onclick="if(event.target===this)closeModals()"><div class="modal" id="modal"></div></div>
<div class="toast" id="toast"></div>

<script>
let token = localStorage.getItem('shop_token') || '';
let categories = [];
let flights = [];
let activeCat = null;
let cart = JSON.parse(localStorage.getItem('shop_cart') || '[]');
let editingId = null;

const money = n => Number(n).toLocaleString('fa-IR') + ' تومان';
const timeOf = v => v ? new Date(v).toLocaleTimeString('fa-IR', { hour: '2-digit', minute: '2-digit' }) : '—';
const dateOf = v => v ? new Date(v).toLocaleDateString('fa-IR', { month: 'short', day: 'numeric' }) : '—';

function toast(msg, ok) {
    const t = document.getElementById('toast');
    t.textContent = msg;
    t.style.background = ok ? '#15803d' : '#b91c1c';
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 2600);
}
function soon() { toast('این سرویس بهزودی اضافه میشود', false); }

async function api(method, path, body) {
    const headers = { 'Accept': 'application/json' };
    if (body !== undefined) headers['Content-Type'] = 'application/json';
    if (token) headers['Authorization'] = 'Bearer ' + token;
    let res, data;
    try {
        res = await fetch(path, { method, headers, body: body !== undefined ? JSON.stringify(body) : undefined });
        const text = await res.text();
        data = text ? JSON.parse(text) : {};
    } catch (e) {
        return { ok: false, status: 0, data: { message: 'اتصال به سرور برقرار نشد' } };
    }
    if (!res.ok && res.status === 401) { toast('ابتدا وارد شوید 🔑', false); openAuth(); }
    return { ok: res.ok, status: res.status, data };
}

function updateAuthUI() {
    document.getElementById('authBtn').textContent = token ? 'خروج از حساب' : 'ورود به حساب کاربری';
    document.getElementById('adminBtn').style.display = token ? '' : 'none';
}

async function init() {
    if (token) {
        const check = await fetch('/api/categories', { headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' } });
        if (!check.ok) { token = ''; localStorage.removeItem('shop_token'); }
    }
    if (!token) {
        const demo = await api('POST', '/api/login', { email: 'test@example.com', password: 'password' });
        if (demo.ok) { token = demo.data.token; localStorage.setItem('shop_token', token); }
    }
    updateAuthUI();
    await loadCategories();
    await loadFlights();
    renderCart();
}

async function loadCategories() {
    const r = await api('GET', '/api/categories');
    if (!r.ok) return;
    categories = r.data;
    document.getElementById('chips').innerHTML =
        '<button class="chip' + (activeCat === null ? ' active' : '') + '" onclick="filterCat(null)">همه شرکتتها</button>' +
        categories.map(c => '<button class="chip' + (activeCat === c.id ? ' active' : '') + '" onclick="filterCat(' + c.id + ')">' + c.name + '</button>').join('');
    document.getElementById('pCat').innerHTML = categories.map(c => '<option value="' + c.id + '">' + c.name + '</option>').join('');
    renderAdminCats();
}

async function filterCat(id) { activeCat = id; await loadFlights(); await loadCategories(); }

async function loadFlights() {
    const path = activeCat ? '/api/tasks?category_id=' + activeCat : '/api/tasks';
    const r = await api('GET', path);
    if (!r.ok) return;
    flights = r.data;
    document.getElementById('summary').textContent = flights.length + ' پرواز یافت شد';
    renderProducts();
    renderAdminFlights();
}

function renderProducts() {
    const from = document.getElementById('fromCity').value.trim();
    const to = document.getElementById('toCity').value.trim();
    const date = document.getElementById('flyDate').value;
    const list = flights.filter(f =>
        (!from || (f.origin || '').includes(from)) &&
        (!to || (f.destination || '').includes(to)) &&
        (!date || (f.departure_at || '').slice(0, 10) === date)
    );
    const grid = document.getElementById('grid');
    if (!list.length) { grid.innerHTML = '<div class="empty">پرواز مورد نظر یافت نشد ✈️</div>'; return; }
    grid.innerHTML = list.map(f => {
        const airline = categories.find(c => c.id === f.category_id);
        return '<div class="fcard" onclick="openFlight(' + f.id + ')">' +
            '<div class="airline"><div class="alogo">✈️</div><div><div class="aname">' + (airline ? airline.name : '—') + '</div><div class="anumb">' + (f.flight_number || '—') + '</div></div></div>' +
            '<div class="route"><div><div class="tm">' + timeOf(f.departure_at) + '</div><div class="ct">' + (f.origin || '—') + '</div></div>' +
            '<div><div class="line"></div><div class="duration">حدود ۲ ساعت</div></div>' +
            '<div><div class="tm">' + timeOf(f.arrival_at) + '</div><div class="ct">' + (f.destination || '—') + '</div></div></div>' +
            '<div class="pricebox"><div class="price">' + money(f.price) + '</div>' +
            '<div class="seats">' + (f.stock > 0 ? f.stock + ' صندلی باقیمانده' : 'تکمیل ظرفیت ❌') + '</div>' +
            '<button class="pick" onclick="event.stopPropagation();addToCart(' + f.id + ')">انتخاب و رزرو</button></div>' +
            '</div>';
    }).join('');
}

async function openFlight(id) {
    const r = await api('GET', '/api/tasks/' + id);
    if (!r.ok) return;
    const f = r.data;
    const airline = categories.find(c => c.id === f.category_id);
    showModal('<h2>✈️ ' + (f.title || '') + '</h2>' +
        '<div class="arow"><span>شرکت هواپیمایی</span><b>' + (airline ? airline.name : '—') + '</b></div>' +
        '<div class="arow"><span>شماره پرواز</span><b>' + (f.flight_number || '—') + '</b></div>' +
        '<div class="arow"><span>حرکت</span><b>' + dateOf(f.departure_at) + ' ساعت ' + timeOf(f.departure_at) + '</b></div>' +
        '<div class="arow"><span>ورود</span><b>' + dateOf(f.arrival_at) + ' ساعت ' + timeOf(f.arrival_at) + '</b></div>' +
        '<div class="arow"><span>قیمت بلیت</span><b style="color:#16a34a">' + money(f.price) + '</b></div>' +
        '<div class="arow"><span>صندلی باقیمانده</span><b>' + f.stock + '</b></div>' +
        '<p style="font-size:13px;color:#64748b">' + (f.description || '') + '</p>' +
        '<div class="mrow"><button class="btn gray" onclick="closeModals()">بستن</button>' +
        '<button class="btn" onclick="addToCart(' + f.id + ');closeModals()">رزرو بلیت</button></div>');
}

function showModal(html) {
    document.getElementById('modal').innerHTML = html;
    document.getElementById('overlay').classList.add('show');
}
function closeModals() { document.getElementById('overlay').classList.remove('show'); }

function openAuth(mode) {
    const login = mode !== 'register';
    showModal('<h2>' + (login ? '🔑 ورود به حساب' : '📝 ثبتنام') + '</h2>' +
        '<label class="field">ایمیل<input id="authEmail" type="email" value="test@example.com"></label>' +
        (login ? '' : '<label class="field">نام<input id="authName" value="کاربر تست"></label>') +
        '<label class="field">رمز عبور<input id="authPass" type="password" value="password"></label>' +
        '<div class="mrow"><button class="btn gray" onclick="closeModals()">لغو</button>' +
        '<button class="btn" onclick="submitAuth(' + (login ? 'true' : 'false') + ')">' + (login ? 'ورود' : 'ثبتنام') + '</button></div>' +
        '<div style="margin-top:12px;font-size:12px;color:#64748b">' +
        (login ? 'حساب تست: test@example.com / password' : 'حداقل ۸ کاراکتر') + '</div>');
}

async function submitAuth(login) {
    const body = login
        ? { email: document.getElementById('authEmail').value, password: document.getElementById('authPass').value }
        : { name: document.getElementById('authName').value, email: document.getElementById('authEmail').value, password: document.getElementById('authPass').value };
    const r = await api('POST', login ? '/api/login' : '/api/register', body);
    if (r.ok) {
        token = r.data.token;
        localStorage.setItem('shop_token', token);
        closeModals();
        updateAuthUI();
        await loadCategories();
        showAdmin();
        toast('خوش آمدید 👋', true);
    } else {
        toast(r.data.message || 'خطا در احراز هویت', false);
    }
}

async function logout() {
    const r = await api('POST', '/api/logout');
    token = '';
    localStorage.removeItem('shop_token');
    updateAuthUI();
    document.getElementById('admin').classList.remove('show');
    document.getElementById('adminBtn').textContent = '⚙️ پنل ادمین';
    toast(r.ok ? 'خروج شد' : 'خروج انجام شد', true);
}

function addToCart(id) {
    const f = flights.find(x => x.id === id);
    if (!f) return;
    if (f.stock <= 0) { toast('ظرفیت این پرواز تکمیل است', false); return; }
    const item = cart.find(x => x.id === id);
    if (item) item.qty++; else cart.push({ id, title: f.title, price: f.price, qty: 1 });
    localStorage.setItem('shop_cart', JSON.stringify(cart));
    renderCart();
    toast('بلیت به سبد اضافه شد ✅', true);
}

function renderCart() {
    document.getElementById('cartCount').textContent = cart.reduce((s, i) => s + i.qty, 0);
    document.getElementById('cartItems').innerHTML = cart.length ? cart.map(i =>
        '<div class="citem"><b>' + i.title + '</b><span>' + money(i.price) + '</span>' +
        '<button onclick="changeQty(' + i.id + ',-1)">−</button><span>' + i.qty + '</span>' +
        '<button onclick="changeQty(' + i.id + ',1)">+</button></div>').join('')
        : '<p style="color:#64748b;font-size:13px">بلیتی انتخاب نشده است</p>';
    document.getElementById('cartTotal').textContent = 'جمع: ' + money(cart.reduce((s, i) => s + i.price * i.qty, 0));
}

function changeQty(id, delta) {
    const item = cart.find(x => x.id === id);
    item.qty += delta;
    if (item.qty <= 0) cart = cart.filter(x => x.id !== id);
    localStorage.setItem('shop_cart', JSON.stringify(cart));
    renderCart();
}

async function checkout() {
    if (!cart.length) { toast('ابتدا بلیتی انتخاب کنید', false); return; }
    let ok = true;
    for (const item of cart) {
        const f = flights.find(x => x.id === item.id);
        const r = await api('PUT', '/api/tasks/' + item.id, { stock: Math.max(0, (f ? f.stock : 0) - item.qty) });
        if (!r.ok) ok = false;
    }
    cart = [];
    localStorage.setItem('shop_cart', JSON.stringify(cart));
    renderCart();
    await loadFlights();
    toggleCart();
    toast(ok ? 'رزرو با موفقیت ثبت شد 🎉' : 'بعضی از بلیتها ثبت نشدند', ok);
}

function toggleCart() { document.getElementById('drawer').classList.toggle('show'); }

function toggleAdmin() {
    const el = document.getElementById('admin');
    const open = !el.classList.contains('show');
    el.classList.toggle('show', open);
    document.getElementById('adminBtn').textContent = open ? '✖️ بستن پنل' : '⚙️ پنل ادمین';
    if (open) { loadCategories(); loadFlights(); }
}

function showAdmin() {
    document.getElementById('admin').classList.add('show');
    document.getElementById('adminBtn').textContent = '✖️ بستن پنل';
    loadCategories();
    loadFlights();
}

function renderAdminCats() {
    document.getElementById('adminCats').innerHTML = categories.map(c =>
        '<div class="arow"><span>🏢 ' + c.name + '</span>' +
        '<button class="btn ghost slim" onclick="editCategory(' + c.id + ')">ویرایش</button>' +
        '<button class="btn danger slim" onclick="deleteCategory(' + c.id + ')">حذف</button></div>').join('');
}

async function addCategory() {
    const name = document.getElementById('newCat').value.trim();
    if (!name) return;
    const r = await api('POST', '/api/categories', { name });
    if (r.ok) { document.getElementById('newCat').value = ''; await loadCategories(); toast('شرکت اضافه شد', true); }
}

async function editCategory(id) {
    const r = await api('GET', '/api/categories/' + id);
    if (!r.ok) return;
    const name = prompt('نام جدید شرکت:', r.data.name);
    if (!name) return;
    const up = await api('PUT', '/api/categories/' + id, { name });
    if (up.ok) { await loadCategories(); await loadFlights(); toast('شرکت ویرایش شد', true); }
}

async function deleteCategory(id) {
    if (!confirm('این شرکت و تمام پروازهایش حذف شود؟')) return;
    const r = await api('DELETE', '/api/categories/' + id);
    if (r.ok) { await loadCategories(); await loadFlights(); toast('شرکت حذف شد', true); }
}

function renderAdminFlights() {
    document.getElementById('adminProducts').innerHTML = flights.map(f =>
        '<div class="arow"><span>✈️ ' + (f.title || '') + ' — ' + money(f.price) + ' (' + f.stock + ' صندلی)</span>' +
        '<button class="btn ghost slim" onclick="editProduct(' + f.id + ')">ویرایش</button>' +
        '<button class="btn danger slim" onclick="deleteProduct(' + f.id + ')">حذف</button></div>').join('');
}

async function saveProduct() {
    const departure = document.getElementById('pDeparture').value;
    const body = {
        title: document.getElementById('pTitle').value.trim(),
        origin: document.getElementById('pFrom').value.trim(),
        destination: document.getElementById('pTo').value.trim(),
        flight_number: document.getElementById('pNumber').value.trim(),
        price: Number(document.getElementById('pPrice').value),
        stock: Number(document.getElementById('pStock').value),
        category_id: Number(document.getElementById('pCat').value),
        description: document.getElementById('pDesc').value
    };
    if (departure) {
        body.departure_at = departure;
        body.arrival_at = new Date(new Date(departure).getTime() + 2 * 60 * 60 * 1000).toISOString();
    }
    if (!body.title) { toast('مسیر پرواز لازم است', false); return; }
    const wasEditing = editingId !== null;
    const r = wasEditing ? await api('PUT', '/api/tasks/' + editingId, body) : await api('POST', '/api/tasks', body);
    if (r.ok) { resetProductForm(); await loadFlights(); await loadCategories(); toast(wasEditing ? 'ویرایش شد' : 'پرواز اضافه شد', true); }
}

async function editProduct(id) {
    const r = await api('GET', '/api/tasks/' + id);
    if (!r.ok) return;
    const f = r.data;
    editingId = id;
    document.getElementById('pTitle').value = f.title || '';
    document.getElementById('pFrom').value = f.origin || '';
    document.getElementById('pTo').value = f.destination || '';
    document.getElementById('pNumber').value = f.flight_number || '';
    document.getElementById('pPrice').value = f.price;
    document.getElementById('pStock').value = f.stock;
    document.getElementById('pCat').value = f.category_id;
    document.getElementById('pDesc').value = f.description || '';
    document.getElementById('pDeparture').value = f.departure_at ? f.departure_at.slice(0, 16) : '';
    document.getElementById('productSubmit').textContent = 'ذخیره تغییرات';
    document.getElementById('productCancel').style.display = '';
    document.getElementById('admin').scrollIntoView({ behavior: 'smooth' });
}

function resetProductForm() {
    editingId = null;
    ['pTitle','pFrom','pTo','pNumber','pPrice','pStock','pDesc','pDeparture'].forEach(id => document.getElementById(id).value = '');
    document.getElementById('productSubmit').textContent = 'افزودن پرواز';
    document.getElementById('productCancel').style.display = 'none';
}

async function deleteProduct(id) {
    if (!confirm('این پرواز حذف شود؟')) return;
    const r = await api('DELETE', '/api/tasks/' + id);
    if (r.ok) { await loadFlights(); toast('پرواز حذف شد', true); }
}

init();
</script>
</body>
</html>
