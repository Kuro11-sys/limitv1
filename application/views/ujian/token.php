<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="info-box bg-warning">
                    <div class="info-box-content" style="margin-left: 5pt">
                        <h4>Peraturan Ujian</h4>
                        <ul>
                            <li>Dilarang menggunakan alat hitung seperti kalkulator, komputer, dan lainnya.</li>
                            <li>Dilarang bekerja sama dengan peserta lainnya.</li>
                            <li>Dilarang membuka buku referensi di saat mengerjakan soal.</li>
                            <li>Jangan sampai keluar dari halaman ujian ketika waktu mengerjakan soal sedang berlangsung.</li>
                            <li>Utamakanlah kejujuran</li>
                        </ul>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header with-border">
                        <h3 class="card-title">Konfirmasi Data</h3>
                    </div>
                    <div class="card-body">
                        <span id="id_ujian" data-key="<?= $encrypted_id ?>"></span>
                        <div class="row">
                            <div class="col-sm-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nama</th>
                                        <td><?= $mhs->nama ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tim Soal</th>
                                        <td><?= $ujian->nama_tim_soal ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jenjang</th>
                                        <td><?= $mhs->nama_kelas ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Ujian</th>
                                        <td><?= $ujian->nama_ujian ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Soal</th>
                                        <td><?= $ujian->jumlah_soal ?></td>
                                    </tr>
                                    <tr>
                                        <th>Waktu</th>
                                        <td><?= $ujian->waktu ?> Menit</td>
                                    </tr>
                                    <tr>
                                        <th>Batas Pengerjaan</th>
                                        <td>
                                            <?= strftime('%d %B %Y', strtotime($ujian->terlambat)) ?>
                                            <?= date('H:i:s', strtotime($ujian->terlambat)) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align:middle">Token</th>
                                        <td>
                                            <input autocomplete="off" id="token" placeholder="Token" type="text" class="input-sm form-control">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <div class="card card-solid">
                                    <div class="card-body pb-0">
                                        <div class="info-box bg-info">
                                            <div class="info-box-content">
                                                <p>
                                                    Waktu mengerjakan soal adalah saat tombol "START" berwarna hijau.
                                                </p>
                                            </div>
                                        </div>
                                        <?php
                                        $mulai = strtotime($ujian->tgl_mulai);
                                        $terlambat = strtotime($ujian->terlambat);
                                        $now = time();
                                        if ($mulai > $now) :
                                        ?>
                                            <div class="info-box bg-success">
                                                <div class="info-box-content">
                                                    <strong><i class="fa fa-clock-o"></i> Ujian akan dimulai pada</strong>
                                                    <br>
                                                    <span class="countdown" data-time="<?= date('Y-m-d H:i:s', strtotime($ujian->tgl_mulai)) ?>">00 Hari, 00 Jam, 00 Menit, 00 Detik</strong><br />
                                                    </span>
                                                </div>
                                            </div>
                                        <?php elseif ($terlambat > $now) : ?>
                                            <button id="btncek" data-id="<?= $ujian->id_ujian ?>" class="btn btn-success btn-lg mb-4">
                                                <i class="fas fa-door-open"></i> START
                                            </button>
                                            <div class="info-box bg-danger">
                                                <div class="info-box-content">
                                                    <i class="fa fa-clock-o"></i> <strong class="countdown" data-time="<?= date('Y-m-d H:i:s', strtotime($ujian->terlambat)) ?>">00 Hari, 00 Jam, 00 Menit, 00 Detik</strong><br />
                                                    Batas waktu mengerjakan soal.
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="info-box bg-danger">
                                                <div class="info-box-content">
                                                    Waktu untuk menekan tombol <strong>"START"</strong> sudah habis.<br />
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </span>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</section>
<?php require_once("application/views/_templates/topnav/_footer.php"); ?>

<script src="<?= base_url() ?>assets/app/ujian/token.js"></script>

</body>

</html>