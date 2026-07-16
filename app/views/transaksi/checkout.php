<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="card">

<div class="card-header bg-primary">
<h3 class="card-title">Checkout Top Up</h3>
</div>

<div class="card-body">

<form method="POST" action="<?= BASE_URL ?>/transaksi/simpan">

<div class="form-group">
<label>Produk</label>

<select
name="produk_id"
id="produk"
class="form-control"
required>

<option value="">-- Pilih Produk --</option>

<?php foreach($produk as $p): ?>

<option
value="<?= $p['id']; ?>"
data-harga="<?= $p['harga']; ?>">

<?= $p['nama_produk']; ?>

- Rp <?= number_format($p['harga']); ?>

</option>

<?php endforeach; ?>

</select>

</div>

<div class="form-group">
<label>ID Game</label>

<input
type="text"
name="game_id"
class="form-control"
required>

</div>

<div class="form-group">
<label>Server</label>

<input
type="text"
name="server"
class="form-control"
required>

</div>

<div class="form-group">
<label>Nickname</label>

<input
type="text"
name="nickname"
class="form-control"
required>

</div>

<div class="form-group">
<label>Jumlah</label>

<input
type="number"
name="jumlah"
id="jumlah"
class="form-control"
value="1"
min="1"
required>

</div>

<div class="form-group">
<label>Total Harga</label>

<input
type="number"
name="total_harga"
id="total_harga"
class="form-control"
readonly>

</div>

<button class="btn btn-success" type="submit">
Checkout
</button>

<a href="<?= BASE_URL ?>/dashboard/user" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</div>

</div>

</section>

</div>

<script>

function hitungTotal(){

let produk=document.getElementById("produk");

let jumlah=document.getElementById("jumlah").value;

let harga=0;

if(produk.selectedIndex>0){

harga=parseInt(
produk.options[produk.selectedIndex].dataset.harga
);

}

document.getElementById("total_harga").value=harga*jumlah;

}

document.getElementById("produk").addEventListener("change",hitungTotal);

document.getElementById("jumlah").addEventListener("keyup",hitungTotal);

document.getElementById("jumlah").addEventListener("change",hitungTotal);

window.onload=hitungTotal;

</script>

<?php require_once 'app/views/layouts/footer.php'; ?>