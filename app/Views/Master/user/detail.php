<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Informasi User &mdash; SIDUPRAS</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">

    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('master/user') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Informasi User</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Informasi Data User</h4>
            </div>
            <div class="row justify-content-center">
                <div class="card-body col-md-6 ml-4">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="/images/<?= $user->user_image ?>" class="card-img" alt=""><br><br>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $user->user_name ?></h5>
                                <h6 class="card-title"><span><?= $user->user_email ?></span></h6>
                                <p class="card-title"><span class="text">Nomor Telepon : <?= $user->user_notelp ?></span>
                                <p class="card-title"><span class="text">Hak Akses : <?= $role->role_name ?></span></p>
                                <p class="card-title"><span class="text">Terdaftar Sejak : <?= date('d F Y', strtotime($user->user_created))  ?></span></p>
                            </div>
                            <div class="card-footer justify-content-center text-right">
                                <a href="<?= site_url('master/user/' . $user->user_id . '/edit'); ?>" class="btn btn-success" data-bs-target="#editModal">
                                    Edit</a>
                                <a href="<?= site_url('master/user/' . $user->user_id . '/hapus'); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data User?')" class="btn btn-danger">
                                    Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>