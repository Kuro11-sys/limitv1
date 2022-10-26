<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header with-border">
                        <h3 class="card-title"><?= $subjudul ?></h3>
                        <div class="card-tools pull-right">
                            <button type="button" class="btn btn-card-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-4">
                                <a href="<?= base_url() ?>hasilujian" class="btn btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="button" onclick="reload_ajax()" class="btn btn btn-sm bg-purple"><i class="fa fa-retweet"></i> Reload</button>
                                <div class="float-right">
                                    <a target="_blank" href="<?= base_url() ?>hasilujian/cetak_detail/<?= $this->uri->segment(3) ?>" class="btn bg-maroon btn btn-sm">
                                        <i class="fa fa-print"></i> Print
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <table class="table w-100">
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
                                        <th>Tanggal Mulai</th>
                                        <td><?= strftime('%A, %d %B %Y', strtotime($ujian->tgl_mulai)) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Selasi</th>
                                        <td><?= strftime('%A, %d %B %Y', strtotime($ujian->terlambat)) ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="table w-100">
                                    <tr>
                                        <th>Babak</th>
                                        <td><?= $ujian->nama_babak ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tim Soal</th>
                                        <td><?= $ujian->nama_tim_soal ?></td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                        <div class="table-responsive px-4 pb-3" style="border: 0">
                            <table id="detail_hasil" class="w-100 table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>No Peserta</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>No Peserta</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>

<script type="text/javascript">
    var id = '<?= $this->uri->segment(3) ?>';
</script>

<script src="<?= base_url() ?>assets/app/ujian/detail_hasil_semi.js"></script>

</body>

</html>