<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href=" <?php echo base_url('vendors/adminassets/assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href=" <?php echo base_url('vendors/adminassets/assets/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/adminassets/assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/table/datatables/dataTables.bootstrap4.min.css') ?>">
    <link href="<?php echo base_url('vendors/swal/dist/sweetalert2.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<body>
    <!--navbar-->
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href=""><img src="" alt="logo" style="width:100px; height:100px;" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black"><?= $user->nama ?></p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="<?= base_url('pelelang/pengaturan/index') ?>">
                                <i class="mdi mdi-home menu-icon mr-2 text-primary"></i> Update Profile
                            </a>

                            <a class="dropdown-item" href="<?= base_url('user/logout'); ?>">
                                <i class="mdi mdi-logout mr-2 text-primary"></i> Logout
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
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    
                    <li class="nav-item nav-profile">
                        <a href="<?php echo base_url('pelelang/dashboard') ?>" class="nav-link">
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">Nama: <?= $user->nama ?></span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('pelelang/dashboard') ?>">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('pelelang/pemenang'); ?>">
                            <span class="menu-title">Pemenang Lelang</span>
                            <i class="mdi mdi mdi-account-multiple menu-icon"></i>
                        </a>
                    </li>

                    <?php if ($user->status == 1) { ?>
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
                                <span class="menu-title">Data barang Lelang</span>
                                <i class="menu-arrow"></i>
                                <i class="mdi mdi mdi-table-large menu-icon"></i>
                            </a>
                            <div class="collapse" id="ui-basic1">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('pelelang/product/tambah') ?>">Tambah Lelang</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('pelelang/product/index') ?>">Daftar Lelang</a></li>
                            </div>
                        </li>
                    <?php } ?>

                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">Transaksi</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-shopping menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('pelelang/transaksi/index') ?>">Pesanan Baru</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('pelelang/transaksi/perludicek') ?>">Perlu Di Cek</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('pelelang/transaksi/perludikirim') ?>">Perlu Di Kirim</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('pelelang/transaksi/dikirim') ?>">Barang Di Kirim</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('pelelang/transaksi/selesai') ?>">Selesai</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('pelelang/transaksi/dibatalkan') ?>">Dibatalkan</a></li>
                            </ul>
                        </div>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('pelelang/riwayat') ?>">
                            <span class="menu-title">Riwayat Penawaran</span>
                            <i class="fas fa-book menu-icon"></i>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('pelelang/RiwayatLelang') ?>">
                            <span class="menu-title">Riwayat Hasil Lelang</span>
                            <i class="fas fa-book menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('pelelang/feedback') ?>">
                            <span class="menu-title">Feedback</span>
                            <i class="mdi mdi mdi-message-text menu-icon"></i>
                        </a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('pelelang/Pengaturan') ?>">
                            <span class="menu-title">Pengaturan akun</span>
                            <i class="mdi mdi-shopping menu-icon menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <!--content-->
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-home"></i>
                            </span> <?= $title ?>
                        </h3>

                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav>
                    </div>