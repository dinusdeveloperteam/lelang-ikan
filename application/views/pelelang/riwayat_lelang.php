<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col">
            <h4 class="card-title">Data Riwayat Lelang</h4>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-hovered" id="table">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>Nama Peserta</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total Pembayaran</th>
                <th>Status Pengiriman</th>
              </tr>
            </thead>
            <tbody>
              <tr>

                <?php
                $count = 0;
                foreach ($RiwayatLelang as $row) {
                  $count = $count + 1;

                ?>
                  <td align="center"><?php echo $count ?></td>
                  <td><?php echo $row->nama ?></td>
                  <td><?php echo $row->produk ?></td>
                  <td><?php echo $row->jumlah ?></td>
                  <td><?php echo $row->nominal_dibayarkan ?></td>
                  <td> <?php if ($row->status_transaksi == 0) {
                     echo '<p class="badge badge-warning">Belum Diproses</p>';
                  }else if ($row->status_transaksi == 1) {
                     echo '<p class="badge badge-warning">Sedang Diproses</p>';
                  }else if ($row->status_transaksi == 2) {
                    echo '<p class=" badge badge-info">Sedang Dikirim</p>';
                  } else if ($row->status_transaksi == 3) {
                    echo '<p class="badge badge-success">Barang Telah Sampai</p>';
                  }  else {
                    echo '<p class="badge badge-danger">Barang Telah Sampai</p>';
                  } ?></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>