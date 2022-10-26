  <?php if ($this->ion_auth->is_admin()) : ?>
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <?php foreach ($info_box as $info) : ?>
                      <div class="col-lg-3 col-6">
                          <div class="small-box bg-<?= $info->box ?>">
                              <div class="inner">
                                  <h3><?= $info->total; ?></h3>
                                  <p><?= $info->title; ?></p>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-<?= $info->icon ?>"></i>
                              </div>
                              <a href="<?= base_url() . strtolower($info->nama); ?>" class="small-box-footer">
                                  More info <i class="fa fa-arrow-circle-right"></i>
                              </a>
                          </div>
                      </div>
                  <?php endforeach; ?>
              </div>
          </div>
      </section>

  <?php elseif ($this->ion_auth->in_group('Tim Soal')) : ?>
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-4">
                      <div class="card card-default">
                          <div class="card-header with-border">
                              <h3 class="card-title">Informasi Akun</h3>
                          </div>
                          <table class="table table-hover">
                              <tr>
                                  <th>Nama</th>
                                  <td><?= $tim_soal->nama_tim_soal ?></td>
                              </tr>
                              <tr>
                                  <th>NIM</th>
                                  <td><?= $tim_soal->nim ?></td>
                              </tr>
                              <tr>
                                  <th>Username</th>
                                  <td><?= $tim_soal->email ?></td>
                              </tr>

                              <tr>
                                  <th>Jenjang</th>
                                  <td>
                                      <ol class="pl-4">
                                          <?php foreach ($kelas as $k) : ?>
                                              <li><?= $k->nama_kelas ?></li>
                                          <?php endforeach; ?>
                                      </ol>
                                  </td>
                              </tr>
                          </table>
                      </div>
                  </div>
                  <div class="col-sm-8">
                      <div class="card card-solid">
                          <div class="card-header bg-purple">
                              <h3 class="card-title">Hallo</h3>
                          </div>
                          <div class="card-body">
                              <p>Selamat Datang Tim Soal, silahkan baca dulu petunjuk di bawah yaa</p>
                              <ul class="pl-4">
                                  <li>Untuk menambahkan soal, pilih menu <b>soal</b></li>
                                  <li>Untuk melakukan set ujian, pilih menu <b>set soal</b></li>
                              </ul>
                              <p>Kalau ada pertanyaan, silahkan tanyakan okee :v</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

  <?php else : ?>
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-4">
                      <div class="card card-default">
                          <div class="card-header with-border">
                              <h3 class="card-title">Informasi Akun</h3>
                          </div>
                          <table class="table table-hover">
                              <tr>
                                  <th>No Peserta</th>
                                  <td><?= $peserta->no_p ?></td>
                              </tr>
                              <tr>
                                  <th>Nama</th>
                                  <td><?= $peserta->nama ?></td>
                              </tr>
                              <tr>
                                  <th>Jenis Kelamin</th>
                                  <td><?= $peserta->jenis_kelamin === 'L' ? "Laki-laki" : "Perempuan"; ?></td>
                              </tr>
                              <tr>
                                  <th>Username</th>
                                  <td><?= $peserta->email ?></td>
                              </tr>

                              <tr>
                                  <th>Jenjang</th>
                                  <td><?= $peserta->nama_kelas ?></td>
                              </tr>
                          </table>
                      </div>
                  </div>
                  <div class="col-sm-8">
                      <div class="card card-solid">
                          <div class="card-header bg-purple">
                              <h3 class="card-title">Pemberitahuan</h3>
                          </div>
                          <div class="card-body">
                              <p>Selamat Datang di CBT LIMIT 2021. Silahkan baca petunjuk dibawah ini.</p>
                              <ul class="pl-4">
                                  <li>Untuk masuk ke halaman soal, silahkan pilih menu <b>Ujian</b> terlebih dahulu pada menu sidebar kiri</li>
                                  <li>Setelah itu, akan muncul kolom <b>Ujian</b>, kemudian pilih kolom ujian yang disediakan dan klik <b>Ikuti Ujian</b></li>
                                  <li>Setelah itu, anda akan dibawa menuju ke halaman ujian, pastikan <b>Data</b> diri anda telah benar</li>
                                  <li>Untuk memulai ujian, silahkan minta token kepada pihak panitia / penyelenggara ujian</li>
                                  <li>Setelah anda mendapatkan token, isilah token tersebut di kolom yang telah disediakan</li>
                                  <li>Kemudian klik <b>Mulai</b> dan Selamat Mengerjakan, Semoga Sukses</li>
                              </ul>
                              <p>Jika ada yang ingin ditanyakan, silahkan hubungi panitia</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  <?php endif; ?>


  <?php require_once("application/views/_templates/dashboard/_footer.php"); ?>

  </body>

  </html>