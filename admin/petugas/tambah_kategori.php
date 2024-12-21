<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1>
</div>

<div class="card">
<div class="card-body">
    <form action="../kontrol/kontrolKategori.php?aksi=tambah" method="post">
    <table class="table">
        <input required type="text" name="judul_kategori" class="form-control mb-2" placeholder="Masukan Nama Kategori">
        <input required type="text" name="slug_kategori" class="form-control mb-2" placeholder="Masukan Slug Kategori">
    </table>
    <button class="btn btn-primary w-100">Tambah</button>
    </form>
</div>
</div>