<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Produk</h1>
</div>

<?php
$id = $_GET['id'];
$kelas = $koneksi->prepare("CALL getProdukId(:id)");
$kelas->bindParam(':id', $id);
$kelas->execute();

$data = $kelas->fetch();
?>

<div class="card">
    <div class="card-body">
        <form action="../kontrol/kontrolProduk.php?aksi=edit" method="post" enctype="multipart/form-data">
            <table class="table">
                <input type="file" name="gambar" class="form-control mb-2" placeholder="Masukan Gambar (Wajib .png)">
                
                <input required type="text" name="judul_produk" class="form-control mb-2" placeholder="Masukan Nama Produk" value="<?= $data['judul_produk'] ?>">
                
                <input required type="text" name="slug_produk" class="form-control mb-2" placeholder="Masukan Slug Produk" value="<?= $data['slug_produk'] ?>">
                
                <input required type="text" name="deskripsi" class="form-control mb-2" placeholder="Masukan Deskripsi Produk" value="<?= $data['deskripsi'] ?>">
                
                <select name="id_kategori" class="form-control mb-2">
                    <option <?= $data['id_kategori'] == "1" ? "selected" : "" ; ?> value="1">Tanaman Pangan</option>
                    <option <?= $data['id_kategori'] == "2" ? "selected" : "" ; ?> value="2">Alat Pertanian</option>
                </select>

                <input required type="text" name="harga" class="form-control mb-2" placeholder="Masukan Harga Produk" value="<?= $data['harga'] ?>">
            </table>

            <input type="hidden" name="id" value="<?= htmlspecialchars($data['id_produk']) ?>">
            <button class="btn btn-primary w-100">Simpan</button>
        </form>
    </div>
</div>
