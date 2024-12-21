<?php
include "../koneksi.php"; 

$id_transaksi = $_GET['id'];

$query = "
    SELECT 
        t.id_transaksi, t.total_harga, t.payment_type, t.time, t.bank, t.bukti_tf, 
        t.status, u.username, p.judul_produk 
    FROM transaksi t
    JOIN users u ON t.id_users = u.id_users
    JOIN produk p ON t.id_produk = p.id_produk
    WHERE t.id_transaksi = '$id_transaksi'
";

$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($result);

if (!$data) {
    die("Data tidak ditemukan.");
}
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Status Transaksi</h1>
</div>

<div class="card">
    <div class="card-body">
        <!-- Form untuk mengubah status -->
        <form action="updateStatus.php" method="post">
            <input type="hidden" name="id_transaksi" value="<?= $data['id_transaksi'] ?>">

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($data['username']) ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="judul_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($data['judul_produk']) ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="text" class="form-control" value="Rp <?= number_format($data['total_harga'], 2, ',', '.') ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status Transaksi</label>
                <select name="status" class="form-control">
                    <option value="Accepted" <?= $data['status'] == 'Accepted' ? 'selected' : '' ?>>Accepted</option>
                    <option value="Processed" <?= $data['status'] == 'Processed' ? 'selected' : '' ?>>Processed</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Simpan Perubahan Status</button>
        </form>
    </div>
</div>
