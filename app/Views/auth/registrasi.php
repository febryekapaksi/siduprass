<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrasi &mdash; SIDUPRAS</title>

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

<body class="register-page">
    <!-- Navbar -->
    <div class="wrapper">
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
            </div>
            <div class="container pt-lg-4">
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
                    <div class="col-lg-6">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-header bg-white pb-3">
                                <div class="row justify-content-center">
                                    <img src="/images/sidupras.png" alt="logo" width="200" align="center">
                                    <a href="">Sistem Pengaduan Sarana dan Prasarana</a>
                                </div>
                            </div>
                            <div class="card-body px-lg-3 py-lg-3">
                                <div class="text-center text-muted mb-3">
                                    <large>Form Registrasi</large>
                                </div>
                                <form method="POST" action="register/registrasi" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                                            </div>
                                            <input type="text" placeholder="Masukan NIK *" class="form-control <?= ($validation->hasError('warga_nik')) ?
                                                                                                                    'is-invalid' : ''; ?>" id="warga_nik" name="warga_nik" autofocus value="<?= old('warga_nik'); ?>">
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('warga_nik'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-street-view"></i></span>
                                            </div>
                                            <input type="text" placeholder="Nama Lengkap *" class="form-control <?= ($validation->hasError('warga_nama')) ?
                                                                                                                    'is-invalid' : ''; ?>" id="warga_nama" name="warga_nama" autofocus value="<?= old('warga_nama'); ?>">
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('warga_nama'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                            </div>
                                            <input type="email" placeholder="Masukan Email *" class="form-control <?= ($validation->hasError('warga_email')) ?
                                                                                                                        'is-invalid' : ''; ?>" id="warga_email" name="warga_email" autofocus value="<?= old('warga_email'); ?>">
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('warga_email'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row focused">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-eye-slash"></i></span>
                                                </div>
                                                <input type="password" placeholder="Masukan Password *" class="form-control <?= ($validation->hasError('warga_password')) ?
                                                                                                                                'is-invalid' : ''; ?>" id="warga_password" name="warga_password" autofocus value="<?= old('warga_password'); ?>">
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('warga_password'); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-eye-slash"></i></span>
                                                </div>
                                                <input type="password" placeholder="Ulangi Password *" class="form-control <?= ($validation->hasError('warga_password_conf')) ?
                                                                                                                                'is-invalid' : ''; ?>" id="warga_password_conf" name="warga_password_conf" autofocus value="<?= old('warga_password_conf'); ?>">
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('warga_password_conf'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-phone-square"></i></span>
                                            </div>
                                            <input type="text" placeholder="Masukan Nomor Telepon *" class="form-control <?= ($validation->hasError('warga_notelp')) ?
                                                                                                                                'is-invalid' : ''; ?>" id="warga_notelp" name="warga_notelp" autofocus value="<?= old('warga_notelp'); ?>">
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('warga_notelp'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-home"></i></span>
                                            </div>
                                            <textarea placeholder="Masukan Alamat *" class="form-control <?= ($validation->hasError('warga_alamat')) ?
                                                                                                                'is-invalid' : ''; ?>" id="warga_alamat" name="warga_alamat" autofocus value="<?= old('warga_alamat'); ?>"></textarea>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('warga_alamat'); ?>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-block mt-5">Daftar</button>
                                    </div>
                                    <div class="mt-5 text-muted text-center">
                                        Sudah punya akun? <a href="<?= base_url('LoginWarga') ?>">Login disini</a>
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
    </div>
    </div>
    </div>
    </section>
    </div>
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