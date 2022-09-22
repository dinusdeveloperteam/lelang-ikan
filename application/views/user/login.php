<!DOCTYPE html>
<html lang="en">

<head>  

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LELANG IKAN</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('vendors/adminassets/assets/fonts/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('vendors/adminassets/assets/css/sb-admin.min.css') ?>" rel="stylesheet">
</head>

<body class="bg-gradient-success">

    <div class="container bg-black">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 bg-light">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style=" background-image: url(<?php echo base_url('vendors/images/ikannew.jpeg') ?> "></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h3 text-gray-900 mb-4"><strong>Lelang Ikan</strong></h1>
                                    </div>
                                    <div class="text-left">
                                        <h1 class="h6 text-gray-900 mb-4">Masuk Sebagai :</h1>
                                    </div>

                                    <button type="button" data-toggle="modal" data-target="#loginpeserta" class="btn btn-primary mb-3 mr-3 ">Peserta</button>
                                    <button type="button" data-toggle="modal" data-target="#loginpelelang" class="btn btn-warning mb-3 mr-3 ml-3">Pelelang</button>
                                    <button type="button" data-toggle="modal" data-target="#loginpanitia" class="btn btn-success mb-3 ml-3 mr-3">Panitia</button>

                                    <hr>


                                    <div class="text-center">
                                        <a class="small" href="register.html">Lupa Password</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('user/register_peserta');?>">Belum memiliki akun? Daftar Sekarang!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <!-- Modal peserta-->
    <div class="modal fade" id="loginpeserta" tabindex="-1" role="dialog" aria-labelledby="loginpesertaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-black" id="exampleModalLabel">Masuk Sebagai Peserta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Login/peserta'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" name="username" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo base_url('user/register');?>"class="btn btn-secondary" data-dismiss="modal">Keluar</a>
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </div>
                    <?php echo $this->session->flashdata('login_failed'); ?>
                </form>
            </div>
        </div>
    </div>





    <!-- Modal pelelang-->
    <div class="modal fade" id="loginpelelang" tabindex="-1" role="dialog" aria-labelledby="loginpelelangLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masuk Sebagai Pelelang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('User/login_pelelang'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" name="username" name="username"> 
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo base_url('user/register');?>"class="btn btn-secondary" data-dismiss="modal">Keluar</a>
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </div>
                    <?php echo $this->session->flashdata('login_failed'); ?>
                    <?php echo $this->session->flashdata('msg'); ?>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal panitia-->
    <div class="modal fade" id="loginpanitia" tabindex="-1" role="dialog" aria-labelledby="loginpanitiaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masuk Sebagai Panitia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('User/login_panitia'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" name="username" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo base_url('user/register');?>"class="btn btn-secondary" data-dismiss="modal">Keluar</a>
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </div>
                    <?php echo $this->session->flashdata('login_failed'); ?>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal admin-->
    <div class="modal fade" id="loginadmin" tabindex="-1" role="dialog" aria-labelledby="loginpanitiaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masuk Sebagai Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open("user/login_admin"); ?>
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url('home');?>"class="btn btn-secondary" data-dismiss="modal">Keluar</a>
                    <button type="submit" class="btn btn-primary">Masuk</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>




    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('vendors/adminassets/assets/script/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('vendors/adminassets/assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('vendors/adminassets/assets/table/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('vendors/adminassets/assets/js/sb-admin-2.min.js') ?>"></script>

</body>

</html>