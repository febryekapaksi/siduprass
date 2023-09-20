<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Tanggapan &mdash; SIDUPRAS</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">


    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('master/pengaduan') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tanggapan Pengaduan</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Form Tanggapan</h4>
            </div>
            <div class="row justify-content-center">
                <div class="card-body col-md-6 ml-4">
                    <form action="<?= site_url('master/pengaduan/' . $pengaduan->pengaduan_id . '/update') ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="user_id" value="<?= $user_id ?>">
                        <input type="hidden" name="gambarLama" value="<?= $pengaduan->pengaduan_foto ?>">
                        <div class="form-group">
                            <label>Tentukan Status *</label>
                            <select name="pengaduan_status" id="" class="form-control">
                                <option value=""> <?= $pengaduan->pengaduan_status ?> </option>
                                <option value="Menunggu"> Menunggu </option>
                                <option value="Diterima"> Diterima </option>
                                <option value="Selesai"> Selesai </option>
                                <option value="Ditolak"> Ditolak </option>
                            </select>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_image" class="col-form-label">Foto Kondisi Terbaru *</label>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <img src="/images/<?= $pengaduan->pengaduan_foto ?>" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input class="custom-file-input" type="file" id="gambar" name="pengaduan_foto" onchange="previewImg()">
                                        <div class="invalid-feedback">

                                        </div>
                                        <label class="custom-file-label" for="Gambar"><?= $pengaduan->pengaduan_foto ?></label></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-success">
                                <span><i class="fas fa-paper-plane"></i></span>
                                <span>Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>

<?= $this->endSection() ?>