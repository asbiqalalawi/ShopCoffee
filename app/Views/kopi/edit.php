<?= $this->extend('layouts/adminlte'); ?>

<?= $this->section('sidebar'); ?>
<li class="nav-item">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-coffee"></i>
        <p>
            Kopi
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="/Kopi/userinfo" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
            User
        </p>
    </a>
</li>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="container" style="margin-top: 40px;">
    <nav aria-label="breadcrumb" class="brdcrmb2 shadow rounded">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/kopi">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit /</li>
        </ol>
    </nav>
    <div class="container-list shadow bg-white rounded">
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
                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="number" style="width: 120px;" class="form-control <?= $validation->hasError('harga') ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= (old('harga')) ? old('harga') : $kopi['harga'] ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('harga'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stock" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="number" style="width: 120px;" class="form-control <?= $validation->hasError('stock') ? 'is-invalid' : ''; ?>" id="stock" name="stock" value="<?= (old('stock')) ? old('stock') : $kopi['stock'] ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('stock'); ?>
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
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary float-right">Ubah Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>