<?php

include "../koneksi.php";

if (isset($_POST['submit'])) {
    $gambar = $_FILES['gambar']['name'];
    $lokasi = $_FILES['gambar']['tmp_name'];
    $judul = $_POST['judul_produk'];
    $slug_produk = $_POST['slug_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kategori = $_POST['id_kategori']; 

    move_uploaded_file($lokasi, "../images/" . $gambar);

    $query = mysqli_query($koneksi, "INSERT INTO produk(judul_produk, slug_produk, deskripsi, harga, gambar, id_kategori) VALUES ('$judul', '$slug_produk', '$deskripsi', '$harga', '$gambar', '$kategori')") or die (mysqli_error($koneksi));

    if ($query) {
        echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo "<script>location.href='?page=product'</script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan')</script>";
        echo "<script>location.href='?page=product'</script>";
    }
}

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Menu</h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table">
                <input required type="file" name="gambar" class="form-control mb-2" placeholder="Masukan Gambar (Wajib .png)">
                
                <input required type="text" name="judul_produk" class="form-control mb-2" placeholder="Masukan Nama Produk">
                
                <input required type="text" name="slug_produk" class="form-control mb-2" placeholder="Masukan Slug Produk">
                
                <input required type="text" name="deskripsi" class="form-control mb-2" placeholder="Masukan Deskripsi Produk">
                
                <select required name="id_kategori" class="form-control mb-2">
                    <?php
                        $kel = mysqli_query($koneksi, "SELECT * FROM kategori");
                        while ($data = mysqli_fetch_array($kel)) {
                    ?>
                    <option value="<?= $data['id_kategori'] ?>"><?= $data['judul_kategori'] ?></option>
                    <?php
                        }
                    ?>
                </select>

                <input required type="text" name="harga" class="form-control mb-2" placeholder="Masukan Harga Produk">
            </table>

            <button name="submit" type="submit" class="btn btn-primary w-100">Tambah</button>
        </form>
    </div>
</div>
