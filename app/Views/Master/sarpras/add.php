<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Tambah Sarpras &mdash; SIDUPRAS</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">

    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('master/sarpras') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Sarpras</h1>
    </div>

    <?php if (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Gagal:( </b>
                <?= session()->getFlashdata('gagal'); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Form Tambah Data Sarpras</h4>
            </div>
            <div class="row justify-content-center">
                <div class="card-body col-md-6 ml-4">
                    <form action="<?= site_url('master/sarpras/save') ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label>Pilih Kategori *</label>
                            <select name="sarpras_kategori" id="" class="form-control" <?= ($validation->hasError('sarpras_kategori')) ?
                                                                                            'is-invalid' : ''; ?>" id="sarpras_kategori" name="sarpras_kategori" autofocus value="<?= old('sarpras_kategori'); ?>">
                                <option value=""> ----PILIH---- </option>
                                <?php foreach ($getOptionKategori as $row) { ?>
                                    <option value="<?= $row->kategori_id ?>"><?= $row->kategori_nama ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('sarpras_kategori'); ?>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label for="sarpras_nama" class="col-form-label">Sarana dan Prasarana *</label>
                            <input type="text" class="form-control <?= ($validation->hasError('sarpras_nama')) ?
                                                                        'is-invalid' : ''; ?>" id="sarpras_nama" name="sarpras_nama" autofocus value="<?= old('sarpras_nama'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sarpras_nama'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sarpras_gambar" class="col-form-label">Gambar Sarpras *</label>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <img src="/images/avatar-1.png" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input class="custom-file-input <?= ($validation->hasError('sarpras_gambar')) ?
                                                                            'is-invalid' : ''; ?>" type="file" id="gambar" name="sarpras_gambar" autofocus value="<?= old('sarpras_gambar'); ?>" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('sarpras_gambar'); ?>
                                        </div>
                                        <label class="custom-file-label" for="Gambar">Pilih gambar...</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sarpras_ket" class="col-form-label">Keterangan *</label>
                            <input type="text" class="form-control <?= ($validation->hasError('sarpras_ket')) ?
                                                                        'is-invalid' : ''; ?>" id="sarpras_ket" name="sarpras_ket" autofocus value="<?= old('sarpras_ket'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sarpras_ket'); ?>
                            </div>
                        </div>
                        <!-- <div class=" form-group row">
                            <label for="sarpras_dibuat" class="col-form-label">Waktu Pengadaan *</label>
                            <input type="date" class="form-control <?= ($validation->hasError('sarpras_dibuat')) ?
                                                                        'is-invalid' : ''; ?>" id="sarpras_dibuat" name="sarpras_dibuat" autofocus value="<?= old('sarpras_dibuat'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sarpras_dibuat'); ?>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-success">
                                <span><i class="fas fa-paper-plane"></i></span>
                                <span>Kirim</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>

<?= $this->endSection() ?>