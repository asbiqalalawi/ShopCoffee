<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Page | Kopi Lampung</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Kopi</b>Lampung</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="/home/register" method="post">
                    <div class="input-group mb-3">
                        <input autocomplete="off" autofocus="on" type="text" name="username" id="username" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : ''; ?>" value="<?= old('username'); ?>" placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
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
                        <input autocomplete="off" autofocus="on" type="password" name="password1" id="password1" class="form-control <?= $validation->hasError('password1') ? 'is-invalid' : ''; ?>" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('password1'); ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input autocomplete="off" autofocus="on" type="password" name="password2" id="password2" class="form-control <?= $validation->hasError('password2') ? 'is-invalid' : ''; ?>" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('password2'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <hr>
                </div>

                <a href="/home/login" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
</body>

</html>