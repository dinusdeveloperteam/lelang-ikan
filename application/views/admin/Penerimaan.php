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
                            <h1 class="h3 mb-0 text-gray-800">Konfirmasi Penerimaan Hasil Lelang</h1>
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

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table  table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Peserta</th>
                                                <th>Nama Produk</th>
                                                <th>Konfirmasi Terima Produk</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($penerimaan as $t) : ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $t['nama_peserta']; ?></td>
                                                    <td><?= $t['produk']; ?></td>
                                                    <td class="text-light">
                                                        <?php
                                                        if ($t['konfirmasi_terimaproduk'] == 0) {
                                                            echo '<span class="badge bg-secondary">Belum Diterima</span>';
                                                        } else if ($t['konfirmasi_terimaproduk'] == 1) {
                                                            echo '<span class="badge bg-success">Telah Diterima</span>';
                                                        } else {
                                                            echo '<span class="badge bg-danger">Tanpa Keterangan</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-warning mr-2" data-toggle="modal" data-target="#editMenuModal<?= $t['lelang_id'] ?>"><i class="fas fa-edit"></i><small>Ubah</small></a>
                                                        <!-- Edit Menu Modal -->
                                                        <div class="modal fade" id="editMenuModal<?= $t['lelang_id'] ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content bg-white">
                                                                    <div class="modal-header ">
                                                                        <h5 class="modal-title font-weight-bold" id="editOrderModal">Penerimaan Lelang</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-dark font-weight-bold">
                                                                        <?php
                                                                        ?>
                                                                        <form action="<?= base_url('admin/penerimaan/edit/' . $t['lelang_id']) ?>" method="POST">
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <label for="basic-url">ID Lelang</label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" name="lelang_id" id="lelang_id" value="<?= $t['lelang_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div>

                                                                                        <label for="basic-url">ID Peserta</label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" name="peserta_id" id="peserta_id" value="<?= $t['peserta_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div>

                                                                                        <label for="basic-url">Nama Peserta</label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" value="<?= $t['nama_peserta'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="basic-url">Nama Produk</label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" name="produk" id="produk" value="<?= $t['produk'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div>


                                                                                        <label for="basic-url">Konfirmasi Terima Produk</label>
                                                                                        <div class="input-group mb-3">
                                                                                            <select class="custom-select" name="konfirmasi_terimaproduk" id="konfirmasi_terimaproduk">
                                                                                                <option value="<?= $t['konfirmasi_terimaproduk'] ?>"><?php
                                                                                                                                                        if ($t['konfirmasi_terimaproduk'] == 0) {
                                                                                                                                                            echo 'Belum Diterima';
                                                                                                                                                        } else if ($t['konfirmasi_terimaproduk'] == 1) {
                                                                                                                                                            echo 'Telah Diterima';
                                                                                                                                                        } else {
                                                                                                                                                            echo 'Tanpa Keterangan';
                                                                                                                                                        }
                                                                                                                                                        ?></option>
                                                                                                <option value="0">Belum Diterima</option>
                                                                                                <option value="1">Telah Diterima</option>
                                                                                            </select>
                                                                                        </div>





                                                                                        <label for="basic-url">Testimoni</label>
                                                                                        <br>
                                                                                        <div class="input-group mb-3">
                                                                                            <textarea class="form-control" name="testimoni_pemenang" id="testimoni_pemenang" aria-label="With textarea" height="56px" readonly><?= $t['testimoni_pemenang'] ?></textarea>
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


                                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletepenjualModal<?= $t['lelang_id'] ?>"><i class="fas fa-trash-can"></i><small>Hapus</small></a>
                                                        <div class="modal fade" id="deletepenjualModal<?= $t['lelang_id'] ?>" tabindex="-1" aria-labelledby="deletepenjualModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-white">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title font-weight-bold" id="deletepenjualModalLabel">Hapus Penerimaan</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5>Yakin ingin Menghapus Pengiriman dengan Nama Pengirim "<?= $t['peserta_id'] ?>" ?</h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                        <a href="<?= base_url() ?>admin/pengiriman/deletekirimlelang/<?= $t['lelang_id']; ?>" class="btn btn-danger">Ya</a>
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


                    </div>
                    <!-- /.container-fluid -->

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