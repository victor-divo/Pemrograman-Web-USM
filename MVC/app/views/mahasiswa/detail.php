<div class="row mt-5">
    <div class="col-12">
        <div class="card w-50">
            <div class="card-body">
                <h5 class="card-title"><?= $data['mhs']['nama'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $data['mhs']['nim'] ?></h6>
                <p class="card-text"><?= $data['mhs']['email'] ?></p>
                <p class="card-text"><?= $data['mhs']['jurusan'] ?></p>
                <a href="<?= BASEURL ?>/mahasiswa" class="card-link">kembali</a>
            </div>
        </div>
    </div>
</div>