<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card card-warning">

<div class="card-header">

<h3 class="card-title">

Ganti Password

</h3>

</div>

<form
action="<?= BASE_URL ?>/profil/updatePassword"
method="POST">

<div class="card-body">

<div class="form-group">

<label>Password Baru</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="form-group">

<label>Konfirmasi Password</label>

<input
type="password"
id="konfirmasi"
class="form-control"
required>

</div>

</div>

<div class="card-footer">

<button
class="btn btn-success">

<i class="fas fa-key"></i>

Update Password

</button>

<a
href="<?= BASE_URL ?>/profil"
class="btn btn-secondary">

Kembali

</a>

</div>

</form>

</div>

</div>

</div>

</div>

</section>

</div>

<script>

const form=document.querySelector("form");

form.addEventListener("submit",function(e){

let p=document.querySelector("[name=password]").value;

let k=document.querySelector("#konfirmasi").value;

if(p!=k){

alert("Konfirmasi password tidak sama.");

e.preventDefault();

}

});

</script>

<?php require_once 'app/views/layouts/footer.php'; ?>