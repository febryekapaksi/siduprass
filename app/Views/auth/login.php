<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <?= $this->renderSection('title') ?>
    <title>Login Admin &mdash; SIDUPRAS</title>
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
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="/images/sidupras.png" alt="logo" width="200" class="">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login Admin</h4>
                            </div>

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

                            <div class="card-body">
                                <form method="POST" action="<?= site_url('master/LoginAdmin/login') ?>" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="user_email">Email *</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('user_email')) ?
                                                                                    'is-invalid' : ''; ?>" id="user_email" name="user_email" autofocus value="<?= old('user_email'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('user_email'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_password">Password *</label>
                                        <input type="password" class="form-control <?= ($validation->hasError('user_password')) ?
                                                                                        'is-invalid' : ''; ?>" id="user_password" name="user_password" autofocus value="<?= old('user_password'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('user_password'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; SIDUPRAS
                        </div>
                    </div>
                </div>
            </div>
        </section>
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

    <!-- Page Specific JS File -->
</body>

</html>