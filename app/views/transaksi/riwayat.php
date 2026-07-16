<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="card">

<div class="card-header bg-success">

<h3>Riwayat Transaksi</h3>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead>

<tr>

<th>No</th>
<th>Produk</th>
<th>Total Harga</th>
<th>Status</th>
<th>Tanggal</th>

</tr>

</thead>

<tbody>

<?php if(!empty($transaksi)): ?>

<?php $no=1; ?>

<?php foreach($transaksi as $t): ?>

<tr>

<td><?= $no++; ?></td>

<td><?= $t['nama_produk']; ?></td>

<td>Rp <?= number_format($t['total_harga']); ?></td>

<td><?= $t['status']; ?></td>

<td><?= $t['created_at']; ?></td>

</tr>

<?php endforeach; ?>

<?php else: ?>

<tr>

<td colspan="5" class="text-center">

Belum ada transaksi.

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