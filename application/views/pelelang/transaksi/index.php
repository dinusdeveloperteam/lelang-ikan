<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col">
            <h4 class="card-title">Data Pesanan Baru</h4>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-hovered" id="table">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>No Invoice</th>
                <th>Pemesan</th>
                <th>Subtotal</th>
                <th>Metode Pembayaran</th>
                <th>Status Pesanan</th>
                <th>Surat Perintah Pengemasan</th>
                <th>Surat Perintah Pengiriman</th>
                <th>Status Transaksi</th>
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
                      echo '<p class="badge badge-info">TRansfer</p>';
                    }
                    ?>
                  </td>
                  <td>
                    <?php
                    if ($row->status == 0) {
                      echo '<p class="badge badge-warning">Belum Dibayar</p>';
                    } else if ($row->status == 1) {
                      echo '<p class="badge badge-success">Sudah Dibayar</p>';
                    } else if ($row->status == 2) {
                      echo '<p class="badge badge-danger">Ditolak</p>';
                    }
                    ?>
                  </td>
                  <td></td>
                  <td>
                    <?php if ($row->status == 1) { ?>
                       <a type="button" href="<?= base_url('panitia/Suratpengiriman/suratperintah/' .$row->lelang_id) ?>" class="btn btn-warning btn-sm">Cetak</a>
                    <?php } ?></td>
                  <td>
                  <?php if ($pengiriman->status_transaksi == 0) {
                     echo '<p class="badge badge-warning">Belum Diproses</p>';
                  }else if ($pengiriman->status_transaksi == 1) {
                     echo '<p class="badge badge-warning">Sedang Diproses</p>';
                  }else if ($pengiriman->status_transaksi == 2) {
                    echo '<p class=" badge badge-info">Sedang Dikirim</p>';
                  } else if ($pengiriman->status_transaksi == 3) {
                    echo '<p class="badge badge-success">Barang Telah Sampai</p>';
                  }  else {
                    echo '<p class="badge badge-danger">Barang Telah Sampai</p>';
                  } ?>
                  </td>
                  <td align="center">
                    <a href="<?= base_url('pelelang/transaksi/proses/') . $row->lelang_id; ?>" class="btn btn-success btn-sm mr-3">
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