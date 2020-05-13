  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pegawai</h1>
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
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user-plus"></i></button>
            </div>
            <div>
              <small class="text-danger"> 
                <?php if(validation_errors())
                {
                ?>
                
                </div><div class="callout callout-danger">
                  <h5>Peringatan!</h5>
                  <p><?php echo validation_errors(); ?></p>
                </div>
                
                <?php } ?>
              </small>
            </div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <div class="table-responsive p-0">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th width="20%">Aksi</th>
                </tr>
                </thead>

                <tbody>
                <?php 
                  $no = 1;
                  foreach($pegawai as $u){ 
                ?>
                <tr>
                  <td><?= $u->id ?></td>
                  <td><?= $u->nama?></td>
                  <td><?= $u->username ?></td>
                  <td>*********</td>
                  <td> <center><button data-toggle="modal" data-target="#update<?php echo $u->id ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button></i>
                  | 
                  <a class="btn btn-danger hapus-pegawai" href="<?= base_url('admin/delete_pegawai/'.$u->id) ?>"><i class="fas fa-trash"></i></a>
                  </center>
                </tr>

                <?php } ?>
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
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Tambah Pegawai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action=" <?= base_url('admin/tambah_pegawai') ?> ">

              <div class="form-group">
                <label>Nama Pegawai</label>
                <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control">
                <small class="text-danger"><?= form_error('nama') ?></small>
              </div>

              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control">
                <small class="text-danger"><?= form_error('username') ?></small>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control">
                <small class="text-danger"><?= form_error('password') ?></small>
              </div>

              <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input type="password" name="repass" class="form-control">
                  <small class="text-danger"><?= form_error('repass') ?></small>
              </div>

              <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>

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
                    <input type="text" name="nama" class="form-control" value="<?=$p->nama ?>">
                </div>

                <div class="form-group">
                  <label>username</label>
                    <input type="text" name="username" class="form-control" value="<?=$p->username ?>">
                </div>

                <div class="form-group">
                    <label>password</label>
                    <input type="text" name="password" class="form-control" value="<?=$p->password ?>">
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