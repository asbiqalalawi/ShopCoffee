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

<div class="container">
    <div class="row">
        <div class="col-6 mb-1">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                            <?php foreach ($kopi as $k) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><img src="/img/<?= $k['image']; ?>" alt="" class="picture"></td>
                                    <td><?= $k['name']; ?></td>
                                    <td>Rp. <?= $k['harga']; ?></td>
                                    <td><?= $k['stock']; ?></td>
                                    <td>
                                        <a href="/kopi/<?= $k['slug']; ?>" class="btn btn-success">Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?= $pager->links('kopi', 'kopi_pagination'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>