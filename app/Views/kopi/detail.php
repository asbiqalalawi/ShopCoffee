<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Komik</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $kopi['image']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $kopi['name']; ?></h5>
                            <p class="card-text"><?= $kopi['deskripsi']; ?></p>

                            <a href="/kopi/edit/<?= $kopi['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/kopi/<?= $kopi['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                            </form>

                            <br>
                            <a href="/kopi">Back to List Coffee</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>