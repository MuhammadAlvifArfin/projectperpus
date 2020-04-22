<div class="content-wrapper">
    <section class="content">
        <?php foreach($pegawai as $p) { ?>

            <form action="<?= base_url('admin/update_pegawai'); ?>" method="POST">
                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="hidden" name="id" class="form-control" value="<?=$p->id ?>">
                    <input type="text" name="nama" class="form-control" value="<?=$p->nama ?>">
                </div>
                
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?=$p->username ?>">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" value="<?=$p->password ?>">
                </div>

                <a href="<?= base_url('admin/pegawai') ?>"> <button type="button" class="btn btn-warning">Back</button></a>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
        <?php } ?>
    </section>
</div>