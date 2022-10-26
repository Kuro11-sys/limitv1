  <aside class="main-sidebar sidebar-light-lightblue elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link navbar-danger">
      <img src="<?= base_url() ?>assets/Asset 20.png" alt="LIMIT Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>LIMIT 2021</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 mb-3 d-flex">
        <div class="pull-center image">
          <img src="<?= base_url() ?>assets/admin3/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="color: black"><?= $user->username ?></br>
            <small><?= $user->email ?></small>
          </p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header"><b>MAIN MENU</b></li>

          <?php
          $page = $this->uri->segment(1);
          $master = ["tahun", "kelas", "babak", "tim_soal", "peserta"];
          $relasi = ["kelastim_soal", "Tahunbabak"];
          $users = ["users"];
          ?>
          <li class="nav-item">
            <a href="<?= base_url('dashboard') ?>" class="nav-link <?= $page === 'dashboard' ? "active" : "" ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>



          <?php if ($this->ion_auth->is_admin()) : ?>
            <li class="nav-item has-treeview <?= in_array($page, $master)  ? "active menu-open" : ""  ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-folder"></i>
                <p>Data
                  <i class="right fas fa-angle-left"></i>
                </p>

              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('tim_soal') ?>" class="nav-link <?= $page === 'tim_soal' ? "active" : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tim Soal</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('peserta') ?>" class="nav-link <?= $page === 'peserta' ? "active" : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Participants</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('tahun') ?>" class="nav-link <?= $page === 'tahun' ? "active" : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Year</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('babak') ?>" class="nav-link <?= $page === 'babak' ? "active" : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stage</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('kelas') ?>" class="nav-link <?= $page === 'kelas' ? "active" : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Level</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview <?= in_array($page, $relasi)  ? "active menu-open" : ""  ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-link"></i>
                <p>Relasi
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('pemetaan') ?>" class="nav-link <?= $page === 'pemetaan' ? "active" : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pemetaan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('Tahunbabak') ?>" class="nav-link <?= $page === 'Tahunbabak' ? "active" : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pemetaan Babak</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php endif; ?>

          <?php if ($this->ion_auth->is_admin() || $this->ion_auth->in_group('Tim Soal')) : ?>
            <li class="nav-item">
              <a href="<?= base_url('soal') ?>" rel="noopener noreferrer" class="nav-link <?= $page === 'soal' ? "active" : "" ?>">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Soal</p>
              </a>
            </li>
          <?php endif; ?>

          <?php if ($this->ion_auth->in_group('Tim Soal')) : ?>
            <li class="nav-item">
              <a href="<?= base_url('ujian/master') ?>" rel="noopener noreferrer" class="nav-link <?= $page === 'ujian' ? "active" : "" ?>">
                <i class="nav-icon fab fa-chrome"></i>
                <p>Set Soal</p>
              </a>
            </li>
          <?php endif; ?>

          <?php if ($this->ion_auth->in_group('Peserta')) : ?>
            <li class="nav-item">
              <a href="<?= base_url('ujian/list') ?>" rel="noopener noreferrer" class="nav-link <?= $page === 'ujian' ? "active" : "" ?>">
                <i class="fab fa-chrome"></i> <span>Ujian</span>
              </a>
            </li>
          <?php endif; ?>

          <?php if (!$this->ion_auth->in_group('Peserta')) : ?>
            <li class="nav-header"><b>REPORTS</b></li>
            <li class="nav-item">
              <a href="<?= base_url('hasilujian') ?>" class="nav-link <?= $page === 'hasilujian' ? "active" : "" ?>" rel="noopener noreferrer">
                <i class="fa fa-file nav-icon"></i>
                <p>Hasil</p>

              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('skor') ?>" class="nav-link <?= $page === 'skor' ? "active" : "" ?>" rel="noopener noreferrer">
                &nbsp;&nbsp;<i class="fas fa-flag-checkered"></i> &nbsp;
                <p>Skor</p>

              </a>
            </li>
          <?php endif; ?>

          <?php if ($this->ion_auth->is_admin()) : ?>
            <li class="nav-header"><b>ADMINISTRATOR</b></li>
            <li class="nav-item">
              <a href="<?= base_url('users') ?>" class="nav-link <?= $page === 'users' ? "active" : "" ?>" rel="noopener noreferrer">
                <i class="fa fa-users nav-icon"></i>
                <p>User Management</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $page === 'settings' ? "active" : "" ?>" href="<?= base_url('settings') ?>" rel="noopener noreferrer">
                <i class="fa fa-cog nav-icon"></i>
                <p>Settings</p>
              </a>
            </li>
          <?php endif; ?>
        </ul>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>