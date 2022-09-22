<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href=" <?php echo base_url('vendors/adminassets/assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href=" <?php echo base_url('vendors/adminassets/assets/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/adminassets/assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/adminassets/assets/css/customstyle.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/swal/dist/sweetalert2.min.css') ?>">
</head>

<body>
    <!--navbar-->
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
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
                                <img src="<?php echo base_url('vendors/adminassets/assets/images/faces/face1.jpg') ?>" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">Panitia</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-account mr-2 text-success"></i>
                                <span>Profile</span>
                            </a>
                            <a class="dropdown-item" href="<?php echo base_url('home');?>" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
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
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="<?php echo base_url('dashboard.php') ?>" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="<?php echo base_url('vendors/adminassets/assets/images/faces/face1.jpg') ?>" alt="profile">
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
                        <a class="nav-link" href="<?php echo base_url('') ?>">
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
                                    <a class="nav-link" href="<?= base_url('panitia/kelola_lelang/pelelang') ?>">Pelelang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('panitia/peserta') ?>">Peserta Lelang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('') ?>">Pembukaan Lelang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('') ?>">Penawaran Lelang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('') ?>">Pemenang Lelang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('') ?>">Penerima Lelang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('') ?>">Pembayaran Lelang</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#kelola-produk" aria-expanded="false" aria-controls="ui-basic1">
                            <span class="menu-title">Kelola Produk</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-account-multiple menu-icon"></i>
                        </a>
                        <div class="collapse" id="kelola-produk">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('') ?>">Surat Perintah</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('') ?>">Status</a>
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
                                    <a class="nav-link" href="<?= base_url('') ?>">Verifikasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('') ?>">Pembayaran Lelang</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('') ?>">
                            <span class="menu-title">Riwayat Lelang</span>
                            <i class="mdi mdi-equal-box menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('') ?>">
                            <span class="menu-title">Feedback</span>
                            <i class="mdi mdi-comment-account menu-icon"></i>
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
                            </span> Dashboard
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-danger card-img-holder text-white shadow p-2 bg-white rounded">
                                <div class="card-body">
                                    <img src="<?php echo base_url('vendors/adminassets/assets/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">
                                        <span>Jumlah Pelelang</span>
                                        <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5">50</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-info card-img-holder text-white shadow p-2 bg-white rounded">
                                <div class="card-body">
                                    <img src="<?php echo base_url('vendors/adminassets/assets/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">
                                        <span>Jumlah Peserta Lelang</span>
                                        <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5">10</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-success card-img-holder text-white shadow p-2 bg-white rounded">
                                <div class="card-body">
                                    <img src="<?php echo base_url('vendors/adminassets/assets/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Pemenang Lelang <i class="mdi mdi-diamond mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5">20</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer bg-white">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between" style="border: none;">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo base_url('vendors/adminassets/assets/vendors/js/vendor.bundle.base.js') ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo base_url('vendors/adminassets/assets/vendors/chart.js/Chart.min.js') ?>"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url('vendors/adminassets/assets/js/off-canvas.js') ?>"></script>
    <script src="<?php echo base_url('vendors/adminassets/assets/js/hoverable-collapse.js') ?>"></script>
    <script src="<?php echo base_url('vendors/adminassets/assets/js/misc.js') ?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?php echo base_url('vendors/adminassets/assets/js/dashboard.js') ?>"></script>
    <script src="<?php echo base_url('vendors/adminassets/assets/js/todolist.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('vendors/table/jquery-easing/jquery.easing.min.js') ?>"></script>
    <script src="<?php echo base_url('vendors/table/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('vendors/table/datatables/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?php echo base_url('vendors/swal/dist/sweetalert2.min.js') ?>"></script>

</body>

</html>