<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="card">

<div class="card-header bg-primary">

<h3 class="card-title">

Upload Bukti Pembayaran

</h3>

</div>

<div class="card-body">

<form
method="POST"
action="<?= BASE_URL ?>/pembayaran/simpan"
enctype="multipart/form-data">

<div class="form-group">

<label>ID Transaksi</label>

<input
type="number"
name="transaksi_id"
class="form-control"
required>

</div>

<div class="form-group">

<label>Metode Pembayaran</label>

<select
name="metode"
class="form-control"
required>

<option value="QRIS">QRIS</option>
<option value="Transfer Bank">Transfer Bank</option>
<option value="DANA">DANA</option>
<option value="OVO">OVO</option>
<option value="GoPay">GoPay</option>

</select>

</div>

<div class="form-group">

<label>Bukti Transfer</label>

<input
type="file"
name="bukti"
class="form-control"
accept="image/*"
required>

</div>

<button class="btn btn-success">

Upload

</button>

<a
href="<?= BASE_URL ?>/pembayaran"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</section>

</div>

<?php require_once 'app/views/layouts/footer.php'; ?>