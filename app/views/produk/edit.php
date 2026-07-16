<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="card">

<div class="card-header">

<h3>Edit Produk</h3>

</div>

<div class="card-body">

<form method="POST"
      action="<?= BASE_URL ?>/produk/update"
      enctype="multipart/form-data">

<input type="hidden"
       name="id"
       value="<?= $produk['id']; ?>">

<div class="mb-3">

<label>Kategori</label>

<select name="kategori_id" class="form-control">

<?php foreach($kategori as $k): ?>

<option
value="<?= $k['id']; ?>"
<?= ($k['id']==$produk['kategori_id']) ? 'selected' : ''; ?>>

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
value="<?= $produk['nama_produk']; ?>"
required>

</div>

<div class="mb-3">

<label>Harga</label>

<input
type="number"
name="harga"
class="form-control"
value="<?= $produk['harga']; ?>"
required>

</div>

<div class="mb-3">

<label>Stok</label>

<input
type="number"
name="stok"
class="form-control"
value="<?= $produk['stok']; ?>"
required>

</div>

<div class="mb-3">

<label>Deskripsi</label>

<textarea
name="deskripsi"
class="form-control"><?= $produk['deskripsi']; ?></textarea>

</div>

<div class="mb-3">

<label>Gambar Produk</label>

<input
type="file"
name="gambar"
class="form-control"
accept="image/*">

<?php if(!empty($produk['gambar'])): ?>

<br>

<img
src="<?= BASE_URL ?>/public/uploads/<?= $produk['gambar']; ?>"
width="120"
class="img-thumbnail">

<p class="text-muted mt-2">
Gambar saat ini
</p>

<?php endif; ?>

</div>

<button type="submit" class="btn btn-primary">

<i class="fas fa-save"></i>

Update

</button>

<a href="<?= BASE_URL ?>/produk"
class="btn btn-secondary">

<i class="fas fa-arrow-left"></i>

Kembali

</a>

</form>

</div>

</div>

</div>

</section>

</div>

<?php require_once 'app/views/layouts/footer.php'; ?>