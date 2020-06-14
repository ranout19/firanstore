<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Firan store | <?= $this->userlogin->user_login()->level == 1 ? 'Admin' : 'Cashier' ?></title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="<?=base_url()?>assets/firan.png" type="image/x-icon" />
        <link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/plugins/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/plugins/mohithg-switchery/dist/switchery.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/plugins/c3/c3.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/theme.min.css">
        <script>window.jQuery || document.write('<script src="<?=base_url()?>assets/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="<?=base_url()?>assets/src/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <style type="text/css">
            @font-face{
                font-family: semua;
                src:url(<?=base_url()?>assets/font/Montserrat-Regular.ttf);
            }
            *{
                font-family: semua;
            }
            .wrapper .page-wrap .app-sidebar .sidebar-content .nav-container .navigation-main .nav-item.active::after {
                background: #576a3d;
                border-radius: 7px !important;
                color: #fff;
                content: " ";
                height: 51px !important;
                left: 0;
                top: 0px !important;
                position: absolute;
                width: 3px;
            }
            .custom-control-label::before {
                top: 0px !important;
            }
            .custom-checkbox .custom-control-input:checked ~ .custom-control-label::after {
                top: 1px !important;
            }
            .wrapper .page-wrap .main-content .page-header .page-header-title h5{
                margin-left: -10px !important;
                font-size: 15px !important;
            }
            .wrapper .page-wrap .main-content .page-header .page-header-title i{
                color: black !important;
                box-shadow: none !important;
                margin-top: -11px;
                margin-left: -4px;
                margin-right: 0px;
                font-weight: 600;
            }
            .nav-item .active{
                color: #fff !important;
            }
            .wrapper .page-wrap .app-sidebar.colored .sidebar-content .nav-container .navigation-main .nav-item.open::after, .wrapper .page-wrap .app-sidebar.colored .sidebar-content .nav-container .navigation-main .nav-item.active::after{
                color: #2dce89 !important;
                background: #2dce89 !important;
            }
            .formdata{
                margin-left: 30%;
            }
            @media only screen and (max-width: 600px){
                .formdata{
                    margin-left: 0% !important;
                }
                .wrapper .page-wrap .main-content .page-header .breadcrumb-container .breadcrumb{
                    margin-top: -40px; 
                }
                .wrapper .page-wrap .main-content .page-header .page-header-title i{
                    margin-top: -11px;
                }
                .wrapper .page-wrap .main-content .page-header .page-header-title h5{
                    margin-top: 12px;
                }
                #navbar-fullscreen{
                    display: none !important;
                }
                .table-actions i.ik{
                    right: -38px !important;
                }
                .item i.ik{
                    display: block !important;
                }
                .item i.ik{
                    right: -219px !important;
                }

            }
            .wrapper .page-wrap .app-sidebar.colored .sidebar-content {
                background-color: #262e3c !important;
            }
            .wrapper .page-wrap .app-sidebar.colored .sidebar-content .nav-container .navigation-main .nav-item .submenu-content {
                background-color: #2d374a !important;
            }
            .wrapper .page-wrap .app-sidebar .sidebar-content .nav-container .navigation-main .nav-lavel{
                background: #1b212b !important;
            }
            .table thead, .table thead th{
                background-color: #f4f4f4;
                color: #383838d4 !important;
            }
            .wrapper .page-wrap .main-content{
                background-color: #f0f0f0 !important;
            }
            .wrapper .page-wrap .app-sidebar.colored .sidebar-header {
                background-color: #11151b;
            }
            .error p{
                font-size: 11px;
                color: red;
            }
            .errorform{
                border : 1px solid red !important;
            }
            .labelerror{
                color: red !important;
            }
            .page-header{
                margin-bottom: 20px !important;
            }
            .page-header .align-items-end{
                margin-top: -10px !important;
            }
            .form-control[readonly] {
                background-color: #f0f0f0  !important;
                opacity: 1;
            }
            .wrapper .page-wrap .app-sidebar.colored .sidebar-content .nav-container .navigation-main .nav-item a {
                color: #ffffffcf;
            }
            .wrapper .page-wrap .app-sidebar.colored .sidebar-content .nav-container .navigation-main .nav-item a .ik {
                color: #ffffffcf;
            }
            .nav-item:hover{
                background-color: #222935;
            }
            .nav-item:hover a, .nav-item:hover a .ik{
                color: #fff !important;
            }
            .nav-item.active{
                background-color: #222935;
                color: #fff !important;
            }
            .wrapper .page-wrap .app-sidebar.colored .sidebar-content .nav-container .navigation-main .nav-item.active a,
            .wrapper .page-wrap .app-sidebar.colored .sidebar-content .nav-container .navigation-main .nav-item.active a .ik{
                color: #fff !important;
            }
            .nav-item.has-sub:hover .submenu-content .menu-item p .nav-item.has-sub:hover .submenu-content .menu-item i.ik{
                color: #ffffffcf !important;
            }
            .submenu-content .menu-item.active p, .submenu-content .menu-item.active .ik{
                color: #fff !important;
            }
            .submenu-content .menu-item p, .submenu-content .menu-item .ik {
                color: #ffffffcf !important;
            }
            .input-group>.custom-select:not(:first-child), .input-group>.form-control:not(:first-child) {
                border-top-left-radius: 4px;
                border-bottom-left-radius: 4px;
            }
            .input-group>.custom-select:not(:last-child), .input-group>.form-control:not(:last-child) {
                border-top-left-radius: 4px;
                border-bottom-left-radius: 4px;
            }
            .btn.focus, .btn:focus {
                box-shadow: none;
            }
        </style>
    </head>

    <body>


        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="loginsucces" data-flashdata="<?=$this->session->flashdata('loginsuccess')?>"></div>
        <div class="wrapper <?=$this->uri->segment(1) == 'transaction' ? 'nav-collapsed menu-collapsed' : ''?>">
            <header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                            <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                        </div>
                        <div class="top-menu d-flex align-items-center">

                            <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span><?=$this->userlogin->user_login()->level == 1 ? 'Admin' : 'Chasier'?></span>
                            <div class="dropdown"><button type="button" class="nav-link"><i class="ik ik-user"></i></button></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="<?= site_url('profile') ?>"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                    <a class="dropdown-item logout" href="<?= site_url('auth/logout') ?>"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>

            <div class="page-wrap">
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="<?=base_url('dashboard') ?>">
                            <div class="logo-img">
                               <img src="<?=base_url()?>assets/firanwhite.png" class="header-brand-img" alt="Firan Store" style="width: 20px; margin-left: 5px;"><span style="color: #4257ff">.</span>
                            </div>
                        </a>
                        <?php 
                            if ($this->uri->segment(1) != 'transaction') { ?>     
                            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <?php
                            }
                        ?>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                                <div class="nav-lavel">Main</div>
                                <div class="nav-item <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
                                    <a href="<?=site_url('dashboard')?>"><i class="ik ik-layers"></i><span>Dashboard</span></a>
                                </div>
                                <div class="nav-item <?= $this->uri->segment(1) == 'transaction' ? 'active' : '' ?>">
                                    <a href="<?=site_url('transaction')?>"><i class="ik ik-shopping-cart"></i><span>Transaction</span></a>
                                </div>
                                <div class="nav-item <?= $this->uri->segment(1) == 'payment' ? 'active' : '' ?>">
                                    <a href="<?=site_url('payment')?>"><i class="ik ik-dollar-sign"></i><span>Payment</span></a>
                                </div>
                                <?php if ($this->userlogin->user_login()->level == 1) { ?>
                                <div class="nav-item <?= $this->uri->segment(1) == 'supplier' ? 'active' : '' ?>">
                                    <a href="<?=site_url('supplier')?>"><i class="ik ik-truck"></i><span>Supplier</span></a>
                                </div>
                                <div class="nav-item <?= $this->uri->segment(1) == 'costumer' ? 'active' : '' ?>">
                                    <a href="<?=site_url('costumer')?>"><i class="ik ik-users"></i><span>Costumer</span></a>
                                </div>
                                <div class="nav-item has-sub <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'item' ? 'active open' : '' ?>">
                                    <a href="#"><i class="ik ik-shopping-bag"></i><span>Product</span></a>
                                    <div class="submenu-content">
                                        <a href="<?=site_url('category')?>" class="menu-item <?= $this->uri->segment(1) == 'category' ? 'active' : '' ?>" style="<?= $this->uri->segment(1) == 'category' ? 'color: #fff' : 'color: #cecdcd' ?>;"><i class="ik ik-disc" style=" font-size: 13px; position: absolute; top: 13px; <?= $this->uri->segment(1) == 'category' ? 'color: #fff' : 'color: #cecdcd' ?>;"></i><p style="font-size: 13px; margin-left: 20px; margin-bottom: 0;">Category</p></a>

                                        <a href="<?=site_url('unit')?>" class="menu-item <?= $this->uri->segment(1) == 'unit' ? 'active' : '' ?>" style="<?= $this->uri->segment(1) == 'unit' ? 'color: #fff' : 'color: #cecdcd' ?>;"><i class="ik ik-disc" style=" font-size: 13px; position: absolute; top: 13px; <?= $this->uri->segment(1) == 'unit' ? 'color: #fff' : 'color: #cecdcd' ?>;"></i><p style="font-size: 13px; margin-left: 20px; margin-bottom: 0;">Unit</p></a>

                                        <a href="<?=site_url('item')?>" class="menu-item <?= $this->uri->segment(1) == 'item' ? 'active' : '' ?>" style="<?= $this->uri->segment(1) == 'item' ? 'color: #fff' : 'color: #cecdcd' ?>;"><i class="ik ik-disc" style=" font-size: 13px; position: absolute; top: 13px; <?= $this->uri->segment(1) == 'item' ? 'color: #fff' : 'color: #cecdcd' ?>;"></i><p style="font-size: 13px; margin-left: 20px; margin-bottom: 0;">Item</p></a>
                                    </div>
                                </div>
                                <div class="nav-item has-sub <?= $this->uri->segment(1) == 'stock' || $this->uri->segment(2) == 'in' || $this->uri->segment(2) == 'out' ? 'active open' : '' ?>">
                                    <a href="#"><i class="ik ik-package"></i><span>Stock</span></a>
                                    <div class="submenu-content">
                                        <a href="<?=base_url('stock/in')?>" class="menu-item <?= $this->uri->segment(2) == 'in' ? 'active' : '' ?>" style="<?= $this->uri->segment(2) == 'in' ? 'color: #fff' : 'color: #cecdcd' ?>;"><i class="ik ik-disc" style=" font-size: 13px; position: absolute; top: 13px; <?= $this->uri->segment(2) == 'in' ? 'color: #fff' : 'color: #cecdcd' ?>;"></i><p style="font-size: 13px; margin-left: 20px; margin-bottom: 0;">Stock In</p></a>

                                        <a href="<?=base_url('stock/out')?>" class="menu-item <?= $this->uri->segment(2) == 'out' ? 'active' : '' ?>"><i class="ik ik-disc" style=" font-size: 13px; position: absolute; top: 13px;"></i><p style="font-size: 13px; margin-left: 20px; margin-bottom: 0;">Stock Out</p></a>
                                    </div>
                                </div>
                                <div class="nav-lavel">Administrator</div>
                                <div class="nav-item <?= $this->uri->segment(1) == 'user' ? 'active' : '' ?>">
                                    <a href="<?=site_url('user')?>"><i class="ik ik-user-check"></i><span>User</span></a>
                                </div>
                                <?php } ?>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="container-fluid">
                    <?= $contents; ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?=base_url()?>assets/js/sweetalert.js"></script>     
        <script src="<?=base_url()?>assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/select2/dist/js/select2.min.js"></script>
        <script src="<?=base_url()?>assets/js/sweetalert.js"></script>
        <script src="<?=base_url()?>assets/plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/screenfull/dist/screenfull.js"></script>
        <script src="<?=base_url()?>assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/moment/moment.js"></script>
        <script src="<?=base_url()?>assets/js/datatables.js"></script>
        <script src="<?=base_url()?>assets/js/widgets.js"></script>
        <script src="<?=base_url()?>assets/js/form-advanced.js"></script>
        <script src="<?=base_url()?>assets/js/form-components.js"></script>
        
        <script src="<?=base_url()?>assets/plugins/amcharts/amcharts.js"></script>
        <script src="<?=base_url()?>assets/plugins/amcharts/gauge.js"></script>
        <script src="<?=base_url()?>assets/plugins/amcharts/serial.js"></script>
        <script src="<?=base_url()?>assets/plugins/amcharts/themes/light.js"></script>
        <script src="<?=base_url()?>assets/plugins/amcharts/animate.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/amcharts/pie.js"></script>
        <script src="<?=base_url()?>assets/plugins/ammap3/ammap/ammap.js"></script>
        <script src="<?=base_url()?>assets/plugins/ammap3/ammap/maps/js/usaLow.js"></script>
        <script src="<?=base_url()?>assets/dist/js/theme.min.js"></script>
        <script src="<?=base_url()?>assets/js/chart-amcharts.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $(".select2").select2();
        })
        </script>
    </body>
</html>
