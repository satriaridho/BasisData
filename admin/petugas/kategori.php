<?php

include "../koneksi.php";

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Kategori</h1>
</div>

<a href="?page=tambah_kategori" class="btn btn-success mb-2">Tambah Kategori +</a>

<div class="card">
<div class="card-body">
    <table class="table">
        <tr>
            <td>No</td>
            <td>Kategori</td>
            <td>Slug Kategori</td>
            <td>Aksi</td>
        </tr>

        <?php
            
            $i = 1;
            $sis = mysqli_query($koneksi, "SELECT*FROM kategori");
            while ($data = mysqli_fetch_array($sis)) {

        ?>

        <tr>
            <td><?= $i++ ?></td>
            <td><?= $data['judul_kategori'] ?></td>
            <td><?= $data['slug_kategori'] ?></td>
            <td>
                <a href="?page=edit_kategori&id=<?= $data['id_kategori'] ?>" class="btn btn-primary">EDIT</a>
                <form action="../kontrol/kontrolKategori.php?aksi=delete" method="post" class="d-inline">
                    <input type="hidden" name="id" value="<?= $data['id_kategori'] ?>">
                    <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">DELETE</button>
                </form>
            </td>
        </tr>

        <?php
        }
        ?>
    </table>
</div>
</div>