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
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
        }
    </style>
</head><body>
<h3 style="text-align: center">DATA MEMBER</h3>
<div>
    <p class="ml-4">Tanggal Dicetak <a class="ml-4" style="margin-left:18px; margin-right: 19px;">:</a> <b> <?= date('Y-m-d') ?></b></p>
    <p class="ml-4">Petugas <a style="margin-left: 75px; margin-right: 20px;">:</a> <b><?= $this->session->Userdata('username');?></b></p>
</div>
        <table>  
                <tr>
                    <th>#</th>
                    <th>ID MEMBER</th>
                    <th>NAMA MEMBER</th>
                    <th>JENIS KELAMIN</th>
                    <th>ALAMAT</th>
                    <th>NO TELEPON</th>
                </tr>
                <?php
                $no = 1;
                foreach ($member as $m) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?php echo $m->id ?></td>
                        <td><?php echo $m->nama ?></td>
                        <td><?php echo $m->jenkel ?></td>
                        <td><?php echo $m->alamat ?></td>
                        <td><?php echo $m->telpon ?></td>
                    </tr>
                <?php } ?>
        </table>
        <div class="mt-5" style="float: right; margin-left: 770px;">
        <h6>
            <b><p>Jakarta, ... ................ 20...</p><br>
            <p style="margin-top: 90px; margin-left: 52px;">Petugas</p>
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