<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row shadow-sm">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href=""><img src="<?php echo base_url('vendors/adminassets/assets/images/logo/logo.png') ?>" alt="logo" style="width:50px; height:50px;" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                        <img src="<?= ($user->foto != "" ? base_url($user->foto) : base_url('vendors/images/profile.png')) ?>" alt="image">
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black"><?= $user->nama?></p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="<?= base_url('panitia/profile') ?>">
                        <i class="mdi mdi-account mr-2 text-success"></i>
                        <span>Profile</span>
                    </a>
                    <a class="dropdown-item" href="<?=base_url('user/login_panitia');?>">
                        <i class="mdi mdi-logout mr-2 text-danger"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="" method="POST" style="display: none;">
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>