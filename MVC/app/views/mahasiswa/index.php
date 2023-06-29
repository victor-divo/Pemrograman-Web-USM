<div class="row mt-3">
    <div class="col-6">
        <div class="row">
            <div class="col-lg-12">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
            Tambah Data Mahasiswa
        </button>
        <h3 class="mt-3">
            Daftar Mahasiswa
        </h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["mhs"] as $key => $mhs) : ?>
                    <tr>
                        <th scope="row"><?= $mhs["id"]; ?></th>
                        <td><?= $mhs["nama"]; ?></td>
                        <td>
                            <a class="badge bg-primary" href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>">detail</a>
                            <a class="badge bg-danger" href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" onclick="return confirm('yakin?')">hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabel">Tambah Data Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" aria-describedby="namaHelp">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" aria-describedby="nimHelp">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select class="form-select" aria-label="Default select example" name="jurusan">
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                            <option value="Pariwisata">Pariwisata</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>