<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive">
        <meta name="author" content="Codedthemes">

        <title>Form Login</title>

        <!-- Favicon icon -->
        <link rel="icon" href="<?= base_url('assets/images/favicon.ico') ?>" type="image/x-icon">

        <!-- Google font-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">

        <!-- Required Fremwork -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap/css/bootstrap.min.css') ?>">

        <!-- waves.css -->
        <link rel="stylesheet" type="text/css" media="all" href="<?= base_url('assets/pages/waves/css/waves.min.css') ?>">

        <!-- themify-icons line icon -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/icon/themify-icons/themify-icons.css') ?>">

        <!-- ico font -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/icon/icofont/css/icofont.css') ?>">

        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/icon/font-awesome/css/font-awesome.min.css') ?>">

        <!-- Style.css -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
    </head>

    <body themebg-pattern="theme1">
        <!-- Pre-loader start -->
        <div class="theme-loader">
            <div class="loader-track">
                <div class="preloader-wrapper">
                    <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                    <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>

                    <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>

                    <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pre-loader end -->

        <section class="login-block">
            <!-- Container-fluid starts -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Authentication card start -->
                        <?php $validation = \Config\Services::validation(); ?>

                        <?php
                            if(session()->has('message')) {
                        ?>
                                <div class="alert alert-error alert-dismissible fade show" role="alert">
                                    <?= session()->getFlashdata('message') ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                        <?php
                            }
                        ?>

                        <form action="<?= base_url('login/auth') ?>" method="post" class="md-float-material form-material">
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Form Login</h3>
                                        </div>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="text" name="username" id="username" class="form-control">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Username</label>

                                        <?php if ($validation->getError('username')): ?>
                                            <div class="form-txt-danger">
                                                <?= $validation->getError('username') ?>
                                            </div>                                
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="password" name="password" id="password" class="form-control">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Password</label>

                                        <?php if ($validation->getError('password')): ?>
                                            <div class="form-txt-danger">
                                                <?= $validation->getError('password') ?>
                                            </div>                                
                                        <?php endif; ?>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">LOGIN</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- end of col-sm-12 -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container-fluid -->
        </section>

        <!-- Required Jquery -->
        <script type="text/javascript" src="<?= base_url('assets/js/jquery/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery-ui/jquery-ui.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/popper.js/popper.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/bootstrap/js/bootstrap.min.js') ?>"></script>

        <!-- waves js -->
        <script src="<?= base_url('assets/pages/waves/js/waves.min.js') ?>"></script>

        <!-- jquery slimscroll js -->
        <script type="text/javascript" src="<?= base_url('assets/js/jquery-slimscroll/jquery.slimscroll.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/common-pages.js') ?>"></script>
    </body>
</html>