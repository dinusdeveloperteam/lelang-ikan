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
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h1 class="h3 mb-0 text-gray-800">Deposit Peserta</h1>
                        </div>
                        <hr>
                        <?php if ($this->session->flashdata('message')) {
                            echo '<p class="warning" style="margin: 10px 20px;">' . $this->session->flashdata('message') . '</p>';
                        } ?>


                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('success') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif ?>




                        <!-- Begin Page Content -->

                        <!-- Page Heading -->


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <!-- <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Peserta Lelang</h6>
                            </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table  table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Peserta</th>
                                                <th>Tanggal Deposit</th>
                                                <th>Nominal Deposit</th>
                                                <th>Status Deposit</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($deposit as $d) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $d['nama'] ?></td>
                                                    <td><?= $d['tgl_deposit'] ?></td>
                                                    <td><?= $d['nominal_deposit'] ?></td>
                                                    <td> <?php if ($d['status_deposit'] == 0) {
                                                                echo "Belum Diverifikasi";
                                                            } else if ($d['status_deposit'] == 1) {
                                                                echo "Telah Diverifikasi";
                                                            } else if ($d['status_deposit'] == 2) {
                                                                echo "Ditolak";
                                                            } else {
                                                                echo "Belum Diketahui";
                                                            } ?>
                                                    </td>




                                                    <td>

                                                        <a href="#" class="btn btn-sm btn-warning mr-2" data-toggle="modal" data-target="#editMenuModal<?= $d['deposit_id'] ?>"><i class="fas fa-edit"></i><small>Ubah</small></a>
                                                        <!-- Edit Menu Modal -->
                                                        <div class="modal fade" id="editMenuModal<?= $d['deposit_id'] ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content bg-default">
                                                                    <div class="modal-header ">
                                                                        <h5 class="modal-title font-weight-bold" id="editOrderModal">Peserta Deposit</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-dark font-weight-bold">
                                                                        <?php
                                                                        ?>
                                                                        <form action="<?= base_url('admin/deposit/edit/' . $d['deposit_id']) ?>" method="POST">
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <label for="basic-url">ID Deposit</label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" name="deposit_id" id="deposit_id" value="<?= $d['deposit_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div>

                                                                                        <label for="basic-url">ID Peserta</label><br>
                                                                                        <div class="input-group mb-1">
                                                                                            <input type="text" class="form-control" name="peserta_id" id="peserta_id" value="<?= $d['peserta_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div><br>



                                                                                        <label for="basic-url">Nama Peserta</label><br>
                                                                                        <div class="input-group mb-1">
                                                                                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $d['nama'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div><br>



                                                                                        <label for="basic-url">Tanggal Deposit</label><br>
                                                                                        <div class="input-group mb-1">
                                                                                            <input type="text" class="form-control" name="tgl_deposit" id="tgl_deposit" value="<?= $d['tgl_deposit'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div><br>





                                                                                        <label for="basic-url">Keterangan</label>
                                                                                        <br>
                                                                                        <div class="input-group mb-1">
                                                                                            <textarea class="form-control" name="keterangan" id="keterangan" aria-label="With textarea" height="56px" readonly><?= $d['keterangan'] ?></textarea>
                                                                                        </div><br>


                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="basic-url">Status Deposit</label><br>
                                                                                        <div class="input-group mb-3">
                                                                                            <select class="custom-select" name="status_deposit" id="status_deposit">
                                                                                                <option value="<?= $d['status_deposit'] ?>"><?php
                                                                                                                                            if ($d['status_deposit'] == 0) {
                                                                                                                                                echo 'Belum Diverifikasi';
                                                                                                                                            } else if ($d['status_deposit'] == 1) {
                                                                                                                                                echo 'Telah Diverifikasi';
                                                                                                                                            } else if ($d['status_deposit'] == 2) {
                                                                                                                                                echo 'Ditolak';
                                                                                                                                            } else {
                                                                                                                                                echo 'Belum Diketahui';
                                                                                                                                            }
                                                                                                                                            ?></option>
                                                                                                <option value="0">Belum Diverifikasi</option>
                                                                                                <option value="1">Telah Diverifikasi</option>
                                                                                                <option value="2">Ditolak</option>
                                                                                            </select>
                                                                                        </div>

                                                                                        <label for="basic-url">Nominal Deposit</label><br>
                                                                                        <div class="input-group mb-1">
                                                                                            <input type="text" class="form-control" name="nominal_deposit" id="nominal_deposit" value="Rp <?= number_format($d['nominal_deposit']) ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div><br>


                                                                                        <label for="basic-url">Bukti Pembayaran</label><br>
                                                                                        <div class="input-group mb-1">
                                                                                            <img src="<?= base_url('vendors/images/pembayaran/' . $d['bukti_pembayaran']) ?>" class="img-thumbnail thumbnail zoom" width="200px" alt="Gambar Bukti Transfer <?= $d['bukti_pembayaran'] ?>">
                                                                                        </div>
                                                                                    </div>






                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletepesertaModal<?= $d['deposit_id'] ?>"><i class="fas fa-trash-can"></i><small>Hapus</small></a>
                                                        <div class="modal fade" id="deletepesertaModal<?= $d['deposit_id'] ?>" tabindex="-1" aria-labelledby="deletepesertaModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-white">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title font-weight-bold" id="deletepesertaModalLabel">Hapus Data Deposit Peserta Lelang</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5>Yakin ingin menghapus Data Deposit Peserta Lelang dengan Nama "<?= $d['nama'] ?>" ?</h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                        <a href="<?= base_url() ?>admin/deposit/deletedeposit/<?= $d['deposit_id']; ?>" class="btn btn-danger">Ya</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- /.container-fluid -->

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