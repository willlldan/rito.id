<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4><?= $jenis['jenis'] . " - " . $kategori['kategori'] ?></h4>
                        <div class="card-header-form">
                            <div class="form-row">
                                <?php if (in_groups('superadmin') || in_groups('bendahara')) : ?>
                                    <div class="form-group col-md-3">
                                        <button href="" class="btn btn-primary btn-icon icon-left" id="add" data-toggle="modal" data-target="#formTransaksiModal" data-title="Tambah Data" data-link="add"><i class="fas fa-plus"></i> Tambah Data</button>
                                    </div>
                                <?php endif ?>
                                <div class="form-group <?= (in_groups('superadmin') || in_groups('bendahara')) ? 'col-md-5' : 'col-md-6' ?>">

                                    <form action="" class="d-inline" method="get" id="findByDate">
                                        <div class="input-group datepickercustom">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control daterange-cus" name="datepicker" id="datepicker">

                                        </div>
                                    </form>
                                    <!-- <form action="" class="d-inline" method="get"> -->
                                </div>
                                <div class="form-group <?= (in_groups('superadmin') || in_groups('bendahara')) ? 'col-md-4' : 'col-md-6' ?> ">
                                    <form action="" class="d-inline" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="keyword" id="keyword">
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-primary" id="btn-search"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="swal" data-swal="<?= session()->getFlashData('pesan') ?>" data-status="<?= session()->getFlashData('status') ?>"></div>

                        <?php if (empty($transaksi)) : ?>
                            <div class="card-body p-0">
                                <div class="empty-state" data-height="400">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-question"></i>
                                    </div>
                                    <h2>We couldn't find any data</h2>
                                    <p class="lead">
                                        Sorry we can't find any data, to get rid of this message, make at least 1 entry.
                                    </p>
                                    <button href="" class="btn btn-primary btn-icon icon-left mt-4" id="add" data-toggle="modal" data-target="#formTransaksiModal" data-title="Tambah Data" data-link="/kategori/add"><i class="fas fa-plus"></i> Tambah Data</button>
                                </div>
                            </div>
                        <?php else : ?>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr align="center">
                                        <th style="width: 5%;">No.</th>
                                        <th>Tanggal</th>
                                        <th>Transaksi</th>
                                        <th>Keterangan</th>
                                        <th>Sub Kategori</th>
                                        <th>Jumlah</th>
                                        <!-- <th>User</th> -->
                                        <th>Action</th>
                                    </tr>
                                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                                    <?php foreach ($transaksi as $tr) : ?>
                                        <tr align="center" <?= $tr['deleted_at'] ? 'class="table-secondary"' : '' ?>>
                                            <td><?= $i++ ?></td>
                                            <td><?= explode(" ", $tr['created_at'])[0] ?></td>
                                            <td><?= $tr['transaksi'] ?></td>
                                            <td><?= $tr['keterangan'] ?></td>
                                            <td class="align-middle">
                                                <?php $labelSub = $tr['subkategori'] ? $tr['subkategori'] : "-" ?>
                                                <?php if ($tr['subkategori']) : ?>
                                                    <a href="<?= base_url('transaksi') . "/" . $tr['jenis_slug'] . "/" . $tr['kategori_slug'] . "/"  .  $tr['subkategori_slug'] ?>"><?= $labelSub ?></a>
                                                <?php else : ?>
                                                    -
                                                <?php endif ?>

                                            </td>

                                            <td>
                                                <?= "Rp. " . number_format($tr['jumlah'], 0, ',', '.')  ?>
                                            </td>
                                            <!-- <td>
                                                <img alt="image" src="<?= base_url() ?>/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Acep Hendra">
                                            </td> -->
                                            <td>
                                                <div class="row">
                                                    <?php $col = $tr['jenis_slug'] == 'dana-masuk' ? 'col-md-12' : 'col-md-4'  ?>
                                                    <?php if ($tr['jenis_slug'] != 'dana-masuk') : ?>
                                                        <?php $key = array_search($tr['id_user'], array_column($user, 'id'));
                                                        ?>

                                                        <div class="<?= $col ?>">
                                                            <button class="btn btn-primary" data-toggle="modal" data-target="#detailModal" data-id="<?= $tr['id'] ?>" data-jenis="<?= $jenis['jenis'] ?>" data-kategori="<?= $kategori['kategori'] ?>" data-subkategori="<?= $labelSub ?>" data-transaksi="<?= $tr['transaksi'] ?>" data-tanggal="<?= $tr['created_at'] ?>" data-keterangan="<?= $tr['keterangan'] ?>" data-jumlah="<?= $tr['jumlah'] ?>" data-bukti="<?= $tr['bukti_transaksi'] ?>" data-url="<?= base_url() ?>/assets/img/bukti_transaksi/" data-user="<?= $user[$key]['username'] ?>">


                                                                <i class="fas fa-info-circle" data-toggle="tooltip" title="Detail"></i></button>
                                                        </div>
                                                        <div class="<?= $col ?>">
                                                            <button class="btn btn-warning" data-toggle="modal" data-target="#formUploadModal" data-id='<?= $tr['id'] ?>' <?= in_groups('superadmin') || in_groups('bendahara') ? '' : 'disabled' ?>>
                                                                <i class="fas fa-arrow-circle-up" data-toggle="tooltip" title="Upload Bukti Transaksi"></i></button>
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="<?= $col ?>">
                                                        <?php if ($tr['deleted_at']) : ?>
                                                            <button type="submit" class="btn btn-secondary btn-delete" disabled><i class="fas fa-trash" data-toggle="tooltip" title="Deleted By <?= $tr['username'] ?> at <?= $tr['deleted_at'] ?>"></i></button>
                                                        <?php else : ?>
                                                            <form action="/transaksi/<?= $tr['id'] ?>" method="post" class="d-inline">
                                                                <?= csrf_field() ?>
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger btn-delete" <?= in_groups('superadmin') || in_groups('bendahara') ? '' : 'disabled' ?>><i class="fas fa-trash" data-toggle="tooltip" title="Hapus Data"></i></button>
                                                            </form>
                                                        <?php endif ?>

                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </table>
                            </div>

                        <?php endif ?>
                    </div>

                    <div class="card-footer text-right">
                        <?= $pager->links('transaksi', 'custom_pagination') ?>
                    </div>
                </div>
            </div>
        </div>


    </section>
