  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $this->Mainmodel-> tampil_buku('buku')->num_rows(); ?></h3>

                <p>Judul Buku ( Total <?php echo $this->Mainmodel->buku_sum(); ?> Buku )</p>
              </div>
              <div class="icon">
                <i class="fas fa-book-open"></i>
              </div>
              <a href="<?= base_url('admin/buku'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $this->Mainmodel-> tampil_member('member')->num_rows(); ?></h3>

                <p>Data Member</p>
              </div>
              <div class="icon">
                <i class="far fa-address-card"></i>
              </div>
              <a href="<?= base_url('admin/member'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $this->Mainmodel->tampil_data('pegawai')->num_rows(); ?></h3>

                <p>Data Pegawai</p>
              </div>
              <div class="icon">
                <i class="far fa-id-badge"></i>
              </div>
              <a href="<?= base_url('admin/pegawai'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $this->Mainmodel-> tampil_transaksi('transaksi')->num_rows(); ?></h3>

                <p>Data Transaksi</p>
              </div>
              <div class="icon">
                <i class="fas fa-book-reader"></i>
              </div>
              <a href="<?= base_url('admin/transaksi'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->