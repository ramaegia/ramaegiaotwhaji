<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="card">

<div class="card-header">

<h3>Produk Favorit Saya</h3>

</div>

<div class="card-body">

<div class="row">

<?php if(count($favorit)>0): ?>

<?php foreach($favorit as $p): ?>

<div class="col-md-3">

<div class="card shadow mb-4">

<?php if($p['gambar']!=""): ?>

<img
src="<?= BASE_URL ?>/public/uploads/<?= $p['gambar']; ?>"
class="card-img-top"
style="height:220px;object-fit:cover;">

<?php endif; ?>

<div class="card-body">

<h5><?= $p['nama_produk']; ?></h5>

<p class="text-success">

Rp <?= number_format($p['harga']); ?>

</p>

<a
href="<?= BASE_URL ?>/keranjang/tambah/<?= $p['produk_id']; ?>"
class="btn btn-primary btn-block">

Masuk Keranjang

</a>

<a
href="<?= BASE_URL ?>/favorit/hapus/<?= $p['produk_id']; ?>"
class="btn btn-danger btn-block mt-2"
onclick="return confirm('Hapus dari favorit?')">

Hapus Favorit

</a>

</div>

</div>

</div>

<?php endforeach; ?>

<?php else: ?>

<div class="col-md-12">

<div class="alert alert-info">

Belum ada produk favorit.

</div>

</div>

<?php endif; ?>

</div>

</div>

</div>

</div>

</section>

</div>

<?php require_once 'app/views/layouts/footer.php'; ?>