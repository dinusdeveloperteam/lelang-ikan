<?//php $this->load->view('_partials/head') ?>

      <!-- <div class="hero-slide owl-carousel site-blocks-cover"> -->
        <div class="intro-section" style="background-image: url(<?php echo base_url('vendors/images/bg.jpg')?>">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-7 mx-auto text-center" data-aos="fade-up">
                <h1>Ingin mengikuti pelelangan ikan?</h1>
                <p>Silahkan masuk terlebih dahulu di bawah ini!</p>
                <a href="barang" class="button button-green" style="width:150px;"><span style="color:white;">Lelang</span></a>
              </div>
            </div>
          </div>
        </div>

        <!-- </div> -->

        <div class="site-section pt-0">
          <div class="container">
            <div class="row">
              <div class="col-lg-7 mb-5"><br>
                <br><span class="caption text-green"><h6><strong>Alur Pelelangan</strong></h6></span>
                <h2 class="text-black">Cara <strong>Pelelangan</strong></h2>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <div class="step">
                  <span class="wrap-icon-rounded">1</span>
                  <h3>Pendaftaran</h3>
                  <p>Daftar sebagai peserta lelang</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="step">
                  <span class="wrap-icon-rounded">2</span>
                  <h3>Pilih Ikan</h3>
                  <p>Memilih ikan yang menarik dan dibutuhkan.</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="step">
                  <span class="wrap-icon-rounded">3</span>
                  <h3>Isi Penawaran</h3>
                  <p>Peserta akan mengisi harga penawaran dari harga yang dibuka oleh pelelang.</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="step last">
                  <span class="wrap-icon-rounded">4</span>
                  <h3>Transaksi Lanjutan</h3>
                  <p>Jika peserta memenangkan lelang maka transaksi selanjutnya sesuai harga terakhir bisa dilakukan.</p>
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