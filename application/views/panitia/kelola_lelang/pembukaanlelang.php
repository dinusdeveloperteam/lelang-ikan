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
                                        <th width="5%">No</th>
                                        <th>Nama Produk</th>
                                        <th>Harga awal</th>
                                        <th>Harga Kelipatan</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai Lelang</th>
                                        <th>Jumlah Stok</th>
                                        <th>Status</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($pembukaanLelang as $row) {
                                        $count = $count + 1;

                                    ?>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $row->produk ?></td>
                                            <td><?= $row->harga_awal ?></td>
                                            <td><?= $row->incremental_value ?></td>
                                            <td><?= $row->tgl_mulai ?></td>
                                            <td><?= $row->tgl_selesai ?></td>
                                            <td><?= $row->jumlah ?></td>
                                            <td><?php
                                                if ($row->status == 0) {
                                                    echo "<span class='badge badge-secondary'>Belum Diperiksa</span>";
                                                } else if ($row->status == 1) {
                                                    echo "<span class='badge badge-success'>Telah Diperiksa</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editMenuModal<?= $row->lelang_id ?>"><i class="mdi mdi-file-document-edit"></i> Ubah</a>
                                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletepenjualModal<?= $row->lelang_id ?>"><i class="mdi mdi-delete-forever"></i> Hapus</a>
                                                </a>
                                            </td>
                                            <!-- Edit Menu Modal -->
                                            <div class="modal fade" id="editMenuModal<?= $row->lelang_id ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content bg-default">
                                                        <div class="modal-header bg-white">
                                                            <h5 class="modal-title" id="editOrderModal">Detail Pembukaan Lelang</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-dark bg-white">
                                                            <form action="<?= base_url('panitia/pembukaanlelang/edit/' . $row->lelang_id) ?>" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label for="basic-url">ID Lelang </label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="lelang_id" id="lelang_id" value="<?= $row->lelang_id ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">ID Pelelang</label><br>
                                                                            <div class="input-group mb-1">
                                                                                <input type="text" class="form-control" name="pelelang_id" id="pelelang_id" value="<?= $row->pelelang_id ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">ID Panitia</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="panitia_id" id="panitia_id" value="<?= $row->panitia_id ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">Produk</label><br>
                                                                            <div class="input-group mb-1">
                                                                                <input type="text" class="form-control" name="produk" id="produk" value="<?= $row->produk ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Deskripsi Produk</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="deskripsi_produk" id="deskripsi_produk" value="<?= $row->deskripsi_produk ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Harga Awal</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="harga_awal" id="harga_awal" value="<?= $row->harga_awal ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">Harga Minimal Diterima</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="harga_minimal_diterima" id="harga_minimal_diterima" value="<?= $row->harga_minimal_diterima ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="incremental_value">Kelipatan Minimal</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="incremental_value" id="incremental_value" value="<?= $row->incremental_value ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">Tanggal Mulai</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="tgl_mulai" id="tgl_mulai" value="<?= $row->tgl_mulai ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="basic-url">Gambar 1</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <a href="<?= base_url('vendors/uploads/panitia/' . $row->image1) ?>"><img src="<?= base_url('vendors/uploads/panitia/' . $row->image1) ?>" class="img-thumbnai zoom" width="216px" alt="gambar 1 <?= $row->image1 ?>"></a>
                                                                            </div>
                                                                            <label for="basic-url">Gambar 2</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <a href="<?= base_url('vendors/uploads/panitia/' . $row->image2) ?>"><img src="<?= base_url('vendors/uploads/panitia/' . $row->image2) ?>" class="img-thumbnail zoom" width="216px" alt="gambar 2 <?= $row->image2 ?>"></a>
                                                                            </div>
                                                                            <label for="basic-url">Gambar 3</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <a href="<?= base_url('vendors/uploads/panitia/' . $row->image3) ?>"><img src="<?= base_url('vendors/uploads/panitia/' . $row->image3) ?>" class="img-thumbnail zoom" width="216px" alt="gambar 3 <?= $row->image3 ?>"></a>
                                                                            </div>
                                                                            <label for="basic-url">Gambar 4</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <a href="<?= base_url('vendors/uploads/panitia/' . $row->image4) ?>"><img src="<?= base_url('vendors/uploads/panitia/' . $row->image4) ?>" class="img-thumbnail zoom" width="216px" alt="gambar 4 <?= $row->image4 ?>"></a>
                                                                            </div>
                                                                            <label for="basic-url">Status</label><br>
                                                                            <div class="input-group mb-1">
                                                                                <select class="custom-select" name="status" id="status">
                                                                                    <option value="<?= $row->status ?>"><?php
                                                                                                                        if ($row->status == 0) {
                                                                                                                            echo 'Belum Diperiksa';
                                                                                                                        } else if ($row->status == 1) {
                                                                                                                            echo 'Telah Diperiksa';
                                                                                                                        } else {
                                                                                                                            echo 'Unknown';
                                                                                                                        }
                                                                                                                        ?></option>
                                                                                    <option value="0">Belum Diperiksa</option>
                                                                                    <option value="1">Telah Diperiksa</option>
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