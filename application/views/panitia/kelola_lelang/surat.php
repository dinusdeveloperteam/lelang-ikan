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
                                        <th>ID Lelang</th>
                                        <th>ID Pelelang</th>
                                        <th>ID Pengiriman</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($suratperintah as $row) {
                                    ?>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['lelang_id'] ?></td>
                                        <td><?= $row['pelelang_id'] ?></td>
                                        <td><?= $row['pengiriman_id'] ?></td>
                                        <td><?php
                                            if ($row['status_transaksi'] == 0) {
                                                echo "<span class='badge badge-secondary'>Belum Diproses</span>";
                                            } else if ($row['status_transaksi'] == 1) {
                                                echo "<span class='badge badge-primary'>Sedang Diproses</span>";
                                            } else if ($row['status_transaksi'] == 2) {
                                                echo "<span class='badge badge-warning'>Sedang Dikirim</span>";
                                            } else if ($row['status_transaksi'] == 3) {
                                                echo "<span class='badge badge-success'>Telah DiTerima</span>";
                                            }
                                            ?>
                                        </td>

                                        <td><a href="#" class="btn btn-sm btn-warning mr-2" data-toggle="modal" data-target="#editMenuModal<?= $row['lelang_id'] ?>"><i class="fas fa-edit"></i>Ubah</a>
                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletepenjualModal<?= $row['lelang_id'] ?>"><i class="fas fa-trash-can"></i>Hapus</a>
                                            <a href="#" class="btn btn-sm btn-success " data-toggle="modal" data-target="#notifEmail"><i class="fas fa-trash-can"></i>Kirim</a>
                                        </td>
                                        <!-- Edit Menu Modal -->
                                        <div class="modal fade" id="editMenuModal<?= $row['lelang_id'] ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content bg-default">
                                                    <div class="modal-header bg-white">
                                                        <h5 class="modal-title font-weight-bold" id="editOrderModal">Detail </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-dark font-weight-bold bg-white">
                                                        <form action="<?= base_url('panitia/suratpengiriman/edit/') . $row['lelang_id'] ?>" method="POST">
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
                                                                        <label for="basic-url">ID Pengiriman</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="pengiriman_id" id="pengiriman_id" value="<?= $row['pengiriman_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div><br>
                                                                        <label for="basic-url">Tanggal Bayar</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="tgl_bayar" id="tgl_bayar" value="<?= $row['tgl_bayar'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">No Hp</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= $row['no_hp'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">Nama Kendaraan</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="nama_kendaraan" id="nama_kendaraan" value="<?= $row['nama_kendaraan'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">NOPOL Kendaraan</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="no_polisi" id="no_polisi" value="<?= $row['no_polisi'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">No Telp Driver</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="no_telp_driver" id="no_telp_driver" value="<?= $row['no_telp_driver'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div><br>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="basic-url">Provinsi</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="provinsi_kirim" id="provinsi_kirim" value="<?= $row['provinsi_kirim'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">Kota</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="kota_kirim" id="kota_kirim" value="<?= $row['kota_kirim'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">Kecamatan</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="kecamatan_kirim" id="kecamatan_kirim" value="<?= $row['kecamatan_kirim'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">Kelurahan</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="kelurahan_kirim" id="telp" value="<?= $row['kelurahan_kirim'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">Alamat</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="alamat_kirim" id="alamat_kirim" value="<?= $row['alamat_kirim'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">Status Transaksi</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <select class="custom-select" name="status_transaksi" id="status_transaksi">
                                                                                <?php
                                                                                $konfirmasi = $row['status_transaksi'];
                                                                                if ($konfirmasi == 0) {
                                                                                    $verif = 'Belum diproses';
                                                                                } else if ($konfirmasi == 1) {
                                                                                    $verif = 'Sedang diproses';
                                                                                } else if ($konfirmasi == 2) {
                                                                                    $verif = 'Sedang dikirim';
                                                                                } else if ($konfirmasi == 3) {
                                                                                    $verif = 'Telah diterima';
                                                                                } else {
                                                                                    $verif = 'Status tidak diketahui';
                                                                                }
                                                                                ?>
                                                                                <option value="<?= $verif ?>"><?= $verif ?></option>
                                                                                <option value="0">Belum diproses</option>
                                                                                <option value="1">Sedang diproses</option>
                                                                                <option value="2">Sedang dikirim</option>
                                                                                <option value="3">Telah diterima</option>
                                                                            </select>
                                                                        </div><br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a type="button" href="<?= base_url('panitia/Suratpengiriman/suratperintah/' . $row['lelang_id']) ?>" class="btn btn-warning " style="float:left;">Cetak</a>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>


                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--untuk kirim email-->
                                        <div class="modal fade" id="notifEmail" tabindex="-1" role="dialog" aria-labelledby="loginpelelangLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-white">
                                                        <h5 class="modal-title" id="exampleModalLabel">Kirim Notifikasi Email Pelelang</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('Panitia/suratpengiriman/VerifyEmail/') ?>" method="post">
                                                        <div class="modal-body bg-white">
                                                            <div class="form-group">
                                                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" ?>
                                                            </div>
                                                            <input type="file" name="resume" accept=".doc,.docx, .pdf" required />
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
                                        <div class="modal fade" id="deletepenjualModal<?= $row['pengiriman_id'] ?>" tabindex="-1" aria-labelledby="deletepenjualModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content bg-light">
                                                    <div class="modal-header bg-white">
                                                        <h5 class="modal-title" id="deletepenjualModalLabel">Hapus Pembayaran</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body bg-white">
                                                        <h4>Yakin ingin menghapus Pembayaran dengan ID </h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                                        <a href="<?= base_url() ?>panitia/suratpengiriman/delete/<?= $row['pengiriman_id']; ?>" class="btn btn-danger">Ya</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--untuk cetak PDF email-->

                                            <!-- End Detail -->
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