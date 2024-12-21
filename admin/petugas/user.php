<?php
if(empty($_SESSION['USER']['level'] == "admin")){
    die("Permission denied 666");
  }

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard User</h1>
</div>

<a href="?page=tambah_user" class="btn btn-success mb-2">Tambah User +</a>

<div class="card">
<div class="card-body">
    <table class="table">
        <tr>
            <td>No</td>
            <td>Username</td>
            <td>Email</td>
            <td>No Telfon</td>
            <td>Alamat</td>
            <td>Aksi</td>
        </tr>

        <?php
        
            $petugas = $koneksi->prepare("CALL getUsers()");
            $petugas->execute();

            foreach ($petugas->fetchAll() as $no => $data):

        ?>

        <tr>
            <td><?= $no+1 ?></td>
            <td><?= $data['username'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['nomor_telephone'] ?></td>
            <td><?= $data['alamat'] ?></td>
            <td>
                <a href="?page=edit_users&id=<?= $data['id_users'] ?>" class="btn btn-primary">EDIT</a>
                <form action="../kontrol/kontrolUsers.php?aksi=delete" method="post" class="d-inline">
                    <input type="hidden" name="id" value="<?= $data['id_users'] ?>">
                    <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">DELETE</button>
                </form>
            </td>
        </tr>

        <?php
            endforeach
        ?>
    </table>
</div>
</div>