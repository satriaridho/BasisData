<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Petugas</h1>
</div>

<?php

$id = $_GET['id'];
$petugas = $koneksi->prepare("CALL getKategoriId('$id')");
$petugas->execute();

$data = $petugas->fetch();

$is_admin = $_SESSION['USER']['level'] == 'admin'; 

?>

<div class="card">
<div class="card-body">
    <form action="../kontrol/kontrolKategori.php?aksi=edit" method="post">
    <table class="table">
            <input type="text" name="judul_kategori" class="form-control mb-2" placeholder="Masukan Kategori" value="<?= $data['judul_kategori'] ?>">
            <input type="text" name="slug_kategori" class="form-control mb-2" placeholder="Masukan Slug Kategori" value="<?= $data['slug_kategori'] ?>" >
    </table>
    <input type="hidden" name="id" value="<?= $data['id_kategori'] ?>">
    <button class="btn btn-primary w-100">Tambah</button>
    </form>
</div>
</div>
