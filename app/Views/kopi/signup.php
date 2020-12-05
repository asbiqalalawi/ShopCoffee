<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<style>
    body {
        background-color: lightblue;
    }

    .login {
        color: white;
    }
</style>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow mb-5 bg-white rounded">
        <a class="navbar-brand">Kopi Lampung</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link" href="/home/login">Login</a>
                <a class="nav-link active" href="/home/signup">Sign Up</a>
            </div>
        </div>
    </nav>
</div>

<div class="container">
    <div class="tile">
        <center>
            <i class="fas fa-user-friends" style="font-size:100px;color:white"></i>
            <h3 class="login">Sign Up</h3>
        </center>
        <form action="<?= base_url('auth/login') ?> " method='POST'>
            <div class="form-group">
                <i class="fas fa-user-tag" style="color:white"></i>
                <label for="" style="color:white">Your Name </label>
                <input autocomplete="off" autofocus="on" type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <i class="fas fa-envelope" style="color:white"></i>
                <label for="" style="color:white">Email </label>
                <input autocomplete="off" autofocus="on" type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <i class="fas fa-key" style="color:white"></i>
                <label for="" style="color:white">Password</label>
                <input autocomplete="off" autofocus="on" type="password" name="password1" id="password1" class="form-control">
            </div>
            <div class="form-group">
                <i class="fas fa-key" style="color:white"></i>
                <label for="" style="color:white">Confirm Password</label>
                <input autocomplete="off" autofocus="on" type="password" name="password2" id="password2" class="form-control">
            </div>
            <a href="/home/login" class="btn btn-outline-primary btn-block">Register</a>
        </form>
    </div>
</div>
</div>
<?= $this->endSection(); ?>