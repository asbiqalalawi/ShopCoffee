<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-7 mx-auto">
            <h2 class="my-4">Form Ubah Data Kopi</h2>
            <form action="/kopi/update/<?= $kopi['id']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $kopi['slug']; ?>">
                <input type="hidden" name="imageLama" value="<?= $kopi['image']; ?>">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama Kopi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : ''; ?>" id="name" name="name" autofocus value="<?= (old('name')) ? old('name') : $kopi['name'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('name'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= $validation->hasError('deskripsi') ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" value="<?= (old('deskripsi')) ? old('deskripsi') : $kopi['deskripsi'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('deskripsi'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $kopi['image']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= $validation->hasError('image') ? 'is-invalid' : ''; ?>" id="image" name="image" onchange="previewImg()">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('image'); ?>
                            </div>
                            <label class="custom-file-label" for="image"><?= $kopi['image']; ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>