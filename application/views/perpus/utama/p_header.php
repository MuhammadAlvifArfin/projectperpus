<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title> <?= $title ?> </title>

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
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/select2/css/select2.min.css">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jsGrid -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/jsgrid/jsgrid.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/jsgrid/jsgrid-theme.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="icon" 
      type="image/png" 
      href=" <?= base_url('assets/') ?>dist/img/Logo2.png ">

</head>
<body  class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('admin/index'); ?>" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" href=" <?= base_url('Login/logout') ?> ">
          LOGOUT <i class="fas fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-secondary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url('assets/'); ?>dist/img/Logo2.png" class="brand-image img-circle elevation-4"
           style="opacity: .8">
      <span class="brand-text font-weight-light">The Library</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/'); ?>dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url('admin/detail_pegawai') ?>" class="d-block"><?= $this->session->Userdata('username');?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-4">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
              <li class="nav-item">
                <a href="<?= base_url('admin/index'); ?>" class="nav-link">
                  <i class="fas fa-tachometer-alt nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('admin/buku'); ?>" class="nav-link">
                  <i class="nav-icon fas fa-book-open"></i>
                  <p>Data Buku</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('admin/member'); ?>" class="nav-link">
                  <i class="nav-icon far fa-address-card"></i>
                  <p>Data Member</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('admin/pegawai'); ?>" class="nav-link">
                  <i class="nav-icon far fa-id-badge"></i>
                  <p>Data Pegawai</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('admin/transaksi'); ?>" class="nav-link">
                  <i class="nav-icon fas fa-book-reader"></i>
                  <p>Transaksi</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>