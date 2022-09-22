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
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h2 class="text-dark font-weight-bold">EDIT PEMBUKAAN LELANG</h2>

                            <div class="card mb-4">
                                <!-- Main content -->
                                <h5 class="card-header text-white bg-primary">Pembukaan Lelang Dengan ID : <?php echo $row['lelang_id']; ?></h5>
                                <div class="card-body">
                                    <h5 class="card-title text-dark"></h5>
                                    <p class="card-text text-dark"></p>
                                    <section class="content">
                                        <div class="row">
                                            <!-- right column -->
                                            <div class="col-md-8">
                                                <!-- Horizontal Form -->
                                                <div class="box box-info">

                                                    <!-- form start -->
                                                    <form action="<?php echo base_url(); ?>admin/penawaran/edit" method="post" class="form-horizontal">
                                                        <input type="hidden" name="id" value="<?php echo $row['peserta_id'] ?>">
                                                        <div class="box-body">

                                                            <tr>

                                                                <td>
                                                                    <label class="col-sm-2 control-label text-dark">Foto KTP</label><br>
                                                                    <div class="col-sm-10">
                                                                        <img src="<?= base_url('vendors/images/') . $row['filektp']; ?>" alt="Gambar KTP" width="375px" height="275px" class="img-fluid">
                                                                    </div>
                                                                </td>

                                                            </tr><br>



                                                            <fieldset disabled>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label disabledTextInput text-dark">ID Peserta</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="pesertaid" id="disabledTextInput" class="form-control" value="<?php echo $row['peserta_id'] ?>">
                                                                    </div>
                                                                </div>
                                                            </fieldset>

                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-dark">Nama</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="nama" class="form-control" value="<?php echo $row['nama'] ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-dark">NIK</label>
                                                                <div class="col-sm-10">
                                                                    <input type="number" name="nik" class="form-control" value="<?php echo $row['nik'] ?>">
                                                                </div>
                                                            </div>

                                                            <fieldset disabled>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label disabledTextInput text-dark">Username</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $row['username'] ?>">
                                                                    </div>
                                                                </div>
                                                            </fieldset>




                                                            <label for="basic-url" class="ml-3 text-dark">Jenis Kelamin</label><br>
                                                            <div class="col-sm-10">
                                                                <div class="input-group mb-3">



                                                                    <form action="<?= base_url('admin/peserta/edit/' . $row['peserta_id']) ?>" method="POST">
                                                                        <select class="custom-select" name="jeniskelamin" id="jeniskel">
                                                                            <option value="<?= $row['jeniskel'] ?>">
                                                                                <?php if ($row['jeniskel'] == 0) {
                                                                                    echo "Belum Diisi";
                                                                                } else if ($row['jeniskel'] == 1) {
                                                                                    echo "Laki-Laki";
                                                                                } else if ($row['jeniskel'] == 2) {
                                                                                    echo "Perempuan";
                                                                                } else {
                                                                                    echo "Jenis Kelamin tidak diketahui";
                                                                                } ?></option>
                                                                            <option value="0">Belum Diisi</option>
                                                                            <option value="1">Laki-Laki</option>
                                                                            <option value="2">Perempuan</option>
                                                                        </select>
                                                                </div>
                                                            </div>




                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-dark">Alamat</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat'] ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-dark">Kota</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="kota" class="form-control" value="<?php echo $row['kota'] ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-dark">Kecamatan</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="kecamatan" class="form-control" value="<?php echo $row['kecamatan'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-dark">Kelurahan</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="kelurahan" class="form-control" value="<?php echo $row['kelurahan'] ?>">
                                                                </div>
                                                            </div>




                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-dark">Provinsi</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="provinsi" class="form-control" value="<?php echo $row['provinsi'] ?>">
                                                                </div>
                                                            </div>



                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-dark">Nomor Telepon</label>
                                                                <div class="col-sm-10">
                                                                    <input type="number" name="notelp" class="form-control" value="<?php echo $row['telp'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-dark">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>">
                                                                </div>
                                                            </div>

                                                            <tr>

                                                                <td>
                                                                    <label class="col-sm-2 control-label text-dark">Foto NPWP</label><br>
                                                                    <div class="col-sm-10">
                                                                        <img src="<?= base_url('vendors/images/') . $row['filenpwp']; ?>" alt="Gambar NPWP" width="375px" height="275px" class="img-fluid">
                                                                    </div>
                                                                </td>

                                                            </tr><br>



                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-dark">NPWP</label>
                                                                <div class="col-sm-10">
                                                                    <input type="number" name="npwp" class="form-control" value="<?php echo $row['npwp'] ?>">
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


                                                            <label for="basic-url" class="ml-3 text-dark">Status sebagai Peserta</label><br>
                                                            <div class="col-sm-10">
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
                                                            </div>

                                                        </div>
                                                        <!-- /.box-body -->
                                                        <div class="box-footer">
                                                            <?php
                                                            echo anchor('admin/peserta', 'Kembali', array('class' => 'btn btn-secondary mr-5 ml-3'));
                                                            ?>
                                                            <button type="submit" name="submit" class="btn btn-info pull-right">Submit</button>
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