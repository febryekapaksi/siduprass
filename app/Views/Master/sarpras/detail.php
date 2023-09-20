<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Informasi Sarpras &mdash; SIDUPRAS</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">

    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('master/sarpras') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Informasi Sarana dan Prasana</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Informasi Data Sarpras</h4>
            </div>
            <div class="row justify-content-center">
                <div class="card-body col-md-6 ml-4">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="/images/<?= $sarpras->sarpras_gambar ?>" class="card-img" alt="..."><br><br>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $sarpras->sarpras_nama ?></h5>
                                <h6 class="card-title"><span><?= $kategori->kategori_nama ?></h6>
                                <p class="card-title"><span class="text">Keterangan : <?= $sarpras->sarpras_ket ?></span>
                            </div>
                            <div class="card-footer justify-content-center text-right">
                                <a href="<?= site_url('master/sarpras/' . $sarpras->sarpras_id . '/edit'); ?>" class="btn btn-success" data-bs-target="#editModal">
                                    Edit</a>
                                <a href="<?= site_url('master/sarpras/' . $sarpras->sarpras_id . '/hapus'); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data?')" class="btn btn-danger">
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