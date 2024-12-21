<?php

require '../request.php';
session_start(); // Ensure the session is started

if($_GET['aksi']=="loginUser"){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $hasil = $koneksi->prepare("CALL getLoginUsers('$username', '$password')");
    $hasil->execute();

    $user = $hasil->fetch();

    if($user){
        $_SESSION['USER']['id'] = $user['id_users']; // Ensure the correct field name is used
        $_SESSION['USER']['tipe'] = 'user';
        $_SESSION['USER']['username'] = $user['username'];
        header("location:../user?page=dashboard");
    } else {
        echo "<script>alert('Username / Password Salah'); window.location= '../login.php' </script>";
    }
}

if($_GET['aksi'] == "logout"){
    session_destroy();
    header("location:../login.php");
}

?>