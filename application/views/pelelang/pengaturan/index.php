<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col">
            <h4 class="card-title">Data Diri</h4>
          </div>
          <div class="col text-right">
              <a href="<?php echo base_url('pelelang/pengaturan/halaman_edit/') . $user->pelelang_id; ?>" class="btn btn-success">Lengkapi Data</a>
              <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">

            <form class="user">
              <div class="form-group row">

                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="exampleInputUsername1">Nama Lengkap</label>
                  <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Masukan Nama" value="<?= $user->nama ?>" name="nama">
                </div>
                <div class="col-sm-6">
                  <label for="exampleInputUsername1">Nama Panggilan</label>
                  <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Nama Panggilan" value="<?= $user->username ?>" name="username">
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Email</label>
                <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" value="<?= $user->email ?>" name="email">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Alamat Lengkap</label>
                <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Alamat" value="<?= $user->alamat ?>" name="alamat">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="exampleInputUsername1">No Telp</label>
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Alamat" value="<?= $user->telp ?>" name="alamat">
                </div>
                <div class="col-sm-6">
                  <label for="exampleInputUsername1">No NPWP</label>
                  <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="NPWP" value="<?= $user->npwp ?>" name="nik">
                </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputUsername1">No NIK</label>
                  <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="NIK" value="<?= $user->nik ?>" name="nik">
              </div>
              <?php if ($user->status == 0) {
              ?>
                <div class="form-group">
                  <label for="exampleInputUsername1">Status</label>
                  <input type="text" class="form-control form-control-user text-danger" id="exampleLastName" name="status" value="blm Diverikasi" readonly>
                </div>
              <?php } else { ?>
                <div class="form-group">
                  <label for="exampleInputUsername1">Status</label>
                  <input type="text" class="form-control form-control-user text-success" id="exampleLastName" name="status" value="Terverikasi" readonly>
                </div>
              <?php } ?>
              <hr>

            </form>
          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>