<div class="main-panel">
    <!--content-->
    <div class="content-wrapper">
        <!-- partials breadcrumb start -->
        <?php $this->load->view("panitia/partials/breadcrumb.php"); ?>
        <!-- partilas breadcrumb end -->
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white shadow p-2 bg-white rounded">
                    <div class="card-body">
                        <img src="<?php echo base_url('vendors/adminassets/assets/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">
                            <span>Jumlah Pelelang</span>
                            <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5"><?= $this->db->count_all_results('pelelang'); ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white shadow p-2 bg-white rounded">
                    <div class="card-body">
                        <img src="<?php echo base_url('vendors/adminassets/assets/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">
                            <span>Jumlah Peserta Lelang</span>
                            <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5"><?= $this->db->count_all_results('peserta'); ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white shadow p-2 bg-white rounded">
                    <div class="card-body">
                        <img src="<?php echo base_url('vendors/adminassets/assets/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Pemenang Lelang <i class="mdi mdi-diamond mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5"><?= $this->db->count_all_results('lelang_pemenang'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->