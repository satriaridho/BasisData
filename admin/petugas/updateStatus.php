<?php
include "../koneksi.php";

$id_transaksi = $_POST['id_transaksi'];
$status_baru = $_POST['status'];

$query = "UPDATE transaksi SET status = '$status_baru' WHERE id_transaksi = '$id_transaksi'";

if (mysqli_query($koneksi, $query)) {
    header("Location: ../petugas?page=transaksi");
    exit;
} else {
    echo "Error updating status: " . mysqli_error($koneksi);
}
?>
