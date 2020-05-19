<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Document</title>
</head><body>
<h3 style="text-align: center">DATA TRANSAKSI</h3>
        <table class="table table-bordered">  
                <tr>
                    <th>ID</th>
                    <th>NAMA MEMBER</th>
                    <th>JUDUL BUKU</th>
                    <th>TANGGAL PINJAM</th>
                    <th>TANGGAL KEMBALI</th>
                </tr>
                <?php
                $no = 1;
                foreach ($transaksi as $t) { ?>
        
                    <tr>
                        <td><?php echo $t->id ?></td>
                        <td><?php echo $t->nama_member ?></td>
                        <td><?php echo $t->judul_buku ?></td>
                        <td><?php echo $t->tanggal_pinjam ?></td>
                        <td><?php echo $t->tanggal_kembali ?></td>
                    </tr>
        
                <?php } ?>
        </table>
        <div class="mt-5" style="float: right; margin-right: 145px;">
        <h6>
            <b>Jakarta, ... ................ 20...<br>
            <p style="margin-top: 90px; margin-left: 70px;">Petugas</p>
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
</body></html>