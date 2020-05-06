<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Member</h1>
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
              <button class="btn btn-primary" data-toggle="modal" data-target="#AddModal"><i class="fas fa-user-plus"></i></button>
              <a href="<?= base_url('admin/excel_member')?>" title="Download Excel" class="btn btn-success"><i class="fas fa-file-excel"></i></a>
            </div>
            <div>
              <small class="text-danger">
                <?php echo validation_errors(); ?>
              </small>
            </div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <div class="table-responsive p-0">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No. telepon</th>
                    <th width="20%">Aksi</th>
                  </tr>
                </thead>
                
                <tbody>
                  <?php 
                    foreach($member as $m){ 
                      ?>
                  <tr>
                    <td><?= $m->id ?></td>
                    <td><?= $m->nama?></td>
                    <td><?= $m->jenkel?></td>
                    <td><?= $m->alamat?></td>
                    <td><?= $m->telpon?></td>
                    <td> 
                      <center>
                      <button data-toggle="modal" data-target="#update<?php echo $m->id ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button></i>
                        | 
                        <a href="<?= base_url('admin/delete_member/'.$m->id) ?>" class="btn btn-danger hapus-member"><i class="fas fa-trash"></i></a>
                    </center>
                    </td>
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

    <!-- Button trigger modal -->

      <!-- Modal -->
      <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Tambah Member</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action=" <?= base_url('admin/tambah_member') ?> ">

                <div class="form-group">
                  <label>Nama Member</label>
                  <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control">
                  <small class="text-danger"><?= form_error('nama') ?></small>
                  
                </div>

                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select type="text" name="jenkel" value="<?= set_value('jenkel') ?>" class="form-control">
                    <option>Laki Laki</option>
                    <option>Perempuan</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" value="<?= set_value('alamat') ?>" class="form-control">
                  <small class="text-danger"><?= form_error('alamat') ?></small>
                </div>

                <div class="form-group">
                  <label>No. Telepon</label>
                  <input type="text" name="telpon" value="<?= set_value('telpon') ?>" class="form-control">
                  <small class="text-danger"><?= form_error('telpon') ?></small>
                </div>
                <button type="Reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>

              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <?php foreach($member as $m) { ?>
      <div class="modal fade" id="update<?php echo $m->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="update">Form Update Member</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="<?= base_url('admin/update_member'); ?>" enctype="multipart/form-data">

              <div class="form-group">
                    <label>Nama Member</label>
                    <input type="hidden" name="id" class="form-control" value="<?=$m->id ?>">
                    <input type="text" name="nama" class="form-control" value="<?=$m->nama ?>">
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                      <select type="text" name="jenkel" class="form-control" >
                      <option <?php  if($m->jenkel == 'Laki Laki') { echo 'selected' ;} ?>>Laki Laki</option>
                      <option <?php  if($m->jenkel == 'Perempuan') { echo 'selected' ;} ?>>Perempuan</option>
                      
                      <!-- <option><?=$m->jenkel ?></option>
                      <option>Laki Laki</option>
                      <option>Perempuan</option> -->
                    </select>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?=$m->alamat ?>">
                </div>

                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="telpon" class="form-control" value="<?=$m->telpon ?>">
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