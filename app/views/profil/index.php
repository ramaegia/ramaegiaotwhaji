<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="row">

<div class="col-md-4">

<div class="card card-primary card-outline">

<div class="card-body box-profile">

<div class="text-center">

<?php if(!empty($user['foto'])){ ?>

<img
class="profile-user-img img-fluid img-circle"
src="<?= BASE_URL ?>/public/uploads/<?= $user['foto'] ?>"
style="width:150px;height:150px;object-fit:cover;">

<?php }else{ ?>

<img
class="profile-user-img img-fluid img-circle"
src="https://ui-avatars.com/api/?name=<?= urlencode($user['nama']) ?>&background=0D8ABC&color=fff&size=200">

<?php } ?>

</div>

<h3 class="profile-username text-center">

<?= $user['nama']; ?>

</h3>

<p class="text-muted text-center">

<?= ucfirst($user['role']); ?>

</p>

<ul class="list-group list-group-unbordered mb-3">

<li class="list-group-item">

<b>Email</b>

<span class="float-right">

<?= $user['email']; ?>

</span>

</li>

<li class="list-group-item">

<b>ID User</b>

<span class="float-right">

<?= $user['id']; ?>

</span>

</li>

<li class="list-group-item">

<b>Role</b>

<span class="float-right badge badge-success">

<?= ucfirst($user['role']); ?>

</span>

</li>

</ul>

<a
href="<?= BASE_URL ?>/profil/edit"
class="btn btn-primary btn-block">

<b>Edit Profil</b>

</a>

<br>

<a
href="<?= BASE_URL ?>/profil/password"
class="btn btn-warning btn-block">

<b>Ganti Password</b>

</a>

</div>

</div>

</div>

<div class="col-md-8">

<div class="card">

<div class="card-header">

<h3 class="card-title">

Informasi Akun

</h3>

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>

<th width="200">

Nama

</th>

<td>

<?= $user['nama']; ?>

</td>

</tr>

<tr>

<th>

Email

</th>

<td>

<?= $user['email']; ?>

</td>

</tr>

<tr>

<th>

Role

</th>

<td>

<?= ucfirst($user['role']); ?>

</td>

</tr>

<tr>

<th>

Status

</th>

<td>

<span class="badge badge-success">

Aktif

</span>

</td>

</tr>

</table>

</div>

</div>

</div>

</div>

</div>

</section>

</div>

<?php require_once 'app/views/layouts/footer.php'; ?>