</div>



<!-- Modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="formTransaksiModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>/transaksi/add" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="jenis" value="<?= $jenis['id'] ?>">
                    <input type="hidden" name="kategori" value="<?= $kategori['id'] ?>">
                    <div class="form-group">
                        <input type="text" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''  ?>" placeholder="Keterangan" name="keterangan" id="keterangan" value="<?= old('keterangan') ?>" autofocus="on">
                        <div class="invalid-feedback"><?= $validation->getError('keterangan') ?></div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="id_subkategori" id="id_subkategori">
                            <option value="">Pilih Sub Kategori</option>
                            <?php foreach ($subkategori as $s) : ?>
                                <?php if ($s['id_kategori'] == $kategori['id']) : ?>
                                    <option value="<?= $s['id'] ?>"> <?= $s['subkategori'] ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('id_subkategori') ?></div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''  ?>" id="jumlah" name="jumlah" value="<?= old('jumlah') ?>" autocomplete="off">

                            <div class="invalid-feedback"><?= $validation->getError('keterangan') ?></div>
                        </div>
                    </div>

                    <?php if ($jenis['slug'] == "dana-keluar") : ?>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <img width="100" src="<?= base_url() ?>/assets/img/default.png" class="img-thumbnail img-preview" alt="">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('buktiTransaksi')) ? 'is-invalid' : ''  ?>" id="buktiTransaksi" name="buktiTransaksi" onchange="previewImg('#formTransaksiModal')" value="<?= old('buktiTransaksi') ?>">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <div class="invalid-feedback mt-3"><?= $validation->getError('buktiTransaksi') ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-form">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Detail Modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="detailModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Detail Transaksi Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td>Transaksi</td>
                        <td id="detailTransaksi"> </td>
                    </tr>
                    <tr>
                        <td>Jenis</td>
                        <td id="detailJenis"> </td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td id="detailKategori"> </td>
                    </tr>
                    <tr>
                        <td>Sub Kategori</td>
                        <td id="detailSubKategori"> </td>
                    </tr>
                    <tr>
                        <td>Tanggal Transaksi</td>
                        <td id="detailTanggal"> </td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td id="detailKeterangan"> </td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td id="detailJumlah"> </td>
                    </tr>
                    <tr>
                        <td>Ditambahkan Oleh</td>
                        <td id="detailUser"> </td>
                    </tr>
                </table>

                <h6>Bukti Transaksi</h6>

                <div class="chocolat-parent ada">
                    <div class="text-center">
                        <img src="<?= base_url() ?>/assets/img/defaut.png" class="img-fluid bukti-transaksi">
                    </div>
                </div>

                <div class="card-body p-0 kosong">
                    <div class="empty-state" data-height="400">
                        <div class="empty-state-icon">
                            <i class="fas fa-question"></i>
                        </div>
                        <h2>Bukti Transaksi Belum Ditambahkan</h2>

                        <?php if (in_groups('superadmin') || in_groups('bendahara')) : ?>

                            <button href="" class="btn btn-primary btn-icon icon-left mt-4" id="upload-btn" data-toggle="modal" data-target="#formUploadModal" data-title="Tambah Data" data-link="/kategori/add"><i class="fas fa-plus"></i> Upload Bukti Transaksi</button>
                        <?php endif ?>
                    </div>
                </div>


            </div>
            <!-- <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> -->

        </div>
    </div>
</div>


<!-- Modal Upload -->

<div class="modal fade" tabindex="-1" role="dialog" id="formUploadModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Bukti Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>/transaksi/upload" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id" id="id">

                    <?php if ($jenis['slug'] == "dana-keluar") : ?>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <img width="100" src="<?= base_url() ?>/assets/img/default.png" class="img-thumbnail img-preview" alt="">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('upload')) ? 'is-invalid' : ''  ?>" id="upload" name="upload" onchange="previewImg('#formUploadModal')" value="<?= old('upload') ?>">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <div class="invalid-feedback mt-3"><?= $validation->getError('upload') ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-form">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>



<?php if (!empty($validation->getErrors()) && session()->getFlashData('from') == "upload") :  ?>
    <script>
        $('#formUploadModal').modal('show')
    </script>

<?php elseif (!empty($validation->getErrors())) : ?>
    <script>
        $('#formTransaksiModal').modal('show')
    </script>

<?php endif; ?>


<?= $this->endSection(); ?>