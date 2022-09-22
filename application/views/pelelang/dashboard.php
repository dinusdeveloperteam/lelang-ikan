<div class="row">
<div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <a href="" style="text-decoration: none; color: white;">
                      <img src="<?php echo base_url('vendors/adminassets/assets/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Pendapatan Hasil lelang<i class="mdi mdi-chart-line mdi-24px float-right"></i></h4>
                    <h2 class="mb-5">Rp. <?= $total_pendapatan ?></h2>
                    </a>
                    
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="<?php echo base_url('vendors/adminassets/assets/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Transaksi <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i></h4>
                    <h2 class="mb-5"><?= $total_transaksi ?></h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="<?php echo base_url('vendors/adminassets/assets/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Pemenang Lelang <i class="mdi mdi-diamond mdi-24px float-right"></i></h4>
                    <h2 class="mb-5"><?= $total_pemenang ?></h2>
                  </div>
                </div>
              </div>
</div>

<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">10 Transaksi Terbaru</h4>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>No Invoice</th>
                <th>Pemesan</th>
                <th>Subtotal</th>
                <th>Metode Pembayaran</th>
                <th>Status Pesanan</th>
                <th width="15%">Aksi</th>
              </tr>
            </thead>
            <tbody>

             <?php
              $count = 0;
              foreach ($Transaksi as $row) {
                $count = $count + 1;
              ?>
                <tr>
                  <td align="center"><?php echo $count ?></td>
                  <td><?= $row->lelang_id ?></td>
                  <td><?= $row->nama ?></td>
                  <td><?= $row->nominal_dibayarkan ?></td>
                  <td>
                    <?php
                    if ($row->metode_bayar == 1) {
                      echo '<p class="font-weight-bold text-danger">TRansfer</p>';
                    }
                    ?>
                  </td>
                  <td>
                    <?php
                    if ($row->status == 0) {
                      echo '<p class="font-weight-bold text-warning">Belum Dibayar</p>';
                    } else if ($row->status == 1) {
                      echo '<p class="font-weight-bold text-success">Sudah Dibayar</p>';
                    } else if ($row->status == 2) {
                      echo '<p class="font-weight-bold text-danger">Ditolak</p>';
                    }
                    ?>
                  </td>
                  <td align="center">
                    <a href="<?= base_url('pelelang/transaksi/proses/') ?>" class="btn btn-success btn-sm mr-3">
                      Proses Transaksi
                    </a>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="<?= base_url('pelelang/transaksi/detail/') . $row->lelang_id; ?>" class="btn btn-warning btn-sm">
                        Lihat Detail
                      </a>
                    </div>
                  </td>

                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>