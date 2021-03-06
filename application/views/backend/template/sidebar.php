          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="<?= base_url("assets/images/faces/face.png") ?>" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?= $this->session->userdata('nama') ?></p>
                  <?php
                    if($this->session->userdata('level')==1){
                      $level = "Admin";
                    } else if($this->session->userdata('level')==2){
                      $level = "Kasir";
                    } else {
                      $level = "Menejer";
                    }
                  ?>
                  <p class="designation"><?= $level ?></p>
                  <!-- <p class="designation"><?= $this->session->userdata('level')==1? "Admin" : $this->session->userdata('level')==2? "Kasir" : "Menejer" ?></p> -->
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <?php if($this->session->userdata('level')!=2){ ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url("dashboard") ?>">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Data Master</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("jenis") ?>">Jenis Menu</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("makanan") ?>">Makanan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("diskon") ?>">Diskon</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("user") ?>">User</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url("menu") ?>">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Daftar Menu</span>
              </a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url("transaksi") ?>">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Transaksi</span>
              </a>
            </li>
            <?php if($this->session->userdata('level')!=2){ ?>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#laporan" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="laporan">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("laporan/transaksi") ?>">Transaksi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("laporan/keuangan") ?>">Keuangan</a>
                  </li>
                </ul>
              </div>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url("login/logout") ?>">
                <i class="menu-icon typcn typcn-bell"></i>
                <span class="menu-title">Logout</span>
              </a>
            </li>
          </ul>