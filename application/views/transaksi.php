<br><br><br>

<div class="site-section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mb-5"><br>
        <br><span class="caption text-green"><h6><strong>Transaksi</strong></h6></span>
        <h2 class="text-black">Informasi Transaksi Anda di <strong>LelangIkan</strong></h2>
      </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <span class="text-green"><h6><strong>Alamat Pengiriman</strong></h6></span>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <span class="text-green"><h6><strong> <?=$this->session->userdata('nama') ?> </strong></h6></span>
                    <span class="text-green"><h6> <?=$this->session->userdata('telp') ?> </h6></span>
                    <?php
                    if ($lelang_pemenang['alamat_kirim'] == NULL){
                        echo "<span class='text-green'><h6> Belum ada alamat pengiriman </h6></span>";
                    } else {

                        echo "<span>".$lelang_pemenang['alamat_kirim'] .", ".$lelang_pemenang['kelurahan_kirim'] .", ".$lelang_pemenang['kecamatan_kirim'] ." , ".$lelang_pemenang['kota_kirim'] ." , ".$lelang_pemenang['provinsi_kirim'] ."</span>";
          
                    }
                    ?>
                    <!-- <span><?//=$this->session->userdata('alamat') ?>, <?//=$this->session->userdata('kelurahan') ?>, <?//=$this->session->userdata('kecamatan') ?>, <?//=$this->session->userdata('kota') ?>, <?//=$this->session->userdata('provinsi') ?></span> -->
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <a href="alamat">
                        <button type="button" class="button button-white text-grey" style="width:150px;">
                            Pilih Alamat Lain
                        </button>
                    </a>
                </div>
            </div>
            <hr>
            <span class="text-green"><h6><strong>Detail Item</strong></h6></span>
            <hr>
            <?php foreach ($transaksi as $transaksi) { ?>
            <div class="row mb-3">
              <div class="col-md-2 mr-5">
                    <img style="width:100px;" src="<?php echo base_url('assets/uploads/') . 'produk/' . $transaksi['image1']; ?>">
              </div>
              <div class="col-md-4">
                    <strong class="text-green"><?= $transaksi['produk']?></strong>
              </div>
              <div class="col-md-3">
                    Rp. <?=number_format($transaksi['total_bayar'])?>
              </div>
            </div>
            <?php } ?>
            <hr>
            <div class="row">
              <div class="col-md-6 mr-5">
                <span class="text-green"><h6>Subtotal</h6></span>
              </div>
              <div class="col-md-3">
                Rp. <?=number_format($subtotal['subtotal'])?>
              </div>
            </div>
            
            
        </div>
        <div class="col-md-4">
            <span class="text-green"><h6><strong>Ringkasan Transaksi</strong></h6></span>
            <hr>
            <h6><strong>Total Tagihan : Rp. <?=number_format($subtotal['subtotal'])?></strong></h6>
            <hr>
            <!-- <a href="pembayaran" class="button button-orange text-white">Pembayaran</a> -->
            <?php echo anchor('pembayaran', 'Pembayaran', array('class' => 'button button-green rounded text-white'))?>
        </div>
    </div>
  </div>
</div>

<?php $this->load->view('_partials/footer') ?>

</div>
<!-- .site-wrap -->


<!-- loader -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

<?php $this->load->view('_partials/js') ?>

</body>

</html>