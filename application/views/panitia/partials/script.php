<!-- plugins:js -->
<script src="<?= base_url('vendors/adminassets/assets/vendors/js/vendor.bundle.base.js') ?>"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?= base_url('vendors/adminassets/assets/vendors/chart.js/Chart.min.js') ?>"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= base_url('vendors/adminassets/assets/js/off-canvas.js') ?>"></script>
<script src="<?= base_url('vendors/adminassets/assets/js/hoverable-collapse.js') ?>"></script>
<script src="<?= base_url('vendors/adminassets/assets/js/misc.js') ?>"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="<?= base_url('vendors/adminassets/assets/js/dashboard.js') ?>"></script>
<script src="<?= base_url('vendors/adminassets/assets/js/todolist.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('vendors/table/jquery-easing/jquery.easing.min.js') ?>"></script>
<script src="<?= base_url('vendors/table/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('vendors/table/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('vendors/swal/dist/sweetalert2.min.js') ?>"></script>

<!-- DataTables -->
<script src="<?= base_url('vendors/adminassets/assets/datatables/datatables.min.js') ?>"></script>

<!-- SweetAlert -->
<script src="<?= base_url('vendors/adminassets/assets/sweetalert/dist/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('vendors/adminassets/assets/sweetalert/dist/sweetalert2.min.js') ?>"></script>

<script>
    // Enable dataTable
    
    $(document).ready(function() {
        $('#example').DataTable();
    });

    // Enable Tooltip

    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });

    // Active Sidebar

    $(function() {
        $('.nav li a').filter(function() {
            return this.href == location.href
        }).parent().addClass('active').siblings().removeClass('active')
        $('.nav li a').click(function() {
            $(this).parent().addClass('active').siblings().removeClass('active')
        })
    })
</script>