<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Dana Masuk Non-Regular</h4>
                        <div class="card-header-form">

                            <div class="form-row">
                                <div class="col-md-3">

                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary btn-icon" data-toggle="tooltip" title="Tambah Data"><i class="fas fa-plus"></i></button>
                                        <button type="button" class="btn btn-primary btn-icon" data-toggle="tooltip" title="Import File"><i class="fas fa-file-upload"></i></button>
                                        <button type="button" class="btn btn-primary btn-icon" data-toggle="tooltip" title="Export File"><i class="fas fa-file-download"></i></button>
                                    </div>
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
                        <div class="empty-state" data-height="400">
                            <div class="empty-state-icon">
                                <i class="fas fa-question"></i>
                            </div>
                            <h2>We couldn't find any data</h2>
                            <p class="lead">
                                Sorry we can't find any data, to get rid of this message, make at least 1 entry.
                            </p>
                            <a href="#" class="btn btn-primary mt-4">Create new One</a>
                        </div>
                    </div>

                    <!-- <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div> -->
                </div>
            </div>
        </div>


    </section>
</div>

<?= $this->endSection(); ?>