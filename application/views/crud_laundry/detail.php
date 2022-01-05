<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Mahasiswa
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $basket['nama']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $basket['id']; ?></h6>
                    <p class="card-text"><?= $basket['alasan_bergabung']; ?></p>
                    <p class="card-text"><?= $basket['jurusan']; ?></p>
                    <a href="<?= base_url(); ?>basket" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>

