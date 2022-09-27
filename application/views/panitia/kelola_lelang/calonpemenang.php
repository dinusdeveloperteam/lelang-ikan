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
                                        <th>ID Produk</th>
                                        <th>ID Peserta</th>
                                        <th>Harga tawar Tertinggi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($calonpemenang as $row) {
                                        $count = $count + 1;
                                    ?>
                                        <td><?= $count ?></td>
                                        <td><?= $row['lelang_id'] ?></td>
                                        <td><?= $row['peserta_id'] ?></td>
                                        <td>Rp.<?= $row['harga_tawar'] ?></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#editMenuModal<?= $row['peserta_id'] ?>"><i class="mdi mdi-file-document-edit"></i> </i>Detail</a>
                                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#deletepenjualModal<?= $row['peserta_id'] ?>"><i class="mdi mdi-shield-check"></i> Konfirmasi</a>
                                        </td>
                                        <!-- Edit Menu Modal -->
                                        <div class="modal fade" id="editMenuModal<?= $row['peserta_id'] ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content bg-default">
                                                    <div class="modal-header bg-white">
                                                        <h5 class="modal-title font-weight-bold" id="editOrderModal">Detail Penerima Lelang</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-dark font-weight-bold bg-white">
                                                        <form action="<?= base_url('panitia/calonpemenang/edit/') . $row['peserta_id'] ?>" method="POST">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <label for="basic-url">ID Produk </label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $row['nama'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">ID Pelelang</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="lelang_id" id="lelang_id" value="<?= $row['pelelang_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div><br>
                                                                        <label for="basic-url">Nama Produk</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="peserta_id" id="peserta_id" value="<?= $row['produk'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div><br>
                                                                        <label for="basic-url">Nama Peserta</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="provinsi" id="provinsi" value="<?= $row['nama'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div><br>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="basic-url">Nilai Max Tawar</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="kota" id="kota" value="<?= $row['harga_tawar'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">Gambar Produk</label>
                                                                        <div class="input-group mb-3">
                                                                            <img src="<?= base_url('vendors/uploads/panitia/' . $row['image1']) ?>" class="img-thumbnail thumbnail zoom" width="224px" alt="File KTP <?= $row['image1'] ?>">
                                                                        </div>

                                                                        <label for="basic-url">Tanggal BID</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="<?= $row['tgl_bid'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Detail -->


                                        <div class="modal fade" id="deletepenjualModal<?= $row['peserta_id'] ?>" tabindex="-1" aria-labelledby="deletepenjualModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content bg-light">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deletepenjualModalLabel">Hapus Pembayaran</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Yakin ingin menghapus data?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                                        <a href="<?= base_url() ?>panitia/penerima/delete/<?= $row['peserta_id'] ?>" class="btn btn-danger">Ya</a>
                                                    </div>
                                                </div>
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