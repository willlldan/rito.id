<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Finance App &mdash; Rito</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/stisla/node_modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/stisla/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/stisla/node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/stisla/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/stisla/node_modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/stisla/node_modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/stisla/node_modules/selectric/public/selectric.css">
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/stisla/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/stisla/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/stisla/assets/css/components.css">

    <!-- Sweetalert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/sweetalert2/sweetalert2.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/custom.css">


    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body class="sidebar-mini">
    <div id="app">
        <div class="main-wrapper">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>

            <?php

            $dataChart = "";
            foreach ($kategoriDanaKeluar as $k) {

                $key = array_search($k['id'], array_column($chartDanaKeluar, 'id_kategori'));
                $dataChart .=  $key || $key === 0 ? $chartDanaKeluar[$key]['jumlah'] . "," : 0 . ",";
            }

            ?>


            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-statistic-2">
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Saldo</h4>
                                    </div>
                                    <div class="card-body">
                                        Rp. <?= number_format($saldo, 0, ',', '.') ?>,-
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-statistic-2">
                                <div class="card-icon shadow-primary bg-success">
                                    <i class="fas fa-angle-up"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Dana Masuk</h4>
                                    </div>
                                    <div class="card-body">
                                        Rp. <?= number_format($danaMasuk, 0, ',', '.') ?>,-
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-statistic-2">
                                <div class="card-icon shadow-primary bg-danger">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Dana Keluar</h4>
                                    </div>
                                    <div class="card-body">
                                        Rp. <?= number_format($danaKeluar, 0, ',', '.') ?>,-
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Dana Keluar</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="danaKeluar" height="200"></canvas>
                                </div>
                                <div class="card-footer">
                                    <div class="row">

                                        <div class="col-6">
                                            <p><?= sizeof($kategoriDanaKeluar) ?></p>
                                            <?php foreach ($kategoriDanaKeluar as $k => $val) : ?>
                                                <?php if ($k <= sizeof($kategoriDanaKeluar) / 2) : ?>
                                                    <p><span class="bg-primary text-white p-2 mr-1 rounded"><?= "C" . ($k + 1) ?></span>: <?= $val['kategori'] ?></p>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="col-6">
                                            <p><?= sizeof($kategoriDanaKeluar) ?></p>
                                            <?php foreach ($kategoriDanaKeluar as $k => $val) : ?>
                                                <?php if ($k >= sizeof($kategoriDanaKeluar) / 2) : ?>
                                                    <p><span class="bg-primary text-white p-2 mr-1 rounded"><?= "C" . ($k + 1) ?></span>: <?= $val['kategori'] ?></p>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Dana Masuk</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="danaMasuk" height="300"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <img src="" alt="" id="iniGambar">
                    </div>


                    <div class="row">

                        <?php if (empty($transaksiDanaMasuk)) : ?>
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
                                        <th>Kategori</th>
                                        <th>Sub Kategori</th>
                                        <th>Jumlah</th>
                                        <!-- <th>User</th> -->
                                    </tr>
                                    <?php $i = 1 ?>
                                    <?php foreach ($transaksiDanaMasuk as $tr) : ?>
                                        <tr align="center" <?= $tr['deleted_at'] ? 'class="table-secondary"' : '' ?>>
                                            <td><?= $i++ ?></td>
                                            <td><?= explode(" ", $tr['created_at'])[0] ?></td>
                                            <td><?= $tr['transaksi'] ?></td>
                                            <td><?= $tr['keterangan'] ?></td>
                                            <td><?= $tr['kategori'] ?></td>
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

                                        </tr>
                                    <?php endforeach ?>

                                </table>
                            </div>

                        <?php endif ?>

                    </div>

                    <!-- Chart danaMasuk -->
                    <script>
                        // dana Masuk
                        var ctx = document.getElementById("danaMasuk");
                        var myChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                // labels: ["Red", "Blue", "Yellow", ],
                                labels: [
                                    <?php foreach ($chartDanaMasuk as $label) {
                                        echo "\"" . $label['kategori'] . "\"" . ", ";
                                    } ?>
                                ],
                                datasets: [{
                                    label: 'C1',
                                    data: [
                                        <?php foreach ($chartDanaMasuk as $label) {
                                            echo  $label['jumlah'] .  ", ";
                                        } ?>
                                    ],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                    ],
                                    borderColor: [
                                        'rgba(255,99,132,1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                animation: {
                                    duration: 0
                                }
                            }

                        });

                        //Dana Keluar

                        // Generate data

                        <?php


                        ?>

                        var chartDanaKeluar = document.getElementById("danaKeluar");
                        var myChart = new Chart(chartDanaKeluar, {
                            type: 'bar',
                            data: {
                                labels: [
                                    <?php foreach ($kategoriDanaKeluar as $key => $value) {
                                        echo "\"C" . ($key + 1) . "\", ";
                                    } ?>
                                ],
                                datasets: [{
                                    label: 'Dana Keluar',
                                    data: [<?= $dataChart ?>],
                                    backgroundColor: 'rgba(103, 119, 239, 0.5)',
                                    borderColor: 'rgba(103, 119, 239, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                animation: {
                                    duration: 0
                                }
                            }

                        });

                        $(document).ready(function() {
                            var img = chartDanaKeluar.toDataURL('image/png').replace("image/png", "image/octet-stream");
                            window.location.href = img + 'png';
                            console.log(img);

                            $('#iniGambar').attr('href', img);
                        })
                    </script>


                </section>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url() ?>/vendor/stisla/assets/js/stisla.js"></script>

    <!-- Autonumeric -->
    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.5.4"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>/vendor/stisla/node_modules/cleave.js/dist/cleave.min.js"></script>
    <script src="<?= base_url() ?>/vendor/stisla/node_modules/cleave.js/dist/addons/cleave-phone.us.js"></script>
    <script src="<?= base_url() ?>/vendor/stisla/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= base_url() ?>/vendor/stisla/node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="<?= base_url() ?>/vendor/stisla/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/vendor/stisla/node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="<?= base_url() ?>/vendor/stisla/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="<?= base_url() ?>/vendor/stisla/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url() ?>/vendor/stisla/node_modules/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>/vendor/stisla/node_modules/selectric/public/jquery.selectric.min.js"></script>
    <script src="<?= base_url() ?>/vendor/stisla/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>




    <!-- Template JS File -->
    <script src="<?= base_url() ?>/vendor/stisla/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/vendor/stisla/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url() ?>/vendor/stisla/assets/js/page/index.js"></script>

    <!-- Sweetalert JS File -->
    <script src="<?= base_url() ?>/vendor/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Custom JS File -->

    <script src="<?= base_url() ?>/assets/js/custom.js"></script>
</body>

</html>