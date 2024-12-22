<?php
include "../koneksi.php";

// Calculate Pendapatan bulan ini
$current_month = date('Y-m');
$query_bulan_ini = "
    SELECT SUM(total_harga) AS pendapatan_bulan_ini 
    FROM transaksi 
    WHERE DATE_FORMAT(time, '%Y-%m') = '$current_month' AND status = 'Accepted'
";
$result_bulan_ini = mysqli_query($koneksi, $query_bulan_ini);
$data_bulan_ini = mysqli_fetch_array($result_bulan_ini);
$pendapatan_bulan_ini = $data_bulan_ini['pendapatan_bulan_ini'] ?? 0;

// Calculate Pendapatan hari ini
$current_date = date('Y-m-d');
$query_hari_ini = "
    SELECT SUM(total_harga) AS pendapatan_hari_ini 
    FROM transaksi 
    WHERE DATE(time) = '$current_date' AND status = 'Accepted'
";
$result_hari_ini = mysqli_query($koneksi, $query_hari_ini);
$data_hari_ini = mysqli_fetch_array($result_hari_ini);
$pendapatan_hari_ini = $data_hari_ini['pendapatan_hari_ini'] ?? 0;

// Calculate Pelanggan hari ini
$query_pelanggan_hari_ini = "
    SELECT COUNT(*) AS pelanggan_hari_ini 
    FROM transaksi 
    WHERE DATE(time) = '$current_date' AND status = 'Accepted'
";
$result_pelanggan_hari_ini = mysqli_query($koneksi, $query_pelanggan_hari_ini);
$data_pelanggan_hari_ini = mysqli_fetch_array($result_pelanggan_hari_ini);
$pelanggan_hari_ini = $data_pelanggan_hari_ini['pelanggan_hari_ini'] ?? 0;
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

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pendapatan bulan ini</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">RP : <?= number_format($pendapatan_bulan_ini, 2, ',', '.') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Daily) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pendapatan hari ini</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">RP : <?= number_format($pendapatan_hari_ini, 2, ',', '.') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Customers (Daily) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pelanggan hari ini
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $pelanggan_hari_ini ?></div>
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