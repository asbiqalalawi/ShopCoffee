<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <nav class="navbar navbar-light bg-light shadow mb-5 bg-white rounded">
        <a class="navbar-brand">Kopi Lampung</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="nav-bar float-right mt-3">
                <div class="navbar-nav" style="margin-right: 20px;">
                    <a class="nav-link" href="/user">Dashboard</a>
                    <a class="nav-link " href="/home/logout">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="container">
    <nav aria-label="breadcrumb" class="brdcrmb2 shadow rounded">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard /</li>
        </ol>
    </nav>
    <div class="container-list shadow bg-white rounded">
        <div class="content mx-3">
            <div class="row">
                <div class="col">
                    <p class="dk mt-3">Daftar Kopi</p>
                    <?php if (session()->getFlashData('message')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashData('message'); ?>
                        </div>
                    <?php endif; ?>
                    <table class="table mt-2">
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
                                        <a href="/user/<?= $k['slug']; ?>" class="btn btn-success">Detail</a>
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