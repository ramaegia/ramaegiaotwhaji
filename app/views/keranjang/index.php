<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="card">

<div class="card-header bg-primary">

<h3 class="card-title">

Keranjang Belanja

</h3>

</div>

<div class="card-body">

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>No</th>
<th>Gambar</th>
<th>Produk</th>
<th>Harga</th>
<th>Qty</th>
<th>Subtotal</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php
$no=1;
$total=0;
?>

<?php foreach($keranjang as $k): ?>

<?php
$subtotal=$k['harga']*$k['qty'];
$total+=$subtotal;
?>

<tr>

<td><?= $no++; ?></td>

<td>

<img
src="<?= BASE_URL ?>/public/uploads/<?= $k['gambar']; ?>"
width="70">

</td>

<td><?= $k['nama_produk']; ?></td>

<td>Rp <?= number_format($k['harga']); ?></td>

<td>

<a
href="<?= BASE_URL ?>/keranjang/kurangQty/<?= $k['id']; ?>"
class="btn btn-danger btn-sm">

-

</a>

<strong>

<?= $k['qty']; ?>

</strong>

<a
href="<?= BASE_URL ?>/keranjang/tambahQty/<?= $k['id']; ?>"
class="btn btn-success btn-sm">

+

</a>

</td>

<td>Rp <?= number_format($subtotal); ?></td>

<td>

<a
href="<?= BASE_URL ?>/keranjang/hapus/<?= $k['id']; ?>"
class="btn btn-danger btn-sm">

Hapus

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

<tfoot>

<tr>

<th colspan="5">

Total

</th>

<th>

Rp <?= number_format($total); ?>

</th>

<th>

<a
href="<?= BASE_URL ?>/transaksi/checkout"
class="btn btn-success">

Checkout

</a>

</th>

</tr>

</tfoot>

</table>

</div>

</div>

</div>

</section>

</div>

<?php require_once 'app/views/layouts/footer.php'; ?>