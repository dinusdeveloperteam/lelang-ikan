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
                            <h1 class="h3 mb-0 text-gray-800">Riwayat Lelang</h1>
                        </div>
                        <hr>

                        <?php if ($this->session->flashdata('message')) {
                            echo '<p class="warning" style="margin: 10px 20px;">' . $this->session->flashdata('message') . '</p>';
                        } ?>




                        <!-- Begin Page Content -->

                        <!-- Page Heading -->


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <!-- <div class="card-header py-3 bg-success">
                                <h6 class="m-0 font-weight-bold text-primary">Data Pemenang Lelang</h6>
                            </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table  table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-dark">
                                            <tr>
                                                <th width="20px">No</th>
                                                <th>Lelang ID</th>
                                                <th>Nama </th>
                                                <th>Nama Produk</th>
                                                <th>Jumlah</th>
                                                <th>Nominal</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>



                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($riwayat as $r) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $r['lelang_id'] ?></td>
                                                    <td><?= $r['nama'] ?></td>
                                                    <td><?= $r['produk'] ?></td>
                                                    <td><?= $r['jumlah'] ?></td>
                                                    <td><?= $r['nominal_dibayarkan'] ?></td>
                                                    <td><?= $r['status_transaksi'] ?></td>

                                                    <!-- <td class="text-light">
                                                         <?php
                                                            // if ($r['status'] == 0) {
                                                            //     echo '<span class="badge bg-secondary">Belum Dibayar</span>';
                                                            // } else if ($r['status'] == 1) {
                                                            //     echo '<span class="badge bg-success">Telah Dibayar</span>';
                                                            // } else {
                                                            //     echo '<span class="badge bg-danger">Ditolak</span>';
                                                            // }
                                                            ?> -->
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#editMenuModal<?= $r['lelang_id'] ?>"><i class="fa-solid fa-circle-info"></i><small>Detail</small></a>






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