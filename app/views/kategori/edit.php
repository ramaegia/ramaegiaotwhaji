<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="card">

<div class="card-header">

<h3>Edit Kategori</h3>

</div>

<div class="card-body">

<form method="POST" action="<?= BASE_URL ?>/kategori/update">

<input
type="hidden"
name="id"
value="<?= $kategori['id']; ?>">

<div class="mb-3">

<label>Nama Kategori</label>

<input
type="text"
name="nama_kategori"
class="form-control"
value="<?= $kategori['nama_kategori']; ?>"
required>

</div>

<button class="btn btn-primary">

Update

</button>

<a href="<?= BASE_URL ?>/kategori" class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</section>

</div>

<?php require_once 'app/views/layouts/footer.php'; ?>