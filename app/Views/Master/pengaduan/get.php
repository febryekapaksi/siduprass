<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Data Pengaduan &mdash; SIDUPRAS</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Pengaduan</h1>
    </div>
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

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Pengaduan</h4>
                <div>
                    <!-- <a href="<?= base_url('user/addUser') ?>" class="btn btn-sm btn-warning">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah User</span>
                    </a> -->
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-md" id="dataTable">
                    <tbody>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pelapor</th>
                                <th>Kategori</th>
                                <th>Sarana dan Prasarana</th>
                                <th>Keluhan</th>
                                <th>Status Aduan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php $no = 1;
                        foreach ($data as $key) { ?> <tr>
                                <td><?= $no ?></td>
                                <td><?= $key->warga_nama ?></td>
                                <td><?= $key->kategori_nama ?></td>
                                <td><?= $key->sarpras_nama ?></td>
                                <td><?= $key->pengaduan_isi ?></td>
                                <td><?= $key->pengaduan_status ?></td>
                                <td class="text-center" style="width:15%">
                                    <a href="<?= base_url('master/pengaduan/' . $key->pengaduan_id . '/detail') ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-info-circle"></i><span class="text">Detail</span>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
                <div class="row justify-content-between">
                    <div class="col-4">
                        <div class="col-sm-12 col-md-6">

                        </div>
                    </div>
                    <div class="col-4">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item next disabled" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>