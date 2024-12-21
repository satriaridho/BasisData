<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
</div>

<?php
$id = $_GET['id'];
$kelas = $koneksi->prepare("CALL getUsersId(:id)");
$kelas->bindParam(':id', $id);
$kelas->execute();

$data = $kelas->fetch();
?>

<div class="card">
<div class="card-body">
    <form action="../kontrol/kontrolUsers.php?aksi=edit" method="post">
    <table class="table">
        <input required type="text" name="username" class="form-control mb-2" placeholder="Masukan Username" value="<?= $data['username'] ?>">
        <input required type="password" name="password" class="form-control mb-2" placeholder="Masukan Password" value="<?= $data['password'] ?>">
        <input required type="email" name="email" class="form-control mb-2" placeholder="Masukan Email" value="<?= $data['email'] ?>">
        <input required type="text" name="nomor_telephone" class="form-control mb-2" placeholder="Masukan Nomer Telfon" value="<?= $data['nomor_telephone'] ?>">
        
        <input required type="text" name="alamat" class="form-control mb-2" placeholder="Masukan Alamat" value="<?= $data['alamat'] ?>">
    </table>
    <button class="btn btn-primary w-100">Simpan</button>
    </form>
</div>
</div>