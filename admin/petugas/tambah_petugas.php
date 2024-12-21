<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Petugas</h1>
</div>

<div class="card">
<div class="card-body">
    <form action="../kontrol/kontrolPetugas.php?aksi=tambah" method="post">
    <table class="table">
        <input required type="text" name="username" class="form-control mb-2" placeholder="Masukan Username">
        <input required type="text" name="nama_petugas" class="form-control mb-2" placeholder="Masukan Nama Petugas">
        <select name="level" class="form-control mb-2">
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select>
        <input required type="text" name="password" class="form-control mb-2" placeholder="Masukan Password">
    </table>
    <button class="btn btn-primary w-100">Tambah</button>
    </form>
</div>
</div>