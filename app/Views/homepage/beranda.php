<?= $this->extend('layout/beranda_template'); ?>

<?= $this->section('title') ?>
<title>Home &mdash; SIDUPRAS</title>
<?= $this->endSection() ?>


<?= $this->section('content'); ?>
<section class="slider-section pt-4 pb-4">
    <div class="container">
        <div class="slider-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="media">
                        <img src="\images\alursistem.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="media">
                    <div class="iconbox iconmedium rounded-circle text-info mr-4">
                        <i class="fa fa-registered"></i>
                    </div>
                    <div class="media-body">
                        <h5>1. Registasi Akun Anda</h5>
                        <p class="text-muted">
                            Silhakan registrasi akun anda dengan meng-klik tombol dibawah ini.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media">
                    <div class="iconbox iconmedium rounded-circle text-purple mr-4">
                        <i class="fa fa-sign-in"></i>
                    </div>
                    <div class="media-body">
                        <h5>2. Login dengan Akun Anda</h5>
                        <p class="text-muted">
                            Masukan data email dan password yang telah di registrasi untuk masuk kedalam SIDUPRAS.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media">
                    <div class="iconbox iconmedium rounded-circle text-warning mr-4">
                        <i class="fa fa-envelope-open"></i>
                    </div>
                    <div class="media-body">
                        <h5>3. Sampaikan Aduan Anda</h5>
                        <p class="text-muted">
                            Anda dapat menyampaikan aduan tentang sarana dan prasarana yang bermasalah pada menu pengaduan dalam SIDUPRAS.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-grid gap-2 col-0 mx-auto">
                <a href="<?= site_url('register') ?>" class="btn btn-success"><i class="fa fa-paper-plane"></i>
                    <span>Daftarkan akun anda disini</span>
                </a>
            </div>
        </div>
</section>
<section class="products-grids trending pb-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>daftar aduan masuk</h2>
                </div>
                <!-- <div>
                    <select class="form-control" name="pengaduan_status" id="pengaduan_status">
                        <option value="">Status Pengaduan</option>
                        <option value="menunggu">Menunggu</option>
                        <option value="diterima">Diterima</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div> -->
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table table-md" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Pelapor</th>
                        <th>Kategori</th>
                        <th>Sarpras</th>
                        <th>Isi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $key) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><img src="/images/<?= $key->pengaduan_foto ?>" class="img-thumbnail img-preview img-mw-100" width="100px"></td>
                            <td><?= $key->warga_nama ?></td>
                            <td><?= $key->kategori_nama ?></td>
                            <td><?= $key->sarpras_nama ?></td>
                            <td><?= $key->pengaduan_isi ?></td>
                            <td><?= $key->pengaduan_status ?></td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>