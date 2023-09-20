<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Tambah User &mdash; SIDUPRAS</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">

    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('master/user') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah User</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Form Tambah Data User</h4>
            </div>
            <div class="row justify-content-center">
                <div class="card-body col-md-6 ml-4">
                    <form action="<?= site_url('master/user/save') ?>" method="POST" autocomplete="off">
                        <?= csrf_field(); ?>
                        <div class=" form-group">
                            <label for="user_name" class="col-form-label">Nama Lengkap *</label>
                            <input type="text" class="form-control <?= ($validation->hasError('user_name')) ?
                                                                        'is-invalid' : ''; ?>" id="user_name" name="user_name" autofocus value="<?= old('user_name'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('user_name'); ?>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label for="user_email" class="col-form-label">E-Mail *</label>
                            <input type="text" class="form-control <?= ($validation->hasError('user_email')) ?
                                                                        'is-invalid' : ''; ?>" id="user_email" name="user_email" autofocus value="<?= old('user_email'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('user_email'); ?>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label for="user_notelp" class="col-form-label">No. Telepon *</label>
                            <input type="text" class="form-control <?= ($validation->hasError('user_notelp')) ?
                                                                        'is-invalid' : ''; ?>" id="user_notelp" name="user_notelp" autofocus value="<?= old('user_notelp'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('user_notelp'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_password">Password *</label>
                            <div class="input-group mb-3" id="show_hide_password">
                                <input type="password" class="form-control <?= ($validation->hasError('user_password')) ?
                                                                                'is-invalid' : ''; ?>" id="user_password" name="user_password" autofocus value="<?= old('user_password'); ?>">
                                <div class="input-group-append">
                                    <a href="" class="btn btn-outline-secondary"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('user_password'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_password_conf">Konfirmasi Password *</label>
                            <div class="input-group mb-3" id="show_hide_password">
                                <input type="password" class="form-control <?= ($validation->hasError('user_password_conf')) ?
                                                                                'is-invalid' : ''; ?>" id="user_password_conf" name="user_password_conf" autofocus value="<?= old('user_password_conf'); ?>">
                                <div class="input-group-append">
                                    <a href="" class="btn btn-outline-secondary"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('user_password_conf'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Pilih Hak Akses *</label>
                            <select name="user_role_id" id="" class="form-control" <?= ($validation->hasError('user_role_id')) ?
                                                                                        'is-invalid' : ''; ?>" id="user_role_id" name="user_role_id" autofocus value="<?= old('user_role_id'); ?>">
                                <option value=""> ----PILIH---- </option>
                                <?php foreach ($getOptionRole as $row) { ?>
                                    <option value="<?= $row->role_id ?>"><?= $row->role_name ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('user_role_id'); ?>
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
        <script src="<?= base_url(); ?>vendor\twbs\bootstrap\dist\js\bootstrap.bundle.min.js">
        </script>
        <script src="<?= base_url(); ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
</section>

<?= $this->endSection() ?>