<?= $this->extend('layouts/temp_admin'); ?>

<?= $this->section('content'); ?>

<div class="container" style="margin-top: 40px;">
    <nav aria-label="breadcrumb" class="brdcrmb2 shadow rounded">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/kopi">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    <div class="container-list shadow bg-white rounded">
        <div class="container">
            <div class="row">
                <div class="col-7 mx-auto">
                    <h2 class="my-4">Form Tambah Data Kopi</h2>
                    <form action="/kopi/save" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama Kopi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : ''; ?>" id="name" name="name" autofocus value="<?= old('name'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('name'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= $validation->hasError('deskripsi') ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" value="<?= old('deskripsi'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('deskripsi'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="number" style="width: 120px;" class="form-control <?= $validation->hasError('harga') ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= old('harga'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('harga'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stock" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="number" style="width: 120px;" class="form-control <?= $validation->hasError('stock') ? 'is-invalid' : ''; ?>" id="stock" name="stock" value="<?= old('stock'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('stock'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-2">
                                <img src="/img/default.png" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= $validation->hasError('image') ? 'is-invalid' : ''; ?>" id="image" name="image" onchange="previewImg()">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('image'); ?>
                                    </div>
                                    <label class="custom-file-label" for="image">Pilih gambar..</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary float-right">Tambah Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>