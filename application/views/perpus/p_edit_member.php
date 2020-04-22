<div class="content-wrapper">
    <section class="content">
        <?php foreach($member as $m) { ?>

            <form action="<?= base_url('admin/update_member'); ?>" method="POST">
                <div class="form-group">
                    <label>Nama Member</label>
                    <input type="hidden" name="id" class="form-control" value="<?=$m->id ?>">
                    <input type="text" name="nama" class="form-control" value="<?=$m->nama ?>">
                </div>
                
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select type="text" name="jenkel" class="form-control" value="<?=$m->jenkel ?>">
                  <option>Laki Laki</option>
                  <option>Perempuan</option>
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

                <a href="<?= base_url('admin/member') ?>"> <button type="button" class="btn btn-warning">Back</button></a>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
        <?php } ?>
    </section>
</div>