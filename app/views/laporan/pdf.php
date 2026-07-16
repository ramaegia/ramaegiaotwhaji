<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Laporan RE SHOP</title>

<style>

body{
font-family:Arial;
font-size:14px;
}

table{
width:100%;
border-collapse:collapse;
}

table,th,td{
border:1px solid black;
padding:8px;
}

h2{
text-align:center;
}

</style>

</head>

<body>

<h2>

LAPORAN TRANSAKSI RE SHOP

</h2>

<table>

<tr>

<th>No</th>
<th>User</th>
<th>Produk</th>
<th>Total</th>
<th>Status</th>

</tr>

<?php
$no=1;
foreach($laporan as $l):
?>

<tr>

<td><?= $no++; ?></td>

<td><?= $l['nama']; ?></td>

<td><?= $l['nama_produk']; ?></td>

<td>Rp <?= number_format($l['total_harga']); ?></td>

<td><?= $l['status']; ?></td>

</tr>

<?php endforeach; ?>

</table>

<script>

window.print();

</script>

</body>

</html>