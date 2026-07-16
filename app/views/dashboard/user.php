<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">

<div class="row mb-2">

<div class="col-sm-6">
<h1>Dashboard User</h1>
</div>

<div class="col-sm-6 text-right">
<h5>
Selamat Datang,
<strong><?= $_SESSION['nama']; ?></strong>
</h5>
</div>

</div>

</div>
</section>

<section class="content">

<div class="container-fluid">

<!-- Banner -->

<div class="jumbotron bg-primary text-white">

<h2>Selamat Datang di RE SHOP 👋</h2>

<p>
Top Up Game Murah • Cepat • Aman
</p>

<a href="<?= BASE_URL ?>/produk" class="btn btn-light">
Belanja Sekarang
</a>

</div>

<!-- Statistik -->

<div class="row">

<div class="col-lg-3 col-6">

<div class="small-box bg-info">

<div class="inner">

<h3><?= $jumlahTransaksi ?></h3>

<p>Total Pesanan</p>

</div>

<div class="icon">
<i class="fas fa-shopping-cart"></i>
</div>

</div>

</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">

<div class="inner">

<h3><?= $pending ?></h3>

<p>Pending</p>

</div>

<div class="icon">
<i class="fas fa-clock"></i>
</div>

</div>

</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-primary">

<div class="inner">

<h3><?= $diproses ?></h3>

<p>Diproses</p>

</div>

<div class="icon">
<i class="fas fa-box"></i>
</div>

</div>

</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">

<div class="inner">

<h3><?= $selesai ?></h3>

<p>Selesai</p>

</div>

<div class="icon">
<i class="fas fa-check-circle"></i>
</div>

</div>

</div>

</div>

<!-- Produk -->

<div class="card">

<div class="card-header">

<h3 class="card-title">
Produk Terbaru
</h3>

</div>

<div class="card-body">

<div class="row">

<?php foreach($produkTerbaru as $p): ?>

<div class="col-md-3">

<div class="card shadow-sm mb-4">

<?php if(!empty($p['gambar'])): ?>

<img
src="<?= BASE_URL ?>/public/uploads/<?= $p['gambar']; ?>"
class="card-img-top"
style="height:220px;object-fit:cover;">

<?php endif; ?>

<div class="card-body">

<h5><?= $p['nama_produk']; ?></h5>

<p class="text-success">

Rp <?= number_format($p['harga'],0,',','.'); ?>

</p>

<div class="row">

<div class="col-6">

<a
href="<?= BASE_URL ?>/keranjang/tambah/<?= $p['id']; ?>"
class="btn btn-primary btn-sm btn-block">

<i class="fas fa-cart-plus"></i>

</a>

</div>

<div class="col-6">

<a
href="<?= BASE_URL ?>/favorit/tambah/<?= $p['id']; ?>"
class="btn btn-danger btn-sm btn-block">

<i class="fas fa-heart"></i>

</a>

</div>

</div>

</div>

</div>

</div>

<?php endforeach; ?>

</div>

</div>

</div>

<!-- Riwayat -->

<div class="card mt-4">

<div class="card-header">

<h3 class="card-title">

Riwayat Transaksi

</h3>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead>

<tr>

<th>ID</th>

<th>Total</th>

<th>Status</th>

<th>Tanggal</th>

</tr>

</thead>

<tbody>

<?php if(count($riwayat)>0): ?>

<?php foreach(array_slice($riwayat,0,5) as $r): ?>

<tr>

<td>#<?= $r['id']; ?></td>

<td>Rp <?= number_format($r['total'],0,',','.'); ?></td>

<td>

<?php

switch($r['status']){

case "Pending":
echo "<span class='badge badge-warning'>Pending</span>";
break;

case "Diproses":
echo "<span class='badge badge-primary'>Diproses</span>";
break;

case "Selesai":
echo "<span class='badge badge-success'>Selesai</span>";
break;

default:
echo "<span class='badge badge-secondary'>".$r['status']."</span>";

}

?>

</td>

<td><?= $r['created_at']; ?></td>

</tr>

<?php endforeach; ?>

<?php else: ?>

<tr>

<td colspan="4" class="text-center">

Belum ada transaksi.

</td>

</tr>

<?php endif; ?>

</tbody>

</table>

</div>

</div>

</div>

</section>

</div>

<?php require_once 'app/views/layouts/footer.php'; ?>