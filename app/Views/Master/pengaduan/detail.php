<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Informasi Data Pengaduan &mdash; SIDUPRAS</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">

    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('master/pengaduan') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Informasi Pengaduan</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Informasi Data Pengaduan</h4>
            </div>
            <div class="row justify-content-center">
                <div class="card-body col-md-6 ml-4">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="/images/<?= $pengaduan->pengaduan_foto; ?>" class="card-img" alt="..."><br><br>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title"><?= $pengaduan->pengaduan_isi; ?></h4>
                                <h5 class="card-title"><?= $data->sarpras_nama; ?></h5>
                                <h6 class="card-title"><span>Kategori : <?= $data->kategori_nama; ?></span></h6>
                                <p class="card-title"><span class="text">Dilaporkan oleh : <?= $data->warga_nama; ?></span>
                                <p class="card-title"><span class="text">Tanggal Pelaporan : <?= date('d F Y', strtotime($pengaduan->created_at))  ?></span></p>
                                <p class="card-title"><span class="text">Status : <?= $pengaduan->pengaduan_status; ?></span></p>
                            </div>
                            <div class="card-footer justify-content-center text-right">
                                <a href="<?= site_url('master/pengaduan/' . $pengaduan->pengaduan_id . '/edit'); ?>" class="btn btn-success" data-bs-target="#editModal">
                                    Tanggapi</a>
                                <a href="<?= site_url('master/pengaduan/' . $pengaduan->pengaduan_id . '/hapus'); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data Pengaduan?')" class="btn btn-danger">
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