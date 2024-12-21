<?php

require '../request.php';

if($_GET['aksi'] == "loginPetugas"){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $hasil = $koneksi->prepare("CALL getLoginPetugas('$username', '$password')");
    $hasil->execute();

    $petugas = $hasil->fetch();

    if($petugas){     
        $_SESSION['USER']['id'] = $petugas['id'];
        $_SESSION['USER']['tipe'] = 'petugas';
        $_SESSION['USER']['level'] = $petugas['level'];
        $_SESSION['USER']['nama_petugas'] = $petugas['nama_petugas'];
    }
    header("location:../petugas?page=dashboard");

}else{
    echo "<script>alert('Username / Password Salah'); window.location= '../login.php' </script>";
}

if($_GET['aksi'] == "logout"){
    session_destroy();

    header("location:../login.php");
}

?>