<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Data Petugas &mdash; SIDUPRAS</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Petugas</h1>
        <div>
            <!-- <a href="<?= base_url('user/addUser') ?>" class="btn btn-sm btn-warning">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah User</span>
                    </a> -->
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Petugas</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-md" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>E-mail</th>
                            <th>Nama</th>
                            <th>No. Telp</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <?php $no = 1;
                    foreach ($getPetugas as $key) { ?> <tr>
                            <td><?= $no ?></td>
                            <td><?= $key['petugas_email'] ?></td>
                            <td><?= $key['petugas_nama'] ?></td>
                            <td><?= $key['petugas_notelp'] ?></td>
                            <td><?= $key['petugas_alamat'] ?></td>
                            <!-- <td class="text-center" style="width:15%">
                                <a href="" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i></a>
                                <a href="" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td> -->
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