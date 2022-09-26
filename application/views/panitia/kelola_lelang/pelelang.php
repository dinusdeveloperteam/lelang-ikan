<div class="main-panel">
    <div class="content-wrapper">
        <!-- partials breadcrumb start -->
        <?php $this->load->view("panitia/partials/breadcrumb.php"); ?>
        <!-- partilas breadcrumb end -->
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body shadow-sm rounded">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> ID </th>
                                        <th> Nama </th>
                                        <th> Jenis</th>
                                        <th> Provinsi </th>
                                        <th> Kota </th>
                                        <th> Telp </th>
                                        <th> Email </th>
                                        <th> Status </th>
                                        <th> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($pelelang as $row) {
                                        $count = $count + 1;
                                    ?>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $row->pelelang_id ?></td>
                                            <td><?= $row->nama ?></td>
                                            <td><?php
                                                if ($row->jenis == 0) {
                                                    echo "Perusahaan";
                                                } else if ($row->jenis == 1) {
                                                    echo "Perorangan";
                                                }
                                                ?></td>
                                            <td><?= $row->provinsi ?></td>
                                            <td><?= $row->kota ?></td>
                                            <td><?= $row->telp ?></td>
                                            <td><?= $row->email ?></td>
                                            <td> <?php
                                                    if ($row->status == 0) {
                                                        echo "<span class='badge badge-secondary'>Belum Diverifikasi</span>";
                                                    } else if ($row->status == 1) {
                                                        echo "<span class='badge badge-success'>Diverifikasi</span>";
                                                    } else if ($row->status == 2) {
                                                        echo "<span class='badge badge-warning'>Di tolak</span>";
                                                    } else if ($row->status == 3) {
                                                        echo "<span class='badge badge-danger'>Di banned</span>";
                                                    } else {
                                                        echo "Unknown";
                                                    }
                                                    ?>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editMenuModal<?= $row->pelelang_id ?>"><i class="mdi mdi-file-document-edit"></i> Ubah</a>
                                                <a href="#" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#deletePelelangModal<?= $row->pelelang_id ?>"><i class="mdi mdi-delete-forever"></i> Hapus</a>
                                            </td>
                                            <!-- Edit Menu Modal -->
                                            <div class="modal fade" id="editMenuModal<?= $row->pelelang_id ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content bg-default">
                                                        <div class="modal-header bg-white">
                                                            <h5 class="modal-title" id="editOrderModal">Detail Data Pelelang</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-dark bg-white">
                                                            <form action="<?= base_url('panitia/pelelang/edit/' . $row->pelelang_id) ?>" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label for="basic-url">Nama</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $row->nama ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Username</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="username" id="username" value="<?= $row->username ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">NIK</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="nik" id="nik" value="<?= $row->nik ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Telp</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="telp" id="telp" value="<?= $row->telp ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Email</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="email" id="email" value="<?= $row->email ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Deskripsi</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?= $row->deskripsi ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">Kelurahan</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="<?= $row->kelurahan ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="incremental_value">Kota</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="kota" id="kota" value="<?= $row->kota ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Provinsi</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="provinsi" id="provinsi" value="<?= $row->provinsi ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">Alamat</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $row->alamat ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">Jenis</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <select class="custom-select" name="status" id="status">
                                                                                    <option value="<?= $row->status ?>"><?php
                                                                                                                        if ($row->jenis == 0) {
                                                                                                                            echo 'Perusahaan';
                                                                                                                        } else if ($row->jenis == 1) {
                                                                                                                            echo 'Perorangan';
                                                                                                                        } else {
                                                                                                                            echo '';
                                                                                                                        }
                                                                                                                        ?></option>
                                                                                    <option value="0">Perusahaan</option>
                                                                                    <option value="1">Perorangan</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="basic-url">Bank</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="bank" id="bank" value="<?= $row->bank ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">Atas Nama</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="atasnama" id="atasnama" value="<?= $row->atasnama ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">No Rekening</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="norekening" id="kecamatan_kirim" value="<?= $row->norekening ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Nomor NPWP</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="npwp" id="npwp" value="<?= $row->npwp ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">File KTP</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <img src="<?= base_url('vendors/uploads/panitia/' . $row->filektp) ?>" class="img-thumbnail thumbnail zoom" width="224px" alt="File KTP <?= $row->filektp ?>">
                                                                            </div>
                                                                            <label for="basic-url">File NPWP</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <img src="<?= base_url('vendors/uploads/panitia/' . $row->filenpwp) ?>" class="img-thumbnail thumbnail zoom" width="224px" alt="File NPWP <?= $row->filenpwp ?>">
                                                                            </div>
                                                                            <label for="basic-url">File SIUP</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <img src="<?= base_url('vendors/uploads/panitia/' . $row->fileSIUP) ?>" class="img-thumbnail thumbnail zoom" width="224px" alt="File SIUP <?= $row->fileSIUP ?>">
                                                                            </div>
                                                                            <label for="basic-url">Verifikasi Kelengkapan Data</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <select class="custom-select" name="status" id="status">
                                                                                    <option value="<?= $row->status ?>"><?php
                                                                                                                        if ($row->status == 0) {
                                                                                                                            echo 'Belum Diverifikasi';
                                                                                                                        } else if ($row->status == 1) {
                                                                                                                            echo 'Diverifikasi';
                                                                                                                        } else if ($row->status == 2) {
                                                                                                                            echo 'Ditolak';
                                                                                                                        } else if ($row->status == 3) {
                                                                                                                            echo 'Dibanned';
                                                                                                                        } else {
                                                                                                                            echo 'Status Tidak diketahui';
                                                                                                                        }
                                                                                                                        ?></option>
                                                                                    <option value="0">Belum Diverifikasi</option>
                                                                                    <option value="1">Diverifikasi</option>
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

                                            <!-- Delete Pelelang -->
                                            <div class="modal fade" id="deletePelelangModal<?= $row->pelelang_id ?>" tabindex="-1" aria-labelledby="deletePelelangModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content bg-light">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deletePelelangModalLabel">Hapus Pelelang</h5>
                                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Yakin ingin menghapus Pembayaran dengan ID "<?= $row->pelelang_id ?>" ?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                                            <a href="<?= base_url() ?>panitia/pelelang/hapusPelelang/<?= $row->pelelang_id; ?>" class="btn btn-danger">Ya</a>
                                                        </div>
                                                    </div>
                                                </div>
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
<!-- Modal Delete -->
<!-- <div class="modal fade" id="hapusPelelangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span>Yakin ingin hapus data?</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div> -->
<!-- End Modal Delete -->