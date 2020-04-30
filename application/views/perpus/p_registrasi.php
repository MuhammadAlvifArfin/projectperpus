<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">

<!-- Sign up form -->

<div class="register-box">
  <div class="register-logo">
    <a href=""><b>THE</b>Perpustakaan</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register Akun Baru</p>

      <form action="<?= base_url('login/registrasi') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>" placeholder="Nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <small class="text-danger"><?= form_error('nama') ?></small>
        
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" value="<?= set_value('username') ?>" placeholder="Username">
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
              <span class="fas fa-unlock"></span>
            </div>
          </div>
        </div>
        <small class="text-danger"><?= form_error('repass') ?></small>

        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="<?= base_url('Login') ?>" class="text-center">Sudah Memiliki Akun ? Masuk !</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
</body>
</html>