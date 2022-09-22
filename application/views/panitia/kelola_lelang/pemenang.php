<div class="main-panel">
    <!--content-->
    <div class="content-wrapper">
        <!-- partials breadcrumb start -->
        <?php $this->load->view("panitia/partials/breadcrumb.php"); ?>
        <!-- partilas breadcrumb end -->
        <!-- pelelang -->
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body shadow-sm rounded">
                        <!-- <h4 class="card-title">10 Transaksi Terbaru</h4> -->
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Lelang ID</th>
                                        <th>Nama peserta</th>
                                        <th>Nama produk</th>
                                        <th>Harga Tawar</th>
                                        <th>Tanggal Diumumkan</th>
                                        <th>Status Pembayaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($PemenangLelang as $row) {
                                        $count = $count + 1;
                                    ?>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $row->lelang_id ?></td>
                                            <td><?= $row->nama ?></td>
                                            <td><?= $row->produk ?></td>
                                            <td>Rp. <?= $row->harga_tawar ?></td>
                                            <td><?= $row->tgl_diumumkan ?></td>
                                            <?php
                                            $verif = $row->status;
                                            if ($verif == 0) {
                                                $statusPembayaran = "<span class='badge badge-secondary'>Belum dibayar</span>";
                                            } else if ($verif == 1) {
                                                $statusPembayaran = "<span class='badge badge-success'>Telah dibayar</span>";
                                            } else if ($verif == 2) {
                                                $statusPembayaran = "<span class='badge badge-danger'>Ditolak</span>";
                                            } else {
                                                $statusPembayaran = "<span class='badge badge-warning'>Unknown</span>";
                                            }
                                            ?>
                                            <td><?= $statusPembayaran ?></td>
                                            <td>q</td>
                                            <td>
                                                <div style="">
                                                    <a href="#" class="btn btn-sm btn-info " data-toggle="modal" data-target="#editMenuModal<?= $row->peserta_id ?>">Verifikasi</a>
                                                    <a href="#" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#deletepenjualModal<?= $row->peserta_id ?>">Hapus</a>
                                                    <a href="#" class="btn btn-sm btn-success " data-toggle="modal" data-target="#notifEmail"></i>Kirim Email</a>
                                                </div>
                                                <!-- Edit Menu Modal -->
                                                <div class="modal fade" id="editMenuModal<?= $row->peserta_id ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content bg-default">
                                                            <div class="modal-header bg-white">
                                                                <h5 class="modal-title font-weight-bold" id="editOrderModal">Verifikasi Pemenang Lelang</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-dark font-weight-bold bg-white">
                                                                <form action="<?= base_url('panitia/pemenang/update/') . $row->lelang_id ?>" method="post">
                                                                    <div class="input-group">
                                                                        <select class="custom-select" name="status" id="status">
                                                                            <option value="<?= $row->status ?>">
                                                                                <?php
                                                                                    if ($row->status == 0) {
                                                                                        echo 'Belum dibayar';
                                                                                    } else if ($row->status == 1) {
                                                                                        echo 'Telah dibayar';
                                                                                    } else if ($row->status == 2) {
                                                                                        echo 'Ditolak';
                                                                                    }else {
                                                                                        echo 'Unknown';
                                                                                    }
                                                                                ?>
                                                                            </option>
                                                                            <option value="0">Belum dibayar</option>
                                                                            <option value="1">Telah dibayar</option>
                                                                            <option value="2">Ditolak</option>
                                                                        </select>
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
                                                <!--untuk kirim email-->
                                                <div class="modal fade" id="notifEmail" tabindex="-1" role="dialog" aria-labelledby="loginpelelangLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Kirim Notifikasi Email Pelelang</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('Panitia/pemenang/VerifyEmail/') ?>" method="post">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?= $row->email ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                                                </div>
                                                                <?php echo $this->session->flashdata('msg'); ?>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Detail -->

                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="deletepenjualModal<?= $row->peserta_id ?>" tabindex="-1" aria-labelledby="deletepenjualModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content bg-light">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deletepenjualModalLabel">Hapus Pembayaran</h5>
                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4>Yakin ingin menghapus Pembayaran</h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                                                <a href="<?= base_url() ?>panitia/pemenang<?= $row->peserta_id ?>" class="btn btn-danger">Ya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            </a>
                        </div>
                        </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>