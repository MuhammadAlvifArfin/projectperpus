  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Transaksi</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
            <div class="form-group">
            <button class="btn btn-primary" title="Tambah Data" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-cart-plus"></i></button>
            <!-- Example single danger button -->
              <div class="btn-group" style="margin-left: 15px;">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Export Transaksi
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="<?= base_url('admin/excel_transaksi')?>">Excel <i style="float: right;" class="fas fa-file-excel"></i></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= base_url('admin/pdf_transaksi')?>">PDF <i style="float: right;" class="fas fa-file-pdf"></i></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= base_url('admin/print_transaksi')?>">Print <i style="float: right;" class="fas fa-print"></i></a>
                </div>
              </div>
            </div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
            <div class="table-responsive p-0">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Id</th>
                      <th>Nama Member</th>
                      <th>Judul Buku</th>
                      <th>Tanggal Peminjaman</th>
                      <th>Tanggal Kembali</th>
                      <th>Lama Pinjam (Telat)</th>
                      <th>Total Denda</th>
                      <th>Buku Kembali</th>
                      <th width="16%">Aksi</th>
                  </tr>
                  </thead>
                  <?php 
                    foreach($transaksi as $t){ 
                      if ($t->tanggal_kembali=="0000-00-00") {	
	                      $date1    = date_create($t->tanggal_pinjam);
	                      $date2   = date_create(date('Y-m-d'));
	                      $cek_telat = date_diff($date1,$date2); 
	                      $telat  = $cek_telat->format("%a");
                      }else{
                       	$date1  = date_create($t->tanggal_pinjam);
	                      $date2   = date_create($t->tanggal_kembali);
	                      $cek_telat = date_diff($date1,$date2); 
	                      $telat = $cek_telat->format("%a");
                      }
                  ?>
                  <tr>
                    <td><?= $t->id ?></td>
                    <td><?= $t->nama_member?></td>
                    <td><?= $t->judul_buku?></td>
                    <td><?= $t->tanggal_pinjam?></td>

                    <td>
                      <?php if($t->tanggal_kembali!=="0000-00-00"){echo $t->tanggal_kembali;}else{echo "Belum Kembali";} ?>
                    </td>

                    <td>
                      <?php if($telat>7){echo $telat." Hari (".($telat-7)." Hari)";}else{echo $telat." Hari(0)";}?>
                    </td>

                    <td>
                      <?php if($telat>7){echo "RP.".($telat-7)*500;}else{echo "-";} ?>
                    </td>

                    <td>
                      <center>
                        <form action="<?= base_url('admin/kembali/'.$t->id) ?>" >
                          <button type="submit" class="btn btn-warning"  <?php if($t->tanggal_kembali!=="0000-00-00"){echo "disabled";} ?> title="Buku Kembali"><i class="fas fa-cart-arrow-down"></i></button>
                        </form> 
                      </center>
                    </td>
                    
                    <td>
                      <center>  
                        <button data-toggle="modal" data-target="#update<?php echo $t->id ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button></i> | 
                        <a href="<?= base_url('admin/delete_transaksi/'.$t->id) ?>" class="btn btn-danger hapus-transaksi"><i class="fas fa-trash"></i></a>
                      </center>
                    </td>
                  </tr>
  
                  <?php } ?>
                  <tbody>
  
                  </tfoot>
                </table>
            </div>
            </div>
            <!-- /.card-body -->
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Tambah Transaksi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action=" <?= base_url('admin/tambah_transaksi') ?> ">

              <div class="form-group">
                <label>Nama Member</label><br>
                  <select class="form-control" id="select_member" name="nama_member" style="width: 466px;">
                  <option  value=""></option>
                   <?php foreach($member as $m) { ?>
                     <option>
                       <?php echo $m->nama;?>
                      </option>
                   <?php } ?>
                  </select>
                </div>

              <div class="form-group">
                <label>Judul Buku</label><br>
                <select name="judul_buku" id="select_buku" class="form-control" style="width: 466px;">
                  <option value=""></option>
                  <?php foreach($buku as $b) { ?>
                    <option>
                      <?php echo $b->judul;?>
                    </option>
                  <?php } ?>
                </select>
              </div>

              <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <?php foreach($transaksi as $t) { ?>
      <div class="modal fade" id="update<?php echo $t->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="update">Form Update Transaksi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="<?= base_url('admin/update_transaksi'); ?>" enctype="multipart/form-data">

              <div class="form-group">
                <label>Nama Member</label><br>
                <input type="hidden" name="id" class="form-control" value="<?=$t->id ?>">

                <select name="nama_member" class="form-control select" style="width: 466px;">                
                  <?php foreach($member as $m) { ?>
                    <option <?php  if($t->nama_member == $m->nama) { echo 'selected' ;}?>>
                    <?php echo $m->nama;?>
                    </option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label>Judul Buku</label><br>
                  <select name="judul_buku" class="form-control select" style="width: 466px;">
                    <?php foreach($buku as $b) { ?>
                      <option <?php  if($t->judul_buku == $b->judul) { echo 'selected' ;}?>>
                      <?php echo $b->judul;?>
                    </option>
                   <?php } ?>
                  </select>
              </div>

                <div class="form-group">
                    <label>Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" class="form-control" value="<?=$t->tanggal_pinjam ?>">
                </div>

                <div class="form-group">
                    <label>Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" class="form-control" value="<?=$t->tanggal_kembali ?>">
                </div>

              <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>



  </div>
  <!-- /.content-wrapper -->


<!-- Ajax -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->