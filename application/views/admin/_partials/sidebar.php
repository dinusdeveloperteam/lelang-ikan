 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">



     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('admin') ?>">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Admin Lelang ikan <sup></sup></div>
     </a>





     <!-- Divider -->
     <hr class="sidebar-divider">


     <!-- Nav Item - Dashboard -->
     <li class="nav-item <?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
         <a class="nav-link" href="<?php echo site_url('admin/dashboard') ?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">



     <!-- Heading -->
     <div class="sidebar-heading">
         MASTER
     </div>


     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item <?php echo $this->uri->segment(2) == 'peserta' ? 'active' : '' ?><?php echo $this->uri->segment(2) == 'deposit' ? 'active' : '' ?>">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fas fa-users"></i>

             <span>Peserta</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Pilihan :</h6>
                 <a class="collapse-item" href="<?php echo site_url('admin/peserta') ?>">Profil Peseta</a>
                 <a class="collapse-item" href="<?php echo site_url('admin/deposit') ?>">Deposit Peserta</a>
             </div>
         </div>
     </li>

     <!-- <li class="nav-item <? //php echo $this->uri->segment(2) == 'peserta' ? 'active' : '' 
                                ?>">
         <a class="nav-link" href="<? //php echo site_url('admin/peserta') 
                                    ?>">
             <i class="fas fa-user-check"></i>
             <span>Data Peserta Lelang</span></a>
     </li> -->

     <li class="nav-item <?php echo $this->uri->segment(2) == 'pelelang' ? 'active' : '' ?>">
         <a class="nav-link" href="<?php echo site_url('admin/pelelang') ?>">
             <i class="fas fa-users"></i>
             <!-- ICON OLD -->
             <!-- <i class="fas fa-gavel"></i> -->
             <span>Pelelang</span>
         </a>
     </li>


     <li class="nav-item <?php echo $this->uri->segment(3) == 'panitia' ? 'active' : '' ?>">
         <a class="nav-link" href="<?php echo site_url('admin/kelola_akun/panitia') ?>">
             <i class="fas fa-user"></i>
             <span>Panitia</span></a>
     </li>

     <li class="nav-item <?php echo $this->uri->segment(2) == 'penawaran' ? 'active' : '' ?>">
         <a class="nav-link" href="<?php echo site_url('admin/penawaran') ?>">
             <i class="fa-solid fa-door-open"></i>
             <span>Pembukaan dan Penawaran Lelang</span></a>
     </li>


     <!-- MENU INFORMASI  -->
     <!-- Informasi Pemenang Lelang -->
     <li class="nav-item <?php echo $this->uri->segment(2) == 'pemenang' ? 'active' : '' ?>">
         <a class="nav-link" href="<?php echo site_url('admin/pemenang') ?>">
             <i class="fas fa-user-check"></i>
             <span>Pemenang Lelang</span></a>
     </li>





     <!-- Informasi Pembayaran Hasil Lelang 
                <li class="nav-item <?php // echo $this->uri->segment(2) == 'pembayaranhasillelang' ? 'active' : '' 
                                    ?>">
                    <a class="nav-link" href="<?php //echo site_url('admin/pembayaranhasillelang') 
                                                ?>">
                    <i class="fas fa-file-invoice-dollar"></i>
                        <span>Pembayaran Hasil Lelang</span></a>
                </li>
                -->


     <!-- END MENU INFORMASI  -->

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading Kelola -->
     <div class="sidebar-heading">
         TRANSAKSI
     </div>



     <!-- Informasi Pembayaran Lelang -->
     <li class="nav-item <?php echo $this->uri->segment(2) == 'pembayaran' ? 'active' : '' ?>">
         <a class="nav-link" href="<?php echo site_url('admin/pembayaran') ?>">
             <i class="fas fa-money-check-alt"></i>
             <span>Pembayaran Lelang</span></a>
     </li>







     <li class="nav-item <?php echo $this->uri->segment(2) == 'pengiriman' ? 'active' : '' ?>">
         <a class="nav-link" href="<?php echo site_url('admin/pengiriman') ?>">
             <i class="fa-solid fa-truck"></i>
             <span>Pengemasan & Pengiriman Hasil Lelang</span></a>
     </li>

     <!-- Nav Item - Utilities Collapse Menu -->
     <!-- <li class="nav-item <?php echo $this->uri->segment(2) == 'testimoni' ? 'active' : '' ?>">
         <a class="nav-link" href="<?php echo site_url('admin/testimoni') ?>">
             <i class="fas fa-comment-dots"></i>
             <span>Testimoni Hasil Lelang</span></a>
     </li> -->

     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item <?php echo $this->uri->segment(2) == 'penerimaan' ? 'active' : '' ?>">
         <a class="nav-link" href="<?php echo site_url('admin/penerimaan') ?>">
             <i class="fa-solid fa-clipboard-check"></i>
             <span>Konfirmasi Penerimaan Hasil Lelang</span></a>
     </li>




     <li class="nav-item <?php echo $this->uri->segment(2) == 'riwayat_lelang' ? 'active' : '' ?>">
         <a class="nav-link" href="<?php echo site_url('admin/riwayat_lelang') ?>">
             <i class="fa fa-history"></i>
             <span>Riwayat Hasil Lelang</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">
     <!-- Heading Kelola -->
     <div class="sidebar-heading">
         PENGATURAN
     </div>

     <li class="nav-item <?php echo $this->uri->segment(3) == 'admin' ? 'active' : '' ?>">
         <a class="nav-link" href="<?php echo site_url('admin/kelola_akun/admin') ?>">
             <i class="fas fa-user"></i>
             <span>Manajemen Pengguna</span></a>
     </li>



     <!-- Nav Item - Pages Collapse Menu
     <li class="nav-item <? //php echo $this->uri->segment(2) == 'kelolaakun' ? 'active' : '' 
                            ?>">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-users-cog"></i>
             <span>Daftar User</span>

         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Pilihan :</h6>
                 <a class="collapse-item" href="<? //php echo site_url('admin/kelola_akun/admin') 
                                                ?>">Admin</a>
                 <a class="collapse-item" href="<? //php echo site_url('admin/kelola_akun/panitia') 
                                                ?>">Panitia</a>

             </div>
         </div>
     </li> -->


     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>









 </ul>
 <!-- End of Sidebar -->