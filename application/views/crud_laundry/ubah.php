<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Mahasiswa
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="kode" value="<?= $basket['id']; ?>">
                        <div class="form-group">
                            <label for="kode">NIM</label>
                            <input type="text" name="kode" class="form-control" id="kode" value="<?= $basket['id']; ?>">
                            <small class="form-text text-danger"><?= form_error('kode'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= $basket['nama']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="alasan_bergabung">Alasan Bergabung</label>
                            <input type="text" name="alasan_bergabung" class="form-control" id="alasan_bergabung" value="<?= $basket['alasan_bergabung']; ?>">
                            <small class="form-text text-danger"><?= form_error('alasan_bergabung'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" id="jurusan" value="<?= $basket['jurusan']; ?>">
                            <small class="form-text text-danger"><?= form_error('jurusan'); ?></small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>

