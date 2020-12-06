<?= $this->extend('layouts/temp_admin'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="container-list shadow bg-white rounded">
        <div class="content mx-3">
            <div class="row">
                <div class="col">
                    <div class="form-group row" style="margin-bottom: -7px;">
                        <div class="col">
                            <p class="dk mt-3">Daftar Kopi</p>
                        </div>
                        <div class="col">
                            <a href="/kopi/create" class="btn btn-primary mt-3 float-right">Tambah Data Kopi</a>
                        </div>
                    </div>
                    <?php if (session()->getFlashData('message')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashData('message'); ?>
                        </div>
                    <?php endif; ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama Kopi</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($kopi as $k) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><img src="/img/<?= $k['image']; ?>" alt="" class="picture"></td>
                                    <td><?= $k['name']; ?></td>
                                    <td><?= $k['stock']; ?></td>
                                    <td>
                                        <a href="/kopi/<?= $k['slug']; ?>" class="btn btn-success">Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>