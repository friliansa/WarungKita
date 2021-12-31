<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>WarungKita </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="template/star-admin2/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="template/star-admin2/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="template/star-admin2/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="template/star-admin2/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="template/star-admin2/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="template/star-admin2/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="template/star-admin2/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="template/star-admin2/images/favicon.png" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="/">
            Warung<b>Kita</b>
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Selamat Datang, <span class="text-black fw-bold">Admin</span></h1>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/dashboard">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-cash-multiple"></i>
              <span class="menu-title">Transaksi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/pembelian">Pembelian</a></li>
                <li class="nav-item"> <a class="nav-link" href="/penjualan">Penjualan</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-package-variant-closed"></i>
              <span class="menu-title">Barang</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/tersedia">Barang Tersedia</a></li>
                <li class="nav-item"> <a class="nav-link" href="/kosong">Barang Kosong</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <?= $this->renderSection('content'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="template/star-admin2/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="template/star-admin2/vendors/chart.js/Chart.min.js"></script>
  <script src="template/star-admin2/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="template/star-admin2/vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="template/star-admin2/js/off-canvas.js"></script>
  <script src="template/star-admin2/js/hoverable-collapse.js"></script>
  <script src="template/star-admin2/js/template.js"></script>
  <script src="template/star-admin2/js/settings.js"></script>
  <script src="template/star-admin2/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="template/star-admin2/js/dashboard.js"></script>
  <script src="template/star-admin2/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>