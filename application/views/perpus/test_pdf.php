<!doctype html>
<html><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head><body>

    <h3 style="text-align: center">DATA TRANSAKSI</h3>
    <br>
    <table>
        <tr>
            <th>ID</th>
            <th>NAMA MEMBER</th>
            <th>JUDUL BUKU</th>
            <th>TANGGAL PINJAM</th>
            <th>TANGGAL KEMBALI</th>
        </tr>
        <?php
        $no = 1;
        foreach ($data as $t) { ?>

            <tr>
                <td><?php echo $t->id ?></td>
                <td><?php echo $t->nama_member ?></td>
                <td><?php echo $t->judul_buku ?></td>
                <td><?php echo $t->tanggal_pinjam ?></td>
                <td><?php echo $t->tanggal_kembali ?></td>
            </tr>

        <?php } ?>
    </table>

</body></html>