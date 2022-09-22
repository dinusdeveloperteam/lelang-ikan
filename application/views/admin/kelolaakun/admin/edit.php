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
                        <!-- Page Heading -->
                        <h2 class="text-dark">EDIT ADMIN LELANG IKAN</h2>
                        <hr>
                        <?php if ($this->session->flashdata('message')) {
                            echo '<p class="warning" style="margin: 10px 20px;">' . $this->session->flashdata('message') . '</p>';
                        } ?>

                        <div class="card mb-4">
                            <!-- Main content -->
                            <h5 class="card-header text-white bg-primary">Edit Admin Dengan Nama : <?php echo $admin['nama']; ?></h5>
                            <div class="card-body">
                                <h5 class="card-title text-dark"></h5>
                                <p class="card-text text-dark"></p>
                                <section class="content">
                                    <div class="row">
                                        <!-- right column -->
                                        <div class="col-md-6">
                                            <!-- Horizontal Form -->
                                            <div class="box box-info">

                                                <!-- form start -->

                                                <form action="<?php echo base_url('admin/kelola_akun/admin/admin_edit/' . $admin['userid']); ?>" method="POST" class="form-horizontal">

                                                    <div class="box-body">
                                                        <fieldset disabled>
                                                            <div class="form-group">
                                                                <label class="control-label disabledTextInput text-dark">Username</label>
                                                                <input type="text" name="username" id="disabledTextInput" class="form-control" value="<?php echo $admin['username'] ?>">
                                                            </div>
                                                        </fieldset>

                                                        <div class="form-group">
                                                            <label class="control-label text-dark">Nama Lengkap</label>
                                                            <input type="text" name="nama" required class="form-control" value="<?php echo $admin['nama'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label text-dark">Nomor HP/Telepon</label>
                                                            <input type="text" name="telp" required class="form-control" value="<?php echo $admin['telp'] ?>">
                                                        </div>




                                                        <fieldset disabled>
                                                            <div class="form-group">
                                                                <label class="control-label disabledTextInput text-dark">Hak Akses</label>
                                                                <input type="text" name="role" id="disabledTextInput" class="form-control" value="<?php
                                                                                                                                                    if ($admin['role'] == 1) {
                                                                                                                                                        echo "Administrator";
                                                                                                                                                    } else {
                                                                                                                                                        echo "Tidak Diketahui";
                                                                                                                                                    }
                                                                                                                                                    ?>">

                                                            </div>
                                                        </fieldset>
                                                    </div>
                                            </div>

                                            <button type="submit" class="btn btn-info" style="float:left">
                                                <i class="mdi mdi-content-save"></i>
                                                <span>Ubah Profil</span>
                                            </button>

                                            </form>
                                        </div>
                                        <!-- /.Col -->
                                        <div class="col-md-6 text-dark">
                                            <form action="<?php echo base_url() ?>admin/kelola_akun/admin/changepassword/<?= $admin['userid'] ?>" method="POST" class="form-horizontal">
                                                <input type="hidden" name="id" value="<?php echo $admin['userid'] ?>">
                                                <?= form_error('currentPassword', '<small class="text-danger">', '</small>'); ?>
                                                <label for="basic-url">Password Lama</label>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" name="currentPassword" required id="currentPassword" aria-describedby="basic-addon3">
                                                </div>

                                                <label for="basic-url">Password Baru</label><br>
                                                <?= form_error('newPassword2', '<small class="text-danger">', '</small>'); ?>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" name="newPassword1" required id="newPassword1" aria-describedby="basic-addon3">
                                                </div>

                                                <label for="basic-url">Ulangi Password Baru</label><br>
                                                <?= form_error('newPassword2', '<small class="text-danger">', '</small>'); ?>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" name="newPassword2" required id="newPassword2" aria-describedby="basic-addon3">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <button type="submit" class="btn btn-info">Ubah Password</button>

                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                    <!--/.Row -->
                            </div>
                            <!-- /.row -->
                            </section>
                            <!-- /.content -->

                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

                </div>
                <!-- End of Main Content -->

            </div>
            <!-- /.content-wrapper -->



            <!-- Sticky Footer -->
            <?php $this->load->view("admin/_partials/footer.php") ?>

        </div>

    </div>
    <!-- /#wrapper -->








    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>