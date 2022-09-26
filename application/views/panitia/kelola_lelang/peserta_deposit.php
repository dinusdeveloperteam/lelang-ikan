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
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Deposit</th>
                                        <th>ID Peserta</th>
                                        <th>ID Panitia</th>
                                        <th>tanggal Deposit</th>
                                        <th>Nominal Deposit</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Status</th>
                                        <th>Keterangan </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($peserta_deposit as $row) {
                                        $count = $count + 1;
                                    ?>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $row->deposit_id ?></td>
                                            <td><?= $row->peserta_id ?></td>
                                            <td><?= $row->panitia_id ?></td>
                                            <td><?= $row->tgl_deposit ?></td>
                                            <td><?= $row->nominal_deposit ?></td>
                                            <td><?= $row->bukti_pembayaran ?></td>
                                            <td>
                                                <?php if ($row->status == 0) {
                                                    echo "<span class='badge badge-secondary'>Belum Terverifikasi</span>";
                                                } else if ($row->status == 1) {
                                                    echo "<span class='badge badge-success'>Terverifikasi</span>";
                                                } else if ($row->status == 2) {
                                                    echo "<span class='badge badge-warning'>Di tolak</span>";
                                                } else if ($row->status == 3) {
                                                    echo "<span class='badge badge-danger'>Di banned</span>";
                                                } else {
                                                    echo "Status Tidak Diketahui";
                                                }
                                                ?></td>
                                            <td><?= $row->keterangan ?></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editMenuModal<?= $row->peserta_id ?>"><i class="mdi mdi-file-document-edit"></i> Ubah</a>
                                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletepenjualModal<?= $row->peserta_id ?>"><i class="mdi mdi-delete-forever"></i> Hapus</a>
                                                </a>
                                            </td>
                                            <!-- Edit Menu Modal -->
                                            <div class="modal fade" id="editMenuModal<?= $row->peserta_id ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content bg-default">
                                                        <div class="modal-header bg-white">
                                                            <h5 class="modal-title" id="editOrderModal">Detail Peserta Deposit</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-dark bg-white">
                                                            <form action="<?= base_url('panitia/Deposit/edit/' . $row->deposit_id) ?>" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label for="basic-url">ID Deposit </label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="peserta_id" id="peserta_id" value="<?= $row->deposit_id ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">ID Peserta</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $row->peserta_id ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">ID Panitia</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="username" id="username" value="<?= $row->panitia_id ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">Tanggal Deposit</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="nik" id="nik" value="<?= $row->tgl_deposit ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Nominal Deposit</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="telp" id="telp" value="<?= $row->nominal_deposit ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">Bukti Pembayaran</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <img src="<?= base_url('vendors/uploads/panitia/' . $row->bukti_pembayaran) ?>" class="img-thumbnail thumbnail zoom" width="224px" alt="File KTP <?= $row->bukti_pembayaran ?>">
                                                                            </div>
                                                                            <label for="basic-url">Status Verifikasi</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <select class="custom-select" name="status" id="status">
                                                                                    <option value="<?= $row->status ?>"><?php
                                                                                                                        if ($row->status == 0) {
                                                                                                                            echo 'Belum Diverifikasi';
                                                                                                                        } else if ($row->status == 1) {
                                                                                                                            echo 'Terverifikasi';
                                                                                                                        } else if ($row->status == 2) {
                                                                                                                            echo 'Ditolak';
                                                                                                                        } else if ($row->status == 3) {
                                                                                                                            echo 'Dibanned';
                                                                                                                        } else {
                                                                                                                            echo 'Status Tidak Diketahui';
                                                                                                                        }
                                                                                                                        ?></option>
                                                                                    <option value="0">Belum Diverifikasi</option>
                                                                                    <option value="1">Terverifikasi</option>
                                                                                    <option value="2">Ditolak</option>
                                                                                    <option value="3">Dibanned</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer bg-white">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
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
<!-- Modal Delete -->
<div class="modal fade" id="hapusPesertaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span>Yakin ingin hapus data?</span>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <a href="<?= base_url() ?>panitia/deposit/<?= $row->peserta_id ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Delete -->