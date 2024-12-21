<?php

require '../request.php';

if($_GET['aksi'] == "tambah"){
    $no_meja = $_POST['judul_kategori'];
    $status = $_POST['slug_kategori'];

    $tambah = $koneksi->prepare("CALL tambahMeja('$no_meja', '$status')");
    $tambah->execute();

    header("location:../petugas?page=kategori");

}

if($_GET['aksi'] == "edit"){
    $id_petugas = $_POST['id'];
    $no_meja = $_POST['judul_kategori'];
    $status = $_POST['slug_kategori'];

    $edit = $koneksi->prepare("CALL editKategori('$id_petugas', '$no_meja', '$status')");
    $edit->execute();

    header("location:../petugas?page=kategori");

}

if($_GET['aksi'] == "delete"){
    $id_petugas = $_POST['id'];

    $hapus = $koneksi->prepare("CALL hapusKategori('$id_petugas')");
    $hapus->execute();

    header("location:../petugas?page=kategori");

}



?>