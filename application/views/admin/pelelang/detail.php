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
                        <h2 class="text-dark">DETAIL PELELANG</h2>
                        <hr>

                        <div class="card mb-4">
                            <h5 class="card-header text-white bg-primary">Data Detail Pelelang Dengan Nama : <?php echo $row['nama']; ?></h5>
                            <div class="card-body table-responsive-xl">
                                <h5 class="card-title text-dark"></h5>
                                <p class="card-text text-dark"></p>
                                <!-- right column -->
                                <div class="col-md-12">
                                    <!-- Horizontal Form -->
                                    <div class="box box-info">

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
                                                    <input type="text" name="nama" class="form-control" value="<?php echo $row['nama'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label text-dark">Nomor Telepon</label>
                                                    <input type="number" name="notelp" class="form-control" value="<?php echo $row['telp'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label text-dark">Email</label>
                                                    <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label text-dark">NIK</label>
                                                    <input type="number" name="nik" class="form-control" value="<?php echo $row['nik'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label text-dark">NPWP</label>
                                                    <input type="number" name="npwp" class="form-control" value="<?php echo $row['npwp'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label text-dark">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat'] ?>" readonly>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label text-dark">Kota</label>
                                                    <input type="text" name="kota" class="form-control" value="<?php echo $row['kota'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label text-dark">Kelurahan</label>
                                                    <input type="text" name="kelurahan" class="form-control" value="<?php echo $row['kelurahan'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label text-dark">Kecamatan</label>
                                                    <input type="text" name="kecamatan" class="form-control" value="<?php echo $row['kecamatan'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label text-dark">Provinsi</label>
                                                    <input type="text" name="provinsi" class="form-control" value="<?php echo $row['provinsi'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label text-dark">Bank</label>
                                                    <input type="text" name="bank" class="form-control" value="<?php echo $row['bank'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label text-dark">No Rekening</label>
                                                    <input type="number" name="norek" class="form-control" value="<?php echo $row['norekening'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label text-dark">Atas Nama</label>
                                                    <input type="text" name="atasnama" class="form-control" value="<?php echo $row['atasnama'] ?>" readonly>
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
                                                <div class=" form-group">
                                                    <label for="basic-url" class="text-dark">Jenis Usaha</label><br>
                                                    <input type="text" name="status" readonly class="form-control" value="<?php
                                                                                                                            if ($row['jenis'] == 0) {
                                                                                                                                echo "Perorangan";
                                                                                                                            } else if ($row['jenis'] == 1) {
                                                                                                                                echo "Perusahaan";
                                                                                                                            } else {
                                                                                                                                echo "Tidak diketahui";
                                                                                                                            }
                                                                                                                            ?>">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class=" form-group">
                                                    <label class="control-label text-dark">Status Sebagai Pelelang</label>
                                                    <input type="text" name="status" readonly class="form-control" value="<?php
                                                                                                                            if ($row['status'] == 0) {
                                                                                                                                echo "Belum Diverifikasi";
                                                                                                                            } else if ($row['status'] == 1) {
                                                                                                                                echo "Terverifikasi";
                                                                                                                            } else if ($row['status'] == 2) {
                                                                                                                                echo "Ditolak";
                                                                                                                            } else if ($row['status'] == 3) {
                                                                                                                                echo "Dibanned";
                                                                                                                            } else {
                                                                                                                                echo "status tidak diketahui";
                                                                                                                            }
                                                                                                                            ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label text-dark">Deskripsi</label>
                                            <!-- <input type="text" name="deskripsi" class="form-control" value="<? //php echo $row['deskripsi'] 
                                                                                                                    ?>"> -->
                                            <textarea class="form-control" name="deskripsi" readonly id="deskripsi" aria-label="With textarea" height="56px"><?= $row['deskripsi'] ?></textarea>
                                        </div>
                                    </div>






                                    <!--
                        <tr>
                            <td>Deposit</td>
                            <td>:</td>
                            <td><? // php echo $row['deposit']; 
                                ?></td>
                        </tr>
                        -->
                                    <div class="box-footer">
                                        <?php
                                        echo anchor('admin/pelelang', 'Kembali', array('class' => 'btn btn-secondary'));
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>




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