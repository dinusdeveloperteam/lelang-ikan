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
                        <h2 class="text-dark">DETAIL PESERTA</h2>
                        <hr>

                        <div class="card mb-4">
                            <h5 class="card-header text-white bg-primary">Data Detail Peserta Dengan Nama : <?php echo $row['nama']; ?></h5>
                            <div class="card-body table-responsive-xl">
                                <h5 class="card-title text-dark"></h5>
                                <p class="card-text text-dark"></p>
                                <form>
                                    <div class="row mb-5">
                                        <div class="form-group col-md-6">
                                            <label class="control-label text-dark">Foto KTP</label><br>
                                            <?php if ($row['filenpwp'] == null) {
                                                echo "Gambar KTP Belum Diupload";
                                            } else {
                                                echo '<img src="' . base_url("vendors/images/peserta/" . $row["filektp"]) . '" alt="Gambar NPWP" class="h-100 img-fluid img-thumbnail thumbnail">';
                                            }
                                            ?>
                                            <!-- <img src="<? //= base_url('vendors/images/peserta/') . $row['filektp']; 
                                                            ?>" alt="Gambar KTP" class="h-100 img-fluid img-thumbnail thumbnail"> -->
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label text-dark">Foto NPWP</label><br>
                                            <?php if ($row['filenpwp'] == null) {
                                                echo "Gambar NPWP Belum Diupload";
                                            } else {
                                                echo '<img src="' . base_url("vendors/images/peserta/" . $row["filenpwp"]) . '" alt="Gambar NPWP" class="h-100 img-fluid img-thumbnail thumbnail">';
                                            }
                                            ?>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group">
                                                <label class=" control-label text-dark">ID Peserta</label>
                                                <input type="text" name="peserta_id" readonly class="form-control" value="<?php echo $row['peserta_id'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div class="form-group">
                                                <label class=" control-label text-dark">NIK</label>
                                                <input type="text" name="nik" readonly class="form-control" value="<?php echo $row['nik'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class=" form-group">
                                                <label class="control-label text-dark">Username</label>
                                                <input type="text" name="username" readonly class="form-control" value="<?php echo $row['username'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class=" form-group">
                                                <label class="control-label text-dark">NPWP</label>
                                                <input type="text" name="npwp" readonly class="form-control" value="<?php echo $row['npwp'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group">
                                                <label class=" control-label text-dark">Nama Peserta</label>
                                                <input type="text" name="nama" readonly class="form-control" value="<?php echo $row['nama'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class=" form-group">
                                                <label class="control-label text-dark">Jenis Kelamin</label>
                                                <input type="text" name="jeniskelamin" readonly class="form-control" value="<?php if ($row['jeniskel'] == "L") {
                                                                                                                                echo "Laki-Laki";
                                                                                                                            } else if ($row['jeniskel'] == "P") {
                                                                                                                                echo "Perempuan";
                                                                                                                            } else {
                                                                                                                                echo "Jenis Kelamin Belum Diisi";
                                                                                                                            }
                                                                                                                            ?>">

                                            </div>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <label class=" control-label text-dark">Alamat</label>
                                        <input type="text" name="nama" readonly class="form-control" value="<?php echo $row['alamat'] ?>">
                                    </div>


                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class=" form-group">
                                                <label class="control-label text-dark">Nomor Telepon</label>
                                                <input type="text" name="notelp" readonly class="form-control" value="<?php echo $row['telp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div class="form-group">
                                                <label class=" control-label text-dark">Kota</label>
                                                <input type="text" name="kota" readonly class="form-control" value="<?php echo $row['kota'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group">
                                                <label class=" control-label text-dark">Email</label>
                                                <input type="text" name="email" readonly class="form-control" value="<?php echo $row['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class=" form-group">
                                                <label class="control-label text-dark">Kelurahan</label>
                                                <input type="text" name="kelurahan" readonly class="form-control" value="<?php echo $row['kelurahan'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class=" form-group">
                                                <label class="control-label text-dark">Status Sebagai Peserta</label>
                                                <input type="text" name="provinsi" readonly class="form-control" value="<?php
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
                                        <div class="form-group col-md-6">
                                            <div class="form-group">
                                                <label class=" control-label text-dark">Kecamatan</label>
                                                <input type="text" name="kecamatan" readonly class="form-control" value="<?php echo $row['kecamatan'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class=" form-group">
                                                <label class="control-label text-dark">Deposit Peserta</label>
                                                <input type="text" name="deposit" readonly class="form-control" value="Rp <?php echo number_format($row['deposit']) ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class=" form-group">
                                                <label class="control-label text-dark">Provinsi</label>
                                                <input type="text" name="provinsi" readonly class="form-control" value="<?php echo $row['provinsi'] ?>">
                                            </div>
                                        </div>
                                    </div>



                                    <!-- <tr>
                                        <td>Deposit</td>
                                        <td>:</td>
                                        <td><?php //echo $row['deposit']; 
                                            ?></td>
                                    </tr> -->
                                </form>
                                <div class="box-footer">
                                    <?php
                                    echo anchor('admin/peserta', 'Kembali', array('class' => 'btn btn-secondary'));
                                    ?>
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