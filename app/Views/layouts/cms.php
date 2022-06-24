<?php
    $uri        =   new \CodeIgniter\HTTP\URI(current_url());
    $session    =   session();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive">
        <meta name="author" content="Codedthemes">

        <title><?= $this->renderSection('title') ?></title>

        <!-- Favicon icon -->
        <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/favicon.ico') ?>">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700">

        <!-- Required Fremwork -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap/css/bootstrap.min.css') ?>">

        <!-- waves.css -->
        <link rel="stylesheet" type="text/css" media="all" href="<?= base_url('assets/pages/waves/css/waves.min.css') ?>">

        <!-- themify-icons line icon -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/icon/themify-icons/themify-icons.css') ?>">

        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/icon/font-awesome/css/font-awesome.min.css') ?>">

        <!-- ico font -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/icon/icofont/css/icofont.css') ?>">

        <!-- Style.css -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery.mCustomScrollbar.css') ?>">

        <?= $this->renderSection('css') ?>
    </head>

    <body>
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

        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">
                <nav class="navbar header-navbar pcoded-header">
                    <div class="navbar-wrapper">
                        <div class="navbar-logo">
                            <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="javascript:void(0)">
                                <i class="ti-menu"></i>
                            </a>
                            <div class="mobile-search waves-effect waves-light">
                                <div class="header-search">
                                    <div class="main-search morphsearch-search">
                                        <div class="input-group">
                                            <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                                            <input type="text" class="form-control" placeholder="Enter Keyword">
                                            <span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <img class="img-fluid" src="<?= base_url('assets/images/logo.png') ?>" alt="Theme-Logo">
                            </a>
                            <a class="mobile-options waves-effect waves-light">
                                <i class="ti-more"></i>
                            </a>
                        </div>

                        <div class="navbar-container container-fluid">
                            <ul class="nav-left">
                                <li>
                                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                        <i class="ti-fullscreen"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">
                        <nav class="pcoded-navbar">
                            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                            <div class="pcoded-inner-navbar main-menu">
                                <div class="">
                                    <div class="main-menu-header">
                                        <?php if($session->image == NULL) { ?>
                                            <?php if($session->gender == '1') { ?>
                                                <?= '<img class="img-80 img-radius" src="' . base_url('assets/images/male.png') . '" alt="User-Profile-Image">' ?>
                                            <?php } else { ?>
                                                <?= '<img class="img-80 img-radius" src="' . base_url('assets/images/female.png') . '" alt="User-Profile-Image">' ?>
                                            <?php } ?>
                                        <?php } ?>

                                        <div class="user-details">
                                            <span id="more-details"><?= $session->fullname ?><i class="fa fa-caret-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="main-menu-content">
                                        <ul>
                                            <li class="more-details">
                                                <a href="#"><i class="ti-user"></i>View Profile</a>
                                                <a href="#"><i class="ti-settings"></i>Settings</a>
                                                <a href="<?= base_url('logout') ?>"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <ul class="pcoded-item pcoded-left-item">
                                    <li <?php if($uri->getSegment(2) == "dashboard") { echo 'class="active"'; } ?>>
                                        <a href="<?= base_url('cms/dashboard') ?>" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                            <span class="pcoded-mtext">Dashboard</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>

                                <ul class="pcoded-item pcoded-left-item">
                                    <li <?php if($uri->getSegment(2) == "user") { echo 'class="active"'; } ?>>
                                        <a href="<?= base_url('cms/user') ?>" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-user"></i><b>U</b></span>
                                            <span class="pcoded-mtext">Data User</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>

                                <ul class="pcoded-item pcoded-left-item">
                                    <li <?php if($uri->getSegment(2) == "category") { echo 'class="active"'; } ?>>
                                        <a href="<?= base_url('cms/category') ?>" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="fa fa-sitemap"></i><b>K</b></span>
                                            <span class="pcoded-mtext">Data Kategori</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>

                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>BC</b></span>
                                            <span class="pcoded-mtext">Basic</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <a href="breadcrumb.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Breadcrumbs</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="button.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Button</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="accordion.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Accordion</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="tabs.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Tabs</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="color.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Color</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="label-badge.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Label Badge</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="tooltip.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Tooltip And Popover</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="typography.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Typography</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="notification.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Notifications</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="pcoded-content">
                            <!-- Page-header start -->
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="page-header-title">
                                                <h5 class="m-b-10"><?= $this->renderSection('title') ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Page-header end -->
                            <div class="pcoded-inner-content">
                                <!-- Main-body start -->
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <!-- Page-body start -->
                                        <div class="page-body">
                                            <!-- Start Content -->
                                            <?= $this->renderSection('content') ?>
                                            <!-- End Content -->
                                        </div>
                                        <!-- Page-body end -->
                                    </div>
                                </div>
                                <!-- Main-body end -->

                                <div id="styleSelector"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Required Jquery -->
        <script type="text/javascript" src="<?= base_url('assets/js/jquery/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery-ui/jquery-ui.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/popper.js/popper.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/bootstrap/js/bootstrap.min.js') ?>"></script>

        <!-- waves js -->
        <script src="<?= base_url('assets/pages/waves/js/waves.min.js') ?>"></script>

        <!-- jquery slimscroll js -->
        <script type="text/javascript" src="<?= base_url('assets/js/jquery-slimscroll/jquery.slimscroll.js') ?>"></script>

        <!-- Custom js -->
        <script src="<?= base_url('assets/js/pcoded.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/vertical/vertical-layout.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/script.js') ?>"></script>

        <?= $this->renderSection('js') ?>
    </body>
</html>
