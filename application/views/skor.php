<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>LIMIT 2021 | Final</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="<?= base_url() ?>assets/assets/img/favicon.ico" rel="icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin3/plugins/fontawesome-free/css/all.min.css">
  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>assets/assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>assets/assets/css/style.css" rel="stylesheet" />

  <!-- =======================================================
  * Template Name: Avilon - v4.5.0
  * Template URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="
        fixed-top
        d-flex
        align-items-center
        header-transparent
        justify-content-between
      " style="padding-left: 1cm; padding-right: 1cm">
    <div id="logo">
      <h7><img src="<?= base_url() ?>assets/assets/img/Asset 20.png" style="height: 40pt" />&nbsp;
        &nbsp;<p1><strong> LIMIT 2021 x Ruangguru FINAL</strong>
          <img src="<?= base_url() ?>assets/assets/ruang+guru.png" style="height: 40pt" />
        </p1>
      </h7>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a> -->
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link" href="<?= base_url('dashboard') ?>" style="font-size: 13pt;"><i class="fas fa-home" style="font-size: 14pt;"></i> &nbsp; Home</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
    <!-- .navbar -->
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="bok" style="align-content: center" data-aos="zoom-out">
      <div class="row">
        <div class="column">
          <div class="card" style="background-color: #264653">
            <div class="card-header"><?= $player1->nama ?><br /><?= $player1->sekolah ?></div>
            <img src="<?= base_url() ?>assets/sma/allif.png" class="gambar" />
            <input type="text" id="skor1" value="0" disabled style="
                    width: 14.4rem;
                    background-color: #264653;
                    height: 43px;
                    border-radius: 20pt;
                    text-align: center;
                    color: white;
                    border: 0px;
                    font-weight: bolder;
                    margin:0cm;
                    font-size:30pt
                  " />
          </div>
        </div>
        <div class="column">
          <div class="card" style="background-color: #2a9d8f">
            <div class="card-header"><?= $player2->nama ?><br /><?= $player2->sekolah ?></div>
            <img src="<?= base_url() ?>assets/sma/Matematika_Ivan Hadinata.jpeg" class="gambar" />
            <input type="text" id="skor2" value="0" disabled style="
                    width: 14.4rem;
                    background-color: #2a9d8f;
                    height: 43px;
                    border-radius: 20pt;
                    text-align: center;
                    color: white;
                    border: 0px;
                    font-weight: bolder;
                    margin:0cm;
                    font-size:30pt
                  " />
          </div>
        </div>
        <div class="column">
          <div class="card" style="background-color: #e9c46a">
            <div class="card-header"><?= $player3->nama ?><br /><?= $player3->sekolah ?></div>
            <img src="<?= base_url() ?>assets/sma/Pas Foto_Dana Saputra.jpg" class="gambar" />
            <input type="text" id="skor3" value="0" disabled style="
                    width: 14.4rem;
                    background-color: #e9c46a;
                    height: 43px;
                    border-radius: 20pt;
                    text-align: center;
                    color: white;
                    border: 0px;
                    font-weight: bolder;
                    margin:0cm;
                    font-size:30pt
                  " />
          </div>
        </div>
        <div class="column">
          <div class="card" style="background-color: #f4a261">
            <div class="card-header"><?= $player4->nama ?><br /><?= $player4->sekolah ?></div>
            <img src="<?= base_url() ?>assets/sma/Pasfoto_Galih Nur Rizqy_SMA Semesta.png" class="gambar" />
            <input type="text" id="skor4" value="0" disabled style="
                    width: 14.4rem;
                    background-color: #f4a261;
                    height: 43px;
                    border-radius: 20pt;
                    text-align: center;
                    color: white;
                    border: 0px;
                    font-weight: bolder;
                    margin:auto;
                    font-size:30pt;
                  " />
          </div>
        </div>
        <div class="column">
          <div class="card" style="background-color: #e76f51">
            <div class="card-header"><?= $player5->nama ?><br /><?= $player5->sekolah ?></div>
            <img src="<?= base_url() ?>assets/sma/Pas Foto_Aldyto Rafif Abhinaya_MAN 2 Kota Malang.jpg" class="gambar" />
            <input type="text" id="skor5" value="0" disabled style="
                    width: 14.4rem;
                    background-color: #e76f51;
                    height: 43px;
                    border-radius: 20pt;
                    text-align: center;
                    color: white;
                    border: 0px;
                    font-weight: bolder;
                    font-size:30pt;
                    margin:auto;
                    
                  " />
          </div>
        </div>
      </div>
    </div>
    <div class="bok1" data-aos="zoom-out">
      <div class="row">
        <div class="colnam">Skor</div>


        <div class="column" style="padding-top: 0.7rem; padding-left: 5rem">
          <div class="card" style="
                height: 4rem;
                width: 10rem;
                text-align: center;
                background-color: #264653;
                align-items: center;
                color: white;
              ">
            <label for="nilai"><strong><?= $player1->nama_depan ?></strong></label>
            <input type="number" id="nilai1" name="nilai1" style="width: 3cm; text-align: center;border-radius:8pt" step="5" />
          </div>
        </div>
        <div class="column" style="padding-top: 0.7rem; padding-left: 2rem">
          <div class="card" style="
                height: 4rem;
                width: 10rem;
                text-align: center;
                background-color: #2a9d8f;
                align-items: center;
                color: white;
              ">
            <label for="nilai"><strong><?= $player2->nama_depan ?></strong></label>
            <input type="number" id="nilai2" name="nilai2" style="width: 3cm; text-align: center;border-radius:8pt" step="5" />
          </div>
        </div>
        <div class="column" style="padding-top: 0.7rem; padding-left: 2rem">
          <div class="card" style="
                height: 4rem;
                width: 10rem;
                text-align: center;
                background-color: #e9c46a;
                align-items: center;
                color: white;
              ">
            <label for="nilai"><strong><?= $player3->nama_depan ?></strong></label>
            <input type="number" id="nilai3" name="nilai3" style="width: 3cm; text-align: center;border-radius:8pt" step="5" />
          </div>
        </div>
        <div class="column" style="padding-top: 0.7rem; padding-left: 2rem">
          <div class="card" style="
                height: 4rem;
                width: 10rem;
                text-align: center;
                background-color: #f4a261;
                align-items: center;
                color: white;
              ">
            <label for="nilai"><strong><?= $player4->nama_depan ?></strong></label>
            <input type="number" id="nilai4" name="nilai4" style="width: 3cm; text-align: center;border-radius:8pt" step="5" />
          </div>
        </div>
        <div class="column" style="padding-top: 0.7rem; padding-left: 2rem">
          <div class="card" style="
                height: 4rem;
                width: 10rem;
                text-align: center;
                background-color: #e76f51;
                align-items: center;
                color: white;
              ">
            <label for="nilai"><strong><?= $player5->nama_depan ?></strong></label>
            <input type="number" id="nilai5" name="nilai5" style="width: 3cm; text-align: center;border-radius:8pt" step="5" />
          </div>
        </div>
        <div class="column" style="padding-left: 2rem; padding-top: 2rem">
          <input class="form-submit" type="button" value="Tambah" id="plus" onclick="plus()" style="width: 8rem; color: black" />
        </div>

      </div>
    </div>
  </section>
  <!-- End Hero Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <marquee><strong><img src="<?= base_url() ?>assets/assets/logo-unej.png" style="height: 12pt" />
        Universitas Jember |Fakultas Matematika dan Ilmu Pengetahuan Alam |
        <img src="<?= base_url() ?>assets/assets/logo-hmj.png" style="height: 12pt" /> HIMATIKA "Geokompstat" |
        <img src="<?= base_url() ?>assets/assets/img/Asset 20.png" style="height: 12pt" />
        Olimpiade Matematika LIMIT 2021 x Ruangguru Final
        <img src="<?= base_url() ?>assets/assets/ruang+guru.png" style="height: 12pt" /> | LIMIT KIDS
        VII | LIMIT JUNIOR II | LIMIT XVII</strong></marquee>
  </footer>
  <!-- End  Footer -->

  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>assets/assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url() ?>assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url() ?>assets/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>assets/assets/js/main.js"></script>
  <script>
    function plus() {
      var x1, x2, x3, x4, x5, temp;

      temp = document.getElementById("skor1").value;
      x1 = document.getElementById("nilai1").value;
      if (x1 != '') {
        document.getElementById("skor1").value = parseInt(x1) + parseInt(temp);
        document.getElementById("nilai1").value = '';
      }

      temp = document.getElementById("skor2").value;
      x2 = document.getElementById("nilai2").value;
      if (x2 != '') {
        document.getElementById("skor2").value = parseInt(x2) + parseInt(temp);
        document.getElementById("nilai2").value = '';
      }

      temp = document.getElementById("skor3").value;
      x3 = document.getElementById("nilai3").value;
      if (x3 != '') {
        document.getElementById("skor3").value = parseInt(x3) + parseInt(temp);
        document.getElementById("nilai3").value = '';
      }

      temp = document.getElementById("skor4").value;
      x4 = document.getElementById("nilai4").value;
      if (x4 != '') {
        document.getElementById("skor4").value = parseInt(x4) + parseInt(temp);
        document.getElementById("nilai4").value = '';
      }

      temp = document.getElementById("skor5").value;
      x5 = document.getElementById("nilai5").value;
      if (x5 != '') {
        document.getElementById("skor5").value = parseInt(x5) + parseInt(temp);
        document.getElementById("nilai5").value = '';
      }
    }
  </script>
</body>

</html>