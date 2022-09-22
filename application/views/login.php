<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body class="bg-gradient-primary">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Admin!</h1>

                                        <?php if ($this->session->flashdata('sukses')) {
                                            echo '<p class="warning" style="margin: 10px 20px;">' . $this->session->flashdata('sukses') . '</p>';
                                        }
                                        ?>

                                        <?php if ($this->session->flashdata('message')) {
                                            echo '<p class="warning" style="margin: 10px 20px;">' . $this->session->flashdata('message') . '</p>';
                                        }
                                        ?>
                                    </div>
                                    <form action="<?= base_url(); ?>admin/login/admin" id="form-login" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" required id="username" name="username" aria-describedby="emailHelp" placeholder="Masukkan Username...">

                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" required id="password" name="password" placeholder="Masukkan Password">

                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>

                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>



    <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>