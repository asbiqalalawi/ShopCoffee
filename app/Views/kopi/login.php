<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<style>
    body {
        background-color: #1a1a1a;
    }

    .login {
        color: white;
    }
</style>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow mb-5 bg-black rounded">
        <a class="navbar-brand">Kopi Lampung</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link active" href="/home/login">Login</a>
                <a class="nav-link" href="/home/signup">Sign Up</a>
            </div>
        </div>
    </nav>
</div>

<div class="container">
    <div class="tile">
        <center>
            <i class="fas fa-users" style="font-size:100px;color:white"></i>
            <h3 class="login">Login</h3>
        </center>
        <?= (session()->getFlashData('message')); ?>
        <form action="/home/loggedin" method='POST'>
            <div class="form-group">
                <i class="fas fa-envelope" style="color:white"></i>
                <label for="email" style="color:white">Email</label>
                <input autocomplete="off" autofocus="on" type="text" name="email" id="email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : ''; ?>" value="<?= old('email'); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>
            <div class="form-group">
                <i class="fas fa-key" style="color:white"></i>
                <label for="password" style="color:white">Password</label>
                <input autocomplete="off" autofocus="on" type="password" name="password" id="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= $validation->getError('password'); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-block">Sign In</button>
        </form>
    </div>
</div>
</div>
<?= $this->endSection(); ?>