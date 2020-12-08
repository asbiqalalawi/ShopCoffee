<?= $this->extend('layouts/temp_admin'); ?>

<?= $this->section('content'); ?>

<div class="container" style="margin-top: 40px;">
    <nav aria-label="breadcrumb" class="brdcrmb shadow rounded">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/kopi">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </nav>
    <div class="containers shadow p-3 mb-5 rounded">
        <div class="body-img shadow rounded">
            <img src="/img/<?= $kopi['image']; ?>" class="card-img" alt="...">
        </div>
    </div>
    <div class="card-detail border-top shadow-sm p-3 mb-5 rounded">
        <div class="form-group row" style="margin-bottom: -2px;">
            <div class="col">
                <h5 class="card-title"><?= $kopi['name']; ?></h5>
            </div>
            <div class="col">
                <p class="card-text mt-2 float-right" style="font-size: 1.1rem;">Rp. <?= $kopi['harga']; ?></p>
            </div>
        </div>
        <div class="container border-top">
            <div class="s">
                <p class="card-text mt-2 stck"><?= $kopi['stock']; ?></p>
                <h5 class="stok">Stok</h5>
            </div>
            <p class="card-text mt-2"><?= $kopi['deskripsi']; ?></p>
        </div>
        <div class="form-group row">
            <div class="col mt-3">
                <form action="/kopi/<?= $kopi['id']; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-outline-danger ml-2 float-right" onclick="return confirm('apakah anda yakin?')">Delete</button>
                </form>
                <a href="/kopi/edit/<?= $kopi['slug']; ?>" class="btn btn-outline-warning float-right">Edit</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>