<?php
if(empty($_SESSION['USER']['level'] == "admin")){
    die("Permission denied 666");
  }

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Petugas</h1>
</div>

<a href="?page=tambah_petugas" class="btn btn-success mb-2">Tambah Petugas +</a>

<div class="card">
<div class="card-body">
    <table class="table">
        <tr>
            <td>No</td>
            <td>Username</td>
            <td>Nama Petugas</td>
            <td>Level</td>
            <td>Aksi</td>
        </tr>

        <?php
        
            $petugas = $koneksi->prepare("CALL getPetugas()");
            $petugas->execute();

            foreach ($petugas->fetchAll() as $no => $data):

        ?>

        <tr>
            <td><?= $no+1 ?></td>
            <td><?= $data['username'] ?></td>
            <td><?= $data['nama_petugas'] ?></td>
            <td><?= $data['level'] ?></td>
            <td>
                <a href="?page=edit_petugas&id=<?= $data['id'] ?>" class="btn btn-primary">EDIT</a>
                <form action="../kontrol/kontrolPetugas.php?aksi=delete" method="post" class="d-inline">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
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