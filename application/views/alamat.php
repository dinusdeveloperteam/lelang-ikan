
      <body>
      <br><br><br><br><br><div class="site-section pt-0">
            <div class="container">
                <div class="row">
                    <div class=" mb-5 mt-3">
                        <span class="caption"><h6><strong>Alamat Kirim</strong></h6></span>
                        <h2 class="text-black">Gunakan Alamat Kirim Anda</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mr-auto">

                        <?//php echo form_open('update/update_peserta'); ?>
                        <?//php echo validation_errors(); ?> 
                        
                        <form action="<?php echo base_url(); ?>Alamat/edit_alamat_kirim" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="lelang_id" value="<?= $transaksi['lelang_id'] ?>">
                            <div class="form-group">
                                <label>Alamat Lengkap</label>
                                <!-- <input type="text" class="form-control" id="alamat"  placeholder="" name="alamat"> -->
                                <textarea name="alamat_kirim" id="alamat_kirim" class="w-100" cols="30" rows="3"><?= $peserta['alamat']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input name="provinsi_kirim" type="text" class="form-control" id="provinsi" value="<?= $peserta['provinsi'] ?>" placeholder="" name="provinsi">
                            </div>
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <input type="text" class="form-control" id="kota_kirim"  placeholder="" value="<?= $peserta['kota'] ?>" name="kota_kirim">
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan_kirim"  placeholder="" value="<?= $peserta['kecamatan'] ?>" name="kecamatan_kirim">
                            </div>
                            <div class="form-group">
                                <label for="kelurahan">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan_kirim"  placeholder="" value="<?= $peserta['kelurahan'] ?>" name="kelurahan_kirim">
                            </div>
                            <br>
                            <button type="submit" class="button button-green text-white">Simpan</button> &emsp; <a href="transaksi" class="button button-orange text-white">Kembali</a>
                            <?//php echo form_close(); ?>
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