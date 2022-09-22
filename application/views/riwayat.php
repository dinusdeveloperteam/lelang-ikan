        <br><br><br>

        <div class="site-section pt-0">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 mb-5"><br>
                <br><span class="caption text-green"><h6><strong>Riwayat</strong></h6></span>
                <h2 class="text-black">Informasi Ikut Serta Lelang Anda di <strong>LelangIkan</strong></h2>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <span class="text-green"><h6><strong>Riwayat Tawar</strong></h6></span>
                    <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-orange">No</th>
                            <th class="text-orange">Foto Produk</th>
                            <th class="text-orange">Nama Produk</th>
                            <th class="text-orange">Waktu Tawar</th>
                            <th class="text-orange">Nominal Tawar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($get_riwayat as $riwayat) { ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td class="w-25"><img style="width:120px;" src="<?php echo base_url('assets/uploads/') . 'produk/' . $riwayat['image1']; ?>"></td>
                            <td><strong class="text-green"><?= $riwayat['produk']?><strong></td>
                            <td><?= $riwayat['tgl_bid']?></td>
                            <td>Rp. <?=number_format($riwayat['harga_tawar'])?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    </div>
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