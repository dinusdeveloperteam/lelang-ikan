<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col">
            <h4 class="card-title">Data Pesanan Perlu Di Cek</h4>
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
                <th width="15%">Aksi</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <?php
                $count = 0;
                foreach ($Transaksi as $row) {
                  $count = $count + 1;
                ?>
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
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="<?= base_url('pelelang/transaksi/detail') . $row->lelang_id; ?>" class="btn btn-warning btn-sm">
                        Cek Pembayaran
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