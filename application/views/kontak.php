
        <br><br><br>
        <br><br><div class="site-section pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mr-auto">
                        <div class="col-lg-7 mb-5">
                            <span class="caption text-green"><h6><strong>Kontak</strong></h6></span>
                            <h2 class="text-black">Hubungi <strong>LelangIkan</strong></h2>
                        </div>
                        <p class="mb-5">Apabila ada pesan yang ingin disampaikan kepada <strong>LelangIkan</strong>, anda dapat menghubungi kontak dibawah ini atau dengan mengirim email pada form berikut ini.</p>

                        <ul class="list-unstyled mb-5">
                            <li class="d-flex cta-text mb-2"><span class="mr-3"><i class="fas fa-map-marker-alt"></i></span>Kendal, Jawa Tengah</li>
                            <li class="d-flex cta-text mb-2"><span class="mr-3"><i class="fas fa-phone"></i></span> 081234567890</li>
                            <li class="d-flex cta-text" mb-2><span class="mr-3"><i class="far fa-envelope-open"></i></span> lelang-ikan@gmail.com </li>
                        </ul>
                    </div>

                    <div class="col-md-5"><br>
                        <br><form class="mb-5" method="post" id="contactForm" name="contactForm">
                            <br><br><div class="row">
              
                                <div class="col-md-12 form-group">
                                    <label for="name" class="col-form-label">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="email">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="message" class="col-form-label">Pesan</label>
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="7"></textarea>
                                </div>
                            </div>
            
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Kirim Pesan" class="button button-green rounded-0 py-2 px-4" style="text-color:white;">
                                    <span class="submitting"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!------------------Footer------------------>
        <?php $this->load->view('_partials/footer') ?>


      </div>
      <!-- .site-wrap -->


      <!-- loader -->
      <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

      <?php $this->load->view('_partials/js') ?>
      
    </body>

    </html>