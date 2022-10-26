  <nav class="main-header navbar navbar-expand navbar-blue navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <li class="nav-item dropdown">
        <!-- Menu Toggle Button -->
        <a href="#" class="nav-link" data-toggle="dropdown">
          <!-- The user image in the navbar-->
          <img src="<?= base_url() ?>assets/dist/img/user1.png" style="width: 20px" class="img-circle" alt="User Image">
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          <span class="hidden-xs">Hi, <?= $user->first_name ?></span>
        </a>
        <ul class="dropdown-menu" style="width: 300px">
          <!-- The user image in the menu -->
          <li class="dropdown-header bg-primary">
            <img src="<?= base_url() ?>assets/dist/img/user1.png" style="width: 100px" class="img-circle elevation-2" alt="User Image">
            <p style="text-align: center;">
              <?= $user->first_name . ' ' . $user->last_name ?></br>
              <small>Member since <?= date('M, Y', $user->created_on) ?></small>
            </p>
          </li>
          <!-- Menu Body -->
          <li class="dropdown-footer">

            <div>
              <span style="float: left"><a href="<?= base_url() ?>users/edit/<?= $user->id ?>" id="settings" class="btn btn-success" position="left">Settings</a></span>
              <a href="<?= base_url() ?>/auth" id="logout" class="btn btn-danger" style="float: right">Logout</a>
            </div>
          </li>
        </ul>
      </li>
      <!-- Notifications Dropdown Menu -->
    </ul>
  </nav>