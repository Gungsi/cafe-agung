<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cafe Agung</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url("assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/iconfonts/ionicons/dist/css/ionicons.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/css/vendor.bundle.base.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/css/vendor.bundle.addons.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/DataTables/datatables.min.css")?>"/>
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url("assets/css/shared/style.css") ?>">
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
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="<?= base_url("assets/images/logo.svg") ?>" alt="logo" /> </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="<?= base_url("assets/images/logo-mini.svg") ?>" alt="logo" /> </a>
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
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?= base_url("assets/js/shared/off-canvas.js") ?>"></script>
    <!-- <script src="<?= base_url("assets/js/shared/misc.js") ?>"></script> -->
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script>
      var base_url = "<?= base_url() ?>";
    </script>
    <script src="<?= base_url("assets/js/custom.js") ?>"></script>
  </body>
</html>