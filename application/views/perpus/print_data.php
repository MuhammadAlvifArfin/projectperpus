<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Print Data </title>
</head>
<body>
    <table>

        <tr>
            <th>NO</th>
            <th>ID PEMINJAMAN</th>
            <th>NAMA MEMBER</th>
            <th>JUDUL BUKU</th>
            <th>TANGGAL PEMINJAMAN</th>
            <th>TANGGAL PENGEMBALIAN</th>
        </tr>

        <?php
            $no = 1;
            foreach($dataT as $t){
        ?>
        <tr>
            <td> <?= $no++ ?> </td>
            <td> <?= $t->id ?> </td>
            <td> <?= $t->nama_member ?> </td>
            <td> <?= $t->judul_buku ?> </td>
            <td> <?= $t->tanggal_pinjam ?> </td>
            <td> <?= $t->tanggal_kembali ?> </td>
        </tr>

        <?php } ?>

    </table>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>