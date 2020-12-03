<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3 mb-4">
    <div class="row">
        <div class="col">
            <h1 class="mt-3">Daftar Kopi</h1>
            <?php if (session()->getFlashData('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashData('message'); ?>
                </div>
            <?php endif; ?>
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name of Coffee</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kopi as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $k['image']; ?>" alt="" class="picture"></td>
                            <td><?= $k['name']; ?></td>
                            <td>
                                <a href="/kopi/<?= $k['slug']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="/kopi/create" class="btn btn-primary mt-1">Tambah Data Kopi</a>
</div>

<?= $this->endSection(); ?>