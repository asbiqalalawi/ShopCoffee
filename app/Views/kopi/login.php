<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in | Kopi Lampung</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Kopi</b>Lampung</a>
        </div>
        <?= (session()->getFlashData('message')); ?>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="/home/loggedin" method='POST'>
                    <div class="input-group mb-3">
                        <input autocomplete="off" autofocus="on" type="text" name="email" id="email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : ''; ?>" value="<?= old('email'); ?>" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input autocomplete="off" autofocus="on" type="password" name="password" id="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <hr>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-0">
                    <a href="/home/signup" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
</body>

</html>





<!-- <style>
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
        <form action="/home/loggedin" method='POST'>
            <div class="form-group">
                <i class="fas fa-envelope" style="color:white"></i>
                <label for="email" style="color:white">Email</label>
                <input autocomplete="off" autofocus="on" type="text" name="email" id="email"
                </div>
            </div>
            <div class="form-group">
                <i class="fas fa-key" style="color:white"></i>
                <label for="password" style="color:white">Password</label>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-block">Sign In</button>
        </form>
    </div>
</div>
</div>