<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="alert bg-green">
                    <h4>Jenjang <i class="float-right fas fa-building"></i></h4>
                    <span class="d-block"> <?= $mhs->nama_kelas ?></span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="alert bg-blue">
                    <h4>Babak<i class="float-right fa fa-graduation-cap"></i></h4>
                    <span class="d-block"> Semifinal</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="alert bg-yellow">
                    <h4>Tanggal<i class="float-right fa fa-calendar"></i></h4>
                    <span class="d-block"> <?= strftime('%A, %d %B %Y') ?></span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="alert bg-red">
                    <h4>Jam<i class="float-right fas fa-clock"></i></h4>
                    <span class="d-block"> <span class="live-clock"><?= date('H:i:s') ?></span></span>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card card-primary">
                    <div class="card-header with-border">
                        <h3 class="card-title"><?= $subjudul ?></h3>
                        <div class="card-tools pull-right">
                            <button type="button" class="btn btn-card-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <button type="button" onclick="reload_ajax()" class="btn btn-sm btn bg-purple"><i class="fa fa-retweet"></i> Reload</button>
                            </div>
                        </div>

                        <div class="table-responsive px-4 pb-3" style="border: 0">
                            <table id="ujian" class="w-100 table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Ujian</th>
                                        <th>Babak</th>
                                        <th>Jenjang</th>
                                        <th>Tim Soal</th>
                                        <th>Jumlah Soal</th>
                                        <th>Waktu</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Ujian</th>
                                        <th>Babak</th>
                                        <th>Jenjang</th>
                                        <th>Tim Soal</th>
                                        <th>Jumlah Soal</th>
                                        <th>Waktu</th>
                                        <th class="text-center">Aksi</th>
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

<script src="<?= base_url() ?>assets/app/ujian/list.js"></script>
</body>

</html>