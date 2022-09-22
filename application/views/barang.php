
        <!-- </div> -->
        <br><br>
        <div class="site-section pt-0">
          <div class="container">
            <div class="row">
              <div class="col-lg-7 mb-5"><br>
                <br><span class="caption text-green"><h6><strong><br>Lelang</strong></h6></span>
                <h2 class="text-black">Daftar Ikan Yang Dilelang</h2>
              </div>
            </div>
          </div>
        <!--</div>--> 

        <!------------ Content -------------->
          <div class="container">
              <div class="col">
                <div class="row auctions-entry">

                  <?php foreach ($result as $result) : ?>
                    <div class="col-md-4 col-lg-4">
                      <div class="card-group">
                        <div class="card h-100 mb-3"">
                          <a href="item-single.html"><img src="<?php echo base_url('assets/uploads/') . 'produk/' . $result->image1; ?>" alt="Image" class="card-img-top rounded image-resize  cover"></a>
                          <div class="card-body">
                            <h5 class="card-title"><?=$result->produk; ?></h5>
                            <p class="card-text"><span>Buka Harga : Rp. <?=number_format($result->harga_awal) ?></span></p>
                            <?php //echo anchor('barang/detail/'.$result->lelang_id, 'Tawar', array('class' => 'btn btn-bid bg-success'))?>
                            <!-- <a href="" class="btn btn-bid bg-success">Penawaran</a> -->
                            <!--<a href="register" class="button button-green" style="width:150px;"><span style="color:white;">Daftar</span></a>-->
                            <?php echo anchor('barang/detail/'.$result->lelang_id, 'Tawar', array('class' => 'button button-green rounded text-white'))?>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                    
                </div>
              </div>
          </div>


          <?= $this->pagination->create_links(); ?>
        </div>
        <?php $this->load->view('_partials/footer') ?>
      </div>
      <!-- .site-wrap -->


      <!-- loader -->
      <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>      
      
      <?php $this->load->view('_partials/js') ?>
    </body>

    </html>