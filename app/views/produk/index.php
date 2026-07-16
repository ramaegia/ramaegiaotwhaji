<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="card">

<div class="card-header">

<h3 class="card-title">
<i class="fas fa-box"></i>
Data Produk
</h3>

<div class="float-right">

<a href="<?= BASE_URL ?>/produk/tambah" class="btn btn-primary">

<i class="fas fa-plus"></i>

Tambah Produk

</a>

</div>

</div>

<div class="card-body">

<!-- Flash Message -->

<?php if(isset($_SESSION['success'])): ?>

<div class="alert alert-success alert-dismissible fade show">

<?= $_SESSION['success']; ?>

<button type="button" class="close" data-dismiss="alert">

&times;

</button>

</div>

<?php unset($_SESSION['success']); ?>

<?php endif; ?>

<?php if(isset($_SESSION['error'])): ?>

<div class="alert alert-danger alert-dismissible fade show">

<?= $_SESSION['error']; ?>

<button type="button" class="close" data-dismiss="alert">

&times;

</button>

</div>

<?php unset($_SESSION['error']); ?>

<?php endif; ?>

<!-- Search -->

<div class="row mb-3">

<div class="col-md-4">

<form method="GET" action="<?= BASE_URL ?>/produk">

<div class="input-group">

<input
type="text"
name="keyword"
class="form-control"
placeholder="Cari Produk..."
value="<?= isset($keyword) ? $keyword : ''; ?>">

<div class="input-group-append">

<button class="btn btn-primary">

<i class="fas fa-search"></i>

</button>

</div>

</div>

</form>

</div>

</div>

<table class="table table-bordered table-hover table-striped datatable">

<thead class="thead-dark">

<tr>

<th width="50">No</th>

<th width="100">Gambar</th>

<th>Kategori</th>

<th>Nama Produk</th>

<th>Harga</th>

<th>Stok</th>

<th width="220">Aksi</th>

</tr>

</thead>

<tbody>

<?php if(count($produk)>0): ?>

<?php $no=1; ?>

<?php foreach($produk as $p): ?>

<tr>

<td><?= $no++; ?></td>

<td>

<?php if(!empty($p['gambar'])): ?>

<img
src="<?= BASE_URL ?>/public/uploads/<?= $p['gambar']; ?>"
width="80"
class="img-thumbnail">

<?php else: ?>

<span class="text-muted">

Tidak Ada

</span>

<?php endif; ?>

</td>

<td><?= $p['nama_kategori']; ?></td>

<td><?= $p['nama_produk']; ?></td>

<td>

Rp <?= number_format($p['harga'],0,',','.'); ?>

</td>

<td>

<?php

if($p['stok']<=5){

echo "<span class='badge badge-danger'>".$p['stok']."</span>";

}else{

echo "<span class='badge badge-success'>".$p['stok']."</span>";

}

?>

</td>

<td>

<a
href="<?= BASE_URL ?>/produk/edit/<?= $p['id']; ?>"
class="btn btn-warning btn-sm">

<i class="fas fa-edit"></i>

Edit

</a>

<a
href="<?= BASE_URL ?>/produk/hapus/<?= $p['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus produk ini?')">

<i class="fas fa-trash"></i>

Hapus

</a>

<a
href="<?= BASE_URL ?>/keranjang/tambah/<?= $p['id']; ?>"
class="btn btn-primary btn-sm">

<i class="fas fa-shopping-cart"></i>

Keranjang

</a>

</td>

</tr>

<?php endforeach; ?>

<?php else: ?>

<tr>

<td colspan="7" class="text-center">

Tidak ada data produk.

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