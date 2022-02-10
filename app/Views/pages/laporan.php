<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h4>Laporan Bulanan</h4>
                </div>
                <div class="card-body">
                    Membuat laporan pembukuan pada periode bulan ini
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h4>Laporan Rentang Waktu</h4>
                </div>
                <div class="card-body">
                    Membuat laporan pembukuan sesuai rentang waktu yang ditentukan
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>