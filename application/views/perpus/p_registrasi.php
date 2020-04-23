<!-- Sign up form -->

<div class="register-box">
  <div class="register-logo">
    <a href=""><b>THE</b>Perpustakaan</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register Akun Baru</p>

      <form action="<?= base_url('login/registrasi') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>" placeholder="Nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <small class="text-danger"><?= form_error('nama') ?></small>
        
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" value="<?= set_value('username') ?>" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <small class="text-danger"><?= form_error('username') ?></small>
        
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" value="<?= set_value('password') ?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <small class="text-danger"><?= form_error('password') ?></small>
        
        <div class="input-group mb-3">
          <input type="password" name="repass" class="form-control" placeholder="Re-Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-unlock"></span>
            </div>
          </div>
        </div>
        <small class="text-danger"><?= form_error('repass') ?></small>

        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="<?= base_url('Login') ?>" class="text-center">Sudah Memiliki Akun ? Masuk !</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->