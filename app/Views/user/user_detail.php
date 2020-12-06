<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container fixed-top">
    <nav class="navbar navbar-light bg-light shadow mb-5 bg-white rounded">
        <a class="navbar-brand">Kopi Lampung</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="nav-bar float-right mt-3">
                <div class="navbar-nav" style="margin-right: 20px;">
                    <a class="nav-link" href="/user">Dashboard</a>
                    <a class="nav-link " href="/home/login">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="container" style="margin-top: 105px;">
    <nav aria-label="breadcrumb" class="brdcrmb shadow rounded">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/user">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </nav>
    <div class="containers shadow p-3 mb-5 rounded">
        <div class="body-img shadow rounded">
            <img src="/img/<?= $kopi['image']; ?>" class="card-img" alt="...">
        </div>
    </div>
    <div class="card-detail border-top shadow-sm p-3 mb-5 rounded">
        <h5 class="card-title"><?= $kopi['name']; ?></h5>
        <div class="container border-top">
            <p class="card-text mt-2"><?= $kopi['stock']; ?></p>
            <p class="card-text mt-2"><?= $kopi['deskripsi']; ?></p>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>