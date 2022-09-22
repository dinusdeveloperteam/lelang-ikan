<body>
    <br><br><br><br><br>
    <div class="site-section pt-0">
        <div class="container">
            <div class="row">
                <div class=" mb-5 mt-3">
                    <span class="caption">
                        <h6><strong>Perbarui</strong></h6>
                    </span>
                    <h2 class="text-black">Akun Terdaftar Anda di <strong>LelangIkan</strong></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mr-auto">
                    <form action="<?php echo base_url(); ?>Update/edit" method="post" class="form-horizontal" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nama">Nomor ID Peserta</label>
                        <input type="text" class="form-control" id="peserta_id" placeholder="" value="<?= $this->session->userdata('peserta_id')?>" name="peserta_id" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" placeholder="<?= $this->session->userdata('nama') ?>" value="<?= $this->session->userdata('nama') ?>" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="<?= $this->session->userdata('email') ?>" value="<?= $this->session->userdata('email') ?>" name="email">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="<?= $this->session->userdata('username') ?>" value ="<?= $this->session->userdata('username') ?>" name="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01" name="jeniskelamin">
                                <?php
                                    if ($this->session->userdata('jeniskel') == 'L') {
                                        echo '<option value="L" selected>Laki-Laki</option>';
                                    } else {
                                        echo '<option value="P">Perempuan</option>';
                                    }
                                ?>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" placeholder=" <?php echo $peserta['provinsi'] ?> " value="<?= $this->session->userdata('provinsi') ?>" name="provinsi">
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <input type="text" class="form-control" id="kota" placeholder="<?php echo $peserta['kota'] ?>" value="<?= $this->session->userdata('kota') ?>" name="kota">
                    </div>
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" placeholder="<?php echo $peserta['kecamatan'] ?>" name="kecamatan">
                    </div>
                    <div class="form-group">
                        <label for="kelurahan">Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" placeholder="<?php echo $peserta['kelurahan'] ?>" name="kelurahan">
                    </div>
                    <div class="form-group">
                        <label for="number_phone">Telp</label>
                        <input type="text" class="form-control" id="telp" aria-describedby="emailHelp" placeholder="<?php echo $peserta['telp'] ?>" name="notelp">
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" placeholder=" <?php echo $peserta['nik'] ?> " name="nik" value="<?= $this->session->userdata('nik') ?>">
                    </div>
                    <div class="form-group align-items-center">
                        <label for="foto-ktp" class="form-label">Unggah Foto KTP</label>
                        <input class="form-control" type="file" id="formFile" placeholder="<?php echo $peserta['filektp'] ?>" name="filektp" accept="image/png, image/jpeg, image/jpg, image/gif" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <input type="text" class="form-control" id="alamat" placeholder="<?php echo $peserta['alamat'] ?>" name="alamat" value="<?= $this->session->userdata('alamat') ?>">
                        <!-- <textarea id="alamat" name="alamat" placeholder="<?//= $this->session->userdata('alamat') ?>" style="width:100%;" readonly></textarea> -->
                    </div>
                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control" id="npwp" aria-describedby="npwp" placeholder="<?php echo $peserta['npwp'] ?>" name="npwp" value="<?= $this->session->userdata('npwp') ?>">
                    </div>
                    <div class="form-group align-items-center">
                        <label for="foto-npwp" class="form-label">Unggah Foto NPWP</label>
                        <input class="form-control" type="file" id="formFile" name="filenpwp" placeholder="<?php echo $peserta['filenpwp'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="deposit">Deposit</label>
                        <input type="text" class="form-control" id="deposit" aria-describedby="deposit" value="<?php echo $peserta['deposit'] ?>" name="deposit" readonly>
                    </div>
                    <div class="form-group">
                        <?php echo anchor('deposit', 'Isi Deposit', array('class' => 'button button-orange text-white'))?>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <?php
                        if ($this->session->userdata('status') == '1') {
                            $ket = 'Sudah Diverifikasi';
                        } else {
                            $ket = 'Belum Diverifikasi';
                        }
                        ?>
                        <input type="text" class="form-control" id="status" aria-describedby="status" placeholder="<?= $ket ?>" name="status" readonly>
                    </div>
                    <br>
                    <button type="submit" name="submit" class="button button-green text-white">Simpan</button>
                                   
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!------------------Footer------------------>
    <?php $this->load->view('_partials/footer') ?>

    <!-- .site-wrap -->


    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78" />
        </svg></div>

    <?php $this->load->view('_partials/js') ?>

</body>

</html>