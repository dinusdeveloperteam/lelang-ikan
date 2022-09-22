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
                    <?php // $this->load->view("admin/_partials/breadcrumb.php") 
                    ?>


                    <!-- Begin Page Content -->
                    <div class="container-fluid">





                        <!-- Begin Page Content -->

                        <!-- Page Heading -->
                        <h2 class="text-dark">Tambah Peserta Lelang</h2>
                        <hr>


                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('success') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif ?>




                        <div class="card mb-4">
                            <!-- Main content -->
                            <h5 class="card-header text-white bg-primary">Silahkan Tambah Peserta Lelang Dibawah ini !</h5>
                            <div class="card-body">
                                <h5 class="card-title text-dark"></h5>
                                <p class="card-text text-dark"></p>
                                <section class="content">
                                    <div class="row">
                                        <!-- right column -->
                                        <div class="col-md-6 text-dark">
                                            <?php echo form_open('admin/peserta/tambah_peserta/'); ?>

                                            <form action="" method="post" enctype="multipart/form-data">


                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                                    <input type="text" class="form-control" id="nama" placeholder="Masukan nama" name="nama" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="peserta@contoh.com" name="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                                    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Masukan username" name="username" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
                                                </div>

                                        </div>
                                        <!-- /.Col -->
                                        <div class="col-md-6 text-dark">
                                            <div class="form-group">
                                                <label for="number_phone">Nomor HP/Telp</label>
                                                <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                                                <input type="number" class="form-control" id="number_phone" aria-describedby="emailHelp" placeholder="Masukan Nomor Telepon" name="telp" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">NIK</label>
                                                <input type="number" class="form-control" id="nik" placeholder="Masukan NIK" name="nik">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Alamat</label>
                                                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" required></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-info">Daftar</button>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                    <!--/.Row -->
                            </div>
                            <!-- /.row -->
                            </section>
                            <!-- /.content -->

                        </div>





                    </div>
                    <!-- /.content-wrapper -->

                </div>
                <!-- /#wrapper -->

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



            <!-- Sticky Footer -->
            <?php $this->load->view("admin/_partials/footer.php") ?>

        </div>
    </div>


    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>