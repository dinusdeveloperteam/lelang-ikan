<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col">
            <h4 class="card-title">Review Feedback</h4>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-hovered" id="table">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>Nama Peserta</th>
                <th>Produk</th>
                <th>Testimoni</th>
              </tr>
            </thead>
            <tbody>
              <tr>

                <?php
                $count = 0;
                foreach ($dataPemenang as $row) {
                  $count = $count + 1;

                ?>
                  <td align="center"><?php echo $count ?></td>
                  <td><?php echo $row->nama ?></td>
                  <td><?php echo $row->produk ?></td>
                  <td><?php echo $row->testimoni_pemenang ?></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>