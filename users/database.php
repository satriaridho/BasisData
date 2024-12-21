<?php

class Database{
    public function connect(){
        $dbhost = "localhost";
        $dbuser = "root";
        $dbname = "tugas_bd";
        $dbpass = "";

        try {
            $connect = new PDO("mysql:host=$dbhost; dbname=$dbname", $dbuser, $dbpass);
            $connect->exec("set names utf8");
            return $connect;
        } catch (\Throwable $th) {
            return "gagal koneksi";
        }
    }
}

?>