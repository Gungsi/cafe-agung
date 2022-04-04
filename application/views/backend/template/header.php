        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block">Help : +62 877-7025-9340</li>
          </ul>
          <form class="ml-auto search-form d-none d-md-block" action="#">
            <!-- <div class="form-group">
              <input type="search" class="form-control" placeholder="Search Here">
            </div> -->
          </form>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="<?= base_url("assets/images/faces/face.png") ?>" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="<?= base_url("assets/images/faces/face.png") ?>" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold"><?= $this->session->userdata('nama') ?></p>
                  <p class="font-weight-light text-muted mb-0"><?= $this->session->userdata('email') ?></p>
                </div>
                <a class="dropdown-item">My Profile <span class="badge badge-pill badge-danger">1</span><i class="dropdown-item-icon ti-dashboard"></i></a>
                <a href="<?= base_url("login/logout") ?>" class="dropdown-item">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>