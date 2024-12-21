<?php

require '../request.php';

if($_GET['aksi'] == "tambah"){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $nomor_telephone = $_POST['nomor_telephone'];
    $alamat = $_POST['alamat'];

    $tambah = $koneksi->prepare("CALL tambahUsers('$username', '$password', '$email', '$nomor_telephone', '$alamat')");
    $tambah->execute();

    header("location:../petugas?page=user");

}

if($_GET['aksi'] == "edit"){
  $id_petugas = $_POST['id'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $email = $_POST['email'];
  $nomor_telephone = $_POST['nomor_telephone'];
  $alamat = $_POST['alamat'];

  $edit = $koneksi->prepare("CALL editUsers('$id_petugas', '$username','$password' , '$email', '$nomor_telephone', '$alamat')");
  $edit->execute();

  header("location:../petugas?page=user");

}

if($_GET['aksi'] == "delete"){
    $id_petugas = $_POST['id'];

    $hapus = $koneksi->prepare("CALL hapusUsers('$id_petugas')");
    $hapus->execute();

    header("location:../petugas?page=user");

}



?>