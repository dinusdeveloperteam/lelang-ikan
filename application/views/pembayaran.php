
      <body>
      <br><br><br><br><br><div class="site-section pt-0">
            <div class="container">
                <div class="row">
                    <div class=" mb-5 mt-3">
                        <span class="caption"><h6><strong>Pembayaran</strong></h6></span>
                        <h2 class="text-black">Pembayaran Tagihan Anda</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mr-auto">

                        <?//php echo form_open('update/update_peserta'); ?>
                        <?//php echo validation_errors(); ?> 
                        
                        <form action="<?php echo base_url(); ?>Pembayaran/bayar" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nominal">Nominal Dibayarkan</label>
                                <input type="text" class="form-control" id="nominal" placeholder="" name="nominal" value="<?= $subtotal['subtotal']?>" readonly>
                                <i class="text-danger" style="font-size:12px;">Silahkan bayar sesuai nominal tagihan diatas.</i>
                            </div>
                            <div class="form-group">
                                <label for="bukti">Bukti Transfer</label>
                                <input class="form-control" type="file" id="formFile" name="bukti_pembayaran">
                            </div>
                            <br>
                            <!-- <div class="form-group">
                                <label>Tanggal Pembayaran</label>
                                <input id="txtDate" type="text" class="form-control date-input"/>
                                <label class="input-group-btn" for="txtDate">
                                    <span class="btn btn-default">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </label>
                            </div> -->
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

    <!-- Bootstrap DatePicker -->
    <script type="text/javascript">
        $(function () {
            $('#txtDate').datepicker({
                format: "yyyy-mm-dd"
            });
        });
    </script>
      
</body>
</html>