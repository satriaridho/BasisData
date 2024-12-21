<?php
include "../koneksi.php";
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Komentar</h1>
</div>

<div class="card">
<div class="card-body">
    <table class="table">
        <tr>
            <td>No</td>
            <td>Komentar User</td>
            <td>Tanggal Komentar</td>
            <td>Username</td>
            <td>Produk</td>
        </tr>

        <?php
            
            $i = 1;
            // Melakukan JOIN antara tabel komentar, users, dan produk
            $query = "
                SELECT 
                    k.id_komentar, k.isi_komentar, k.created, 
                    u.username, p.judul_produk
                FROM komentar k
                JOIN users u ON k.id_users = u.id_users
                JOIN produk p ON k.id_produk = p.id_produk
            ";
            $sis = mysqli_query($koneksi, $query);
            while ($data = mysqli_fetch_array($sis)) {

        ?>

        <tr>
            <td><?= $i++ ?></td>
            <td><?= $data['isi_komentar'] ?></td>
            <td><?= $data['created'] ?></td>
            <td><?= $data['username'] ?></td>
            <td><?= $data['judul_produk'] ?></td>
            
        </tr>

        <?php
        }
        ?>
    </table>
</div>
</div>
