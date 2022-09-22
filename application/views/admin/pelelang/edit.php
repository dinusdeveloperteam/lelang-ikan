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
                        <h2 class="text-dark ">EDIT PELELANG</h2>

                        <div class="card mb-4">
                            <!-- Main content -->
                            <h5 class="card-header text-white bg-primary">Edit Pelelang Dengan Nama : <?php echo $row['nama']; ?></h5>
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
                                                <form action="<?php echo base_url(); ?>admin/pelelang/edit" method="post" class="form-horizontal">
                                                    <input type="hidden" name="id" value="<?php echo $row['pelelang_id'] ?>">
                                                    <div class="box-body">




                                                        <fieldset disabled>
                                                            <div class="form-group">
                                                                <label class="control-label disabledTextInput text-dark">ID Pelelang</label>
                                                                <input type="text" name="pesertaid" id="disabledTextInput" class="form-control" value="<?php echo $row['pelelang_id'] ?>">
                                                            </div>
                                                        </fieldset>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <fieldset disabled>
                                                                    <div class="form-group">
                                                                        <label class="control-label disabledTextInput text-dark">Username</label>
                                                                        <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $row['username'] ?>">
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">Nama</label>
                                                                    <input type="text" name="nama" class="form-control" value="<?php echo $row['nama'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">Nomor Telepon</label>
                                                                    <input type="number" name="notelp" class="form-control" value="<?php echo $row['telp'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">Email</label>
                                                                    <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">NIK</label>
                                                                    <input type="number" name="nik" class="form-control" value="<?php echo $row['nik'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">NPWP</label>
                                                                    <input type="number" name="npwp" class="form-control" value="<?php echo $row['npwp'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label text-dark">Alamat</label>
                                                            <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat'] ?>">
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">Kota</label>
                                                                    <input type="text" name="kota" class="form-control" value="<?php echo $row['kota'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">Kelurahan</label>
                                                                    <input type="text" name="kelurahan" class="form-control" value="<?php echo $row['kelurahan'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">Kecamatan</label>
                                                                    <input type="text" name="kecamatan" class="form-control" value="<?php echo $row['kecamatan'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">Provinsi</label>
                                                                    <input type="text" name="provinsi" class="form-control" value="<?php echo $row['provinsi'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">Bank</label>
                                                                    <input type="text" name="bank" class="form-control" value="<?php echo $row['bank'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">No Rekening</label>
                                                                    <input type="number" name="norek" class="form-control" value="<?php echo $row['norekening'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label text-dark">Atas Nama</label>
                                                                    <input type="text" name="atasnama" class="form-control" value="<?php echo $row['atasnama'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>




                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label text-dark">Foto KTP</label><br>
                                                                        <img src="<?= base_url('vendors/images/datadiri/') . $row['filektp']; ?>" alt="Gambar KTP" class="h-100 img-fluid img-thumbnail thumbnail zoom">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label text-dark">Foto NPWP</label><br>
                                                                        <img src="<?= base_url('vendors/images/datadiri/') . $row['filenpwp']; ?>" alt="Gambar NPWP" class="h-100 img-fluid img-thumbnail thumbnail zoom">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label text-dark">Foto SIUP</label><br>
                                                                        <img src="<?= base_url('vendors/images/datadiri/') . $row['fileSIUP']; ?>" alt="Gambar SIUP" class="h-100 img-fluid img-thumbnail thumbnail zoom">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="basic-url" class="text-dark">Jenis Usaha</label><br>
                                                                <div class="input-group mb-3">
                                                                    <select class="custom-select" name="jenis" id="jenis">
                                                                        <option value="<?= $row['jenis'] ?>"><?php if ($row['jenis'] == 0) {
                                                                                                                    echo "Perorangan";
                                                                                                                } else if ($row['jenis'] == 1) {
                                                                                                                    echo "Perusahaan";
                                                                                                                } else
                                                                                                                    echo "Tidak Diketahui";
                                                                                                                ?>
                                                                        </option>
                                                                        <option value="0">Perorangan</option>
                                                                        <option value="1">Perusahaan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="basic-url" class="text-dark">Status sebagai Pelelang</label><br>
                                                                <div class="input-group mb-3">
                                                                    <form action="<?= base_url('admin/pelelang/edit/' . $row['status']) ?>" method="POST">
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

                                                        <div class="form-group">
                                                            <label class="control-label text-dark">Deskripsi</label>
                                                            <!-- <input type="text" name="deskripsi" class="form-control" value="<? //php echo $row['deskripsi'] 
                                                                                                                                    ?>"> -->
                                                            <textarea class="form-control" name="deskripsi" id="deskripsi" aria-label="With textarea" height="56px"><?= $row['deskripsi'] ?></textarea>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <?php
                                            echo anchor('admin/pelelang', 'Kembali', array('class' => 'btn btn-secondary mr-5 ml-3'));
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