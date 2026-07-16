<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="card">

<div class="card-header bg-primary">

<h3 class="card-title">
Laporan Transaksi
</h3>

<div class="float-right">

<a href="<?= BASE_URL ?>/laporan/pdf" class="btn btn-danger">
<i class="fas fa-file-pdf"></i>
Export PDF
</a>

</div>

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
</tr>

</thead>

<tbody>

<?php $no = 1; ?>

<?php if(!empty($laporan)): ?>

<?php foreach($laporan as $l): ?>

<tr>

<td><?= $no++; ?></td>

<td><?= $l['nama']; ?></td>

<td><?= $l['nama_produk']; ?></td>

<td>
Rp <?= number_format($l['total_harga'],0,',','.'); ?>
</td>

<td>

<?php
switch($l['status']){

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
    echo "<span class='badge badge-secondary'>{$l['status']}</span>";
}
?>

</td>

</tr>

<?php endforeach; ?>

<?php else: ?>

<tr>

<td colspan="5" class="text-center">
Belum ada data transaksi.
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