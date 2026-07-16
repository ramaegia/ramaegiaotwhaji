<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="card">

<div class="card-header">

<h3 class="card-title">Data Kategori</h3>

<div class="float-right">

<a href="<?= BASE_URL ?>/kategori/tambah" class="btn btn-primary">

Tambah Kategori

</a>

</div>

</div>

<div class="card-body">

<table class="table table-bordered table-hover table-striped datatable">

<thead>

<tr>

<th>No</th>

<th>Nama Kategori</th>

<th width="180">Aksi</th>

</tr>

</thead>

<tbody>

<?php $no=1; ?>

<?php foreach($kategori as $k): ?>

<tr>

<td><?= $no++; ?></td>

<td><?= $k['nama_kategori']; ?></td>

<td>

<a href="<?= BASE_URL ?>/kategori/edit/<?= $k['id']; ?>" class="btn btn-warning btn-sm">

Edit

</a>

<a href="<?= BASE_URL ?>/kategori/hapus/<?= $k['id']; ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Hapus kategori ini?')">

Hapus

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>

</div>

</section>

</div>

<?php require_once 'app/views/layouts/footer.php'; ?>