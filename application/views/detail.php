<script>
    $(document).ready(function()
    {
        setInterval(function(){
            $('#autodata').load('tabel_riwayat.php');
            refresh();
        },1000);
    });
</script>
    <br><br>

    <?php  ?>
        <div class="site-section pt-0 mt-7" id="loaded"><br><br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-5 mr-auto">


                        <?php
                            $usr_img1 = !empty($result->image1) ? $result->image1 : 'def.jpg';
                            $usr_img2 = !empty($result->image2) ? $result->image2 : 'def.jpg';
                            $usr_img3 = !empty($result->image3) ? $result->image3 : 'def.jpg';
                            $usr_img4 = !empty($result->image4) ? $result->image4 : 'def.jpg';
                        ?>

                        <div id="carouselExampleIndicators" class="carousel slide mb-5" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="rounded img-fluid" style="height: 400px; width: 500px;" src="<?php echo base_url('vendors/') . 'images/' . $usr_img1; ?>" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                <img class="rounded img-fluid" style="height: 400px; width: 500px;" src="<?php echo base_url('vendors/') . 'images/' . $usr_img2; ?>" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                <img class="rounded img-fluid" style="height: 400px; width: 500px;" src="<?php echo base_url('vendors/') . 'images/' . $usr_img3; ?>" alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                <img class="rounded img-fluid" style="height: 400px; width: 500px;" src="<?php echo base_url('vendors/') . 'images/' . $usr_img4; ?>" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev text-green" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next text-green" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>   
                    </div>

                    <div class="col-md-5 mr-auto">
                        <h4><strong class="text-green"><?=$result->produk; ?></strong></h4>
                        <span><?=$result->deskripsi_produk; ?></span>
                        <hr>
                        <table class="w-100 mb-3">
                            <tr>
                                <td>Buka Harga</td>
                                <td> : </td>
                                <td> Rp. <?=number_format($result->harga_awal) ?></td>
                            </tr>
                            <tr>
                                <td>Harga Min Diterima</td>
                                <td> : </td>
                                <td> Rp. <?=number_format($result->harga_minimal_diterima) ?></td>
                            </tr>
                            <tr>
                                <td>Beli Sekarang</td>
                                <td> : </td>
                                <td> Rp. <?=number_format($result->harga_beli_sekarang) ?></td>
                            </tr>
                            <tr> </tr>
                            <tr>
                                <td>Berakhir dalam</td>
                                <td> : </td>                            
                                
                                <td class="text-green" id="countdown">
                                    <strong>
                                        <?php
                                        if ($result->tgl_selesai=="0000-00-00 00:00:00") {
                                            $waktu = "Belum Mulai";
                                            echo $waktu;
                                        } else {
                                            $waktu = "$result->tgl_selesai"; ?>
                                            <script language="JavaScript">
                                                TargetDate = "<?=$waktu ?>";
                                                BackColor = "white";
                                                ForeColor = "red";
                                                CountActive = true;
                                                CountStepper = -1;
                                                LeadingZero = true;
                                                DisplayFormat = "%%D%% Hari, %%H%% Jam, %%M%% Menit, %%S%% Detik.";
                                                // location.reload(1);
                                                FinishMessage = "Selesai!";
                                            </script>
                                            <script language="JavaScript" src="https://rhashemian.github.io/js/countdown.js"></script>
                                        <?php } ?>
                                    </strong>
                                </td>
                            </tr>
                            <tr></tr>
                        </table>
                        <table class="mb-3">
                            <tr>
                                <td>     
                                    <form action="<?= base_url('barang/detail/'.$result->lelang_id) ?>" method="POST">
                                    <input type="number" min="<?=$maxtawar['harga_tawar']?>" step="<?=$result->incremental_value?>" class="form-control mb-2 rounded" id="tawar" name="tawar" placeholder="Tawaran" required>
                                </td>

                            </tr>
                            <tr>
                                <td><i class="text-danger" style="font-size:12px;">Silahkan masukkan angka penawaran anda dengan kelipatan Rp. <?= number_format($result->incremental_value)?> dan harus diatas Rp. 
                                    <?php
                                        if ($maxtawar['harga_tawar'] == 0) {
                                            echo number_format($result->harga_awal);
                                        } else {
                                            echo number_format($maxtawar['harga_tawar']);
                                        } 
                                    ?> </i>
                                </td>
                                </i>
                                </td>
                            </tr>
                        </table>
                        <?//= date('Y-m-d H:i:s') ?>
                        <?php
                        $tgl_selesai = strtotime($result->tgl_selesai);
                        $tgl_sekarang = strtotime(date('Y-m-d H:i:s'));                    
                        if ($this->session->userdata('logged_in')) {
                            if ($tgl_selesai < $tgl_sekarang) {
                                echo '
                                <script>
                                    window.onload = function() {
                                        if(!window.location.hash) {
                                            window.location = window.location + "#loaded";
                                            window.location.reload();
                                        }
                                    }
                                </script>
                                ';
                                echo '
                                <div class="alert alert-danger text-center font-weight-bold" role="alert">
                                    Maaf, lelang telah ditutup!
                                </div>
                                ';
                                // echo anchor('login', 'Tawar', array('class' => 'button button-green text-white mb-3 disabled'));
                            } else {
                                echo '<button type="submit" class="button button-green text-white mb-3">Tawar</button>';
                            }
                        }else{
                            echo anchor('login', 'Tawar', array('class' => 'button button-green text-white mb-3 disabled'));
                        }?>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5 mr-auto">
                        <h5 class="text-green mb-3"><strong>Riwayat Tawaran</strong></h5>
                        <table class="table table-striped w-100 mb-5 w-100 rounded">
                            <thead class="text-green thead-green">
                                <tr class="text-green">
                                    <th> 
                                        <span>Nama</span>
                                    </th>
                                    <th>
                                        <span>Harga Tawar</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    //$no=0;
                                    foreach ($result_tawar as $row){
                                        //$no++;
                                ?>
                                <tr>
                                    <th><?=$row['nama']?></th>
                                    <th>Rp. <?=number_format($row['harga_tawar'])?></th>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-5 mr-auto">
                        <h5 class="text-green mb-3"><strong>Testimoni Pemenang</strong></h5>
                        <table class="table table-bordered rounded">
                            <tbody>
                                <tr>
                                    <?php
                                        foreach ($result_testi as $testi){
                                    ?>
                                    <td><h6 class="text-orange mb-3"><strong><?= $testi['nama']?></strong></h6>
                                    <label for="nama">" <?= $testi['testimoni_pemenang']?> "</label></td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <?php $this->load->view('_partials/footer') ?>

      </div>

      <!-- loader -->
      <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

      <?php $this->load->view('_partials/js') ?>
      
    </body>
</html>