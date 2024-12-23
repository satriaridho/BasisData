<?php
include "../koneksi.php";

$get_user_id = $_SESSION['USER']['id'];

// Calculate Pelanggan hari ini
$query_tagihan = "
    SELECT SUM(total_harga) as total_harga
    FROM transaksi 
    WHERE id_users = '$get_user_id' AND status = 'Waiting Payment'
";
$result_tagihan = mysqli_query($koneksi, $query_tagihan);
$data_tagihan = mysqli_fetch_array($result_tagihan);
$tagihan_total = $data_tagihan['total_harga'] ?? 0;
?>

<table class="table">
    <tr>
        <td width="200">Nama</td>
        <td width="1">:</td>
        <td><?= $_SESSION['USER']['username'] ?></td>
    </tr>

    <tr>
        <td width="200">Tanggal Login</td>
        <td width="1">:</td>
        <td><?= date("d-m-y H:i:s") ?></td>
    </tr>
</table>

<div class="row">
    <!-- Customers (Daily) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tagihan Pembayaran
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">RP : <?= number_format($tagihan_total, 2, ',', '.') ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>