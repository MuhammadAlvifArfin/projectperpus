<!DOCTYPE html>
<html lang="en">
<head>
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

    <title> <?= $title ?> </title>
</head>
<body>
    <div class="card">
        <h2 class="mt-3"> <p class="text-center"> <b><u></u>DATA PEMINJAMAN</b></p></h2>
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
                    <th>ID PEMINJAMAN</th>
                    <th>NAMA MEMBER</th>
                    <th>JUDUL BUKU</th>
                    <th>TANGGAL PEMINJAMAN</th>
                    <th>TANGGAL PENGEMBALIAN</th>
                    <th>LAMA PEMINJAMAN (TELAT)</th>
                    <th>DENDA</th>
                </tr>
                </thead>

                <tbody>
                  <?php
                    $no = 1;
                    foreach($transaksi as $t){
                        if ($t->tanggal_kembali=="0000-00-00") 
                        {	
                            $tanggal1    = date_create($t->tanggal_pinjam);
                            $tanggal2   = date_create(date('Y-m-d'));
                            $cek_telat = date_diff($tanggal1,$tanggal2); 
                            $telat  = $cek_telat->format("%a");
                        }
                        else
                        {
                            $tanggal1  = date_create($t->tanggal_pinjam);
                            $tanggal2   = date_create($t->tanggal_kembali);
                            $cek_telat = date_diff($tanggal1,$tanggal2); 
                            $telat = $cek_telat->format("%a");
                        }
                  ?>
                    <tr>
                      <td> <?= $no++ ?></td>
                      <td><?= $t->id ?></td>
                      <td><?= $t->nama_member ?></td>
                      <td><?= $t->judul_buku ?></td>
                      <td><?= $t->tanggal_pinjam ?></td>
                      
                      <td>
                        <?php if($t->tanggal_kembali!=="0000-00-00"){echo $t->tanggal_kembali;}else{echo "Belum Kembali";} ?>
                      </td>

                      <td>
                        <?php if($telat>7){echo $telat." Hari (".($telat-7)." Hari)";}else{echo $telat." Hari(0)";}?>
                      </td>

                      <td>
                        <?php if($telat>7){echo "RP.".($telat-7)*500;}else{echo "-";} ?>
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