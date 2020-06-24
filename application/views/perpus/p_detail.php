  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Pegawai</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
      <?php
      if (! empty($data)){
         foreach($data as $u){
      ?>
      <div class="col-md">
        <!-- Widget: user widget style 2 -->
        <div class="card card-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-info">
            <!-- /.widget-user-image -->
            <div class="mr-3">
            <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="<?= base_url('assets/'); ?>dist/img/user.png" alt="User Avatar">
                </div>
              <h3 class="widget-user-username"><?= $u->nama?></h3>
              <div class="float-right">
                <a title="Hapus Data" class="btn btn-danger float-right ml-1 hapus-pegawai" href="<?= base_url('admin/delete_pegawai/'.$u->id) ?>"><i class="fas fa-trash"></i></a>
                <button title="Ubah Data" data-toggle="modal" data-target="#update<?php echo $u->id ?>" class="btn btn-warning float-right"><i class="fas fa-edit"></i></button>
              </div>
              <h5 class="widget-user-desc"><?= $u->username?></h5>
            </div>
          </div>
          <div class="card-footer p-0">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  Jenis Kelamin <span class="float-right badge bg-primary"><?= $u->jenkel?></span>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  Alamat <span class="float-right badge bg-info"><?= $u->alamat?></span>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  Nomor Telepon <span class="float-right badge bg-success"><?= $u->telepon?></span>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  Alamat Email <span class="float-right badge bg-info"><?= $u->email?></span>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  Username Akun <span class="float-right badge bg-danger"><?= $u->username?></span>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  Password Akun <span class="float-right badge bg-primary">*****</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!-- /.widget-user -->
      </div>
            <?php
             }
            } 
            else {
              ?>
                <div class="callout callout-danger">
                  <h7><?php echo "Data Tidak Ditemukan / Sudah Terhapus"; ?></h7>
                </div>
            <?php } ?>

          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <?php foreach($pegawai as $p) { ?>
      <div class="modal fade" id="update<?php echo $p->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="update">Form Update Pegawai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="<?= base_url('admin/update_pegawai'); ?>" enctype="multipart/form-data">

              <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="hidden" name="id" class="form-control" value="<?=$p->id ?>">
                    <input type="text" name="nama" class="form-control" value="<?=$p->nama ?>" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                      <select type="text" name="jenkel" class="form-control" >
                      <option <?php  if($p->jenkel == 'Laki Laki') { echo 'selected' ;} ?>>Laki Laki</option>
                      <option <?php  if($p->jenkel == 'Perempuan') { echo 'selected' ;} ?>>Perempuan</option>
                      </select>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?=$p->alamat ?>" autocomplete="off">
                </div>

                <div class="form-group">
                  <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="<?=$p->telepon ?>" autocomplete="off">
                </div>

                <div class="form-group">
                  <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?=$p->email ?>" autocomplete="off">
                </div>

                <div class="form-group">
                  <label>username</label>
                    <input type="text" name="username" class="form-control" value="<?=$p->username ?>" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>password</label>
                    <input type="text" name="password" class="form-control" value="<?=$p->password ?>" autocomplete="off">
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->