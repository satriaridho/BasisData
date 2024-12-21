<?php

include "../koneksi.php";

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Product</h1>
</div>

<div class="card">
<div class="card-body">
    <table class="table">
        <tr>
            <td>No</td>
            <td>Gambar</td>
            <td>Nama Produk</td>
            <td>Slug Produk</td>
            <td>Deskripsi</td>
            <td>Harga</td>
            <td>Kategori</td>
        </tr>

        <?php
            $i = 1;
            $sis = mysqli_query($koneksi, "
                SELECT p.*, k.judul_kategori
                FROM produk p
                JOIN kategori k ON p.id_kategori = k.id_kategori
            ");
            while ($data = mysqli_fetch_array($sis)) {
        ?>

        <tr>
            <td><?= $i++ ?></td>
            <td class="img-fluid img-thumbnail">
                <img style="width: 70px; height:auto;" src="../../assets/images/<?= $data['gambar'] ?>">
            </td>
            <td><?= $data['judul_produk'] ?></td>
            <td><?= $data['slug_produk'] ?></td>
            <td><?= $data['deskripsi'] ?></td>
            <td><?= number_format($data['harga'], 0, ',', '.') ?></td>
            <td><?= $data['judul_kategori'] ?></td> 
        </tr>

        <?php
            }
        ?>
    </table>
</div>
</div>
