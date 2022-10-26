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
                        <button type="button" onclick="bulk_delete()" class="btn btn-sm btn btn-danger"><i class="fa fa-trash"></i> Bulk Delete</button>
                        <div class="float-right">
                            <a href="<?= base_url('ujian/add') ?>" class="btn bg-purple btn-sm btn"><i class="fa fa-file"></i> Ujian Baru</a>
                            <button type="button" onclick="reload_ajax()" class="btn btn-sm btn bg-maroon"><i class="fa fa-retweet"></i> Reload</button>
                        </div>

                        <?= form_open('ujian/delete', array('id' => 'bulk')) ?>
                        <div class="table-responsive px-4 pb-3" style="border: 0">
                            <table id="ujian" class="w-100 table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            <input type="checkbox" class="select_all">
                                        </th>
                                        <th>No.</th>
                                        <th>Nama Ujian</th>
                                        <th>Babak</th>
                                        <th>Jumlah Soal</th>
                                        <th>Waktu</th>
                                        <th>Acak Soal</th>
                                        <th class="text-center">Token</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">
                                            <input type="checkbox" class="select_all">
                                        </th>
                                        <th>No.</th>
                                        <th>Nama Ujian</th>
                                        <th>Babak</th>
                                        <th>Jumlah Soal</th>
                                        <th>Waktu</th>
                                        <th>Acak Soal</th>
                                        <th class="text-center">Token</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>
<script type="text/javascript">
    var id_tim_soal = '<?= $tim_soal->id_tim_soal ?>';
</script>

<script src="<?= base_url() ?>assets/app/ujian/data.js"></script>

</body>

</html>