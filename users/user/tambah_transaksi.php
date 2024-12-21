<?php

include "../koneksi.php";

if (isset($_POST['submit'])) {
    $total_harga = $_POST['total_harga'];
    $time = date("Y-m-d h:i:s");
    $status = 'Waiting Payment';
    $id_users = isset($_SESSION['USER']['id']) ? $_SESSION['USER']['id'] : null; // Ensure id_users is set
    $id_produk = $_POST['id_produk'];

    if ($id_users === null) {
        echo "<script>alert('User not logged in. Please log in first.')</script>";
        echo "<script>location.href='login.php'</script>";
        exit;
    }

    $query = mysqli_query($koneksi, "INSERT INTO transaksi(total_harga, time, status, id_users, id_produk) VALUES ('$total_harga', '$time', '$status', '$id_users', '$id_produk')") or die (mysqli_error($koneksi));

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
    <h1 class="h3 mb-0 text-gray-800">Tambah Transaksi</h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <td>
                        <select required name="id_produk" id="id_produk" class="form-control mb-2" onchange="updatePrice()">
                            <option value="" disabled selected>Pilih Produk</option>
                            <?php
                                $produk = mysqli_query($koneksi, "SELECT id_produk, judul_produk, harga FROM produk");
                                while ($data = mysqli_fetch_array($produk)) {
                            ?>
                            <option value="<?= $data['id_produk'] ?>" data-harga="<?= $data['harga'] ?>"><?= $data['judul_produk'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-outline-secondary" onclick="changeQuantity(-1)">-</button>
                            </div>
                            <input required type="text" name="jumlah_produk" id="jumlah_produk" class="form-control text-center" value="1" readonly>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" onclick="changeQuantity(1)">+</button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="total_harga" id="total_harga">
                        <h5>Total Harga: <span id="display_total_harga">0</span></h5>
                    </td>
                </tr>
            </table>

            <button name="submit" type="submit" class="btn btn-primary w-100">Tambah</button>
        </form>
    </div>
</div>

<script>
function updatePrice() {
    const select = document.getElementById('id_produk');
    const selectedOption = select.options[select.selectedIndex];
    const harga = selectedOption.getAttribute('data-harga');
    const jumlah = document.getElementById('jumlah_produk').value;
    const totalHarga = harga * jumlah;
    document.getElementById('total_harga').value = totalHarga;
    document.getElementById('display_total_harga').innerText = totalHarga;
}

function changeQuantity(amount) {
    const jumlahInput = document.getElementById('jumlah_produk');
    let jumlah = parseInt(jumlahInput.value);
    jumlah = isNaN(jumlah) ? 0 : jumlah;
    jumlah += amount;
    if (jumlah < 1) jumlah = 1;
    jumlahInput.value = jumlah;
    updatePrice();
}

document.getElementById('id_produk').addEventListener('change', updatePrice);
document.getElementById('jumlah_produk').addEventListener('input', updatePrice);
</script>