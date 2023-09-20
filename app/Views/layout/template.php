<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <?= $this->renderSection('title') ?>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php base_url(); ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php base_url(); ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php base_url(); ?>/template/node_modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?php base_url(); ?>/template/node_modules/weathericons/css/weather-icons.min.css">
    <link rel="stylesheet" href="<?php base_url(); ?>/template/node_modules/weathericons/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="<?php base_url(); ?>/template/node_modules/summernote/dist/summernote-bs4.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php base_url(); ?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?php base_url(); ?>/template/assets/css/components.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>

<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <!-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> -->
                </ul>
                <!-- searchbar -->
                <!-- <div class="search-element">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    <div class="search-backdrop"></div>
                    <div class="search-result">

                    </div>
                </div> -->
                <!-- end of searchbar -->
            </form>

            <ul class="navbar-nav navbar-right">
                <!-- navbar -->
                <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                        <div class="dropdown-header">Messages
                            <div class="float-right">
                                <a href="#">Mark All As Read</a>
                            </div>
                        </div>
                        <div class="dropdown-footer text-center">
                            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </li>
                <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                        <div class="dropdown-header">Notifications
                            <div class="float-right">
                                <a href="#">Mark All As Read</a>
                            </div>
                        </div>
                        <div class="dropdown-footer text-center">
                            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </li> -->
                <!-- end of navbar-->
                <!-- user option -->
                <li class="dropdown"><a href="" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="" src="/images/<?= $user_image ?>" class=" rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hallo, <?= $user_name ?></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title"></div>
                        <a href="<?= site_url('master/dashboard/profile') ?>" class="dropdown-item has-icon">
                            <i class="fas fa-user"></i> Profile
                        </a>
                        <!-- <a href="features-activities.html" class="dropdown-item has-icon">
                            <i class="fas fa-bolt"></i> Activities
                        </a>
                        <a href="features-settings.html" class="dropdown-item has-icon">
                            <i class="fas fa-cog"></i> Settings
                        </a> -->
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('master/LoginAdmin/logout') ?>" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
                <!-- end of user option -->
            </ul>
        </nav>
        <div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <div class="sidebar-brand">
                        <img src="/images/sidupras.png" alt="logo" width="150" class="">
                        <a href="<?= site_url('dashboard') ?>"></a>
                    </div>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="<?= site_url('dashboard') ?>">SP</a>
                </div>
                <ul class="sidebar-menu">
                    <?= $this->include('layout/menu') ?>
                </ul>
                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                    <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                        <i class="fas fa-rocket"></i> Upgrade to Pro!!!
                    </a>
                </div>
            </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <?= $this->renderSection('content') ?>
        </div>

        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2022 <div class="bullet"></div> SIDUPRAS By <a href="">febryekapaksi</a>
            </div>
            <div class="footer-right">
                v1.0
            </div>
        </footer>
    </div>
</div>



<!-- General JS Scripts -->
<script src="<?php base_url(); ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?php base_url(); ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php base_url(); ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
<script src="<?php base_url(); ?>/template/node_modules/moment/min/moment.min.js"></script>
<script src="<?php base_url(); ?>/template/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?php base_url(); ?>/template/node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
<script src="<?php base_url(); ?>/template/node_modules/chart.js/dist/Chart.min.js"></script>
<script src="<?php base_url(); ?>/template/node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?php base_url(); ?>/template/node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php base_url(); ?>/template/node_modules/summernote/dist/summernote-bs4.js"></script>
<script src="<?php base_url(); ?>/template/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<!-- Template JS File -->
<script src="<?php base_url(); ?>/template/assets/js/scripts.js"></script>
<script src="<?php base_url(); ?>/template/assets/js/custom.js"></script>


<?= $this->renderSection('scripts') ?>
<script>
    function previewImg() {

        const gambar = document.querySelector('#gambar');
        const gambarLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("fa fa-eye-slash");
                $('#show_hide_password i').removeClass("fa fa-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("fa fa-eye-slash");
                $('#show_hide_password i').addClass("fa fa-eye");
            }
        });
    });
</script>
</body>

</html>