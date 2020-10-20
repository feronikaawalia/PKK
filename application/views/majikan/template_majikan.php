<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Majikan Srikandi</title>
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

          <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span id="alert" class=""></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifikasi</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <!-- <div class="preview-icon bg-success">
                      <i class="mdi mdi-calendar"></i>
                    </div> -->
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1" id="verifikasi"></h6>
                    <p class="text-gray ellipsis mb-0" id="verifikasi2"></p>
                  </div>
                </a>
            </li>
            
            
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-text">
                  <span class="font-weight mb-2"><?= $this->session->userdata('username')?></span>
                </div>
              </a>

              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a href="<?= base_url('admin/user/profil/'.$this->session->userdata("id_user").'')?>" class="dropdown-item">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> My Profile </a>
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
                  <span class="font-weight-bold mb-2"><?= $this->session->userdata('username')?></span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('majikan/Dashboard_majikan/index')?>">
                <span class="menu-title">Tenaga Kerja</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('transaksi/bukti')?>">
                <span class="menu-title">Upload Bukti</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('transaksi/riwayatbukti')?>">
                <span class="menu-title">Riwayat Bukti</span>
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
    <script type="text/javascript">

    function notif(){
		$.getJSON("<?= base_url()?>transaksi/notifikasi_majikan", function(data){
			$('#verifikasi').html('Verifikasi Tenaga Kerja');
			$('#verifikasi2').html('Silahkan melakukan<br>pembayaran tenaga<br>kerja ' +data['nama'] +' di menu<br>Upload Bukti');
      $('#alert').addClass('count-symbol bg-danger');
		});
	};
    $(document).ready(function() {
    notif();
    });
    
</script>
  </body>
</html>


