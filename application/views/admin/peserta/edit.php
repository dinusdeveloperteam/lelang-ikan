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
                        <h2 class="text-dark">EDIT PESERTA</h2>
                        <hr>







                        <div class="card mb-4">
                            <!-- Main content -->
                            <h5 class="card-header text-white bg-primary">Edit Data Peserta Dengan Nama : <?php echo $row['nama']; ?></h5>

                            <div class="card-body">
                                <h5 class="card-title text-dark"></h5>
                                <p class="card-text text-dark"></p>
                                <section class="content">
                                    <div class="row">
                                        <!-- right column -->
                                        <div class="col-md-12">
                                            <!-- Horizontal Form -->
                                            <div class="box box-info">



                                                <!-- form start -->
                                                <form action="<?php echo base_url(); ?>admin/peserta/edit/" method="post" class="form-horizontal">

                                                    <input type="hidden" class="form-control" name="id" value="<?php echo $row['peserta_id'] ?>">
                                                    <!-- <input type="hidden" name="peserta_id" value="<? //php echo $row['peserta_id'] 
                                                                                                        ?>"> -->



                                                    <div class="box-body">

                                                        <div class="row mb-5">
                                                            <div class="form-group col-md-6">
                                                                <label for="ktp" class="text-dark">Foto KTP</label><br>
                                                                <img src="<?= base_url('vendors/images/peserta/') . $row['filektp']; ?>" alt="Gambar KTP" class="h-100 img-fluid img-thumbnail thumbnail">
                                                                <!-- <input type="file" class="form-control-file" placeholder="File KTP" id="filektp" name="filektp"> -->

                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="npwp" class="text-dark">Foto NPWP</label><br>
                                                                <img src="<?= base_url('vendors/images/peserta/') . $row['filenpwp']; ?>" alt="Gambar NPWP" class="h-100 img-fluid img-thumbnail thumbnail">
                                                                <!-- <input type="file" class="form-control-file" placeholder="File NPWP" id="filenpwp" name="filenpwp" value=""> -->
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <fieldset disabled>
                                                                    <div class="form-group">
                                                                        <label class=" control-label disabledTextInput text-dark">ID Peserta</label>
                                                                        <input type="text" name="pesertaid" id="disabledTextInput" class="form-control" value="<?php echo $row['peserta_id'] ?>">
                                                                    </div>
                                                                </fieldset>

                                                                <fieldset disabled>
                                                                    <div class="form-group">
                                                                        <label class="control-label disabledTextInput text-dark">Username</label>
                                                                        <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $row['username'] ?>">
                                                                    </div>
                                                                </fieldset>

                                                                <div class="form-group">
                                                                    <label class=" control-label text-dark">Nama</label>
                                                                    <input type="text" name="nama" class="form-control" value="<?php echo $row['nama'] ?>">
                                                                </div>

                                                                <div class=" form-group">
                                                                    <label class="control-label text-dark">Nomor Telepon</label>
                                                                    <input type="text" name="notelp" class="form-control" value="<?php echo $row['telp'] ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">Email</label>
                                                                    <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>">
                                                                </div>





                                                                <label for="basic-url" class=" text-dark">Jenis Kelamin</label><br>
                                                                <div class="input-group mb-3">
                                                                    <form action="<?= base_url('admin/peserta/edit/' . $row['peserta_id']) ?>" method="POST">
                                                                        <select class="custom-select" name="jeniskelamin" id="jeniskel">
                                                                            <option value="<?= $row['jeniskel'] ?>">
                                                                                <?php if ($row['jeniskel'] == "L") {
                                                                                    echo "Laki-Laki";
                                                                                } else if ($row['jeniskel'] == "P") {
                                                                                    echo "Perempuan";
                                                                                } else {
                                                                                    echo "Jenis Kelamin Belum Diisi";
                                                                                } ?>
                                                                            </option>
                                                                            <option value="0">Jenis Kelamin Belum Diisi</option>
                                                                            <option value="L">Laki-Laki</option>
                                                                            <option value="P">Perempuan</option>
                                                                        </select>
                                                                </div>

                                                                <label for="basic-url" class="text-dark">Status sebagai Peserta</label><br>
                                                                <div class="input-group mb-3">
                                                                    <form action="<?= base_url('admin/peserta/edit/' . $row['status']) ?>" method="POST">
                                                                        <select class="custom-select" name="status" id="status">
                                                                            <option value="<?= $row['status'] ?>">
                                                                                <?php if ($row['status'] == 0) {
                                                                                    echo "Belum Diverifikasi";
                                                                                } else if ($row['status'] == 1) {
                                                                                    echo "Terverifikasi";
                                                                                } else if ($row['status'] == 2) {
                                                                                    echo "Ditolak";
                                                                                } else if ($row['status'] == 3) {
                                                                                    echo "Dibanned";
                                                                                } else {
                                                                                    echo "Belum Diketahui";
                                                                                } ?></option>
                                                                            <option value="0">Belum Diverifikasi</option>
                                                                            <option value="1">Terverifikasi</option>
                                                                            <option value="2">Ditolak</option>
                                                                            <option value="3">Dibanned</option>
                                                                        </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">Deposit Peserta</label>
                                                                    <input type="text" name="deposit" class="form-control" value="<?php echo $row['deposit'] ?>">
                                                                </div>


                                                            </div>



                                                            <div class="form-group col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">NIK</label>
                                                                    <input type="text" name="nik" class="form-control" value="<?php echo $row['nik'] ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">NPWP</label>
                                                                    <input type="text" name="npwp" class="form-control" value="<?php echo $row['npwp'] ?>">
                                                                </div>







                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">Alamat</label>
                                                                    <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat'] ?>">
                                                                </div>




                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">Kota</label>
                                                                    <input type="text" name="kota" class="form-control" value="<?php echo $row['kota'] ?>">
                                                                </div>



                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">Kelurahan</label>
                                                                    <input type="text" name="kelurahan" class="form-control" value="<?php echo $row['kelurahan'] ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">Kecamatan</label>
                                                                    <input type="text" name="kecamatan" class="form-control" value="<?php echo $row['kecamatan'] ?>">
                                                                </div>




                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">Provinsi</label>
                                                                    <input type="text" name="provinsi" class="form-control" value="<?php echo $row['provinsi'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>

                                            <!-- <div class="form-group">
                                                                <label class="col-sm-2 control-label text-dark">Deposit</label>
                                                                <div class="col-sm-10">
                                                                    <input type="number" name="deposit" class="form-control" value="<?php //echo $row['deposit'] 
                                                                                                                                    ?>">
                                                                </div>
                                                            </div> -->

                                            <!-- <fieldset disabled>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label disabledTextInput text-dark">Status</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="status" id="disabledTextInput" class="form-control" value="<?php
                                                                                                                                                            // if ($row['status'] == 0) {
                                                                                                                                                            //     echo "Belum Diverifikasi";
                                                                                                                                                            // } else if ($row['status'] == 1) {
                                                                                                                                                            //     echo "Terverifikasi";
                                                                                                                                                            // } else if ($row['status'] == 2) {
                                                                                                                                                            //     echo "Ditolak";
                                                                                                                                                            // } else {
                                                                                                                                                            //     echo "Dibanned";
                                                                                                                                                            // } 
                                                                                                                                                            ?>">
                                                                    </div>
                                                                </div>
                                                            </fieldset> -->




                                        </div>

                                        <!-- scrool old -->
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <?php
                                            echo anchor('admin/peserta', 'Kembali', array('class' => 'btn btn-secondary mr-5 ml-3'));
                                            ?>
                                            <button type="submit" name="submit" class="btn btn-info pull-right">Simpan</button>
                                        </div>
                                        <!-- /.box-footer -->

                                        </form>
                                    </div>
                                    <!-- /.box -->

                            </div>
                            <!--/.col (right) -->
                        </div>
                        <!-- /.row -->
                        </section>
                        <!-- /.content -->



                    </div>
                    <!-- End of Main Content -->

                </div>
                <!-- /.content-wrapper -->

            </div>
            <!-- /#wrapper -->


            <!-- Sticky Footer -->
            <?php $this->load->view("admin/_partials/footer.php") ?>

        </div>
    </div>


    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>