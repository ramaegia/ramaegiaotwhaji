<footer class="main-footer">

<strong>

RE SHOP

</strong>

</footer>

</div>

<script src="<?= BASE_URL ?>/public/plugins/jquery/jquery.min.js"></script>

<script src="<?= BASE_URL ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= BASE_URL ?>/public/dist/js/adminlte.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script>

$(document).ready(function(){

$('.datatable').DataTable({

pageLength:10,

lengthMenu:[

[10,25,50,100,-1],

[10,25,50,100,"Semua"]

],

language:{

search:"Cari :",

lengthMenu:"Tampilkan _MENU_ data",

zeroRecords:"Data tidak ditemukan",

info:"Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

paginate:{

previous:"Sebelumnya",

next:"Berikutnya"

}

}

});

});

</script>
</body>

</html>