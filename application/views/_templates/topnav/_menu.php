<nav class="main-header navbar navbar-expand-md navbar-light navbar-blue">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand"><img src="<?= base_url() ?>assets/Asset 20.png" alt="LIMIT Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> <b>LIMIT 2020</b></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse float-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a><?= $mhs->nama ?> - <?= $mhs->nama_kelas ?></a></li>
            </ul>
        </div>

        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->

            <li class="nav-item dropdown">
                <!-- Menu Toggle Button -->
                <a href="#" class="nav-link" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    <img src="<?= base_url() ?>assets/dist/img/user1.png" style="width: 20px" class="img-circle" alt="User Image">
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs"><?= $user->username ?></span>
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

                        <div class="center">
                            <a href="<?= base_url() ?>/auth" id="logout" class="btn btn-danger">Logout</a>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- Notifications Dropdown Menu -->
        </ul>
        <div class="navbar-custom-menu">
            <ul class="navbar-nav ml-auto">
                <li><a href="#" class="btn btn-danger" onclick="simpan_akhir()"><i class="fas fa-stop-circle"></i> Selesai Ujian</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>