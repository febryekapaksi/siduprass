<?= $this->extend('layout/beranda_template'); ?>

<?= $this->section('title') ?>
<title>Daftar Sarana dan Prasarana &mdash; SIDUPRAS</title>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<section class="slider-section pt-4 pb-4">
    <div class="container">
        <div class="slider-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2><?= $title; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($data as $key => $value) { ?>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="product-detail.html">
                                    <img src="/images/<?= $value->sarpras_gambar ?>" class="img-fluid" width="300px">
                                </a>
                            </div>
                            <div class="product-content">
                                <h4><?= $value->sarpras_nama ?></h4>
                                <div>
                                    <span><?= $value->sarpras_ket ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } ?>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>