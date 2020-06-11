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
            
            <table class="table table-bordered table-striped">
            <thead>
                  <tr>
                  <th>Id</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Email</th>
                    <th>username</th>
                    <th>password</th>
                  </tr>
            </thead>
            <tbody>
                  <?php
                        foreach($data as $u):
                  ?>
                  <tr>
                  <td><?= $u->id ?></td>
                  <td><?= $u->nama?></td>
                  <td><?= $u->jenkel?></td>
                  <td><?= $u->alamat?></td>
                  <td><?= $u->telepon?></td>
                  <td><?= $u->email?></td>
                  <td><?= $u->username?></td>
                  <td><?= $u->password?></td>
                  </tr>

                  <?php endforeach;?>

            </tbody>

      </table>

            

          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->