<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-Compatible" content="ie=edge">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="icon" 
      type="image/png" 
      href=" <?= base_url('assets/') ?>dist/img/Logo2.png ">

    <title> <?= $title ?> </title>

</head>
<body>

    <div class="card">
        <h2 class="mt-3"> <p class="text-center"> <b><u></u>DATA BUKU</b></p></h2>
    </div>
    <div>
        <p class="ml-4">Tanggal Dicetak <a class="ml-4" style="margin-right: 20px;">:</a> <b> <?= date('Y-m-d') ?></b></p>
        <p class="ml-4">Petugas <a style="margin-left: 75px; margin-right: 20px;">:</a> <b><?= $this->session->Userdata('username');?></b></p>
    </div>

    <!-- /.card-header -->
    <div class="card-body p-0 ml-4 mr-4">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>ID BUKU</th>
                    <th>JUDUL BUKU</th>
                    <th>PENERBIT</th>
                    <th>TAHUN TERBIT</th>
                    <th>JUMLAH BUKU</th>
                    <th>GAMBAR</th>
                </tr>
                </thead>

                <tbody>
                  <?php
                    $no = 1;
                    foreach($buku as $b){
                  ?>

                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $b->id ?></td>
                      <td><?= $b->judul ?></td>
                      <td><?= $b->penerbit ?></td>
                      <td><?= $b->tahun_terbit ?></td>
                      <td><?= $b->stock ?></td>

                      <td>
                        <img class="img-thumbnail" style="max-width: 75px;" src="<?= base_url('assets/gambar_buku/'.$b->gambar)  ?>">
                      </td>

                    </tr>  

                    <?php } ?>
                </tbody>
            </table>
        </div>
        
        <!-- /.card-body -->
        <div class="mt-5" style="float: right; margin-right: 145px;">
        <h6>
            <b>Jakarta, ... ................ 20...<br>
            <p style="margin-top: 90px; margin-left: 65px;">Petugas</p>
            ........................................</b>
        </h6>
        </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/') ?>dist/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/') ?>dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>