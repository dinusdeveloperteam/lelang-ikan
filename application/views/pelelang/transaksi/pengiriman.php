<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col">
            <h4 class="card-title">Proses Transaksi</h4>
          </div>
          <div class="col text-right">
            <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">

          <form class="user" action="<?php echo base_url(); ?>/pelelang/transaksi/pengiriman/<?= $data->pengiriman_id ?>" method="POST" enctype="multipart/form-data">

              <div class="form-group">
                <label for="exampleInputUsername1">Nomer Invoice</label>
                <input type="text" class="form-control" name="invoice"  value="<?php echo $lelang->lelang_id; ?>" required readonly>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Nama Pelelang</label>
                <input type="text" class="form-control" name="pelelang"  value="<?php echo $pelelang->nama; ?>" required readonly>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Nama Pengirim</label>
                <input type="text" name="pengirim" class="form-control" value="<?php echo $edit_pengirim->nama; ?>" required />
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Nomer Polisi</label>
                <input type="text" name="no_pol" class=" form-control" value="<?php echo $edit_pengirim->no_polisi; ?>" required />
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Nama Kendaraaan</label>
                <input type="text" name="nama_kendaraan" class="form-control" value="<?php echo $edit_pengirim->nama_kendaraan; ?>" required />
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">No.HP</label>
                <input type="text" name="telp" class="form-control" value="<?php echo $edit_pengirim->no_hp; ?>" required />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-success text-right" name="submitData">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>