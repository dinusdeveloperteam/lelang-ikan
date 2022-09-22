<!DOCTYPE html>
<html lang="en">

<!-- partials:header start -->
<?php $this->load->view("panitia/partials/header.php"); ?>
<!-- partials:header ends -->

<body>
    <!--navbar-->
    <div class="container-scroller">
        <!-- partials navbar start -->
        <?php $this->load->view("panitia/partials/navbar.php"); ?>
        <!-- partials navbar end -->

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partials sidebar start -->
            <?php $this->load->view("panitia/partials/sidebar.php"); ?>
            <!-- partials sidebar end  -->

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
                                    <h2 class="mb-5">50</h2>
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
                                    <h2 class="mb-5">10</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-success card-img-holder text-white shadow p-2 bg-white rounded">
                                <div class="card-body">
                                    <img src="<?php echo base_url('vendors/adminassets/assets/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Pemenang Lelang <i class="mdi mdi-diamond mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5">20</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->

                <!-- partials footer start -->
                <?php $this->load->view("panitia/partials/footer.php"); ?>
                <!-- partial footer end-->

            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- partials js resource start -->
    <?php $this->load->view("panitia/partials/source.php"); ?>
    <!-- partials js resource end -->
</body>

</html>