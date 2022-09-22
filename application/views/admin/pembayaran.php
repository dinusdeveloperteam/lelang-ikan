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
                            <h1 class="h3 mb-0 text-gray-800">Informasi Pembayaran Lelang</h1>
                        </div>
                        <hr>
                        <?php if ($this->session->flashdata('message')) {
                            echo '<p class="warning" style="margin: 10px 20px;">' . $this->session->flashdata('message') . '</p>';
                        } ?>




                        <!-- Begin Page Content -->

                        <!-- Page Heading -->


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <!-- <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran Lelang</h6>
                            </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table  table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Peserta</th>
                                                <th>Nama Produk</th>
                                                <th>Nominal Pembayaran</th>
                                                <th>Status Pembayaran</th>
                                                <th width="153px">Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>


                                            <?php $i = 1; ?>
                                            <?php foreach ($pembayaran as $u) : ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $u['nama_peserta']; ?></td>
                                                    <td><?= $u['produk']; ?></td>
                                                    <td>Rp <?= number_format($u['nominal_dibayarkan']) ?></td>
                                                    <td class="text-light">
                                                        <?php
                                                        if ($u['status'] == 0) {
                                                            echo '<span class="badge bg-secondary">Belum Dibayar</span>';
                                                        } else if ($u['status'] == 1) {
                                                            echo '<span class="badge bg-success">Telah Dibayar</span>';
                                                        } else {
                                                            echo '<span class="badge bg-danger">Ditolak</span>';
                                                        }
                                                        ?>
                                                    </td>


                                                    <!-- <td><img src="<? //= base_url('vendors/images/pembayaran/') . $u['bukti_pembayaran']; 
                                                                        ?>" alt="poster" width="75px"></td> -->


                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-warning mr-2" data-toggle="modal" data-target="#editMenuModal<?= $u['lelang_id'] ?>"><i class="fas fa-edit"></i><small>Ubah</small></a>
                                                        <!-- Edit Menu Modal -->
                                                        <div class="modal fade" id="editMenuModal<?= $u['lelang_id'] ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content bg-default">
                                                                    <div class="modal-header ">
                                                                        <h5 class="modal-title font-weight-bold" id="editOrderModal">Detail Pembayaran Lelang</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-dark font-weight-bold">
                                                                        <?php
                                                                        ?>
                                                                        <form action="<?= base_url('admin/pembayaran/edit/' . $u['lelang_id']) ?>" method="POST">
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <label for="basic-url">ID Lelang </label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" name="lelang_id" id="lelang_id" value="<?= $u['lelang_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div>

                                                                                        <label for="basic-url">ID Peserta</label><br>
                                                                                        <div class="input-group mb-1">
                                                                                            <input type="text" class="form-control" name="peserta_id" id="peserta_id" value="<?= $u['peserta_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div><br>



                                                                                        <label for="basic-url">Nama Peserta</label><br>
                                                                                        <div class="input-group mb-1">
                                                                                            <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" value="<?= $u['nama_peserta'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div><br>



                                                                                        <label for="basic-url">Nama Produk</label><br>
                                                                                        <div class="input-group mb-1">
                                                                                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?= $u['produk'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div><br>




                                                                                    </div>
                                                                                    <div class="col-6">



                                                                                        <label for="basic-url">Tanggal Pembayaran</label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" name="tanggal_pembayaran" id="tanggal_pembayaran" value="<?= $u['tgl_pembayaran'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div>

                                                                                        <label for="basic-url">Nominal Dibayarkan</label><br>
                                                                                        <div class="input-group mb-1">
                                                                                            <input type="text" class="form-control" name="nominal_dibayarkan" id="nominal_dibayarkan" value="Rp <?= number_format($u['nominal_dibayarkan']) ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div><br>


                                                                                        <label for="basic-url">Status Dibayarkan</label><br>
                                                                                        <div class="input-group mb-1">
                                                                                            <select class="custom-select" name="status" id="status">
                                                                                                <option value="<?= $u['status'] ?>"><?php
                                                                                                                                    if ($u['status'] == 0) {
                                                                                                                                        echo 'Belum Dibayar';
                                                                                                                                    } else if ($u['status'] == 1) {
                                                                                                                                        echo 'Telah Dibayar';
                                                                                                                                    } else if ($u['status'] == 2) {
                                                                                                                                        echo 'Ditolak';
                                                                                                                                    } else {
                                                                                                                                        echo 'Belum Diketahui';
                                                                                                                                    }
                                                                                                                                    ?></option>
                                                                                                <option value="0">Belum Dibayar</option>
                                                                                                <option value="1">Telah Dibayar</option>
                                                                                                <option value="2">Ditolak</option>
                                                                                            </select>
                                                                                        </div><br>





                                                                                        <label for="basic-url">Bukti Pembayaran</label><br>
                                                                                        <div class="input-group mb-1">
                                                                                            <img src="<?= base_url('vendors/images/pembayaran/' . $u['bukti_pembayaran']) ?>" class="img-thumbnail thumbnail zoom" width="200px" alt="Gambar Bukti Transfer <?= $u['bukti_pembayaran'] ?>">
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
                                                        <!-- End Detail -->


                                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletepenjualModal<?= $u['lelang_id'] ?>"><i class="fas fa-trash-can"></i><small>Hapus</small></a>
                                                        <div class="modal fade" id="deletepenjualModal<?= $u['lelang_id'] ?>" tabindex="-1" aria-labelledby="deletepenjualModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-white">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title font-weight-bold" id="deletepenjualModalLabel">Hapus Pembayaran</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5>Yakin ingin menghapus Pembayaran dengan ID "<?= $u['lelang_id'] ?>" ?</h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                        <a href="<?= base_url() ?>admin/pembayaran/deletepembayaran/<?= $u['lelang_id']; ?>" class="btn btn-danger">Ya</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>

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