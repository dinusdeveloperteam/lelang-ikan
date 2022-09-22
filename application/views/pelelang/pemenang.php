  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="row mb-3">
            <div class="col">
              <h4 class="card-title">Data Pemenang Lelang</h4>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-hovered" id="table">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Nama Peserta</th>
                  <th>Produk</th>
                  <th>Tanggal Diumumkan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $count = 0;
                  foreach ($dataPemenang as $row) {
                    $count = $count + 1;
                ?>
                <tr>
                    <td align="center"><?php echo $count ?></td>
                    <td><?php echo $row->nama ?></td>
                    <td><?php echo $row->produk ?></td>
                    <td><?php echo date("j M Y", strtotime($row->tgl_diumumkan)); ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>