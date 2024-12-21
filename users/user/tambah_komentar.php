<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $isi_komentar = $_POST['isi_komentar'];
    $created = date("Y-m-d H:i:s");
    $id_users = $_SESSION['USER']['id'];
    $id_product = $_POST['id_product'];

    $query = mysqli_query($koneksi, "INSERT INTO komentar (isi_komentar, created, id_users, id_produk) VALUES ('$isi_komentar', '$created', '$id_users', '$id_product')") or die(mysqli_error($koneksi));

    if ($query) {
        echo "<script>alert('Komentar berhasil ditambahkan.');</script>";
        echo "<script>location.href='transaksi.php'</script>";
    } else {
        echo "<script>alert('Gagal menambahkan komentar.');</script>";
    }
}

$id_transaksi = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
$data = mysqli_fetch_array($query);
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Komentar</h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="" method="post">
            <input type="hidden" name="id_product" value="<?= $data['id_produk'] ?>">
            <div class="form-group">
                <label for="isi_komentar">Komentar</label>
                <textarea name="isi_komentar" id="isi_komentar" class="form-control" required></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Tambah Komentar</button>
        </form>
    </div>
</div>