<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content-header">

<div class="container-fluid">

<div class="row mb-2">

<div class="col-sm-6">
<h1>Verifikasi Pembayaran</h1>
</div>

</div>

</div>

</section>

<section class="content">

<div class="container-fluid">

<div class="card">

<div class="card-header bg-success">

<h3 class="card-title">

Data Pembayaran

</h3>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="text-center">

<tr>

<th>No</th>
<th>Customer</th>
<th>Total</th>
<th>Metode</th>
<th>Bukti Transfer</th>
<th>Status</th>
<th width="220">Aksi</th>

</tr>

</thead>

<tbody>

<?php $no=1; ?>

<?php foreach($pembayaran as $p): ?>

<tr>

<td><?= $no++; ?></td>

<td><?= $p['nama']; ?></td>

<td>

Rp <?= number_format($p['total_harga'],0,",","."); ?>

</td>

<td><?= $p['metode']; ?></td>

<td class="text-center">

<?php if(!empty($p['bukti'])): ?>

<a
href="<?= BASE_URL ?>/public/uploads/<?= $p['bukti']; ?>"
target="_blank">

<img
src="<?= BASE_URL ?>/public/uploads/<?= $p['bukti']; ?>"
width="90"
class="img-thumbnail">

</a>

<?php else: ?>

<span class="badge badge-secondary">

Belum Upload

</span>

<?php endif; ?>

</td>

<td class="text-center">

<?php

switch($p['status']){

case "Pending":

echo "<span class='badge badge-warning'>Pending</span>";

break;

case "Diterima":

echo "<span class='badge badge-primary'>Diterima</span>";

break;

case "Selesai":

echo "<span class='badge badge-success'>Selesai</span>";

break;

case "Ditolak":

echo "<span class='badge badge-danger'>Ditolak</span>";

break;

default:

echo "<span class='badge badge-secondary'>".$p['status']."</span>";

}

?>

</td>

<td class="text-center">

<?php if($_SESSION['role']=="admin"): ?>

<a
href="<?= BASE_URL ?>/pembayaran/status/<?= $p['id']; ?>/Diterima"
class="btn btn-success btn-sm">

<i class="fas fa-check"></i>

</a>

<a
href="<?= BASE_URL ?>/pembayaran/status/<?= $p['id']; ?>/Ditolak"
class="btn btn-danger btn-sm">

<i class="fas fa-times"></i>

</a>

<a
href="<?= BASE_URL ?>/pembayaran/status/<?= $p['id']; ?>/Selesai"
class="btn btn-primary btn-sm">

<i class="fas fa-box-open"></i>

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