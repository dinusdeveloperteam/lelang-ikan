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
                            <h1 class="h3 mb-0 text-gray-800">Data Pelelang Ikan</h1>
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
                                <h6 class="m-0 font-weight-bold text-primary">Data Pelelang Ikan</h6>
                            </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table  table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-dark">
                                            <tr class="text-dark">
                                                <th>No</th>
                                                <th>Nama Pelelang</th>
                                                <th>NIK</th>
                                                <th>Nomor HP</th>
                                                <th>Jenis Usaha</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($pelelang as $u) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $u['nama'] ?></td>
                                                    <td><?= $u['nik'] ?></td>
                                                    <td><?= $u['telp'] ?></td>
                                                    <td><?php
                                                        if ($u['jenis'] == 0) {
                                                            echo "Perorangan";
                                                        } else {
                                                            echo "Perusahaan";
                                                        } ?>
                                                    </td>
                                                    <td class="text-light"><?php
                                                                            if ($u['status'] == 0) {
                                                                                echo '<span class="badge bg-warning">Belum Diverifikasi</span>';
                                                                            } else if ($u['status'] == 1) {
                                                                                echo '<span class="badge bg-success">Terverifikasi</span>';
                                                                            } else if ($u['status'] == 2) {
                                                                                echo '<span class="badge bg-danger">Ditolak</span>';
                                                                            } else {
                                                                                echo '<span class="badge bg-secondary">Dibanned</span>';
                                                                            } ?>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a href="<?= base_url(); ?>admin/pelelang/detail/<?= $u['pelelang_id']; ?>" class="btn btn-sm btn-info mr-2"><i class="fa fa-info-circle"></i><small>Detail</small></a>
                                                            <a href="<?php echo base_url(); ?>admin/pelelang/edit/<?php echo $u['pelelang_id']; ?>" class="btn btn-sm btn-warning mr-2"><i class="fas fa-edit"></i><small>Ubah</small></a>
                                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletepelelangModal<?= $u['pelelang_id'] ?>"><i class="fas fa-trash-can"></i><small>Hapus</small></a>
                                                            <div class="modal fade" id="deletepelelangModal<?= $u['pelelang_id'] ?>" tabindex="-1" aria-labelledby="deletepelelangModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content bg-white">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title font-weight-bold" id="deletepelelangModalLabel">Hapus Pelelang</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5>Yakin ingin menghapus Pelelang dengan Nama "<?= $u['nama'] ?>" ?</h5>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                            <a href="<?= base_url() ?>admin/pelelang/deletepelelang/<?= $u['pelelang_id']; ?>" class="btn btn-danger">Ya</a>
                                                                        </div>
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