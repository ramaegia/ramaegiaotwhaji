<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="card">

<div class="card-header bg-primary">

<h3 class="card-title">
Data Transaksi
</h3>

</div>

<div class="card-body">

<table class="table table-bordered table-hover table-striped datatable">

<thead>

<tr>
<th>No</th>
<th>User</th>
<th>Produk</th>
<th>Total</th>
<th>Status</th>
<th>Aksi</th>
</tr>

</thead>

<tbody>

<?php $no = 1; ?>

<?php foreach($transaksi as $t): ?>

<tr>

<td><?= $no++; ?></td>

<td><?= $t['nama']; ?></td>

<td><?= $t['nama_produk']; ?></td>

<td>
Rp <?= number_format($t['total_harga'],0,',','.'); ?>
</td>

<td>

<?php
switch($t['status']){

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
    echo "<span class='badge badge-secondary'>{$t['status']}</span>";
}
?>

</td>

<td>

<?php if($_SESSION['role']=="admin"): ?>

<a href="<?= BASE_URL ?>/transaksi/status/<?= $t['id']; ?>/Diproses"
class="btn btn-warning btn-sm">
Proses
</a>

<a href="<?= BASE_URL ?>/transaksi/status/<?= $t['id']; ?>/Selesai"
class="btn btn-success btn-sm">
Selesai
</a>

<a href="<?= BASE_URL ?>/transaksi/detail/<?= $t['id']; ?>"
class="btn btn-info btn-sm">
<i class="fas fa-eye"></i> Detail
</a>

<?php endif; ?>

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