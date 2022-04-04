<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cafe Keluarga</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url("assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/iconfonts/ionicons/dist/css/ionicons.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/css/vendor.bundle.base.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/css/vendor.bundle.addons.css") ?>">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url("assets/css/shared/style.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url("assets/images/favicon.ico") ?>" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                <h4><?= $title ?></h4>
                <form id="login-form" name="login-form" action="<?= site_url("login"); ?>" method="post">
                  <div class="form-group">
                    <label class="label">Username</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="username" placeholder="Username">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" name="password" placeholder="*********">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary submit-btn btn-block" name="submit" value="true">Login</button>
                  </div>
                  <?php if($pesan1!=""){ ?>
                  <div class="alert alert-danger nobottommargin">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon-remove-sign"></i> <?= $pesan1; ?>
                  </div>
                  <?php } ?>
                  <!-- <div class="form-group d-flex justify-content-between">
                    <div class="form-check form-check-flat mt-0">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" checked> Keep me signed in </label>
                    </div>
                    <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                  </div> -->
                </form>
              </div>
              <p class="footer-text text-center">copyright © 2022 Muhammad Agung Pamungkas. All rights reserved.</p>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url("assets/vendors/js/vendor.bundle.base.js") ?>"></script>
    <script src="<?= base_url("assets/vendors/js/vendor.bundle.addons.js") ?>"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?= base_url("assets/js/shared/off-canvas.js")?>"></script>
    <!-- <script src="<?= base_url("assets/js/shared/misc.js")?>"></script> -->
    <!-- endinject -->
    <!-- <script src="<?= base_url("assets/js/shared/jquery.cookie.js") ?>" type="text/javascript"></script> -->
  </body>
</html>