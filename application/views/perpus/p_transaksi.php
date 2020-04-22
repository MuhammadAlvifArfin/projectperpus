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
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
            <div class="form-group">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-cart-plus"></i></button>
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
                      <th width="20%">Aksi</th>
                  </tr>
                  </thead>
                  <?php 
                    foreach($transaksi as $t){ 
                  ?>
                  <tr>
                    <td><?= $t->id ?></td>
                    <td><?= $t->nama_member?></td>
                    <td><?= $t->judul_buku?></td>
                    <td><?= $t->tanggal_pinjam?></td>
                    <td><?= $t->tanggal_kembali?></td>
                    <td> <center><button data-toggle="modal" data-target="#update<?php echo $t->id ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button></i>
                    |
                      <a href="<?= base_url('admin/delete_transaksi/'.$t->id) ?>" class="transaksi-hapus btn btn-danger"><i class="fas fa-trash"></i></a>
                    </center>
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
                <label>Nama Member</label>
                <select name="nama_member" class="form-control">
                <option  value="">---Pilih Member---</option>                    
                 <?php foreach($member as $m) { ?>
                   <option><?php echo $m->nama;?></option>
                 <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label>Judul Buku</label>
                <select name="judul_buku" class="form-control">
                <option  value="">---Pilih Buku---</option>                    
                 <?php foreach($buku as $b) { ?>
                   <option><?php echo $b->judul;?></option>
                 <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control">
              </div>

              <div class="form-group">
                <label>Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="form-control">
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
                <label>Nama Member</label>
                <input type="hidden" name="id" class="form-control" value="<?=$t->id ?>">

                <select name="nama_member" class="form-control">                
                  <?php foreach($member as $m) { ?>
                    <option <?php  if($t->nama_member == $m->nama) { echo 'selected' ;}?>>
                    <?php echo $m->nama;?>
                    </option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label>Judul Buku</label>
                  <select name="judul_buku" class="form-control">
                    <?php foreach($buku as $b) { ?>
                      <option <?php  if($t->judul_buku == $b->judul) { echo 'selected' ;} else{echo "data hilang atau tidak ada";}?>>
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