<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Petugas</h1>
</div>

<?php

$id = $_GET['id'];
$petugas = $koneksi->prepare("CALL getPetugasId('$id')");
$petugas->execute();

$data = $petugas->fetch();

?>

<div class="card">
<div class="card-body">
    <form action="../kontrol/kontrolPetugas.php?aksi=edit" method="post">
    <table class="table">
        <input type="text" name="username" class="form-control mb-2" placeholder="Masukan Username" value="<?= $data['username'] ?>">
        <input type="text" name="nama_petugas" class="form-control mb-2" placeholder="Masukan Nama Petugas" value="<?= $data['nama_petugas'] ?>">
        <select name="level" class="form-control mb-2">
            <option <?= $data['level'] == "admin" ? "selected" : "" ; ?> value="admin">Admin</option>
            <option <?= $data['level'] == "petugas" ? "selected" : "" ; ?> value="petugas">Petugas</option>
        </select>
        <input type="text" name="password" class="form-control mb-2" placeholder="Masukan Password" value="<?= $data['password'] ?>">
    </table>
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <button class="btn btn-primary w-100">Tambah</button>
    </form>
</div>
</div>