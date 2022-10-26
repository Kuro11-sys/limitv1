<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
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
                            <div class="col">
                                <button type="button" onclick="reload_ajax()" class="btn bg-purple btn btn-sm"><i class="fa fa-retweet"></i> Reload</button>
                            </div>
                        </div>

                        <div class="table-responsive" style="border: 0">
                            <table id="hasil" class="w-100 table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Babak</th>
                                        <th>Jenjang</th>
                                        <th>Tim Soal</th>
                                        <th>Jumlah Soal</th>
                                        <th>Waktu</th>
                                        <th>Tanggal</th>
                                        <th class="text-center">
                                            <i class="fa fa-search"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Babak</th>
                                        <th>Jenjang</th>
                                        <th>Tim Soal</th>
                                        <th>Jumlah Soal</th>
                                        <th>Waktu</th>
                                        <th>Tanggal</th>
                                        <th class="text-center">
                                            <i class="fa fa-search"></i>
                                        </th>
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
<script src="<?= base_url() ?>assets/app/ujian/hasil.js"></script>
</body>

</html>