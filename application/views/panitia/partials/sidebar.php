<nav class="sidebar sidebar-offcanvas fixed-left" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="<?= base_url('dashboard.php') ?>" class="nav-link">
                <div class="nav-profile-image">
                    <img src="<?= ($user->foto != "" ? base_url($user->foto) : base_url('vendors/uploads/panitia/profile.png')) ?>" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">Panitia</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('panitia/dashboard') ?>">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#kelola-lelang" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Kelola Lelang</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-account-multiple menu-icon"></i>
            </a>
            <div class="collapse" id="kelola-lelang">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/pelelang') ?>">Pelelang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/peserta') ?>">Peserta Lelang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/pembukaanlelang') ?>">Pembukaan Lelang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/penawaran') ?>">Penawaran Lelang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/pemenang') ?>">Pemenang Lelang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/calonpemenang') ?>">Calon Pemenang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/penerima') ?>">Penerima Lelang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/deposit') ?>">Peserta Deposit</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pembayaran" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Pembayaran</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-wallet menu-icon"></i>
            </a>
            <div class="collapse" id="pembayaran">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/pembayaran') ?>">Pembayaran Lelang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/pembayaran') ?>">Hasil Lelang</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pengiriman" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Pengiriman</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-truck-delivery menu-icon"></i>
            </a>
            <div class="collapse" id="pengiriman">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/suratpengiriman') ?>">Surat Perintah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/pengiriman') ?>">Pengemasan</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('panitia/riwayat') ?>">
                <span class="menu-title">Riwayat Lelang</span>
                <i class="mdi mdi-equal-box menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>