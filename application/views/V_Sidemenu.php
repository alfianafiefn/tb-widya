<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="<?php echo site_url('Dashboard') ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('kendaraan/maintenance') ?>">
                                <i class="fas fa-truck"></i>Servis</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('barang/harga') ?>">
                                <i class="fas fa-dollar"></i>Harga</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('pegawai/absen') ?>">
                                <i class="fas fa-calendar-alt"></i>Harian</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-wrench"></i>Pengaturan</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo site_url('kategori'); ?>">kategori</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('barang') ?>">barang</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('pegawai') ?>">pegawai</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('kendaraan') ?>">kendaraan</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Laporan') ?>">
                                <i class="fas fa-file-excel"></i>Laporan</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>