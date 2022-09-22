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
                                        <th>Lelang ID</th>
                                        <th>Produk</th>
                                        <th>Deskripsi Produk</th>
                                        <th>Image 1</th>
                                        <th>Image 2</th>
                                        <th>Image 3</th>
                                        <th>Image 4</th>
                                        <th>Harga Beli Sekarang</th>
                                        <th>Harga Tawar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count  = 0;
                                    foreach ($PenawaranLelang as $row) {
                                        $count = $count + 1;
                                    ?>
                                        <td><?= $count ?></td>
                                        <td><?= $row['lelang_id'] ?></td>
                                        <td><?= $row['produk'] ?></td>
                                        <td><?= $row['deskripsi_produk'] ?></td>
                                        <td><?= $row['image1'] ?></td>
                                        <td><?= $row['image2'] ?></td>
                                        <td><?= $row['image3'] ?></td>
                                        <td><?= $row['image4'] ?></td>
                                        <td><?= $row['harga_beli_sekarang'] ?></td>
                                        <td><?= $row['harga_tawar'] ?></td>
                                        <td><?php
                                            if ($row['status'] == 0) {
                                                echo "<span class='badge badge-danger'>Tidak Disetujui</span>";
                                            } else if ($row['status'] == 1) {
                                                echo "<span class='badge badge-success'>Disetujui</span>";
                                            } else {
                                                echo "<span class='badge badge-secondary'>Belum Diketahui</span>";
                                            }
                                            ?></td>
                                        <td><a href="#" class="btn btn-sm btn-warning mr-2" data-toggle="modal" data-target="#editMenuModal<?= $row['lelang_id'] ?>"><i class="fas fa-edit"></i>Ubah</a><a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletepenjualModal<?= $row['lelang_id'] ?>"><i class="fas fa-trash-can"></i>Hapus</a></td>
                                        <!-- Edit Menu Modal -->
                                        <div class="modal fade" id="editMenuModal<?= $row['lelang_id'] ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content bg-default">
                                                    <div class="modal-header bg-white">
                                                        <h5 class="modal-title font-weight-bold" id="editOrderModal">Detail Penawaran Lelang</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-dark font-weight-bold bg-white">
                                                        <?php
                                                        ?>
                                                        <form action="<?= base_url('panitia/penawaran/edit/' . $row['lelang_id']) ?>" method="POST">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <label for="basic-url">ID Lelang </label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="lelang_id" id="lelang_id" value="<?= $row['lelang_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">Produk</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="produk" id="produk" value="<?= $row['produk'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div><br>



                                                                        <label for="basic-url">Deskripsi Produk</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="deskripsi_produk" id="deskripsi_produk" value="<?= $row['deskripsi_produk'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div><br>



                                                                        <label for="basic-url">Harga Beli Sekarang</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="harga_beli_sekarang" id="harga_beli_sekarang" value="<?= $row['harga_beli_sekarang'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div><br>




                                                                    </div>
                                                                    <div class="col-6">



                                                                        <label for="basic-url">Harga Tawar</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="harga_tawar" id="harga_tawar" value="<?= $row['harga_tawar'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>


                                                                        <label for="basic-url">Status Penawaran</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <select class="custom-select" name="status" id="status">
                                                                                <option value="<?= $row['status'] ?>"><?php
                                                                                                                        if ($row['status'] == 0) {
                                                                                                                            echo 'Tidak Disetujui';
                                                                                                                        } else if ($row['status'] == 1) {
                                                                                                                            echo 'Disetujui';
                                                                                                                        } else {
                                                                                                                            echo 'Belum Diketahui';
                                                                                                                        }
                                                                                                                        ?></option>
                                                                                <option value="0">Tidak Disetujui</option>
                                                                                <option value="1">Disetujui</option>
                                                                                <option value="2">Belum Diketahui</option>
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



                                        <div class="modal fade" id="deletepenjualModal<?= $row['lelang_id'] ?>" tabindex="-1" aria-labelledby="deletepenjualModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content bg-light">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deletepenjualModalLabel">Hapus Pembayaran</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Yakin ingin menghapus Pembayaran dengan ID "<?= $row['lelang_id'] ?>" ?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                                        <a href="<?= base_url() ?>panitia/penawaran/<?= $row['lelang_id']; ?>" class="btn btn-danger">Ya</a>
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