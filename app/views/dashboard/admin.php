<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/navbar.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>


<div class="content-wrapper">


<section class="content-header">

<div class="container-fluid">

<div class="row mb-2">


<div class="col-sm-6">

<h1>
Dashboard Admin
</h1>

</div>


<div class="col-sm-6 text-right">

<h5>
Selamat Datang,
<strong><?= $_SESSION['nama']; ?></strong>
</h5>

</div>


</div>

</div>

</section>





<section class="content">


<div class="container-fluid">



<!-- STATISTIK -->

<div class="row">


<div class="col-lg-3 col-6">

<div class="small-box bg-info">

<div class="inner">

<h3>
<?= $totalUser ?? 0 ?>
</h3>

<p>
Total User
</p>

</div>

<div class="icon">

<i class="fas fa-users"></i>

</div>

</div>

</div>




<div class="col-lg-3 col-6">

<div class="small-box bg-success">

<div class="inner">

<h3>
<?= $totalProduk ?? 0 ?>
</h3>

<p>
Total Produk
</p>

</div>

<div class="icon">

<i class="fas fa-box"></i>

</div>

</div>

</div>





<div class="col-lg-3 col-6">

<div class="small-box bg-warning">

<div class="inner">

<h3>
<?= $totalKategori ?? 0 ?>
</h3>

<p>
Total Kategori
</p>

</div>

<div class="icon">

<i class="fas fa-list"></i>

</div>

</div>

</div>





<div class="col-lg-3 col-6">

<div class="small-box bg-danger">

<div class="inner">

<h3>
<?= $totalTransaksi ?? 0 ?>
</h3>

<p>
Total Transaksi
</p>

</div>

<div class="icon">

<i class="fas fa-shopping-cart"></i>

</div>

</div>

</div>


</div>






<!-- PENDAPATAN -->


<div class="card card-success">


<div class="card-header">

<h3 class="card-title">

Total Pendapatan

</h3>

</div>



<div class="card-body">

<h2 class="text-success">

Rp <?= number_format($pendapatan ?? 0,0,',','.') ?>

</h2>

</div>


</div>







<!-- MENU CEPAT -->


<div class="row mb-4">


<div class="col-md-3">

<a href="<?= BASE_URL ?>/produk"

class="btn btn-success btn-block p-3">

<i class="fas fa-box fa-2x"></i>

<br><br>

Kelola Produk

</a>

</div>




<div class="col-md-3">

<a href="<?= BASE_URL ?>/kategori"

class="btn btn-info btn-block p-3">


<i class="fas fa-list fa-2x"></i>

<br><br>

Kategori

</a>

</div>





<div class="col-md-3">

<a href="<?= BASE_URL ?>/transaksi"

class="btn btn-warning btn-block p-3">


<i class="fas fa-shopping-cart fa-2x"></i>

<br><br>

Transaksi

</a>

</div>





<div class="col-md-3">

<a href="<?= BASE_URL ?>/laporan"

class="btn btn-danger btn-block p-3">


<i class="fas fa-file-pdf fa-2x"></i>

<br><br>

Laporan

</a>

</div>


</div>







<div class="row">



<!-- GRAFIK -->

<div class="col-md-8">


<div class="card">


<div class="card-header">

<h3 class="card-title">
Grafik Penjualan
</h3>

</div>



<div class="card-body">


<canvas id="chartPenjualan"></canvas>


</div>


</div>


</div>







<!-- TRANSAKSI TERBARU -->


<div class="col-md-4">


<div class="card">


<div class="card-header">

<h3 class="card-title">

5 Transaksi Terbaru

</h3>

</div>



<div class="card-body p-0">


<table class="table table-striped">


<thead>

<tr>

<th>User</th>

<th>Status</th>

</tr>

</thead>



<tbody>


<?php if(!empty($transaksi)): ?>


<?php foreach($transaksi as $t): ?>


<tr>


<td>

<?= $t['nama']; ?>

</td>



<td>


<?= $t['status']; ?>


</td>


</tr>


<?php endforeach; ?>



<?php else: ?>


<tr>

<td colspan="2" class="text-center">

Belum ada transaksi

</td>

</tr>


<?php endif; ?>



</tbody>


</table>


</div>


</div>


</div>


</div>







<!-- TABEL TRANSAKSI -->


<div class="card mt-4">


<div class="card-header">

<h3 class="card-title">

Data Transaksi Terbaru

</h3>

</div>




<div class="card-body">


<table class="table table-bordered">


<thead>


<tr>

<th>ID</th>

<th>Nama</th>

<th>Total</th>

<th>Status</th>

<th>Tanggal</th>


</tr>


</thead>



<tbody>



<?php if(!empty($transaksi)): ?>


<?php foreach($transaksi as $t): ?>


<tr>


<td>
#<?= $t['id']; ?>
</td>



<td>
<?= $t['nama']; ?>
</td>




<td>

Rp <?= number_format($t['total_harga'] ?? 0,0,',','.'); ?>

</td>




<td>

<?= $t['status']; ?>

</td>




<td>

<?= $t['created_at']; ?>

</td>



</tr>



<?php endforeach; ?>



<?php else: ?>


<tr>

<td colspan="5" class="text-center">

Belum ada transaksi

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







<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>


const ctx = document.getElementById('chartPenjualan');


new Chart(ctx, {


type:'bar',


data:{


labels:[

<?php foreach($grafik as $g): ?>

'Bulan <?= $g["bulan"]; ?>',

<?php endforeach; ?>

],



datasets:[{

label:'Penjualan',


data:[

<?php foreach($grafik as $g): ?>

<?= $g["total"]; ?>,

<?php endforeach; ?>

],


borderWidth:1


}]


},


options:{


responsive:true


}


});


</script>



<?php require_once __DIR__ . '/../layouts/footer.php'; ?>