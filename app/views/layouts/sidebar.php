<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="<?= ($_SESSION['role']=="admin")
? BASE_URL."/dashboard/admin"
: BASE_URL."/dashboard/user"; ?>"
class="brand-link">

<span class="brand-text font-weight-light">
RE SHOP
</span>

</a>

<div class="sidebar">

<nav class="mt-2">

<ul class="nav nav-pills nav-sidebar flex-column"
data-widget="treeview"
role="menu">

<?php if($_SESSION['role']=="admin"): ?>

<!-- ================= ADMIN ================= -->

<li class="nav-item">
<a href="<?= BASE_URL ?>/dashboard/admin" class="nav-link">
<i class="nav-icon fas fa-tachometer-alt"></i>
<p>Dashboard</p>
</a>
</li>

<li class="nav-header">
MASTER DATA
</li>

<li class="nav-item">
<a href="<?= BASE_URL ?>/kategori" class="nav-link">
<i class="nav-icon fas fa-list"></i>
<p>Kategori</p>
</a>
</li>

<li class="nav-item">
<a href="<?= BASE_URL ?>/produk" class="nav-link">
<i class="nav-icon fas fa-box"></i>
<p>Produk</p>
</a>
</li>

<li class="nav-item">
<a href="<?= BASE_URL ?>/user" class="nav-link">
<i class="nav-icon fas fa-users"></i>
<p>User</p>
</a>
</li>

<li class="nav-header">
TRANSAKSI
</li>

<li class="nav-item">
<a href="<?= BASE_URL ?>/transaksi" class="nav-link">
<i class="nav-icon fas fa-shopping-cart"></i>
<p>Data Transaksi</p>
</a>
</li>

<li class="nav-item">
<a href="<?= BASE_URL ?>/pembayaran" class="nav-link">
<i class="nav-icon fas fa-wallet"></i>
<p>Verifikasi Pembayaran</p>
</a>
</li>

<li class="nav-header">
LAPORAN
</li>

<li class="nav-item">
<a href="<?= BASE_URL ?>/laporan" class="nav-link">
<i class="nav-icon fas fa-file-pdf"></i>
<p>Laporan</p>
</a>
</li>

<?php else: ?>

<!-- ================= USER ================= -->

<li class="nav-item">
<a href="<?= BASE_URL ?>/dashboard/user" class="nav-link">
<i class="nav-icon fas fa-home"></i>
<p>Dashboard</p>
</a>
</li>

<li class="nav-item">
<a href="<?= BASE_URL ?>/produk" class="nav-link">
<i class="nav-icon fas fa-gamepad"></i>
<p>Produk Game</p>
</a>
</li>

<li class="nav-item">
<a href="<?= BASE_URL ?>/keranjang" class="nav-link">
<i class="nav-icon fas fa-shopping-cart"></i>
<p>Keranjang</p>
</a>
</li>

<li class="nav-item">
<a href="<?= BASE_URL ?>/favorit" class="nav-link">
<i class="nav-icon fas fa-heart text-danger"></i>
<p>Favorit</p>
</a>
</li>

<li class="nav-item">
<a href="<?= BASE_URL ?>/transaksi/checkout" class="nav-link">
<i class="nav-icon fas fa-credit-card"></i>
<p>Checkout</p>
</a>
</li>

<li class="nav-item">
<a href="<?= BASE_URL ?>/pembayaran" class="nav-link">
<i class="nav-icon fas fa-wallet"></i>
<p>Pembayaran</p>
</a>
</li>

<li class="nav-item">
<a href="<?= BASE_URL ?>/transaksi/riwayat" class="nav-link">
<i class="nav-icon fas fa-history"></i>
<p>Riwayat Pesanan</p>
</a>
</li>

<li class="nav-item">
<a href="<?= BASE_URL ?>/profil" class="nav-link">
<i class="nav-icon fas fa-user"></i>
<p>Profil Saya</p>
</a>
</li>

<?php endif; ?>

<li class="nav-header">
AKUN
</li>

<li class="nav-item">
<a href="<?= BASE_URL ?>/auth/logout" class="nav-link">
<i class="nav-icon fas fa-sign-out-alt"></i>
<p>Logout</p>
</a>
</li>

</ul>

</nav>

</div>

</aside>