<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
</div>

<div class="card">
<div class="card-body">
    <form action="../kontrol/kontrolUsers.php?aksi=tambah" method="post">
    <table class="table">
        <input required type="text" name="username" class="form-control mb-2" placeholder="Masukan Username">
        <input required type="password" name="password" class="form-control mb-2" placeholder="Masukan Password">
        <input required type="email" name="email" class="form-control mb-2" placeholder="Masukan Email">
        <input required type="text" name="nomor_telephone" class="form-control mb-2" placeholder="Masukan Nomer Telfon">
        
        <input required type="text" name="alamat" class="form-control mb-2" placeholder="Masukan Alamat">
    </table>
    <button class="btn btn-primary w-100">Tambah</button>
    </form>
</div>
</div>