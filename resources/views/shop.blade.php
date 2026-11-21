<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>بلیط آسمان | رزرو پرواز</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--bg:#f3f7fd;--card:#fff;--ink:#0f172a;--muted:#64748b;--line:#e2e8f0;--brand:#0284c7;--brand2:#4f46e5;--ok:#16a34a;--bad:#dc2626}
*{box-sizing:border-box}
body{margin:0;font-family:'Vazirmatn',ui-sans-serif,system-ui,Tahoma,sans-serif;background:var(--bg);color:var(--ink)}
button,input,select{font-family:inherit}
.topbar{position:sticky;top:0;z-index:30;background:#fff;border-bottom:1px solid var(--line);padding:10px 4%;display:flex;align-items:center;gap:12px;box-shadow:0 2px 12px #00000008;flex-wrap:wrap}
.logo{font-size:20px;font-weight:800;background:linear-gradient(90deg,var(--brand),var(--brand2));-webkit-background-clip:text;color:transparent;white-space:nowrap}
.searchbox{display:flex;gap:8px;flex:1;flex-wrap:wrap;justify-content:center}
.searchbox input,.searchbox select{padding:9px 11px;border:1px solid var(--line);border-radius:9px;font-size:13px;outline:none;background:#fff}
.searchbox input:focus,.searchbox select:focus{border-color:var(--brand)}
.btn{border:0;border-radius:10px;padding:9px 14px;font-size:13px;font-weight:700;background:var(--brand);color:#fff;cursor:pointer;transition:.15s;white-space:nowrap}
.btn:hover{filter:brightness(1.1)}
.btn.ghost{background:#e0f2fe;color:var(--brand)}
.btn.slim{padding:5px 10px;font-size:11px}
.btn.danger{background:#fee2e2;color:var(--bad)}
.btn.gray{background:#f1f5f9;color:var(--ink)}
.cartbtn{position:relative;background:#0f172a;color:#fff;border:0;border-radius:10px;padding:9px 13px;font-size:13px;cursor:pointer;white-space:nowrap}
.badge{position:absolute;top:-7px;left:-7px;background:var(--bad);color:#fff;border-radius:99px;font-size:11px;min-width:19px;padding:1px 5px}
.strip{background:linear-gradient(120deg,#0369a1,#4f46e5);color:#fff;margin:16px 4% 0;border-radius:16px;padding:16px 22px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:8px;font-size:14px}
.chips{display:flex;gap:9px;flex-wrap:wrap;margin:18px 4% 6px}
.chip{border:1px solid var(--line);background:#fff;border-radius:99px;padding:7px 15px;font-size:13px;font-weight:600;color:var(--muted);cursor:pointer}
.chip.active{background:var(--brand);border-color:var(--brand);color:#fff}
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:16px;margin:14px 4% 60px}
.flight{background:var(--card);border:1px solid var(--line);border-radius:16px;overflow:hidden;transition:.2s;cursor:pointer}
.flight:hover{transform:translateY(-3px);box-shadow:0 12px 28px #0f172a14}
.fhead{background:linear-gradient(135deg,#e0f2fe,#eef2ff);padding:12px 16px;display:flex;justify-content:space-between;align-items:center;font-size:12px;font-weight:700;color:var(--brand)}
.fbody{padding:16px}
.route{display:flex;align-items:center;justify-content:space-between;gap:10px}
.city{font-size:21px;font-weight:800}
.plane{color:var(--brand);font-size:20px}
.time{font-size:12px;color:var(--muted);margin-top:2px}
.fmeta{display:flex;justify-content:space-between;border-top:1px dashed var(--line);margin-top:14px;padding-top:12px;font-size:12px;color:var(--muted)}
.fprice{font-size:19px;font-weight:800;color:var(--ok);margin-top:10px}
.fstock{font-size:11px;color:var(--muted);margin-top:2px}
.ffoot{display:flex;gap:8px;margin-top:12px}
.ffoot .btn{flex:1;text-align:center}
.empty{grid-column:1/-1;text-align:center;padding:50px;color:var(--muted)}
.overlay{position:fixed;inset:0;background:#0f172a99;z-index:40;display:none;align-items:center;justify-content:center;padding:20px}
.overlay.show{display:flex}
.modal{background:#fff;border-radius:18px;width:min(540px,100%);max-height:88vh;overflow:auto;padding:24px}
.modal h2{margin:0 0 16px;font-size:20px}
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
.admin{margin:0 4% 60px;background:#fff;border:1px solid var(--line);border-radius:16px;padding:20px;display:none}
.admin.show{display:block}
.admin h3{margin:18px 0 8px;font-size:15px}
.arow{display:flex;gap:8px;align-items:center;padding:7px 0;border-bottom:1px dashed var(--line);font-size:13px;flex-wrap:wrap}
.arow span{flex:1}
.formgrid{display:grid;grid-template-columns:repeat(auto-fit,minmax(130px,1fr));gap:8px;margin-top:10px}
input[placeholder]{padding:9px;border:1px solid var(--line);border-radius:8px;font:inherit;font-size:13px}
</style>
</head>
<body>

<div class="topbar">
    <div class="logo">✈️ بلیط آسمان</div>
    <div class="searchbox">
        <input id="fromCity" placeholder="مبدأ (مثلاً تهران)">
        <input id="toCity" placeholder="مقصد (مثلاً مشهد)">
        <input id="flyDate" type="date" title="تاریخ پرواز">
        <button class="btn" onclick="renderProducts()">جستجو</button>
    </div>
    <button class="btn ghost" onclick="toggleAdmin()" id="adminBtn">⚙️ پنل ادمین</button>
    <button class="btn" id="authBtn" onclick="token ? logout() : openAuth()">ورود</button>
    <button class="cartbtn" onclick="toggleCart()">🎫 بلیتهای من <span class="badge" id="cartCount">0</span></button>
</div>

<div class="strip">
    <span>✈️ پروازهای داخلی و خارجی — رزرو آنلاین</span>
    <span id="summary">در حال بارگذاری…</span>
</div>

<div class="chips" id="chips"></div>
<div class="grid" id="grid"></div>

<div class="admin" id="admin">
    <h2>⚙️ پنل مدیریت بلیط آسمان</h2>
    <p style="color:#64748b;font-size:13px">اینجا از تمام اندپوینتهای CRUD استفاده میشود: ایجاد، ویرایش و حذف شرکت هواپیمایی و پرواز.</p>
    <h3>شرکتهای هواپیمایی</h3>
    <div id="adminCats"></div>
    <div style="display:flex;gap:8px;margin-top:10px">
        <input id="newCat" placeholder="نام شرکت هواپیمایی" style="flex:1">
        <button class="btn" onclick="addCategory()">افزودن شرکت</button>
    </div>
    <h3>پروازها</h3>
    <div id="adminProducts"></div>
    <div class="formgrid">
        <input id="pTitle" placeholder="مسیر (تهران → مشهد)">
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

<div class="overlay" id="overlay" onclick="if(event.target===this)closeModals()">
    <div class="modal" id="modal"></div>
</div>

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
    document.getElementById('authBtn').textContent = token ? 'خروج' : 'ورود';
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
        '<button class="chip' + (activeCat === null ? ' active' : '') + '" onclick="filterCat(null)">همه پروازها</button>' +
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
    document.getElementById('summary').textContent = flights.length + ' پرواز موجود';
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
    if (!list.length) { grid.innerHTML = '<div class="empty">پرواز مورد نظر پیدا نشد ✈️</div>'; return; }
    grid.innerHTML = list.map(f => {
        const airline = categories.find(c => c.id === f.category_id);
        return '<div class="flight" onclick="openFlight(' + f.id + ')">' +
            '<div class="fhead"><span>✈️ ' + (airline ? airline.name : '—') + '</span><span>' + (f.flight_number || '—') + '</span></div>' +
            '<div class="fbody"><div class="route"><div><div class="city">' + (f.origin || '—') + '</div><div class="time">' + timeOf(f.departure_at) + ' · ' + dateOf(f.departure_at) + '</div></div>' +
            '<div class="plane">➜</div>' +
            '<div style="text-align:left"><div class="city">' + (f.destination || '—') + '</div><div class="time">' + timeOf(f.arrival_at) + '</div></div></div>' +
            '<div class="fmeta"><span>مدت: حدود ۲ ساعت</span><span>پرواز شماره ' + (f.flight_number || '—') + '</span></div>' +
            '<div class="fprice">' + money(f.price) + '</div>' +
            '<div class="fstock">' + (f.stock > 0 ? f.stock + ' صندلی باقیمانده' : 'تکمیل ظرفیت ❌') + '</div>' +
            '<div class="ffoot"><button class="btn slim" onclick="event.stopPropagation();addToCart(' + f.id + ')">🎫 رزرو</button>' +
            '<button class="btn slim ghost" onclick="event.stopPropagation();openFlight(' + f.id + ')">جزئیات</button></div>' +
            '</div></div>';
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
    showModal('<h2>' + (login ? '🔑 ورود' : '📝 ثبتنام') + '</h2>' +
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
        '<button class="btn slim ghost" onclick="editCategory(' + c.id + ')">ویرایش</button>' +
        '<button class="btn slim danger" onclick="deleteCategory(' + c.id + ')">حذف</button></div>').join('');
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
        '<button class="btn slim ghost" onclick="editProduct(' + f.id + ')">ویرایش</button>' +
        '<button class="btn slim danger" onclick="deleteProduct(' + f.id + ')">حذف</button></div>').join('');
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
