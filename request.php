<?php

include "connect.php";

date_default_timezone_set("Asia/Jakarta");

$db = new Database();
$koneksi = $db->connect();

if(empty($_SESSION)){
    session_start();
}


?>