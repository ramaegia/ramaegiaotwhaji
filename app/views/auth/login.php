<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Login</title>

<link rel="stylesheet"
href="<?= BASE_URL ?>/public/plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet"
href="<?= BASE_URL ?>/public/dist/css/adminlte.min.css">

</head>

<body class="hold-transition login-page">

<div class="login-box">

<div class="card">

<div class="card-header text-center">

<h3>RE SHOP LOGIN</h3>

</div>

<div class="card-body">

<?php if(isset($error)){ ?>

<div class="alert alert-danger">

<?= $error ?>

</div>

<?php } ?>
<?php if(isset($error)): ?>

<div class="alert alert-danger">

<?= $error; ?>

</div>

<?php endif; ?>
<form
method="POST"
action="<?= BASE_URL ?>/auth/login">

<div class="mb-3">

<input
type="email"
name="email"
class="form-control"
placeholder="Email"
required>

</div>

<div class="mb-3">

<input
type="password"
name="password"
class="form-control"
placeholder="Password"
required>

</div>

<button
class="btn btn-primary w-100">

LOGIN

</button>

</form>

<hr>

<a
href="<?= BASE_URL ?>/auth/register">

Belum punya akun?

</a>

</div>

</div>

</div>

<script src="<?= BASE_URL ?>/public/plugins/jquery/jquery.min.js"></script>
<script src="<?= BASE_URL ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>/public/dist/js/adminlte.min.js"></script>

</body>
</html>