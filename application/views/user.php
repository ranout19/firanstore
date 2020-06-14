<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>myPOS | Login</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="<?=base_url()?>assets/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/theme.min.css">
        <script src="<?=base_url()?>assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <script src="<?=base_url()?>assets/src/js/vendor/modernizr-2.8.3.min.js"></script>
        <style type="text/css">
            @font-face{
                font-family: semua;
                src:url(<?=base_url()?>assets/font/Montserrat-Regular.ttf);
            }
            *{
                font-family: semua;
            }
            .auth-wrapper .authentication-form{
                padding: 50px 0 !important;
            }
            @media only screen and (max-width: 600px){
                .col-md-4{
                    padding: 2rem !important;
                }
            }
        </style>
    </head>

    <body class="bg-default">
        <div class="loginfail" data-flashdata="<?=$this->session->flashdata('loginfail')?>"></div>
        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-default" style="margin-top: 70px;">
                    <div class="col-md-4">
                    	<a href="<?=site_url('auth/login')?>">
	                        <div class="card" style="margin-top: 70px;">
	                            <div class="authentication-form mx-auto">
		                            <div class="logo-centered">
		                            	<img src="<?=base_url()?>assets/src/img/brand.svg" alt="" style="margin-bottom: -40px;">
		                            </div>
		                            <h3 class="text-center">Apoteker</h3>
		                        </div>
	                        </div>
                    	</a>
                    </div>
                    <div class="col-md-4">
                    	<a href="<?=site_url('auth/login')?>">
	                        <div class="card" style="margin-top: 70px;">
	                            <div class="authentication-form mx-auto">
		                            <div class="logo-centered"><img src="<?=base_url()?>assets/src/img/brand.svg" alt="" style="margin-bottom: -40px;">
		                            </div>
		                            <h3 class="text-center">Dokter</h3>
		                        </div>
	                        </div>
                    	</a>
                    </div>
                    <div class="col-md-4">
                    	<a href="<?=site_url('auth/login')?>">
	                        <div class="card" style="margin-top: 70px;">
	                            <div class="authentication-form mx-auto">
		                            <div class="logo-centered"><img src="<?=base_url()?>assets/src/img/brand.svg" alt="" style="margin-bottom: -40px;">
		                            </div>
		                            <h3 class="text-center">Receiptionist</h3>
		                        </div>
	                        </div>
                    	</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?=base_url()?>assets/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="<?=base_url()?>assets/js/sweetalert.js"></script>
        <script src="<?=base_url()?>assets/plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/screenfull/dist/screenfull.js"></script>
        <script src="<?=base_url()?>assets/dist/js/theme.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>