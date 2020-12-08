<?= $this->extend('layouts/temp_admin'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="container-list shadow bg-white rounded">
        <div class="content mx-3">
            <div class="row">
                <div class="col">
                    <p class="dk mt-3">Daftar Pesanan</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id.Pesanan</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Kopi</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pesanan as $p) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $k['username']; ?></td>
                                    <td><?= $k['email']; ?></td>
                                    <td><?= $k['name']; ?></td>
                                    <td><?= $k['jumlah']; ?></td>
                                    <td><?= $k['harga']; ?></td>
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