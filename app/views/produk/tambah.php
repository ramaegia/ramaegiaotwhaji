<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="card">

<div class="card-header">

<h3>Tambah Produk</h3>

</div>

<div class="card-body">

<form method="POST"
action="<?= BASE_URL ?>/produk/simpan"
enctype="multipart/form-data">

<div class="mb-3">
<label>Kategori</label>

<select name="kategori_id" class="form-control">

<?php foreach($kategori as $k): ?>

<option value="<?= $k['id']; ?>">
<?= $k['nama_kategori']; ?>
</option>

<?php endforeach; ?>

</select>

</div>

<div class="mb-3">

<label>Nama Produk</label>

<input
type="text"
name="nama_produk"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Harga</label>

<input
type="number"
name="harga"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Stok</label>

<input
type="number"
name="stok"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Deskripsi</label>

<textarea
name="deskripsi"
class="form-control"></textarea>

</div>

<div class="mb-3">

<label>Gambar Produk</label>

<input
type="file"
name="gambar"
class="form-control"
accept="image/*">

</div>

<button type="submit" class="btn btn-success">

Simpan

</button>

<a href="<?= BASE_URL ?>/produk" class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</section>

</div>

<?php require_once 'app/views/layouts/footer.php'; ?>