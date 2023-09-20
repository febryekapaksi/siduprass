<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Edit User &mdash; SIDUPRAS</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">

    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('master/user') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit User</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Form Ubah Data User</h4>
            </div>
            <div class="row justify-content-center">
                <div class="card-body col-md-6 ml-4">
                    <form action="<?= site_url('master/user/' . $user->user_id . '/update') ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="gambarLama" value="<?= $user->user_image; ?>">
                        <input type="hidden" nama="user_role_id" value="<?= $user->user_role_id ?>">
                        <div class="form-group">
                            <label for="user_image" class="col-form-label">Foto User *</label>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <img src="/images/<?= $user->user_image ?>" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input class="custom-file-input <?= ($validation->hasError('user_image')) ?
                                                                            'is-invalid' : ''; ?>" type="file" id="gambar" name="user_image" autofocus value="<?= old('user_image'); ?>" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('user_image'); ?>
                                        </div>
                                        <label class="custom-file-label" for="Gambar"><?= $user->user_image ?></label></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label for="user_email" class="col-form-label">E-Mail *</label>
                            <input type="text" value="<?= $user->user_email; ?>" class="form-control <?= ($validation->hasError('user_email')) ?
                                                                                                            'is-invalid' : ''; ?>" id="user_email" name="user_email" autofocus value="<?= old('user_email'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('user_email'); ?>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label for="user_notelp" class="col-form-label">No. Telepon *</label>
                            <input type="text" value="<?= $user->user_notelp; ?>" class="form-control <?= ($validation->hasError('user_notelp')) ?
                                                                                                            'is-invalid' : ''; ?>" id="user_notelp" name="user_notelp" autofocus value="<?= old('user_notelp'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('user_notelp'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_password" class="col-form-label">Password *</label>
                            <div class="input-group mb-3" id="show_hide_password">
                                <input type="password" value="<?= $user->user_password; ?>" class="form-control <?= ($validation->hasError('user_password')) ?
                                                                                                                    'is-invalid' : ''; ?>" id="user_password" name="user_password" autofocus value="<?= old('user_password'); ?>">
                                <div class="input-group-prepend">
                                    <a href="" class="btn btn-outline-secondary"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('user_password'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_password_conf" class="col-form-label">Konfirmasi Password *</label>
                            <div class="input-group mb-3" id="show_hide_password">
                                <input type="password" value="<?= $user->user_password; ?>" class="form-control <?= ($validation->hasError('user_password_conf')) ?
                                                                                                                    'is-invalid' : ''; ?>" id="user_password_conf" name="user_password_conf" autofocus value="<?= old('user_password_conf'); ?>">
                                <div class="input-group-prepend">
                                    <a href="" class="btn btn-outline-secondary"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('user_password_conf'); ?>
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
        <script>

        </script>
        <script src="<?= base_url(); ?>vendor\twbs\bootstrap\dist\js\bootstrap.bundle.min.js">
        </script>
        <script src="<?= base_url(); ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
</section>

<?= $this->endSection() ?>