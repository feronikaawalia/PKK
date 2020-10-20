<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Srikandi</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url()?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url()?>assets/images/logo.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo"><img src="<?= base_url()?>assets/images/logo-sk.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini"><img src="<?= base_url()?>assets/images/logo-sk-kecil.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Cari">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <!-- <img src="assets/images/faces/face1.jpg" alt="image"> -->
                  <!-- <span class="availability-status online"></span> -->
                </div>
                <div class="nav-profile-text">
                  <p class="font-weight mb-1">Admin</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a href="<?= base_url('login/logout')?>" class="dropdown-item">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Logout </a>
              </div>
            </li>              
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="<?= base_url()?>assets/images/faces/face28.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">Admin</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin/Dashboard_admin')?>">
                <span class="menu-title">Dashboard Admin</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Data</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-contacts menu-icon"></i>
                <!-- <i class="mdi mdi-table-large menu-icon"></i> -->
              </a>
              <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/Tenagakerja')?>"> Data Pekerja </a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/User')?>"> Data Admin </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin/Pelatihan')?>">
                <span class="menu-title">Pelatihan</span>
                <i class="mdi mdi-apps-box menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin/Verifikasi')?>">
                <span class="menu-title">Verifikasi</span>
                <i class="mdi mdi-checkbox-multiple-marked menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('transaksi')?>">
                <span class="menu-title">Transaksi</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('transaksi/buktiverifikasi')?>">
                <span class="menu-title">Bukti Verifikasi</span>
                <i class="mdi mdi-book menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('transaksi/riwayat_admin')?>">
                <span class="menu-title">Riwayat Tenaga Kerja</span>
                <i class="mdi mdi-checkbox-multiple-marked-outline menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <?php
              $this->load->view("$konten");
            ?>
            </div>
        </div>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url()?>assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= base_url()?>assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url()?>assets/js/off-canvas.js"></script>
    <script src="<?= base_url()?>assets/js/hoverable-collapse.js"></script>
    <script src="<?= base_url()?>assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?= base_url()?>assets/js/dashboard.js"></script>
    <script src="<?= base_url()?>assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>