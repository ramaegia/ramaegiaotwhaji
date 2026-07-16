<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="card">

<div class="card-header bg-primary">

<h3 class="card-title">

Data User

</h3>

</div>

<div class="card-body">

<table class="table table-bordered table-hover table-striped datatable">

<thead>

<tr>

<th>No</th>
<th>Nama</th>
<th>Email</th>
<th>Role</th>
<th width="180">Aksi</th>

</tr>

</thead>

<tbody>

<?php $no=1; ?>

<?php foreach($users as $u): ?>

<tr>

<td><?= $no++; ?></td>

<td><?= $u['nama']; ?></td>

<td><?= $u['email']; ?></td>

<td><?= ucfirst($u['role']); ?></td>

<td>

<a href="<?= BASE_URL ?>/user/edit/<?= $u['id']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a href="<?= BASE_URL ?>/user/hapus/<?= $u['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus user ini?')">

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