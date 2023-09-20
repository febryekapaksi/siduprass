<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Data User &mdash; SIDUPRAS</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">

    <div class="section-header">
        <h1>User</h1>
        <div class="section-header-button">
            <a href="<?= base_url('master/user/add') ?>" class="btn btn-success btn-round">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah User</span>
            </a>
        </div>
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
                <h4>Data User</h4>
                <div class="col-sm-12 col-md-6">
                    <div id="dataTable_filter" class="dataTables_filter"><input type="search" class="form-control" placeholder="Cari" aria-controls="dataTable"></div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-md" id="dataTable">
                    <tbody>
                        <thead>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sebagai</th>
                            <th>Action</th>
                        </thead>
                        <?php $no = 1;
                        foreach ($user as $key) { ?> <tr>
                                <td><?= $no ?></td>
                                <td><?= $key->user_name ?></td>
                                <td><?= $key->user_email ?></td>
                                <td><?= $key->role_name ?></td>
                                <td class="text-center" style="width:15%">
                                    <a href="<?= base_url('master/user/' . $key->user_id . '/detail') ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-info-circle"></i><span class="text">Detail user</span>
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