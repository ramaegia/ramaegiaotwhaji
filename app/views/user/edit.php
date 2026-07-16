<?php require_once 'app/views/layouts/header.php'; ?>
<?php require_once 'app/views/layouts/navbar.php'; ?>
<?php require_once 'app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

<section class="content">

<div class="container-fluid pt-3">

<div class="card">

<div class="card-header bg-warning">

<h3>Edit User</h3>

</div>

<div class="card-body">

<form method="POST" action="<?= BASE_URL ?>/user/update">

<input
type="hidden"
name="id"
value="<?= $user['id']; ?>">

<div class="form-group">

<label>Nama</label>

<input
type="text"
name="nama"
value="<?= $user['nama']; ?>"
class="form-control"
required>

</div>

<div class="form-group">

<label>Email</label>

<input
type="email"
name="email"
value="<?= $user['email']; ?>"
class="form-control"
required>

</div>

<div class="form-group">

<label>Role</label>

<select
name="role"
class="form-control">

<option
value="admin"
<?= $user['role']=="admin" ? "selected":""; ?>>

Admin

</option>

<option
value="user"
<?= $user['role']=="user" ? "selected":""; ?>>

User

</option>

</select>

</div>

<button class="btn btn-success">

Update

</button>

<a href="<?= BASE_URL ?>/user"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</section>

</div>

<?php require_once 'app/views/layouts/footer.php'; ?>