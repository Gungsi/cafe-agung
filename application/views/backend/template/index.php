<?php
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cafe Keluarga</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url("assets/css/shared/style.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/iconfonts/ionicons/dist/css/ionicons.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/css/vendor.bundle.base.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/css/vendor.bundle.addons.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/DataTables/datatables.min.css")?>"/>
    <link rel="stylesheet" href="<?= base_url("assets/css/daterangepicker.css")?>"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url("assets/css/demo_1/style.css") ?>">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="<?= base_url("assets/images/favicon.ico") ?>" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="<?= base_url() ?>">
            <h2 class="text-white pt-5">Cafe Keluarga</h2>
            <!-- <img src="<?= base_url("assets/images/logo.svg") ?>" alt="logo" /> -->
          </a>
          <a class="navbar-brand brand-logo-mini" href="<?= base_url() ?>">
            <h2 class="text-white">CK</h2>
            <!-- <img src="<?= base_url("assets/images/logo-mini.svg") ?>" alt="logo" /> </a> -->
          </a>
        </div>
        <?= $header ?>
      </nav>
      <!-- partial -->

      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <?= $sidebar ?>
        </nav>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title"><?= $title ?></h4>
                </div>
              </div>
            </div>
            <!-- Page Title Header End-->

            <!-- Page Body Starts-->
            <?= $content ?>
          </div>
      </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url("assets/vendors/js/vendor.bundle.base.js") ?>"></script>
    <script src="<?= base_url("assets/vendors/js/vendor.bundle.addons.js") ?>"></script>
    <script src="<?= base_url("assets/vendors/DataTables/datatables.min.js") ?>"></script>
    <script src="<?= base_url("assets/js/moment.min.js") ?>"></script>
    <script src="<?= base_url("assets/js/daterangepicker.min.js") ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?= base_url("assets/js/shared/off-canvas.js") ?>"></script>
    <script src="<?= base_url("assets/js/shared/misc.js") ?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script>
      var base_url = "<?= base_url() ?>";
    </script>
    <script src="<?= base_url("assets/js/demo_1/dashboard.js") ?>"></script>
    <script src="<?= base_url("assets/js/custom.js") ?>"></script>
  </body>
</html>