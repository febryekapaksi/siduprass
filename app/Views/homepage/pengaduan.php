<?= $this->extend('layout/beranda_template'); ?>

<?= $this->section('title') ?>
<title>Pengaduan &mdash; SIDUPRAS</title>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>

<!-- <link href="<?= base_url() ?>/home_template/assets/css/select2.min.css" rel="stylesheet" />
<script src="<?= base_url() ?>/home_template/assets/js/select2.min.js"></script> -->

<section class="slider-section pt-4 pb-4">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Sukses!!!</b>
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Gagal:( </b>
                <?= session()->getFlashdata('gagal'); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="slider-inner">
            <div class="row">
                <div class="col-12">
                    <div class="product-details">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">Laporan Anda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Laporkan keluhan Sarana dan Prasarana disini</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                        <div class="section-title">
                                            <h3>Riwayat Pengaduan</h3>
                                        </div>
                                        <div class="card-body table-responsive">
                                            <table class="table table table-md" id="dataTable">
                                                <tbody>
                                                    <thead>
                                                        <th>No</th>
                                                        <th>Foto</th>
                                                        <th>Kategori</th>
                                                        <th>Sarpras</th>
                                                        <th>Isi</th>
                                                        <th>Status</th>
                                                    </thead>
                                                    <?php $no = 1;
                                                    foreach ($riwayat as $key) { ?> <tr>
                                                            <td><?= $no; ?></td>
                                                            <td><img src="/images/<?= $key->pengaduan_foto; ?>" class="img-thumbnail img-preview img-mw-100" width="120px"></td>
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
                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                        <div class="section-title">
                                            <div class="row justify-content-center">
                                                <h3>Form Pengaduan</h3>
                                            </div>
                                            <form method="POST" action="aduan/save" enctype="multipart/form-data">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="warga_id" value="<?= $warga_id ?>">
                                                <div class="form-group">
                                                    <label for="sarpras_kategori" class="col-form-label">Kategori *</label>
                                                    <select class="form-control <?= ($validation->hasError('sarpras_kategori')) ?
                                                                                    'is-invalid' : ''; ?>" name="sarpras_kategori" id="sarpras_kategori">
                                                        <option value="">Pilih Kategori</option>
                                                        <?php foreach ($getOptionKategori as $row) : ?>
                                                            <option value="<?= $row->kategori_id ?>"><?= $row->kategori_nama ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('sarpras_kategori'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sarpras_nama" class="col-form-label">Sarana dan Prasarana *</label>
                                                    <select class="form-control <?= ($validation->hasError('sapras_nama')) ?
                                                                                    'is-invalid' : ''; ?>" name="sarpras_nama" id="sarpras_nama">
                                                        <option value="">Pilih Sarpras</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('sarpras_nama'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Isi Laporan *</label>
                                                    <textarea cols="4" class="form-control <?= ($validation->hasError('pengaduan_isi')) ?
                                                                                                'is-invalid' : ''; ?>" name=" pengaduan_isi"></textarea>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('pengaduan_isi'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="user_image" class="col-form-label">Sertakan Gambar *</label>
                                                    <div class="form-group row">
                                                        <div class="col-sm-2">
                                                            <img src="/images/avatar-1.png" class="img-thumbnail img-preview">
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="pengaduan_foto" name="pengaduan_foto" onchange="previewImg()">
                                                                <label class="custom-file-label" for="customFile">Pilih gambar...</label>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('pengaduan_foto'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pengaduan_lokasi" class="col-form-label">Bila diperlukan sertakan lokasi sarpras *</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="pakelokasi" type="checkbox" id="showHideMap" onclick="showMap()">
                                                        <label class="form-check-label" for="showMap">
                                                            Gunakan Lokasi
                                                        </label>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="map" id="map" style="width: 600px; height: 400px;"></div>
                                                        <div>
                                                            <input type="text" name="pengaduan_lat" placeholder="lat" id="lat" hidden>
                                                            <input type="text" name="pengaduan_lng" placeholder="long" id="long" hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row justify-content-end">
                                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                                        <button type="submit" class="btn btn-success">
                                                            <span><i class="fa fa-paper-plane"></i></span>
                                                            <span>Kirim</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<script src="<?= base_url(); ?>/home_template/assets/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#sarpras_kategori').change(function() {
            var kategori_id = $("#sarpras_kategori").val();
            $.ajax({
                url: "<?php base_url() ?>/home/aduan/get_sarpras",
                method: "POST",
                data: {
                    kategori_id: kategori_id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;

                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].sarpras_id + '><input type=checkbox>' + data[i].sarpras_nama + '</button>'
                    }
                    $('#sarpras_nama').html(html);
                }
            });
        })
    });
</script>

<?= $this->endSection(); ?>