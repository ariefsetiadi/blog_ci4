<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Form Login</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">

        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">

        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">

        <!-- Toastr -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/toastr/toastr.min.css') ?>">
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="<?= base_url('/') ?>" class="h1">Form Login</a>
                </div>

                <?php $validation = \Config\Services::validation(); ?>

                <div class="card-body">
                    <form action="<?= base_url('login/auth') ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="username" id="username" class="form-control <?php if($validation->getError('username')){ echo 'is-invalid'; } ?>" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            <?php if($validation->getError('username')): ?>
                                <span class="error invalid-feedback">
                                    <?= $validation->getError('username') ?>
                                </span>                                
                            <?php endif; ?>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control <?php if($validation->getError('password')){ echo 'is-invalid'; } ?>" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <?php if($validation->getError('password')): ?>
                                <span class="error invalid-feedback">
                                    <?= $validation->getError('password') ?>
                                </span>                                
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>

        <!-- Bootstrap 4 -->
        <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

        <!-- AdminLTE App -->
        <script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>

        <!-- Toastr -->
        <script src="<?= base_url('assets/plugins/toastr/toastr.min.js') ?>"></script>

        <?php
            if(session()->has('message')) {
        ?>

        <script type="text/javascript">
            $(function() {
                toastr.error('<?= session()->getFlashdata('message') ?>')
            });
        </script>

        <?php
            }
        ?>
    </body>
</html>
