<?php

require '../koneksi.php';

if ($_GET['aksi'] == "edit") {
    $id = $_POST['id'];  
    $gambar = $_FILES['gambar']['name'];
    $lokasi = $_FILES['gambar']['tmp_name'];
    $judul_produk = $_POST['judul_produk'];
    $slug_produk = $_POST['slug_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kategori = $_POST['id_kategori']; 

    if ($gambar != '') {
        $target_file = "../../assets/images/" . basename($gambar);
        if (move_uploaded_file($lokasi, $target_file)) {
            $gambar = basename($gambar);
        } else {
            echo "Gambar gagal diupload.";
            exit;
        }
    } else {
        $result = $koneksi->query("SELECT gambar FROM produk WHERE id_produk = $id");
        $row = $result->fetch_assoc();
        $gambar = $row['gambar']; 
    }

    $query = "UPDATE produk SET gambar = '$gambar', judul_produk = '$judul_produk', slug_produk = '$slug_produk', deskripsi = '$deskripsi', harga = '$harga', id_kategori = '$kategori' WHERE id_produk = $id";

    if ($koneksi->query($query)) {
        header("Location: ../petugas?page=product");
        exit;
    } else {
        echo "Error executing query: " . $koneksi->error;
    }
}

if ($_GET['aksi'] == "delete") {
    $id = $_POST['id'];

    $hapus = $koneksi->prepare("CALL hapusProduct('$id')");
    if ($hapus->execute()) {
        header("Location: ../petugas?page=product");
        exit;
    } else {
        echo "Error executing delete: " . $koneksi->error;
    }
}

?>
