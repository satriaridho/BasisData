<?php
include "../koneksi.php"; 
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Transaksi</h1>
</div>

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Total Harga</th>
                    <th>Payment Type</th>
                    <th>Waktu Transaksi</th>
                    <th>Bank</th>
                    <th>Bukti Transfer</th>
                    <th>Status</th>
                    <th>Username</th>
                    <th>Nama Produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $query = "
                SELECT 
                    t.id_transaksi, t.total_harga, t.payment_type, t.time, t.bank, t.bukti_tf, 
                    t.status, u.username, p.judul_produk 
                FROM transaksi t
                JOIN users u ON t.id_users = u.id_users
                JOIN produk p ON t.id_produk = p.id_produk
            ";

            $result = mysqli_query($koneksi, $query);
            $i = 1; 

            while ($data = mysqli_fetch_array($result)) {
                $status_class = ($data['status'] == 'Accepted') ? 'text-success' : 'text-danger';
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td>Rp <?= number_format($data['total_harga'], 2, ',', '.') ?></td>
                    <td><?= is_null($data['payment_type']) ? 'Data belum ada' : htmlspecialchars($data['payment_type']) ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($data['time'])) ?></td>
                    <td><?= is_null($data['bank']) ? 'Data belum ada' : htmlspecialchars($data['bank']) ?></td>
                    <td><?= is_null($data['bukti_tf']) ? 'Data belum ada' : '<a href="../../assets/images/' . htmlspecialchars($data['bukti_tf']) . '" target="_blank">Lihat Bukti</a>' ?></td>
                    <!-- Kolom Status dengan kelas warna -->
                    <td class="<?= $status_class ?> text-white"><?= htmlspecialchars($data['status']) ?></td>
                    <td><?= htmlspecialchars($data['username']) ?></td>
                    <td><?= htmlspecialchars($data['judul_produk']) ?></td>
                    <td>
                        <a href="?page=edit_status&id=<?= $data['id_transaksi'] ?>" class="btn btn-info btn-sm">Ubah Status</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
