<!-- Sidebar -->
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url() ?>">Rito</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url() ?>">Rt</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="/">General Dashboard</a></li>
                    <li><a class="nav-link" href="#">Laporan</a></li>
                    <li><a class="nav-link" href="#">Daftar Kategori</a></li>
                </ul>
            </li>
            <li class="menu-header">Dana Masuk</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-money-bill-wave"></i><span>Dana Masuk</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url() ?>/danamasuk">Regular</a></li>
                    <li><a class="nav-link" href="<?= base_url() ?>/danamasuk/nonregular">Non-Regular</a></li>
                    <li><a class="nav-link" href="<?= base_url() ?>/danamasuk/laboratorium
                    ">Laboratorium</a></li>

                    <?php foreach ($sideBar as $sb) : ?>
                        <?php if ($sb['jenis_slug'] == 'dana-masuk') :  ?>
                            <li><a class="nav-link" href="<?= base_url() . "/transaksi/" . $sb['jenis_slug'] .  "/" . $sb['slug'] ?>"><?= $sb['kategori'] ?></a></li>
                        <?php endif ?>
                    <?php endforeach ?>
                </ul>
            </li>


            <li class="menu-header">Dana Keluar</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-share"></i> <span>Dana Keluar</span></a>
                <ul class="dropdown-menu">

                    <?php foreach ($sideBar as $sb) : ?>
                        <?php if ($sb['jenis_slug'] == 'dana-keluar') :  ?>
                            <li><a class="nav-link" href="<?= base_url() . "/transaksi/" . $sb['jenis_slug'] .  "/" . $sb['slug'] ?>"><?= $sb['kategori'] ?></a></li>
                        <?php endif ?>
                    <?php endforeach ?>

                    <?php if (empty($sideBar)) :  ?>
                        <li><a class="nav-link" href="<?= base_url('/danakeluar') ?>/danakeluar/">Implementasi </a></li>
                        <li><a class="nav-link" href="<?= base_url() ?>/danakeluar/pendidikanpengajaran">Pendidikan & Pengajaran</a></li>
                        <li><a class="nav-link" href="<?= base_url() ?>/danakeluar/penelitian">Penelitian</a></li>
                        <li><a class="nav-link" href="<?= base_url() ?>/danakeluar/ppm">Pengabdian Pada Masyarakat</a></li>
                        <li><a class="nav-link" href="<?= base_url() ?>/danakeluar/kpm">Kegiatan & Pembinaan Mahasiswa</a></li>
                        <li><a class="nav-link" href="<?= base_url() ?>/danakeluar/ktpk">Kesejahteraan Tenaga Pendidik & Kependidikan</a></li>
                        <li><a class="nav-link" href="<?= base_url() ?>/danakeluar/sarpras">Sarana dan Prasarana</a></li>
                        <li><a class="nav-link" href="<?= base_url() ?>/danakeluar/kpbs">Kerjasama, Promosi dan Bantuan Sosial</a></li>
                        <li><a class="nav-link" href="<?= base_url() ?>/danakeluar/pembangunan">Pembangunan (Khusus Universitas)</a></li>
                    <?php endif ?>
                </ul>
            </li>

            <li class="menu-header">Utilities</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-toolbox"></i> <span>Utilities</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url() ?>/jenis">Jenis Transaksi</a></li>
                    <li><a class="nav-link" href="<?= base_url() ?>/kategori">Kategori</a></li>
                    <li><a class="nav-link" href="<?= base_url() ?>/subkategori">Sub Kategori</a></li>


                </ul>
            </li>


    </aside>
</div>