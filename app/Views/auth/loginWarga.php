<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Selamat Datang di &mdash; SIDUPRAS</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="<?php base_url(); ?>/home_template/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?php base_url(); ?>/home_template/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="<?php base_url(); ?>/home_template/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php base_url(); ?>/home_template/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="<?php base_url(); ?>/home_template/assets/css/argon-design-system.css?v=1.2.2" rel="stylesheet" />
</head>

<body class="login-page">
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light py-2">
        <div class="container">
            <!-- <a class="navbar-brand mr-lg-5" href="../index.html">
                <img src="../assets/img/brand/white.png">
            </a> -->
        </div>
    </nav>
    <!-- End Navbar -->
    <section class="section section-shaped section-lg">
        <div class="shape shape-style-1 bg-gradient-default">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="container pt-lg-5">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <b>Sukses!!!</b>
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('gagal')) : ?>
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <b>Gagal:( </b>
                        <?= session()->getFlashdata('gagal'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-header bg-white pb-4">
                            <div class="row justify-content-center">
                                <img src="/images/sidupras.png" alt="logo" width="200" align="center">
                                <a href="">Sistem Pengaduan Sarana dan Prasarana</a>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-3">
                                <small>Masukan Email dan Password yang terdaftar</small>
                            </div>
                            <form method="POST" action="<?= site_url('home/LoginWarga/login') ?>">
                                <?= csrf_field(); ?>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                        </div>
                                        <input placeholder="Masukan Email *" type="text" class=" form-control" name="warga_email" ">
                                    </div>
                                </div>
                                <div class=" form-group focused">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-eye-slash"></i></span>
                                            </div>
                                            <input class="form-control" name="warga_password" placeholder="Masukan Password *" type="password">
                                        </div>
                                    </div>
                                    <!-- <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                    <label class="custom-control-label" for=" customCheckLogin"><span>Remember me</span></label>
                                </div> -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block my-4">Masuk</button>
                                    </div>
                                    <div class="mt-5 text-muted text-center">
                                        Belum punya akun? <a href="<?= base_url('register') ?>">Daftar disini</a>
                                    </div>
                            </form>
                        </div>
                    </div>


                    <div class="row justify-content-center">
                        <div class="copyright">
                            &copy; 2022 <a href="" target="_blank">SIDUPRAS</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--   Core JS Files   -->
    <script src="<?php base_url(); ?>/home_template/assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="<?php base_url(); ?>/home_template/assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?php base_url(); ?>/home_template/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php base_url(); ?>/home_template/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="<?php base_url(); ?>/home_template/assets/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?php base_url(); ?>/home_template/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <script src="<?php base_url(); ?>/home_template/assets/js/plugins/moment.min.js"></script>
    <script src="<?php base_url(); ?>/home_template/assets/js/plugins/datetimepicker.js" type="text/javascript"></script>
    <script src="<?php base_url(); ?>/home_template/assets/js/plugins/bootstrap-datepicker.min.js"></script>
    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <script src="<?php base_url(); ?>/home_template/assets/js/argon-design-system.min.js?v=1.2.2" type="text/javascript"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "argon-design-system-pro"
            });
    </script>
</body>

</html>