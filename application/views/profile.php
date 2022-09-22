
      <body>
      <br><br><br><br><br><div class="site-section pt-0">
            <div class="container">
                <div class="row">
                    <div class=" mb-5 mt-3">
                      <span class="caption"><h6><strong>Profil</strong></h6></span>
                      <h2 class="text-black">Akun Terdaftar Anda di <strong>LelangIkan</strong></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mr-auto">

                      <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control" id="nama"  placeholder="<?=$this->session->userdata('nama') ?>" name="nama" readonly>
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="<?=$this->session->userdata('email') ?>" name="email" readonly>
                        </div>
                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="<?=$this->session->userdata('username') ?>" name="username" readonly>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                          </select>
                          <?php 
                          if($this->session->userdata('jeniskel') == 'L'){
                           $jeniskel = 'Laki-Laki';
                          }else if($this->session->userdata('jeniskel') == 'P'){
                            $jeniskel = 'Perempuan';
                          }else{
                            $jeniskel = '-';
                          }?>
                            
                          <input type="text" class="form-control" id="jeniskel" aria-describedby="jenisKel" placeholder="<?=$jeniskel?>" name="jeniskel" readonly>
                        </div>
                        <div class="form-group">
                          <label for="provinsi">Provinsi</label>
                          <input type="text" class="form-control" id="provinsi"  placeholder="<?php echo $peserta['provinsi'] ?>" name="provinsi" readonly>
                        </div>
                        <div class="form-group">
                          <label for="kota">Kota</label>
                          <input type="text" class="form-control" id="kota"  placeholder=" <?php echo $peserta['kota'] ?> " name="kota" readonly>
                        </div>
                        <div class="form-group">
                          <label for="kecamatan">Kecamatan</label>
                          <input type="text" class="form-control" id="kecamatan"  placeholder="<?php echo $peserta['kecamatan'] ?>" name="kecamatan" readonly>
                        </div>                        
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="number_phone">Telp</label>
                          <input type="text" class="form-control" id="telp" aria-describedby="emailHelp" placeholder="<?php echo $peserta['telp'] ?>" name="telp" readonly>
                        </div>
                        <div class="form-group">
                          <label for="nik">NIK</label>
                          <input type="text" class="form-control" id="nik"  placeholder="<?php echo $peserta['nik'] ?>" name="nik" readonly>
                        </div>
                        <div class="form-group">
                          <label>Alamat Lengkap</label>
                          <input type="text" class="form-control" id="alamat"  placeholder="<?php echo $peserta['alamat'] ?>" name="alamat" readonly>
                          <!-- <textarea id="alamat" name="alamat" placeholder="<?=$this->session->userdata('alamat') ?>" style="width:100%;" readonly></textarea> -->
                        </div>
                        <div class="form-group">
                          <label for="npwp">NPWP</label>
                          <input type="text" class="form-control" id="npwp" aria-describedby="npwp" placeholder="<?php echo $peserta['npwp'] ?>" name="npwp" readonly>
                        </div>
                        <div class="form-group">
                          <label for="deposit">Deposit</label>
                          <input type="text" class="form-control" id="deposit" aria-describedby="deposit" placeholder="<?php echo $peserta['deposit'] ?>" name="deposit" readonly>
                        </div>
                        <div class="form-group">
                          <label for="status">Status</label>
                        <?php 
                          if($peserta['status'] == 1){
                            $status = 'Sudah Diverifikasi';
                          }else{
                            $status = 'Belum Diverifikasi';
                          }?>
                          <input type="text" class="form-control" id="status" aria-describedby="status" placeholder="<?=$status?>" name="status" readonly>
                        </div>
                        <br>
                        <!-- <button type="submit" class="btn btn-success"><a href="update">Perbaharui</a></button> -->
                        

                        <?//php echo form_close(); ?>
                        
                      </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <span>Ingin memperbarui profil?</span>&emsp;&emsp;<?php echo anchor('update', 'Perbarui', array('class' => 'button button-green text-white'))?>
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