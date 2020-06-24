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
</head>
<body class="hold-transition register-page">

<div class="col-lg-4 mx-auto">
<div class="login-logo">
    <a href="#"><b>THE</b>Perpustakaan</a>
  </div>
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Login Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="<?php echo site_url('login/dologin') ?>" method="post" class="form-horizontal">
      <div class="card-body">
      <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
         
        <p class="mb-0">
          <a href="<?= base_url('Login/registrasi') ?>" class="text-center">Register a new membership</a>
        </p>
        <p class="mb-0">
          <a href="<?= base_url('Login/ubah_pass') ?>" class="text-center">Forgot Password</a>
        </p>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
      <div class="float-left">
          <small class="text-danger">
            <?php
            if ($this->session->flashdata('error')!==null)
            {
            ?>
            <?php echo $this->session->flashdata('error') ?>
            <?php
                }
            ?>
          </small>
        </div>
        <button type="submit" class="btn btn-info float-right">Sign In</button>
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