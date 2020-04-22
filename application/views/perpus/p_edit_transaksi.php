<div class="content-wrapper">
    <section class="content">
        <?php foreach($transaksi as $t) { ?>

            <form action="<?= base_url('admin/update_transaksi'); ?>" method="POST">
                <div class="form-group">
                    <label>Nama Member</label>
                    <input type="hidden" name="id" class="form-control" value="<?=$t->id ?>">
                    <select name="nama_member" class="form-control" value="<?=$t->nama_member ?>">                    
                        <?php foreach($member as $m) { ?>
                        <option><?php echo $m->nama;?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Judul Buku</label>
                    <select name="judul_buku" class="form-control" value="<?=$t->judul_buku ?>">            
                        <?php foreach($buku as $b) { ?>
                        <option><?php echo $b->judul;?></option>
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
                <a href="<?= base_url('admin/transaksi') ?>"> <button type="button" class="btn btn-warning">Back</button></a>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
        <?php } ?>
    </section>
</div>