<br><br><br>

<div class="site-section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mb-5"><br>
        <br><span class="caption text-green"><h6><strong>Pengiriman</strong></h6></span>
        <h2 class="text-black">Informasi Pengiriman Transaksi Anda di <strong>LelangIkan</strong></h2>
      </div>
    </div>
    <div class="row">
        <div class="col-md-8 mb-3">
            <span class="text-green"><h6><strong>Status Transaksi</strong></h6></span>
            <hr>
            <!-- <?//= $kirim['status_transaksi']?> -->
            Transaksi anda 
            <?php
            if ( $kirim['status_transaksi'] == '0' ) {
              echo "belum diproses";
            } elseif ( $kirim['status_transaksi'] == '1' ) {
              echo "sedang diproses";
            } elseif ( $kirim['status_transaksi'] == '2' ) {
              echo "sedang dikirim";
            } elseif ( $kirim['status_transaksi'] == '3' ) {
              echo "sudah diterima";
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <span class="text-green"><h6><strong>Detail Pengiriman</strong></h6></span>
            <hr>
            <?//php foreach ($transaksi as $transaksi) { ?>
                <div class="col-md-7 mb-5">
                    <table>
                        <tr>
                            <td width="200px">
                                Nama Pengirim
                            </td>
                            <td width="50px">
                                :
                            </td>
                            <td>
                            <strong class="text-green"> <?= $kirim['nama_pengirim']?> </strong>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Kendaraan
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                            <strong class="text-green"><?= $kirim['nama_kendaraan']?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nomor Polisi
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                            <strong class="text-green"><?= $kirim['no_polisi']?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No HP
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                            <strong class="text-green"><?= $kirim['no_hp']?></strong>
                            </td>
                        </tr>
                    </table>
                </div>
                <?//php } ?>
        </div>
        <div class="col-md-4">
            <span class="text-green"><h6><strong>Barang Diterima ?</strong></h6></span>
            <hr>
            <strong>Silahkan konfirmasi jika barang telah diterima</strong><br>
            <button class="button button-orange text-white mt-3">Konfirmasi</button>
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