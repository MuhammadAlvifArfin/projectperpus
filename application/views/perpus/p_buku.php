  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Buku</h1>
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
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambah_buku"><i class="fas fa-book-medical"></i></button>
            <a href="<?= base_url('admin/excel_buku')?>" title="Download Excel" class="btn btn-success"><i class="fas fa-file-excel"></i></a>
            <a href="<?= base_url('admin/print_buku')?>" title="Print" class="btn btn-danger"><i class="fas fa-print"></i></a>
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
            <div>
              
            <div class="row">

              <?php 
                      foreach($buku as $b){ 
                ?>
                <div class="col-md-4">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-info">
                    <h3 class="widget-user-username"><?= $b->judul ?></h3>
                    <h5 class="widget-user-desc"><?= $b->penerbit ?></h5>
                  </div>
                  <div class="widget-user-image" >
                    <img style="background-color: white;" class="img-rounded elevation-2" src="<?= base_url('assets/gambar_buku/'.$b->gambar)  ?>" alt="User Avatar">
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">ID</h5>
                          <span class="description-text"><?= $b->id ?></span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">THN. TERBIT</h5>
                          <span class="description-text"><?= $b->tahun_terbit ?></span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4">
                        <div class="description-block">
                          <h5 class="description-header">JUMLAH</h5>
                          <span class="description-text"><?= $b->stock ?></span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="form-group">
                      <button data-toggle="modal" data-target="#update<?php echo $b->id ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button></i>
                      <a href="<?= base_url('admin/delete_buku/'.$b->id) ?>" class="btn btn-danger hapus-buku"><i class="fas fa-trash"></i></a>
                    </div>
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                </div>
                <!-- /.widget-user -->
                <?php } ?>

              <!-- /.col -->
              </div>
              <!-- /.row -->

            </div>

            <!-- /.card-body -->
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

      <!-- Modal -->
      <div class="modal fade" id="tambah_buku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Tambah Buku</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="<?= base_url('admin/tambah_buku'); ?>" enctype="multipart/form-data">

              <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" value="<?= set_value('judul') ?>" class="form-control">
                    <small class="text-danger"><?= form_error('judul') ?></small>
                </div>

                <div class="form-group">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" value="<?= set_value('penerbit') ?>" class="form-control">
                    <small class="text-danger"><?= form_error('penerbit') ?></small>
                </div>

                <div class="form-group">
                    <label>Tahun Terbit</label>
                    <input type="text" name="tahun_terbit" value="<?= set_value('tahun_terbit') ?>" class="form-control">
                    <small class="text-danger"><?= form_error('tahun_terbit') ?></small>
                </div>

                <div class="form-group">
                    <label>Stock</label>
                    <input type="text" name="stock" value="<?= set_value('stock') ?>" class="form-control">
                    <small class="text-danger"><?= form_error('stock') ?></small>
                </div>

                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

              <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>


      <!-- Modal -->
      <?php foreach($buku as $b) { ?>
      <div class="modal fade" id="update<?php echo $b->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="update">Form Update Buku</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="<?= base_url('admin/update_buku'); ?>" enctype="multipart/form-data">

              <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="hidden" name="id" class="form-control" value="<?=$b->id ?>">
                    <input type="text" name="judul" class="form-control" value="<?=$b->judul ?>">
                </div>

                <div class="form-group">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" value="<?=$b->penerbit ?>">
                </div>

                <div class="form-group">
                    <label>Tahun Terbit</label>
                    <input type="text" name="tahun_terbit" class="form-control" value="<?=$b->tahun_terbit ?>">
                </div>

                <div class="form-group">
                    <label>Stock</label>
                    <input type="text" name="stock" class="form-control" value="<?=$b->stock ?>">
                </div>

                <div class="form-group">
                    <label>Gambar</label>
                    <input type="hidden" name="filelama" value="<?=$b->gambar?>">
                    <?php
                    if(isset($b->gambar))
                    {
                      echo '<input type="hidden" name="old_pict" value="'.$b->gambar.'">';
                      echo '<img src="'.base_url().'assets/gambar_buku/'.$b->gambar.'" width="30%">';
                    }
		                ?>
                    <input type="file" name="gambar" class="form-control">
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