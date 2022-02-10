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

<body class="">
    <div id="app">
        <div class="main-wrapper">

            <?= $this->include('layout/navbar') ?>

            <?= $this->include('layout/sidebar') ?>
            <!-- Main Content -->


            <?= $this->renderSection('content'); ?>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
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