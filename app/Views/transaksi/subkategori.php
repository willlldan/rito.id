<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Subkategori</h4>
                        <div class="card-header-form">

                            <div class="form-row">


                                <div class="form-group col-md-5">
                                    <button href="" class="btn btn-primary btn-icon icon-left" id="add" data-toggle="modal" data-target="#formSubkategoriModal" data-title="Tambah Data" data-link="/subkategori/add"><i class="fas fa-plus"></i> Tambah Data</button>
                                </div>
                                <div class="form-group col-md-7">
                                    <form action="" class="d-inline" method="post">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="keyword" id="keyword">
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-primary" id="btn-search" name="search"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="card-body p-0">


                        <!-- <?php if (session()->getFlashData('pesan')) : ?>
                            <div class="alert alert-success alert-dismissible show fade ml-4" style="width: 30%;">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <?= session()->getFlashData('pesan') ?>
                                </div>
                            </div>
                        <?php endif; ?> -->


                        <div class="swal" data-swal="<?= session()->getFlashData('pesan') ?>" data-status="<?= session()->getFlashData('status') ?>"></div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr align="center">
                                    <th style="width: 10%;">No</th>
                                    <th>Subkategori</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                                <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                                <?php foreach ($subkategori as $sk) : ?>
                                    <tr align="center">
                                        <td><?= $i++ ?></td>
                                        <td><?= $sk['subkategori'] ?></td>
                                        <td><?= $sk['kategori'] ?></td>
                                        <td>

                                            <button class="btn btn-warning" data-toggle="modal" data-target="#formSubkategoriModal" data-title="Edit Data" data-link="/subkategori/edit/<?= $sk['id'] ?>" data-kategori="<?= $sk['id_kategori'] ?>" data-subkategori="<?= $sk['subkategori'] ?>" data-form="edit"><i class="fas fa-edit" data-toggle="tooltip" title="Edit Data"></i></button>

                                            <form action="/subkategori/<?= $sk['id'] ?>" method="post" class="d-inline">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-delete"><i class="fas fa-trash" data-toggle="tooltip" title="Hapus Data"></i></button>
                                            </form>

                                        </td>

                                    </tr>
                                <?php endforeach; ?>

                            </table>
                        </div>
                    </div>
                    <?php if (empty($subkategori)) : ?>
                        <div class="card-body p-0">
                            <div class="empty-state" data-height="400">
                                <div class="empty-state-icon">
                                    <i class="fas fa-question"></i>
                                </div>
                                <h2>We couldn't find any data</h2>
                                <p class="lead">
                                    Sorry we can't find any data, to get rid of this message, make at least 1 entry.
                                </p>
                                <button href="" class="btn btn-primary btn-icon icon-left mt-4" id="add" data-toggle="modal" data-target="#formSubkategoriModal" data-title="Tambah Data" data-link="/subkategori/add"><i class="fas fa-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                    <?php endif ?>

                    <div class="card-footer text-right">
                        <?= $pager->links('subkategori', 'custom_pagination') ?>
                    </div>



                </div>
            </div>
        </div>


    </section>
</div>



<!-- Modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="formSubkategoriModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/subkategori/add" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="text" class="form-control <?= ($validation->hasError('subkategori')) ? 'is-invalid' : ''  ?>" placeholder="subkategori" name="subkategori" id="subkategori" value="<?= old('subkategori') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('subkategori') ?></div>
                    </div>
                    <div class="form-group">
                        <select class="form-control <?= ($validation->hasError('id_kategori')) ? 'is-invalid' : ''  ?>" name="id_kategori" id="id_kategori">
                            <option value="">Pilih kategori</option>
                            <?php foreach ($kategori as $j) : ?>
                                <option value="<?= $j['id'] ?>"> <?= $j['kategori'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('id_kategori') ?></div>
                    </div>

            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-form">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php if (!empty($validation->getErrors())) : ?>
    <script>
        $('#formSubkategoriModal').modal('show')
        $('#formSubkategoriModal #id_kategori').val(<?= old('id_kategori') ?>).change()
    </script>

<?php endif; ?>

<?= $this->endSection(); ?>