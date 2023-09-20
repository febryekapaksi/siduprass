<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Profil &mdash; SIDUPRAS</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">

    <div class="section-header">
        <h1>Profil Anda</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Informasi</h4>
            </div>
            <div class="row justify-content-center">
                <div class="card-body col-md-6 ml-4">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="/images/<?= $user_image ?>" class="card-img" alt="..."><br><br>
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title"><?= $user_name ?></h5>
                            <h6 class="card-title"><span><?= $user_email ?> </span></h6>
                            <p class="card-title"><span class="text">Nomor Telepon : <?= $user_notelp ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>