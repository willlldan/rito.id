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
                                <div class="form-group col-md-3">
                                    <button href="" class="btn btn-primary btn-icon icon-left" id="add" data-toggle="modal" data-target="#formDanaMasukModal" data-title="Tambah Data" data-link="add"><i class="fas fa-plus"></i> Tambah Data</button>
                                </div>
                                <div class="form-group col-md-5">
                                    <div class="input-group datepickercustom">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control daterange-cus">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
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
                                    <button href="" class="btn btn-primary btn-icon icon-left mt-4" id="add" data-toggle="modal" data-target="#formDanaMasukModal" data-title="Tambah Data" data-link="/kategori/add"><i class="fas fa-plus"></i> Tambah Data</button>
                                </div>
                            </div>
                        <?php else : ?>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr align="center">
                                        <th>Tanggal</th>
                                        <th>Transaksi</th>
                                        <th>Sub Kategori</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah</th>
                                        <th>User</th>
                                        <th>Action</th>
                                    </tr>

                                    <?php foreach ($transaksi as $tr) : ?>
                                        <tr align="center">
                                            <td><?= $tr['created_at'] ?></td>
                                            <td><?= $tr['transaksi'] ?></td>
                                            <td class="align-middle">
                                                <?php if ($tr['id_sub_kategori']) {

                                                    $idSub = array_search($tr['id_sub_kategori'], array_column($subkategori, 'id'));

                                                    echo $subkategori[$idSub]['subkategori'];
                                                } else {
                                                    echo "-";
                                                } ?>
                                            </td>
                                            <td class="align-middle">
                                                <?= $tr['keterangan'] ?>
                                            </td>
                                            <td>
                                                <?= "Rp. " . number_format($tr['jumlah'], 0, ',', '.')  ?>
                                            </td>
                                            <td>
                                                <img alt="image" src="<?= base_url() ?>/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Acep Hendra">
                                            </td>
                                            <td><a href="#" class="btn btn-danger">Delete</a></td>
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

<div class="modal fade" tabindex="-1" role="dialog" id="formDanaMasukModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../add" method="post">
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
        $('#formDanaMasukModal').modal('show')
    </script>

<?php endif; ?>


<?= $this->endSection(); ?>