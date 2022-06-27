<?php
    $uri        =   new \CodeIgniter\HTTP\URI(current_url());
    $session    =   session();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $this->renderSection('title') ?></title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">

        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">

        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">

        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">

        <!-- Toastr -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/toastr/toastr.min.css') ?>">

        <?= $this->renderSection('css') ?>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="<?= base_url('assets/dist/img/AdminLTELogo.png') ?>" alt="AdminLTELogo" height="60" width="60">
            </div>

            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="javascript:void(0)" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="javascript:void(0)" role="button">
                        <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                </ul>
            </nav>

            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="<?= base_url('cms/dashboard') ?>" class="brand-link">
                    <img src="<?= base_url('assets/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">AdminLTE 3</span>
                </a>

                <div class="sidebar">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <?php
                                if($session->image == NULL) {
                                    if($session->gender == '1') {
                            ?>
                                        <img src="<?= base_url('assets/images/male.png') ?>" class="img-circle elevation-2" alt="User Image">
                            <?php
                                    } else {
                            ?>
                                        <img src="<?= base_url('assets/images/female.png') ?>" class="img-circle elevation-2" alt="User Image">
                            <?php
                                    }
                                }
                            ?>
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"><?= $session->fullname ?></a>
                        </div>
                    </div>

                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="<?= base_url('cms/dashboard') ?>" class="nav-link <?php if($uri->getSegment(2) == "dashboard") { echo 'active'; } ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('cms/user') ?>" class="nav-link <?php if($uri->getSegment(2) == "user") { echo 'active'; } ?>">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Data User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('cms/category') ?>" class="nav-link <?php if($uri->getSegment(2) == "category") { echo 'active'; } ?>">
                                    <i class="nav-icon fas fa-sitemap"></i>
                                    <p>Data Kategori</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('cms/article') ?>" class="nav-link <?php if($uri->getSegment(2) == "article") { echo 'active'; } ?>">
                                    <i class="nav-icon fas fa-newspaper"></i>
                                    <p>Data Artikel</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('logout') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>Logout</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0"><?= $this->renderSection('header') ?></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="content">
                    <div class="container-fluid">
                        <!-- Start Content -->
                        <?= $this->renderSection('content') ?>
                        <!-- End Content -->
                    </div>
                </section>
            </div>

            <footer class="main-footer">
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.2.0-rc
                </div>
            </footer>

            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
        </div>

        <!-- jQuery -->
        <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>

        <!-- jQuery UI 1.11.4 -->
        <script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>

        <!-- Bootstrap 4 -->
        <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

        <!-- overlayScrollbars -->
        <script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>

        <!-- AdminLTE App -->
        <script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url('assets/dist/js/demo.js') ?>"></script>

        <!-- Toastr -->
        <script src="<?= base_url('assets/plugins/toastr/toastr.min.js') ?>"></script>

        <?= $this->renderSection('js') ?>

        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>

        <?php
            if(session()->has('success')) {
        ?>

        <script type="text/javascript">
            $(function() {
                toastr.success('<?= session()->getFlashdata('success') ?>')
            });
        </script>

        <?php
            }
        ?>
    </body>
</html>
