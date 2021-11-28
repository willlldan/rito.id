<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

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
                            Rp. 500.000.000,-
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
                            Rp. 750.000.000,-
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
                            Rp. 250.000.000,-
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Budget vs Sales</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" height="158"></canvas>
                    </div>
                </div>
            </div>

        </div>


    </section>
</div>

<?= $this->endSection(); ?>