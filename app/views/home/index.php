<?php require_once __DIR__ . '/../layouts/header.php'; ?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="<?= BASE_URL ?>">
            <b>RE SHOP</b>
        </a>


        <button class="navbar-toggler" 
                data-toggle="collapse" 
                data-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="#produk">
                        Produk
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="#promo">
                        Promo
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>/auth/login">
                        Login
                    </a>
                </li>


                <li class="nav-item">

                    <a class="btn btn-success ml-2"
                       href="<?= BASE_URL ?>/auth/register">

                        Register

                    </a>

                </li>


            </ul>

        </div>


    </div>

</nav>



<div class="jumbotron text-center bg-primary text-white mb-0">

    <div class="container">

        <h1 class="display-4">
            RE SHOP
        </h1>


        <p>
            Top Up Game Murah • Aman • Cepat
        </p>


        <a href="#produk"
           class="btn btn-warning btn-lg">

            BELI SEKARANG

        </a>


    </div>

</div>




<section id="promo" class="p-5 bg-light">

    <div class="container">


        <div class="row">


            <div class="col-md-4">

                <div class="card text-center">

                    <div class="card-body">

                        <h2>⚡</h2>

                        <h4>
                            Proses Cepat
                        </h4>

                        <p>
                            Top up otomatis.
                        </p>

                    </div>

                </div>

            </div>



            <div class="col-md-4">

                <div class="card text-center">

                    <div class="card-body">

                        <h2>🔒</h2>

                        <h4>
                            Aman
                        </h4>

                        <p>
                            Transaksi aman.
                        </p>

                    </div>

                </div>

            </div>



            <div class="col-md-4">

                <div class="card text-center">

                    <div class="card-body">

                        <h2>💰</h2>

                        <h4>
                            Murah
                        </h4>

                        <p>
                            Harga terbaik.
                        </p>

                    </div>

                </div>

            </div>


        </div>


    </div>

</section>




<section id="produk" class="p-5">

<div class="container">


<h2 class="mb-4">
    Game Populer
</h2>



<div class="row">


<?php foreach($produk as $p): ?>


<div class="col-md-3">


<div class="card mb-4 shadow">



<?php if(!empty($p['gambar'])): ?>


<img 
src="<?= BASE_URL ?>/uploads/<?= $p['gambar']; ?>"
class="card-img-top"
style="height:220px;object-fit:cover;">


<?php endif; ?>



<div class="card-body">


<h5>

<?= $p['nama_produk']; ?>

</h5>



<p class="text-success">

Rp <?= number_format($p['harga']); ?>

</p>



<a href="<?= BASE_URL ?>/auth/login"

class="btn btn-primary btn-block">

Beli

</a>



</div>


</div>


</div>



<?php endforeach; ?>



</div>


</div>


</section>




<footer class="bg-dark text-white p-4 text-center">


© <?= date("Y") ?> RE SHOP


</footer>



<?php require_once __DIR__ . '/../layouts/footer.php'; ?>