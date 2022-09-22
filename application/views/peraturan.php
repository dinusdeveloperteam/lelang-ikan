<!DOCTYPE html>
<html lang="en">
<head>
  <title>Peraturan | Lelang Ikan Kabupaten Kendal</title>
  <?php $this->load->view('_partials/head') ?>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <!--  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300"> -->
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
  <div class="site-wrap">

  <?php $this->load->view('_partials/navbar') ?> 

        <br><br><br>

        <div class="site-section pt-0">
          <div class="container">
            <div class="row">
              <div class="col-lg-7 mb-5"><br>
                <br><span class="caption text-green"><h6><strong>Peraturan</strong></h6></span>
                <h2 class="text-black">Aturan <strong>Pelelangan</strong></h2>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <div class="step">
                  <span class="wrap-icon-rounded"><strong>1</strong></span>
                  <h3>Pendaftaran</h3>
                  <p>Calon peserta lelang harus mendaftarkan diri sebelum mengikuti lelang.</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="step">
                  <span class="wrap-icon-rounded"><strong>2</strong></span>
                  <h3>Deposit</h3>
                  <p>Peserta wajib menyerahkan besaran deposit yang ditentukan untuk menjadi bukti keseriusan mengikuti pelelangan.</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="step">
                  <span class="wrap-icon-rounded"><strong>3</strong></span>
                  <h3>Pilih Ikan</h3>
                  <p>Peserta berhak memilih ikan terdaftar untuk melakukan pelelangan.</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="step">
                  <span class="wrap-icon-rounded"><strong>4</strong></span>
                  <h3>Isi Penawaran</h3>
                  <p>Peserta wajib mengisi besaran tawaran diatas harga yang dibuka oleh pelelang sesuai kelipatan yang ditentukan sebelum batas waktu pelelangan.</p>
                </div>
              </div>
            </div><br>
            <br><div class="row">
            <div class="col-lg-3">
                <div class="step">
                  <span class="wrap-icon-rounded"><strong>5</strong></span>
                  <h3>Bersifat Mutlak</h3>
                  <p>Pemenang lelang yang telah diputuskan oleh panitia serta disetujui oleh pelelang bersifat mutlak dan tidak bisa diganggu gugat atas alasan apapun.</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="step">
                  <span class="wrap-icon-rounded"><strong>6</strong></span>
                  <h3>Tidak Bisa Diwakilkan</h3>
                  <p>Pemenang lelang tidak bisa mewakilkan atas nama penerima hasil lelang atas alasan apapun.</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="step">
                  <span class="wrap-icon-rounded"><strong>7</strong></span>
                  <h3>Deposit Hangus</h3>
                  <p>Deposit akan dinyatakan hangus dan tidak bisa dikembalikan apabila pemenang lelang membatalkan keikutsertaan pelelangan atas alasan apapun.</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="step last">
                  <span class="wrap-icon-rounded"><strong>8</strong></span>
                  <h3>Wajib Bayar</h3>
                  <p>Pemenang lelang wajib membayarkan kekurangan dari harga lelang yang dimenangkan.</p>
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