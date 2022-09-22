<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col">
            <h4 class="card-title">Edit Data Diri</h4>
          </div>
          <div class="col text-right">
            <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">

            <form class="user" action="<?php echo base_url(); ?>/pelelang/pengaturan/halaman_edit/<?= $data->pelelang_id ?>" method="POST" enctype="multipart/form-data">

              <div class="form-group">
                <input type="hidden" class="form-control" name="pelelang_id" value="<?php echo $data->pelelang_id ?>">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="exampleInputUsername1">Nama Lengkap</label>
                  <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Masukan Nama" name="nama" value="<?php echo $data->nama ?>">
                </div>
                <div class="col-sm-6">
                  <label for="exampleInputUsername1">Nama Pengguna</label>
                  <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Nama Pengguna" name="username" value="<?php echo $data->username ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Email</label>
                <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="email" value="<?php echo $data->email ?>">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="exampleInputUsername1">Nama Provinsi</label>
                  <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama Provinsi" name="provinsi" value="<?php echo $data->provinsi ?>">
                </div>
                <div class="col-sm-6">
                  <label for="exampleInputUsername1">Nama Kota</label>
                  <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Nama Kota" name="kota" value="<?php echo $data->kota ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="exampleInputUsername1">Nama Kecamatan</label>
                  <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama Kecamatan" name="kecamatan" value="<?php echo $data->kecamatan ?>">
                </div>
                <div class="col-sm-6">
                  <label for="exampleInputUsername1">Nama Kelurahan</label>
                  <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Nama Kelurahan" name="kelurahan" value="<?php echo $data->kelurahan ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Alamat Lengkap</label>
                <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Alamat" name="alamat" value="<?php echo $data->alamat ?>">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="exampleInputUsername1">No Rekening</label>
                  <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="No Rekening" name="norekening" value="<?php echo $data->norekening ?>">
                </div>
                <div class="col-sm-6">
                  <label for="exampleInputUsername1">Nama Bank</label>
                  <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Nama Bank" name="bank" value="<?php echo $data->bank ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Atas Nama</label>
                <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Atas Nama" name="atasnama" value="<?php echo $data->atasnama ?>">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="exampleInputUsername1">No Telp</label>
                  <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Masukan Nomer Telp" name="telp" value="<?php echo $data->telp ?>">
                </div>
                <div class="col-sm-6">
                  <label for="exampleInputUsername1">No NIK</label>
                  <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="NIK" name="nik" value="<?php echo $data->nik ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="exampleInputUsername1">File KTP</label>
                  <input type="file" name="image1" class=" form-control" value="" required />
                </div>
                <div class="col-sm-6">
                  <label for="exampleInputUsername1">File NPWP</label>
                  <input type="file" name="image2" class=" form-control" value="" required />
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">File SIUP</label>
                <input type="file" name="image3" class=" form-control" value="" required />
              </div>
              <div class="form-group row">
                <div class="col-sm-12 mt-3 mb-sm-0">
                  <label for="exampleInputUsername1">Jenis Usaha:</label>
                  <select name="jenis" class="form-control">
                    <option value="">--Pilih Jenis Usaha--</option>
                    <option value="<?= $role['id'] ?>"><?= $role['jenis'] ?></option>
                    <?php foreach ($jenis as $pilihan) : ?>
                      <option value="<?= $pilihan['id_jenis'] ?>"><?= $pilihan['jenis'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Deskripsi Usaha</label>
                <textarea name="deskripsi" class="form-control" value="<?php $data->deskripsi ?>"></textarea>
              </div>
              <hr>
              <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>