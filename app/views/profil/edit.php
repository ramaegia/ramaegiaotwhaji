<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card card-primary">

<div class="card-header">

<h3 class="card-title">

Edit Profil

</h3>

</div>

<form
action="<?= BASE_URL ?>/profil/update"
method="POST"
enctype="multipart/form-data">

<div class="card-body">

<div class="text-center mb-4">

<?php if(!empty($user['foto'])){ ?>

<img
src="<?= BASE_URL ?>/public/uploads/<?= $user['foto']; ?>"
class="img-circle"
style="width:150px;height:150px;object-fit:cover;">

<?php }else{ ?>

<img
src="https://ui-avatars.com/api/?name=<?= urlencode($user['nama']); ?>&background=0D8ABC&color=fff&size=200"
class="img-circle">

<?php } ?>

</div>

<div class="form-group">

<label>Nama</label>

<input
type="text"
name="nama"
class="form-control"
value="<?= $user['nama']; ?>"
required>

</div>

<div class="form-group">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?= $user['email']; ?>"
required>

</div>

<div class="form-group">

<label>Foto Profil</label>

<input
type="file"
name="foto"
class="form-control">

<small class="text-muted">

Format JPG PNG JPEG WEBP

</small>

</div>

</div>

<div class="card-footer">

<button
class="btn btn-success">

<i class="fas fa-save"></i>

Simpan

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

<?php require_once 'app/views/layouts/footer.php'; ?>