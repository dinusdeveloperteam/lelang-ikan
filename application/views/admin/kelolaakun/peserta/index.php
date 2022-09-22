<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

    <div id="wrapper">

        <?php $this->load->view("admin/_partials/sidebar.php") ?>





        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <div id="content-wrapper">

                    <?php $this->load->view("admin/_partials/navbar.php") ?>

                    <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
                    <?php // $this->load->view("admin/_partials/breadcrumb.php") ?>


                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Kelola Akun Peserta</h1>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                        </div>

                       


                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->


                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Testimoni</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered  text-dark" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="text-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>ID Lelang</th>
                                                    <th>ID Peserta</th>
                                                    <th>Nama</th>
                                                    <th>Produk</th>
                                                    <th>Testimoni</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot class="text-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>ID Lelang</th>
                                                    <th>ID Peserta</th>
                                                    <th>Nama</th>
                                                    <th>Produk</th>
                                                    <th>Testimoni</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>9912</td>
                                                    <td>550112</td>
                                                    <td>Wahyu Samsudin</td>
                                                    <td>Ikan Lele</td>
                                                    <td>Ikan Lele Segar Cepat Pengirimannya</td>
                                                    <td><button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                            Ubah
                                                            <i class="fas fa-user-edit"></i>                       
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                            Hapus
                                                            <i class="fas fa-trash-alt"></i>                        
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>9913</td>
                                                    <td>550113</td>
                                                    <td>Susanto</td>
                                                    <td>Ikan Bawal</td>
                                                    <td>Ikan Bawal Segar, Pengirimannya sangat cepat</td>
                                                    <td><button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                            Ubah
                                                            <i class="fas fa-user-edit"></i>                       
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                            Hapus
                                                            <i class="fas fa-trash-alt"></i>                        
                                                        </button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>3</td>
                                                    <td>9914</td>
                                                    <td>550114</td>
                                                    <td>Beny Wahyudi</td>
                                                    <td>Ikan Gabus</td>
                                                    <td>Takaran berbeda, lelang 10kg dikirim 8kg.</td>
                                                    <td><button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                            Ubah
                                                            <i class="fas fa-user-edit"></i>                       
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                            Hapus
                                                            <i class="fas fa-trash-alt"></i>                        
                                                        </button>
                                                    </td>
                                                </tr>

                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->



                    <!-- Sticky Footer -->
                    <?php $this->load->view("admin/_partials/footer.php") ?>

                </div>
                <!-- /.content-wrapper -->

            </div>
            <!-- /#wrapper -->


            <?php $this->load->view("admin/_partials/scrolltop.php") ?>
            <?php $this->load->view("admin/_partials/modal.php") ?>
            <?php $this->load->view("admin/_partials/js.php") ?>


</body>

</html>