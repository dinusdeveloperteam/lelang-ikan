<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col">
            <h4 class="card-title">Tambah Produk</h4>
          </div>
          <div class="col text-right">
            <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">

            <form action="<?php echo base_url(); ?>/pelelang/product/tambah" method="POST" enctype="multipart/form-data">

              <div class="form-group">
                <label for="exampleInputUsername1">Nama Produk</label>
                <input type="hidden" class="form-control" name="pelelang_id" placeholder="name" value="<?= $user->pelelang_id ?>" required>
                <input type="text" class="form-control" name="produk" placeholder="name" value="" required>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Deskripsi</label>
                <textarea name="deskripsi_produk" class="form-control" id="editor" placeholder="description" value="" required></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Gambar 1</label>
                <input type="file" name="image1" class="form-control" value="" required />
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Gambar 2</label>
                <input type="file" name="image2" class=" form-control" value="" required />
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Gambar 3</label>
                <input type="file" name="image3" class="form-control" value="" required />
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Gambar 4</label>
                <input type="file" name="image4" class="form-control" value="" required />
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Harga Awal</label>
                <input required type="number" class="form-control" name="harga_awal" placeholder="harga_awal" value="">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Harga Minimal Diterima</label>
                <input required type="number" class="form-control" name="harga_minimal_diterima" value="">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Harga Kelipatan Setiap Penawaran</label>
                <input required type="number" class="form-control" name="increment_value" value="">
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">Tanggal Dimulai</label>
                <input required type="datetime-local" class="form-control" name="tgl_mulai" value="">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Tanggal Berakhir</label>
                <input required type="datetime-local" class="form-control" name="tgl_selesai" value="">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Harga Sekarang</label>
                <input required type="number" class="form-control" name="harga_beli_sekarang" placeholder="harga_sekarang" value="">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Jumlah Stok</label>
                <input required type="number" class="form-control" name="jumlah" placeholder="jumlah" value="">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Keterangan Tambahan</label>
                <input required type="text" class="form-control" name="keterangan" placeholder="keterangan" value="">
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