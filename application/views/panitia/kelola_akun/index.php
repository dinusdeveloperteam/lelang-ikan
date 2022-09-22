<div class="main-panel">
    <!--content-->
    <div class="content-wrapper">
        <!-- partials breadcrumb start -->
        <?php $this->load->view("panitia/partials/breadcrumb.php"); ?>
        <!-- partilas breadcrumb end -->
        <div class="row">
            <div class=" col-lg-6 grid-margin">
                <div class="card">
                    <div class="card-body shadow-sm">
                        <?php echo $this->session->flashdata('msgInfo'); ?>
                        <form action="<?= base_url('panitia/profile/halaman_edit/'.$panitia['panitia_id']); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-row d-block mb-5">
                                <img src="<?= ($panitia['foto'] != "" ? base_url($panitia['foto']) : base_url('vendors/images/profile.png')) ?>" class="rounded-circle mx-auto d-block zoom" style="width:250px;height:200px;" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." width="200">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="nama">Foto Profile</label>
                                    <input type="file" name="image1" class="form-control" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $panitia['nama'] ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" name="nik" value="<?= $panitia['NIK'] ?? $panitia['nik'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jeniskel">Jenis Kelamin</label>
                                    <select name="jeniskel" class="form-control">
                                        <option value="<?= $panitia['jeniskel'] ?>" selected>
                                            <?php
                                            $kelamin = $panitia['jeniskel'];
                                            if ($kelamin == 'L' || $kelamin == 'l') {
                                                echo "Laki - laki";
                                            } else if ($kelamin == 'P' || $kelamin == 'p') {
                                                echo "Perempuan";
                                            } else {
                                                echo "Unknown";
                                            }
                                            ?>
                                        </option>
                                        <option value="L">Laki - laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="instansi">Instansi</label>
                                    <input type="text" class="form-control" name="instansi" value="<?= $panitia['instansi'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan" value="<?= $panitia['jabatan'] ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success" style="float:right">
                                <i class="mdi mdi-content-save"></i>
                                <span>Simpan</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 grid-margin">
                <div class="card">
                    <div class="card-body shadow-sm">
                        <div class="form-row mb-4">
                            <h4>Ubah Password</h4>
                        </div>
                        <?php echo $this->session->flashdata('msgPassword'); ?>
                        <form action="<?= base_url('panitia/profile/halaman_edit_password/'.$panitia['panitia_id']); ?>" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="oldpassw">Password Lama</label>
                                    <input type="password" class="form-control" name="oldpassw">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="newpassw">Password Baru</label>
                                    <input type="password" class="form-control" name="newpassw">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="konfirmpassw">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="konfirmpassw">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm" style="float:right">
                                <i class="mdi mdi-content-save"></i>
                                <span>Simpan</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div> 