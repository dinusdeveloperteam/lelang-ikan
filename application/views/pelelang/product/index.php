<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col">
            <h4 class="card-title">Data Produk</h4>
          </div>
          <img src="<?php base_url('assets/uploads/produk/bb63359bee580a3822406a6f4befb4b9.png') ?>" alt="">
          <div class="col text-right">
            <a href="<?= base_url('pelelang/product/tambah') ?>" class="btn btn-primary">Tambah</a>
          </div>
        </div>
        <div class="">
          <table class="table table-bordered table-hovered table-responsive" id="table">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Gambar 1</th>
                <th>Gambar 2</th>
                <th>Gambar 3</th>
                <th>Gambar 4</th>
                <th>Harga awal</th>
                <th>Harga Minimal Diterima</th>
                <th>Harga Kelipatan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai Lelang</th>
                <th>Harga Beli Sekarang</th>
                <th>Jumlah Stok</th>
                <th>Keterangan Tambahan</th>
                <th>Status</th>
                <th width="15%">Aksi</th>
              </tr>
            </thead>
            <tbody>



              <?php
              $count = 0;
              foreach ($queryAllLelang as $row) {
                $count = $count + 1;

              ?>
                <tr>
                  <td align="center"><?php echo $count ?></td>
                  <td><?php echo $row['produk'] ?></td>
                  <td><?php echo $row['deskripsi_produk'] ?></td>
                  <td>

                    <img src="<?php echo base_url() ?>/vendors/uploads/produk<?php echo $row['image1'] ?>" alt="" class="rounded mx-auto d-block FlowerLink"></td>
                  <td><img src="<?php echo base_url() ?>/vendors/uploads/produk<?php echo $row['image2'] ?>" alt="" class="rounded mx-auto d-block FlowerLink"></td>
                  <td><img src="<?php echo base_url() ?>/vendors/uploads/produk<?php echo $row['image3'] ?>" alt="" class="rounded mx-auto d-block FlowerLink"></td>
                  <td><img src="<?php echo base_url() ?>/vendors/uploads/produk<?php echo $row['image4'] ?>" alt="" class="rounded mx-auto d-block FlowerLink"></td>
                  <td><?php echo $row['harga_awal'] ?></td>
                  <td><?php echo $row['harga_minimal_diterima'] ?></td>
                  <td><?php echo $row['incremental_value'] ?></td>
                  <td><?php echo $row['tgl_mulai'] ?></td>
                  <td><?php echo $row['tgl_selesai'] ?></td>
                  <td><?php echo $row['harga_beli_sekarang'] ?></td>
                  <td><?php echo $row['jumlah'] ?></td>
                  <td><?php echo $row['keterangan'] ?></td>
                  <?php if ($row['status'] == 0) {
                  ?>
                    <td class="text-danger">Belum diverifikasi</td>
                  <?php } else { ?>
                    <td class="text-success">Sudah diverifikasi</td>
                  <?php } ?>
                  <td align="center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="<?= base_url('pelelang/product/edit/') . $row['lelang_id']; ?>" class="btn btn-warning btn-sm">
                        <i class="mdi mdi-tooltip-edit"></i>
                      </a>
                      <a href="<?= base_url('pelelang/product/deleteProduk/') . $row['lelang_id']; ?>" onclick="return confirm('Yakin Hapus data')" class="btn btn-danger btn-sm">
                        <i class="mdi mdi-delete-forever"></i>
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