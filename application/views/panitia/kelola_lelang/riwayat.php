<div class="main-panel">
    <div class="content-wrapper">
        <!-- partials breadcrumb start -->
        <?php $this->load->view("panitia/partials/breadcrumb.php"); ?>
        <!-- partilas breadcrumb end -->
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body shadow-sm rounded">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th> No</th>
                                        <th> ID Peserta </th>
                                        <th> Nama </th>
                                        <th> Produk </th>
                                        <th> Harga Beli </th>
                                        <th> Alamat </th>
                                        <th> Testimoni </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php 
                                    $count = 0;
                                    foreach ($riwayat as $row) {
                                    $count = $count + 1;
                                    ?>
                                    
                                        <tr>
                                            <td><?= $count ?></td>  
                                            <td><?= $row['peserta_id'] ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['produk'] ?></td>
                                            <td><?= $row['harga_beli_sekarang'] ?></td>
                                            <td><?= $row['alamat_kirim'] ?></td>
                                            <td><?= $row['testimoni_pemenang'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete -->
<!-- <div class="modal fade" id="hapusPelelangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span>Yakin ingin hapus data?</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div> -->
<!-- End Modal Delete -->