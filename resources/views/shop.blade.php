<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>کتاب باز | Laravel 13</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--bg:#f6f8fc;--card:#fff;--ink:#0f172a;--muted:#64748b;--line:#e2e8f0;--brand:#4f46e5;--brand2:#0ea5e9;--ok:#16a34a;--bad:#dc2626}
*{box-sizing:border-box}
body{margin:0;font-family:'Vazirmatn',ui-sans-serif,system-ui,Tahoma,sans-serif;background:var(--bg);color:var(--ink)}
button{font-family:inherit;cursor:pointer}
.topbar{position:sticky;top:0;z-index:30;background:#fff;border-bottom:1px solid var(--line);padding:12px 5%;display:flex;align-items:center;gap:14px;box-shadow:0 2px 12px #00000008}
.logo{font-size:22px;font-weight:800;background:linear-gradient(90deg,var(--brand),var(--brand2));-webkit-background-clip:text;color:transparent}
.search{flex:1;max-width:420px;padding:10px 14px;border:1px solid var(--line);border-radius:10px;font-size:14px;outline:none}
.search:focus{border-color:var(--brand)}
.btn{border:0;border-radius:10px;padding:9px 15px;font-size:13px;font-weight:700;background:var(--brand);color:#fff;transition:.15s}
.btn:hover{filter:brightness(1.1)}
.btn.ghost{background:#eef2ff;color:var(--brand)}
.btn.slim{padding:5px 10px;font-size:11px}
.btn.danger{background:#fee2e2;color:var(--bad)}
.btn.gray{background:#f1f5f9;color:var(--ink)}
.cartbtn{position:relative;background:#0f172a;color:#fff;border:0;border-radius:10px;padding:9px 14px;font-size:13px}
.badge{position:absolute;top:-7px;left:-7px;background:var(--bad);color:#fff;border-radius:99px;font-size:11px;min-width:19px;padding:1px 5px}
.chips{display:flex;gap:10px;flex-wrap:wrap;margin:20px 5%}
.chip{border:1px solid var(--line);background:#fff;border-radius:99px;padding:8px 16px;font-size:13px;font-weight:600;color:var(--muted)}
.chip.active{background:var(--brand);border-color:var(--brand);color:#fff}
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(230px,1fr));gap:18px;margin:0 5% 60px}
.product{background:var(--card);border:1px solid var(--line);border-radius:16px;overflow:hidden;transition:.2s;cursor:pointer}
.product:hover{transform:translateY(-4px);box-shadow:0 12px 30px #0f172a14}
.thumb{height:150px;display:flex;align-items:center;justify-content:center;font-size:56px;background:linear-gradient(135deg,#eef2ff,#e0f2fe)}
.pbody{padding:14px}
.pcat{font-size:11px;color:var(--brand);font-weight:700}
.ptitle{font-weight:700;font-size:15px;margin:5px 0;min-height:42px}
.pprice{color:var(--ok);font-weight:800;font-size:16px}
.pstock{font-size:11px;color:var(--muted);margin-top:4px}
.pfoot{display:flex;gap:8px;margin-top:12px}
.pfoot .btn{flex:1;text-align:center}
.empty{grid-column:1/-1;text-align:center;padding:50px;color:var(--muted)}
.overlay{position:fixed;inset:0;background:#0f172a99;z-index:40;display:none;align-items:center;justify-content:center;padding:20px}
.overlay.show{display:flex}
.modal{background:#fff;border-radius:18px;width:min(520px,100%);max-height:88vh;overflow:auto;padding:24px}
.modal h2{margin:0 0 16px;font-size:20px}
.field{display:block;margin:10px 0;font-size:13px;font-weight:600}
.field input,.field select,.field textarea{display:block;width:100%;margin-top:5px;padding:10px;border:1px solid var(--line);border-radius:9px;font:inherit;font-size:14px}
.mrow{display:flex;gap:8px;justify-content:flex-end;margin-top:18px;flex-wrap:wrap}
.drawer{position:fixed;top:0;left:0;bottom:0;width:min(400px,100%);background:#fff;z-index:50;box-shadow:8px 0 30px #0002;padding:22px;transform:translateX(-105%);transition:.25s;overflow:auto}
.drawer.show{transform:none}
.citem{display:flex;gap:10px;align-items:center;border-bottom:1px solid var(--line);padding:10px 0;font-size:13px}
.citem b{flex:1}
.citem button{border:0;background:#f1f5f9;border-radius:6px;padding:3px 8px;font-weight:700}
.total{font-size:18px;font-weight:800;margin:18px 0}
.toast{position:fixed;bottom:24px;right:24px;z-index:99;background:#0f172a;color:#fff;padding:12px 18px;border-radius:10px;font-size:13px;opacity:0;transition:.25s;pointer-events:none}
.toast.show{opacity:1}
.admin{margin:0 5% 60px;background:#fff;border:1px solid var(--line);border-radius:16px;padding:20px;display:none}
.admin.show{display:block}
.admin h3{margin:18px 0 8px;font-size:15px}
.arow{display:flex;gap:8px;align-items:center;padding:7px 0;border-bottom:1px dashed var(--line);font-size:13px;flex-wrap:wrap}
.arow span{flex:1}
input[placeholder]{padding:9px;border:1px solid var(--line);border-radius:8px;font:inherit;font-size:13px}
</style>
</head>
<body>

<div class="topbar">
    <div class="logo">📚 کتاب باز</div>
    <input class="search" id="search" placeholder="جستجوی محصول…" oninput="renderProducts()">
    <button class="btn ghost" onclick="toggleAdmin()" id="adminBtn">⚙️ پنل ادمین</button>
    <button class="btn" id="authBtn" onclick="token ? logout() : openAuth()">ورود</button>
    <button class="cartbtn" onclick="toggleCart()">🛒 سبد <span class="badge" id="cartCount">0</span></button>
</div>

<div class="chips" id="chips"></div>
<div class="grid" id="grid"></div>

<div class="admin" id="admin">
    <h2>⚙️ پنل مدیریت کتاب باز</h2>
    <p style="color:#64748b;font-size:13px">اینجا از تمام اندپوینتهای CRUD استفاده میشود: ایجاد، ویرایش و حذف دسته و محصول.</p>
    <h3>دستهبندیها</h3>
    <div id="adminCats"></div>
    <div style="display:flex;gap:8px;margin-top:10px">
        <input id="newCat" placeholder="نام دستهٔ جدید" style="flex:1">
        <button class="btn" onclick="addCategory()">افزودن دسته</button>
    </div>
    <h3>محصولات</h3>
    <div id="adminProducts"></div>
    <div style="display:grid;grid-template-columns:2fr 1fr 1fr 1.4fr;gap:8px;margin-top:10px">
        <input id="pTitle" placeholder="نام کتاب">
        <input id="pPrice" type="number" placeholder="قیمت">
        <input id="pStock" type="number" placeholder="موجودی">
        <select id="pCat"></select>
    </div>
    <div style="margin-top:8px;display:flex;gap:8px">
        <input id="pDesc" placeholder="توضیحات (اختیاری)" style="flex:1">
        <button class="btn" id="productSubmit" onclick="saveProduct()">افزودن محصول</button>
        <button class="btn gray" onclick="resetProductForm()" style="display:none" id="productCancel">لغو</button>
    </div>
</div>

<div class="drawer" id="drawer">
    <h2>🛒 سبد خرید</h2>
    <div id="cartItems"></div>
    <div class="total" id="cartTotal">جمع: ۰ تومان</div>
    <button class="btn" style="width:100%" onclick="checkout()">ثبت سفارش</button>
    <button class="btn gray" style="width:100%;margin-top:8px" onclick="toggleCart()">بستن</button>
</div>

<div class="overlay" id="overlay" onclick="if(event.target===this)closeModals()">
    <div class="modal" id="modal"></div>
</div>

<div class="toast" id="toast"></div>

<script>
let token = localStorage.getItem('shop_token') || '';
let categories = [];
let products = [];
let activeCat = null;
let cart = JSON.parse(localStorage.getItem('shop_cart') || '[]');
let editingId = null;

const money = n => Number(n).toLocaleString('fa-IR') + ' تومان';

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
    await loadProducts();
    renderCart();
}

async function loadCategories() {
    const r = await api('GET', '/api/categories');
    if (!r.ok) return;
    categories = r.data;
    document.getElementById('chips').innerHTML =
        '<button class="chip' + (activeCat === null ? ' active' : '') + '" onclick="filterCat(null)">همه محصولات</button>' +
        categories.map(c => '<button class="chip' + (activeCat === c.id ? ' active' : '') + '" onclick="filterCat(' + c.id + ')">' + c.name + '</button>').join('');
    document.getElementById('pCat').innerHTML = categories.map(c => '<option value="' + c.id + '">' + c.name + '</option>').join('');
    renderAdminCats();
}

async function filterCat(id) { activeCat = id; await loadProducts(); await loadCategories(); }

async function loadProducts() {
    const path = activeCat ? '/api/tasks?category_id=' + activeCat : '/api/tasks';
    const r = await api('GET', path);
    if (!r.ok) return;
    products = r.data;
    renderProducts();
    renderAdminProducts();
}

function renderProducts() {
    const q = document.getElementById('search').value.trim();
    const list = products.filter(p => !q || p.title.includes(q));
    const grid = document.getElementById('grid');
    if (!list.length) { grid.innerHTML = '<div class="empty">محصولی پیدا نشد 🧐</div>'; return; }
    grid.innerHTML = list.map(p => {
        const cat = categories.find(c => c.id === p.category_id);
        return '<div class="product" onclick="openProduct(' + p.id + ')">' +
            '<div class="thumb">' + (p.image ? '<img src="' + p.image + '" style="width:100%;height:100%;object-fit:cover">' : '📖') + '</div>' +
            '<div class="pbody"><div class="pcat">' + (cat ? cat.name : '—') + '</div>' +
            '<div class="ptitle">' + p.title + '</div>' +
            '<div class="pprice">' + money(p.price) + '</div>' +
            '<div class="pstock">' + (p.stock > 0 ? 'موجودی: ' + p.stock : 'ناموجود ❌') + '</div>' +
            '<div class="pfoot"><button class="btn slim" onclick="event.stopPropagation();addToCart(' + p.id + ')">🛒 افزودن</button>' +
            '<button class="btn slim ghost" onclick="event.stopPropagation();openProduct(' + p.id + ')">جزئیات</button></div>' +
            '</div></div>';
    }).join('');
}

async function openProduct(id) {
    const r = await api('GET', '/api/tasks/' + id);
    if (!r.ok) return;
    const p = r.data;
    showModal('<h2>📦 ' + p.title + '</h2>' +
        '<p style="color:#64748b;font-size:13px">' + (p.description || 'توضیحاتی برای این محصول ثبت نشده است.') + '</p>' +
        '<div style="font-size:22px;font-weight:800;color:#16a34a;margin:14px 0">' + money(p.price) + '</div>' +
        '<div style="font-size:13px">موجودی: ' + p.stock + ' | شناسه: #' + p.id + '</div>' +
        '<div class="mrow"><button class="btn gray" onclick="closeModals()">بستن</button>' +
        '<button class="btn" onclick="addToCart(' + p.id + ');closeModals()">افزودن به سبد</button></div>');
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
    const p = products.find(x => x.id === id);
    if (!p) return;
    if (p.stock <= 0) { toast('این محصول ناموجود است', false); return; }
    const item = cart.find(x => x.id === id);
    if (item) item.qty++; else cart.push({ id, title: p.title, price: p.price, qty: 1 });
    localStorage.setItem('shop_cart', JSON.stringify(cart));
    renderCart();
    toast('به سبد اضافه شد ✅', true);
}

function renderCart() {
    document.getElementById('cartCount').textContent = cart.reduce((s, i) => s + i.qty, 0);
    document.getElementById('cartItems').innerHTML = cart.length ? cart.map(i =>
        '<div class="citem"><b>' + i.title + '</b><span>' + money(i.price) + '</span>' +
        '<button onclick="changeQty(' + i.id + ',-1)">−</button><span>' + i.qty + '</span>' +
        '<button onclick="changeQty(' + i.id + ',1)">+</button></div>').join('')
        : '<p style="color:#64748b;font-size:13px">سبدخرید خالی است</p>';
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
    if (!cart.length) { toast('سبد خالی است', false); return; }
    let ok = true;
    for (const item of cart) {
        const p = products.find(x => x.id === item.id);
        const r = await api('PUT', '/api/tasks/' + item.id, { stock: Math.max(0, (p ? p.stock : 0) - item.qty) });
        if (!r.ok) ok = false;
    }
    cart = [];
    localStorage.setItem('shop_cart', JSON.stringify(cart));
    renderCart();
    await loadProducts();
    toggleCart();
    toast(ok ? 'سفارش ثبت شد 🎉' : 'بعضی از محصولات ثبت نشدند', ok);
}

function toggleCart() { document.getElementById('drawer').classList.toggle('show'); }

function toggleAdmin() {
    const el = document.getElementById('admin');
    const open = !el.classList.contains('show');
    el.classList.toggle('show', open);
    document.getElementById('adminBtn').textContent = open ? '✖️ بستن پنل' : '⚙️ پنل ادمین';
    if (open) { loadCategories(); loadProducts(); }
}

function showAdmin() {
    document.getElementById('admin').classList.add('show');
    document.getElementById('adminBtn').textContent = '✖️ بستن پنل';
    loadCategories();
    loadProducts();
}

function renderAdminCats() {
    document.getElementById('adminCats').innerHTML = categories.map(c =>
        '<div class="arow"><span>📁 ' + c.name + '</span>' +
        '<button class="btn slim ghost" onclick="editCategory(' + c.id + ')">ویرایش</button>' +
        '<button class="btn slim danger" onclick="deleteCategory(' + c.id + ')">حذف</button></div>').join('');
}

async function addCategory() {
    const name = document.getElementById('newCat').value.trim();
    if (!name) return;
    const r = await api('POST', '/api/categories', { name });
    if (r.ok) { document.getElementById('newCat').value = ''; await loadCategories(); toast('دسته اضافه شد', true); }
}

async function editCategory(id) {
    const r = await api('GET', '/api/categories/' + id);
    if (!r.ok) return;
    const name = prompt('نام جدید دسته:', r.data.name);
    if (!name) return;
    const up = await api('PUT', '/api/categories/' + id, { name });
    if (up.ok) { await loadCategories(); await loadProducts(); toast('دسته ویرایش شد', true); }
}

async function deleteCategory(id) {
    if (!confirm('این دسته و تمام محصولاتش حذف شود؟')) return;
    const r = await api('DELETE', '/api/categories/' + id);
    if (r.ok) { await loadCategories(); await loadProducts(); toast('دسته حذف شد', true); }
}

function renderAdminProducts() {
    document.getElementById('adminProducts').innerHTML = products.map(p =>
        '<div class="arow"><span>📦 ' + p.title + ' — ' + money(p.price) + ' (موجودی: ' + p.stock + ')</span>' +
        '<button class="btn slim ghost" onclick="editProduct(' + p.id + ')">ویرایش</button>' +
        '<button class="btn slim danger" onclick="deleteProduct(' + p.id + ')">حذف</button></div>').join('');
}

async function saveProduct() {
    const body = {
        title: document.getElementById('pTitle').value.trim(),
        price: Number(document.getElementById('pPrice').value),
        stock: Number(document.getElementById('pStock').value),
        category_id: Number(document.getElementById('pCat').value),
        description: document.getElementById('pDesc').value
    };
    if (!body.title) { toast('نام محصول لازم است', false); return; }
    const wasEditing = editingId !== null;
    const r = wasEditing ? await api('PUT', '/api/tasks/' + editingId, body) : await api('POST', '/api/tasks', body);
    if (r.ok) { resetProductForm(); await loadProducts(); await loadCategories(); toast(wasEditing ? 'ویرایش شد' : 'محصول اضافه شد', true); }
}

async function editProduct(id) {
    const r = await api('GET', '/api/tasks/' + id);
    if (!r.ok) return;
    const p = r.data;
    editingId = id;
    document.getElementById('pTitle').value = p.title;
    document.getElementById('pPrice').value = p.price;
    document.getElementById('pStock').value = p.stock;
    document.getElementById('pCat').value = p.category_id;
    document.getElementById('pDesc').value = p.description || '';
    document.getElementById('productSubmit').textContent = 'ذخیره تغییرات';
    document.getElementById('productCancel').style.display = '';
    document.getElementById('admin').scrollIntoView({ behavior: 'smooth' });
}

function resetProductForm() {
    editingId = null;
    ['pTitle','pPrice','pStock','pDesc'].forEach(id => document.getElementById(id).value = '');
    document.getElementById('productSubmit').textContent = 'افزودن محصول';
    document.getElementById('productCancel').style.display = 'none';
}

async function deleteProduct(id) {
    if (!confirm('این محصول حذف شود؟')) return;
    const r = await api('DELETE', '/api/tasks/' + id);
    if (r.ok) { await loadProducts(); toast('محصول حذف شد', true); }
}

init();
</script>
</body>
</html>
