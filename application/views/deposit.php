
      <body>
      <br><br><br><br><br><div class="site-section pt-0">
            <div class="container">
                <div class="row">
                    <div class=" mb-5 mt-3">
                      <span class="caption"><h6><strong>Deposit</strong></h6></span>
                      <h2 class="text-black">Isi Saldo Deposit Anda di <strong>LelangIkan</strong></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mr-auto">
                        <div class="form-group">
                            <label for="username">Nama Anda</label>
                            <input type="text" class="form-control" id="nama" aria-describedby="nama" placeholder="<?=$this->session->userdata('nama') ?>" name="nama" readonly>
                        </div>
                        <form action="<?php echo base_url(); ?>Deposit/depo" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="email">Nominal Deposit</label>
                                <input type="text" class="form-control" id="deposit" aria-describedby="deposit" placeholder="" name="nominal_deposit" style="number_format">
                            </div>
                            <div class="form-group">
                                <label for="nama">Tanggal Transfer</label>
                                <input id="txtDate" type="date" class="form-control date-input" name="tgl_deposit"/>
                                <label class="input-group-btn" for="txtDate">
                                    <span class="btn btn-default">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </label>
                            </div>                       
                    </div>
                    <div class="col-md-6 mr-auto">
                        <div class="form-group align-items-center">
                            <label for="bukti-transfer" class="form-label">Unggah Bukti Transfer</label>
                            <input class="form-control" type="file" id="formFile" name="bukti_pembayaran">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" aria-describedby="keterangan" placeholder="" name="keterangan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <?php
                                if($this->session->userdata('status') == '0'){
                                    echo "<input type='text' class='form-control' id='status' aria-describedby='status' placeholder='Belum Diverifikasi' name='status' readonly>";
                                }else if($this->session->userdata('status') == '1'){
                                    echo "<input type='text' class='form-control' id='status' aria-describedby='status' placeholder='Sudah Diverifikasi' name='status' readonly>";
                                }else{
                                    echo "<input type='text' class='form-control' id='status' aria-describedby='status' placeholder='Ditolak' name='status' readonly>";
                                }
                            ?>
                        </div>
                    </div>
                    
                    <?//php echo form_close(); ?>
                    
                </div>
                <div class="row">
                    <span>Yakin untuk menyimpan data?</span>&emsp;&emsp;
                    <button type="submit" class="button button-green text-white">Simpan</button>
                </form>
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