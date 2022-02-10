<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

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
        <div class="form-row">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    <form action="" method="get" id="formMonth">
                        <div class="form-group">
                            <input type="month" class="form-control" value="<?= $month ? $month : $now ?>" name="month" id="monthDashboard">
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                color: 'rgb(255, 99, 132)'
                            },
                            position: 'bottom'
                        }
                    }
                }

            });
        </script>


    </section>
</div>

<?= $this->endSection(); ?>