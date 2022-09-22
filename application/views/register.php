
      <body>
      <br><br><br><br><br><div class="site-section pt-0">
            <div class="container">
                <div class="row">
                    <div class=" mb-5 mt-3">
                      <span class="caption"><h6><strong>Pendaftaran</strong></h6></span>
                      <h2 class="text-black">Pendaftaran Akun <strong>LelangIkan</strong></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mr-auto">

                    <?php echo form_open('register/register_peserta'); ?>
                    <?php echo validation_errors(); ?> 

                      <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control" id="nama"  placeholder="Masukan nama" name="nama">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukan email" name="email">
                        </div>
                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Masukan username" name="username">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Konfirmasi Password</label>
                          <input type="password" class="form-control" id="exampleRepeatPassword" placeholder="Konfirmasi Ulang Password" name="confirm_password">
                        </div>
                        <!-- <div class="form-group">
                          <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                          <select class="form-control" id="exampleFormControlSelect1">
                            <option>-- Pilih --</option>
                            <option>Laki-Laki</option>
                            <option>Perempuan</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="provinsi">Provinsi</label>
                          <input type="text" class="form-control" id="nik"  placeholder="Masukan Provinsi" name="nik">
                        </div>
                        <div class="form-group">
                          <label for="kota">Kota</label>
                          <input type="text" class="form-control" id="nik"  placeholder="Masukan Kota" name="nik">
                        </div>
                        <div class="form-group">
                          <label for="kecamatan">Kecamatan</label>
                          <input type="text" class="form-control" id="nik"  placeholder="Masukan Kecamatan" name="nik">
                        </div> -->
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="number_phone">Telp</label>
                          <input type="text" class="form-control" id="number_phone" aria-describedby="emailHelp" placeholder="Masukan Nomor Telepon" name="telp">
                        </div>
                        <div class="form-group">
                          <label for="nik">NIK</label>
                          <input type="text" class="form-control" id="nik"  placeholder="Masukan NIK" name="nik">
                        </div>
                        <div class="form-group">
                          <label>Alamat Lengkap</label>
                          <textarea name="alamat" style="width:100%;"></textarea>
                        </div>
                        <!-- <div class="form-group">
                          <label for="npwp">NPWP</label>
                          <input type="text" class="form-control" id="npwp" aria-describedby="emailHelp" placeholder="Masukan npwp" name="npwp">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlFile1">File NPWP</label>
                          <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlFile1">File KTP</label>
                          <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                          <label for="deposit">Deposit</label>
                          <input type="text" class="form-control" id="number_phone" aria-describedby="emailHelp" placeholder="Masukan number_phone" name="number_phone">
                        </div>
                        <div class="form-group">
                          <label for="status">Status</label>
                          <input type="text" class="form-control" id="status" aria-describedby="emailHelp" placeholder="Masukan status" name="status" readonly>
                        </div> -->
                        <div class="form-group form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Syarat dan  Ketentuan</label>
                        </div>
                        <button type="submit" class="btn btn-success">Daftar</button>

                        <?php echo form_close(); ?>

                        <span><br><br>Sudah punya akun? <a href="login"><strong>Masuk</strong></a></span>
                        
                      </form>
                    </div>
                </div>
            </div>
          </div>
      
    <!------------------Footer------------------>
    <?php $this->load->view('_partials/footer') ?>

    <!-- .site-wrap -->


    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

    <?php $this->load->view('_partials/js') ?>
      
</body>
</html>