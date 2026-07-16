<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="row">

<div class="col-md-4">

<div class="card">

<div class="card-body text-center">

<?php if(!empty($transaksi['gambar'])): ?>

<img
src="<?= BASE_URL ?>/public/uploads/<?= $transaksi['gambar']; ?>"
style="width:220px;height:220px;object-fit:cover;">

<?php endif; ?>

<h4 class="mt-3">
<?= $transaksi['nama_produk']; ?>
</h4>

<p class="text-success">
Rp <?= number_format($transaksi['harga'],0,',','.'); ?>
</p>

</div>

</div>

</div>

<div class="col-md-8">

<div class="card">

<div class="card-header">

<h3>Detail Pesanan</h3>

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>
<th width="200">ID Transaksi</th>
<td>#<?= $transaksi['id']; ?></td>
</tr>

<tr>
<th>Nama Pembeli</th>
<td><?= $transaksi['nama']; ?></td>
</tr>

<tr>
<th>Email</th>
<td><?= $transaksi['email']; ?></td>
</tr>

<tr>
<th>Produk</th>
<td><?= $transaksi['nama_produk']; ?></td>
</tr>

<tr>
<th>Total</th>
<td>
Rp <?= number_format($transaksi['total_harga'],0,',','.'); ?>
</td>
</tr>

<tr>
<th>Status</th>
<td>

<?php

switch($transaksi['status']){

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
    echo "<span class='badge badge-secondary'>".$transaksi['status']."</span>";
}

?>

</td>
</tr>

<tr>
<th>Tanggal</th>
<td><?= $transaksi['created_at']; ?></td>
</tr>

</table>

<div class="mt-3">

<a href="<?= BASE_URL ?>/transaksi" class="btn btn-secondary">
Kembali
</a>

</div>

</div>

</div>

</div>

</div>

</div>

</section>

</div>

<?php require_once 'app/views/layouts/footer.php'; ?>