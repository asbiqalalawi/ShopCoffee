<?= $this->extend('layouts/adminlte'); ?>

<?= $this->section('sidebar'); ?>
<li class="nav-item">
    <a href="/Kopi" class="nav-link">
        <i class="nav-icon fas fa-coffee"></i>
        <p>
            Kopi
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-users"></i>
        <p>
            User
        </p>
    </a>
</li>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="container-list shadow bg-white rounded">
        <div class="content mx-3">
            <div class="row">
                <div class="col">
                    <div class="form-group row" style="margin-bottom: -7px;">
                        <div class="col">
                            <p class="dk mt-3">Daftar Pengguna</p>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Image</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Tanggal Registrasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($user as $k) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><img src="/img/<?= $k['image']; ?>" alt="" class="picture"></td>
                                    <td><?= $k['username']; ?></td>
                                    <td><?= $k['email']; ?></td>
                                    <td><?= ($k['role_id'] == 1 ? "Admin" : "Member"); ?></td>
                                    <td><?= $k['date_created']; ?></td>
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