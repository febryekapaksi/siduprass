<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?= $this->renderSection('title') ?>

    <!-- Bootstrap -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="<?= base_url(); ?>/home_template/assets/css/nucleo-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/home_template/assets/css/font-awesome.css" rel="stylesheet">

    <!-- Jquery UI -->
    <link type="text/css" href="<?= base_url(); ?>/home_template/assets/css/jquery-ui.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="<?= base_url(); ?>/home_template/assets/css/argon-design-system.min.css" rel="stylesheet">
    <link type="text/css" href="<?= base_url(); ?>/home_template/assets/js/plugins/perfect-scrollbar.jquery.min.js">


    <!-- Main CSS-->
    <link type="text/css" href="<?= base_url(); ?>/home_template/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/components.css">

    <!-- Optional Plugins-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- leaflet plugnins -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="<?php base_url() ?>/home_template/assets/js/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header clearfix bg-primary">
        <div class="top-bar d-none d-sm-block bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-6 text-left">
                        <ul class="top-links contact-info">
                            <li><i class="fa fa-calendar-o"></i> <span id="haritanggal"></span> </li>
                            <li><i class="fa fa-clock-o"></i>

                                <body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
                                    <span id="clock"></span>
                                </body>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 text-right">
                        <ul class="top-links account-links">
                            <?php if ($warga_nama == '') { ?>
                                <li><i class="fa fa-user-circle-o"></i> <a href="#">Account</a></li>
                                <li><i class="fa fa-power-off"></i> <a href="<?= base_url('LoginWarga'); ?>">Login</a></li>
                            <?php } else { ?>
                                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                        <i class="fa fa-user-circle-o"></i>
                                        <div class="d-sm-none d-lg-inline-block">Hallo, <?= $warga_nama; ?> </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-title text-dark"></div>
                                        <a href="#" class="dropdown-item has-icon text-dark">
                                            <i class="fa fa-user" style="color: black;"></i> Profile
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="<?= base_url('home/LoginWarga/logout'); ?>" class="dropdown-item has-icon text-danger">
                                            <i class="fa fa-sign-out-alt" style="color: black;"></i> Logout
                                        </a>
                                    </div>
                                </li>
                            <?php   } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-12 col-sm-6">
                        <div class="sidebar-brand">
                            <img src="/images/siduprasputih.png" alt="logo" width="200" class="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-12 col-sm-6">
                        <form action="#" class="search">
                            <div class="input-group w-100">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-matcha" type="submit">
                                        <i class="fa fa-search" style="color: #fff;"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="col-lg-2 col-12 col-sm-6">
                        <div class="right-icons pull-right d-none d-lg-block">
                            <div class="single-icon wishlist">
                                <a href="#"><i class="fa fa-bell fa-2x" style="color: #fff;"></i></a>
                                <span class="badge badge-default">5</span>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom bg-matcha">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?= site_url('home') ?>">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?= site_url('home/aduan') ?>">Pengaduan</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">DAFTAR SARANA DAN PRASARANA</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/dafpras/bangunan">Bangunan Desa</a>
                                <a class="dropdown-item" href="/dafpras/transportasi">Transportasi Desa</a>
                                <a class="dropdown-item" href="/dafpras/telekomunikasi">Telekomunikasi Desa</a>
                                <a class="dropdown-item" href="/dafpras/pendukung">Pendukung Ekonomi Desa</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('home/tentang') ?>">Tentang</a>
                        </li>
                    </ul>
                </div> <!-- collapse .// -->
            </div> <!-- container .// -->
        </nav>
    </header>
    <!------------------------------------------
    SLIDER
    ------------------------------------------->

    <?= $this->renderSection('content'); ?>

    <footer class="footer bg-primary">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer about">
                            <div class="footer-brand">
                                <img src="/images/siduprasputih.png" alt="logo" width="150" class="">
                            </div>
                            <p class="text">Sistem Pengaduan Sarana dan Prasarana<br>
                                Kantor Desa Nglumut</p>
                            <p class="call">Butuh Bantuan? Hubungi<span>Nomor Siapa</a></span></p>
                        </div>
                        <!-- End Single Widget -->
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>Kantor Desa Nglumut</h4>
                            <ul>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i> RT:08/RW:03, Dusun Tegalrejo, Desa Nglumut, Kec. Srumbung, Kab. Magelang.
                                </li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i> No telp kantor</li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i> desa_nglumut@gmail.com</li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="copyright-inner border-top">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="left">
                                <p>Copyright © 2022 SIDUPRAS -
                                    All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Core -->
    <script src="<?= base_url(); ?>/home_template/assets/js/core/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/home_template/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url(); ?>/home_template/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/home_template/assets/js/core/jquery-ui.min.js"></script>

    <!-- Optional plugins -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Argon JS -->
    <script src="<?= base_url(); ?>/home_template/assets/js/argon-design-system.js"></script>

    <!-- JS Tambahan -->
    <script>
        var tw = new Date();
        if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
        else(a = tw.getTime());
        tw.setTime(a);
        var tahun = tw.getFullYear();
        var hari = tw.getDay();
        var bulan = tw.getMonth();
        var tanggal = tw.getDate();
        var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
        var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
        document.getElementById("haritanggal").innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] + " " + tahun;
    </script>

    <script>
        //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
        function tampilkanwaktu() {
            //buat object date berdasarkan waktu saat ini
            var waktu = new Date();
            //ambil nilai jam, 
            //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length
            var sh = waktu.getHours() + "";
            //ambil nilai menit
            var sm = waktu.getMinutes() + "";
            //ambil nilai detik
            var ss = waktu.getSeconds() + "";
            //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
            document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var map = L.map('map').setView([-7.6155239, 110.3503627], 13);

        var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);

        var marker = L.marker([-7.6155239, 110.3503627]).addTo(map)
            .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

        var popup = L.popup()

        function onMapClick(e) {
            $('#lat').val(e.latlng.lat)
            $('#long').val(e.latlng.lng)

            popup
                .setLatLng(e.latlng)
                .setContent('You clicked the map at ' + e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onMapClick);
    </script>

    <script>
        var hide = document.getElementById("map");
        hide.style.display = "none";
    </script>

    <script>
        function showMap() {
            var show = document.getElementById("map");
            if (show.style.display == "none") {
                show.style.display = "block";
            } else {
                show.style.display = "none";
            }
        }
    </script>

    <script>
        function previewImg() {

            const gambar = document.querySelector('#pengaduan_foto');
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

    <!-- Main JS-->
    <script src="<?= base_url(); ?>/home_template/assets/js/main.js"></script>

</body>

</html>