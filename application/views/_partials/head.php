<!DOCTYPE html>
<html lang="en">
<head>
  <title>MaLang / Mari Lelang - Lelang Ikan</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="<?php echo base_url('vendors/fonts/icomoon/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('vendors/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('vendors/css/jquery-ui.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('vendors/css/owl.carousel.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('vendors/css/owl.theme.default.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('vendors/css/owl.theme.default.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('vendors/css/jquery.fancybox.min.css')?>">

  <link rel="stylesheet" href="<?php echo base_url('vendors/css/bootstrap-datapicker.css')?>">

  <link rel="stylesheet" href="<?php echo base_url('vendors/fonts/flaticon/font/flaticon.css')?>">

  <link rel="stylesheet" href="<?php echo base_url('vendors/css/aos.css')?>">
  <link href="<?php echo base_url('vendors/css/jquery.mb.YTPlayer.min.css')?>" media="all" rel="stylesheet" type="text/css">

  <!--<link rel="stylesheet" href="<?php echo base_url('vendors/css/style.css')?>">-->

  <link rel="stylesheet" href="<?php echo base_url('vendors/css/style_custom.css')?>">

  <link rel="stylesheet" href="<?php echo base_url('vendors/css/image_resize.css')?>">




  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <!--  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300"> -->
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
  <div class="site-wrap">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <!--  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300"> -->
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
  <div class="site-wrap">

  <!-- <?//php $this->load->view('_partials/navbar') ?>  -->
  <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-4 site-navbar-target" role="banner">
    <div class="container">
      <div class="d-flex align-items-center">
        <!-- <div class="site-logo">
        <a href="index.html" class="d-block">
        <img src="<?php echo base_url('vendorsimages/logo.png'); ?>" alt="Image" class="img-fluid">
        </a>
      </div> -->

          <!-- Navbar Start -->
    
      <nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
        <a href="peserta" class="navbar-brand ml-lg-3">
        <img src="<?php echo base_url('vendors/images/logo.png') ?>" alt="" style="max-height:80px;"><!--<h5 class="m-0 display-6 text-green">Lelang<strong>Ikan</strong></h5>-->
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse px-lg-3" id="navbarCollapse">
            <div class="navbar-nav m-auto py-0">
                <?php echo anchor('peserta', 'Home', array('class' => 'nav-item nav-link h6'))?>
                <?php echo anchor('barang', 'Lelang', array('class' => 'nav-item nav-link h6'))?>
                <?php echo anchor('peraturan', 'Peraturan', array('class' => 'nav-item nav-link h6'))?>
                <?php echo anchor('tentang', 'Tentang', array('class' => 'nav-item nav-link h6'))?>
                <?php echo anchor('kontak', 'Kontak', array('class' => 'nav-item nav-link h6'))?>   
            </div>
            
            <!--<a href="" class="btn btn-outline-warning mr-4 btn-sm" style=" border-radius:15%;">Masuk</a>
            <a href="" class="btn btn-outline-success btn-sm" style=" border-radius:15%;">Daftar</a>-->

            <!-- Example single danger button -->
            <div class="btn-group">
                <!--<button type="button" class="dropdown-toggle rounded-3 border border-green" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:170px; height:30px;">
                    Peserta
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Profil</a>
                    <a class="dropdown-item" href="#"><i class="far fa-shopping-cart"></i>Transaksi</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Keluar</a>
                </div>-->
                <?php echo anchor('user/login_peserta', 'Masuk', array('class' => 'button text-green'))?>
                <?php echo anchor('user/register_peserta', 'Daftar', array('class' => 'button button-green text-white'))?>
                <!-- <a href="login" class="button" style="width:100px;"><span class="text-green">Masuk</span></a>
                <a href="register" class="button button-green" style="width:100px;"><span style="color:white;">Daftar</span></a> -->
            </div>
        </div>
      </nav>
      <!-- Navbar End -->

              <a href="index.aaaa" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black">
                <span class="icon-menu h3 text-white" style="position: relative; top: 7px;"></span></a>
              

      </header>