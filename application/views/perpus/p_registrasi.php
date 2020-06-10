<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="icon" 
      type="image/png" 
      href=" <?= base_url('assets/') ?>dist/img/Logo2.png ">
      
  <title><?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Boostrap -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/bootstrap/css/bootstrap.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<body class="hold-transition register-page">

<div class="col-lg-4 mx-auto">
<div class="login-logo">
    <a href="#"><b>THE</b>Perpustakaan</a>
  </div>
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Register Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="<?= base_url('login/registrasi') ?>" method="post" class="form-horizontal">
      <div class="card-body">

      <div class="input-group mb-3">
      <input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>" placeholder="Nama" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <small class="text-danger"><?= form_error('nama') ?></small>

        <div class="input-group mb-3">
        <select type="text" name="jenkel" value="<?= set_value('jenkel') ?>" class="form-control" autocomplete="off">
          <option>Laki Laki</option>
          <option>Perempuan</option>
        </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-venus-mars"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
       <input type="text" name="alamat" class="form-control" value="<?= set_value('alamat') ?>" placeholder="Alamat" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marker-alt"></span>
            </div>
          </div>
        </div>
        <small class="text-danger"><?= form_error('alamat') ?></small>

        <div class="input-group mb-3">
        <input type="text" name="telepon" class="form-control" value="<?= set_value('telepon') ?>" placeholder="No Telepon" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <small class="text-danger"><?= form_error('telepon') ?></small>

        <div class="input-group mb-3">
        <input type="text" name="email" class="form-control" value="<?= set_value('email') ?>" placeholder="Email" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-at"></span>
            </div>
          </div>
        </div>
        <small class="text-danger"><?= form_error('email') ?></small>

        <div class="input-group mb-3">
        <input type="text" name="username" class="form-control" value="<?= set_value('username') ?>" placeholder="Username" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <small class="text-danger"><?= form_error('username') ?></small>

        <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" value="<?= set_value('password') ?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <small class="text-danger"><?= form_error('password') ?></small>

        <div class="input-group mb-3">
        <input type="password" name="repass" class="form-control" placeholder="Re-Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <small class="text-danger"><?= form_error('repass') ?></small>
         
        <p class="mb-0">
        <a href="<?= base_url('Login') ?>" class="text-center">Sudah Memiliki Akun ? Masuk !</a>
        </p>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-info float-right">Register</button>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
</div>

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
</body>
</html>