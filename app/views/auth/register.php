<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Register</title>

<link rel="stylesheet" href="<?= BASE_URL ?>/public/plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="<?= BASE_URL ?>/public/dist/css/adminlte.min.css">

</head>

<body class="hold-transition register-page">

<div class="register-box">

<div class="card">

<div class="card-header text-center">

<h3>REGISTER RE SHOP</h3>

</div>

<div class="card-body">

<form method="POST" action="<?= BASE_URL ?>/auth/register">

<div class="mb-3">
<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
</div>

<div class="mb-3">
<input type="email" name="email" class="form-control" placeholder="Email" required>
</div>

<div class="mb-3">
<input type="password" name="password" class="form-control" placeholder="Password" required>
</div>

<button class="btn btn-success w-100">
DAFTAR
</button>

</form>

<hr>

<a href="<?= BASE_URL ?>/auth/login">
Sudah punya akun?
</a>

</div>

</div>

</div>

<script src="<?= BASE_URL ?>/public/plugins/jquery/jquery.min.js"></script>
<script src="<?= BASE_URL ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>/public/dist/js/adminlte.min.js"></script>

</body>

</html>