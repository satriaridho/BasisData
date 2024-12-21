<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Selamat Datang diaplikasi Warung Penjualan</h1>
</div>

<div class="card">
<div class="card-body">
    <table class="table">
        <tr>
            <td width="200">Nama</td>
            <td width="1">:</td>
            <td><?= $_SESSION['USER']['nama_petugas'] ?></td>
        </tr>

        <tr>
            <td width="200">Level</td>
            <td width="1">:</td>
            <td><?= $_SESSION['USER']['level'] ?></td>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">RP : 2,150,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            pendapatan hari ini</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" >RP : 40,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pelanggan hari ini
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">4</div>
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

</div>
</div>
</div>