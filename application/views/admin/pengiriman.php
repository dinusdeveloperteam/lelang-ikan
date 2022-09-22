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
                            <h1 class="h3 mb-0 text-gray-800">Pengemasan Dan Pengiriman Hasil Lelang</h1>
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




                        <!-- Page Heading -->


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table  table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-dark">
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="25%">Nama Pengirim</th>
                                                <th width="10%">Nomor Telp Driver</th>
                                                <th width="20%">Nomor Polisi Kendaraan</th>
                                                <th width="10%">Status Pengiriman</th>
                                                <th width="30%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($pengiriman as $k) : ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $k['nama_pengirim']; ?></td>
                                                    <td><?= $k['no_hp']; ?></td>
                                                    <td><?= $k['no_polisi']; ?></td>
                                                    <td class="text-light">
                                                        <?php
                                                        if ($k['status_transaksi'] == 0) {
                                                            echo '<span class="badge bg-secondary">Belum Diproses</span>';
                                                        } else if ($k['status_transaksi'] == 1) {
                                                            echo '<span class="badge bg-warning">Sedang Dikemas</span>';
                                                        } else if ($k['status_transaksi'] == 2) {
                                                            echo '<span class="badge bg-warning">Sedang Dikirim</span>';
                                                        } else if ($k['status_transaksi'] == 3) {
                                                            echo '<span class="badge bg-success">Sudah Diterima</span>';
                                                        } else {
                                                            echo '<span class="badge bg-danger">Tanpa Keterangan</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-warning mr-2" data-toggle="modal" data-target="#editMenuModal<?= $k['pengiriman_id'] ?>"><i class="fas fa-edit"></i><small>Ubah</small></a>
                                                        <!-- Edit Menu Modal -->
                                                        <div class="modal fade" id="editMenuModal<?= $k['pengiriman_id'] ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content bg-default">
                                                                    <div class="modal-header ">
                                                                        <h5 class="modal-title font-weight-bold" id="editOrderModal">Pengiriman Lelang</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-dark font-weight-bold">
                                                                        <?php
                                                                        ?>
                                                                        <form action="<?= base_url('admin/pengiriman/edit/' . $k['pengiriman_id']) ?>" method="POST">
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <label for="basic-url">ID Pengiriman </label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" name="pengiriman_id" id="pengiriman_id" value="<?= $k['pengiriman_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div>

                                                                                        <label for="basic-url">ID Lelang</label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" name="lelang_id" id="lelang_id" value="<?= $k['lelang_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div>

                                                                                        <label for="basic-url">ID Pelelang</label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" name="pelelang_id" id="pelelang_id" value="<?= $k['pelelang_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                        </div>

                                                                                        <label for="basic-url">Nama Pengirim</label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim" value="<?= $k['nama_pengirim'] ?>" aria-describedby="basic-addon3">
                                                                                        </div>


                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="basic-url">Nama Kendaraan</label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" name="nama_kendaraan" id="nama_kendaraan" value="<?= $k['nama_kendaraan'] ?>" aria-describedby="basic-addon3">
                                                                                        </div>

                                                                                        <label for="basic-url">Nomor Polisi Kendaraan</label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" name="no_polisi" id="no_polisi" value="<?= $k['no_polisi'] ?>" aria-describedby="basic-addon3">
                                                                                        </div>

                                                                                        <label for="basic-url">Nomor Telepon/HP</label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= $k['no_hp'] ?>" aria-describedby="basic-addon3">
                                                                                        </div>

                                                                                        <label for="basic-url">Status Pengiriman</label><br>
                                                                                        <div class="input-group mb-1">
                                                                                            <select class="custom-select" name="status_transaksi" id="status_transaksi">
                                                                                                <option value="<?= $k['status_transaksi'] ?>"><?php
                                                                                                                                                if ($k['status_transaksi'] == 0) {
                                                                                                                                                    echo 'Belum Diproses';
                                                                                                                                                } else if ($k['status_transaksi'] == 1) {
                                                                                                                                                    echo 'Sedang Dikemas';
                                                                                                                                                } else if ($k['status_transaksi'] == 2) {
                                                                                                                                                    echo 'Sedang Dikirim';
                                                                                                                                                } else if ($k['status_transaksi'] == 3) {
                                                                                                                                                    echo 'Sudah Diterima';
                                                                                                                                                } else {
                                                                                                                                                    echo 'Tanpa Keterangan';
                                                                                                                                                }
                                                                                                                                                ?></option>
                                                                                                <option value="0">Belum Diproses</option>
                                                                                                <option value="1">Sedang Dikemas</option>
                                                                                                <option value="2">Sedang Dikirim</option>
                                                                                                <option value="3">Sudah Diterima</option>
                                                                                            </select>
                                                                                        </div><br>





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


                                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletepenjualModal<?= $k['pengiriman_id'] ?>"><i class="fas fa-trash-can"></i><small>Hapus</small></a>
                                                        <div class="modal fade" id="deletepenjualModal<?= $k['pengiriman_id'] ?>" tabindex="-1" aria-labelledby="deletepenjualModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-white">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title font-weight-bold" id="deletepenjualModalLabel">Hapus Pengiriman</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5>Yakin ingin Menghapus Pengiriman dengan Nama Pengirim "<?= $k['nama_pengirim'] ?>" ?</h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                        <a href="<?= base_url() ?>admin/pengiriman/deletekirimlelang/<?= $k['pengiriman_id']; ?>" class="btn btn-danger">Ya</a>
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