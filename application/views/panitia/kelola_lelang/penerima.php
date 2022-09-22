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
                                        <th>Nama</th>
                                        <th>Lelang ID</th>
                                        <th>Peserta ID</th>
                                        <th>Konfirmasi Terima Produk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($Penerima as $row) {
                                    ?>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['lelang_id'] ?></td>
                                        <td><?= $row['peserta_id'] ?></td>
                                        <td><?php
                                            if ($row['konfirmasi_terimaproduk'] == 0) {
                                                echo "<span class='badge badge-danger'>Belum Diterima</span>";
                                            } else if ($row['konfirmasi_terimaproduk'] == 1) {
                                                echo "<span class='badge badge-success'>Sudah Diterima</span>";
                                            }
                                            ?>
                                        </td>

                                        <td><a href="#" class="btn btn-sm btn-warning mr-2" data-toggle="modal" data-target="#editMenuModal<?= $row['peserta_id'] ?>"><i class="fas fa-edit"></i>Ubah</a><a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletepenjualModal<?= $row['peserta_id'] ?>"><i class="fas fa-trash-can"></i>Hapus</a></td>
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
                                                        <form action="<?= base_url('panitia/penerima/edit/') . $row['peserta_id'] ?>" method="POST">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <label for="basic-url">Nama </label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $row['nama'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">ID Lelang</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="lelang_id" id="lelang_id" value="<?= $row['lelang_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div><br>
                                                                        <label for="basic-url">ID Peserta</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="peserta_id" id="peserta_id" value="<?= $row['peserta_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div><br>
                                                                        <label for="basic-url">provinsi</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="provinsi" id="provinsi" value="<?= $row['provinsi'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div><br>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="basic-url">Kota</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="kota" id="kota" value="<?= $row['kota'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">Kecamatan</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="<?= $row['kecamatan'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">Kelurahan</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="<?= $row['kelurahan'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">Alamat</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $row['alamat'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">telp</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="telp" id="telp" value="<?= $row['telp'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">Konfirmasi Terima Produk</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <select class="custom-select" name="konfirmasi_terimaproduk" id="konfirmasi_terimaproduk">
                                                                                <?php
                                                                                $konfirmasi = $row['konfirmasi_terimaproduk'];
                                                                                if ($konfirmasi == 0) {
                                                                                    $verif = 'Belum diterima';
                                                                                } else if ($konfirmasi == 1) {
                                                                                    $verif = 'Telah diterima';
                                                                                } else {
                                                                                    $verif = 'Data tidak diketahui';
                                                                                }
                                                                                ?>
                                                                                <option value="<?= $verif ?>"><?= $verif ?></option>
                                                                                <option value="0">Belum Diterima</option>
                                                                                <option value="1">Sudah Diterima</option>
                                                                            </select>
                                                                        </div><br>
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