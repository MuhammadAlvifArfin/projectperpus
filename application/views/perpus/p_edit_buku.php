<div class="content-wrapper">
    <section class="content">
        <?php foreach($buku as $b) { ?>

            <form action="<?= base_url('admin/update_buku'); ?>" method="POST">
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
				        echo '<img src="'.base_url().'assets/gambar_buku/'.$b->gambar.'" width="10%">';
		        	}
		            ?>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <a href="<?= base_url('admin/buku') ?>"> <button type="button" class="btn btn-warning">Back</button></a>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
        <?php } ?>
    </section>
</div>