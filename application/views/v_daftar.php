<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?=base_url()?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              
  <?php
            if ($this->session->flashdata('pesan') == TRUE) {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?=$this->session->flashdata('pesan')?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <?php
            }
        ?>

              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="<?=base_url()?>assets/images/logo-sk.png">
                </div>
                <h4>Baru di<b>Srikandi</b>?</h4>
                <h6 class="font-weight-light">Daftar dengan mudah. Hanya memerlukan beberapa langkah sederhana</h6>
                <form class="pt-3" action="<?= base_url('login/daftar')?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="nama_user" name="nama_user" placeholder="Nama User">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password">
                  </div>
                  <div class="mt-3">
                    <input class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit" value="Daftar">
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Sudah punya akun? <a href="<?=base_url('login/login')?>" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?=base_url()?>assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?=base_url()?>assets/js/off-canvas.js"></script>
    <script src="<?=base_url()?>assets/js/hoverable-collapse.js"></script>
    <script src="<?=base_url()?>assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>