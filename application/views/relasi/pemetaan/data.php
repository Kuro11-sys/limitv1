<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header with-border">
                        <h3 class="card-title">Relasi <?= $subjudul ?></h3>
                        <div class="card-tools pull-right">
                            <button type="button" class="btn btn-card-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mt-2 mb-3">
                            <a href="<?= base_url('pemetaan/add') ?>" class="btn btn-sm btn bg-purple"><i class="fa fa-plus"></i> Tambah Data</a>
                            <button type="button" onclick="reload_ajax()" class="btn btn-sm btn btn-default"><i class="fa fa-retweet"></i> Reload</button>
                            <div class="float-right">
                                <button onclick="bulk_delete()" class="btn btn-sm btn btn-danger" type="button"><i class="fa fa-trash"></i> Delete</button>
                            </div>
                        </div>
                        <?= form_open('', array('id' => 'bulk')) ?>
                        <table id="kelastim_soal" class="w-100 table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Jenjang</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">
                                        <input type="checkbox" class="select_all">
                                    </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Jenjang</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">
                                        <input type="checkbox" class="select_all">
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>

<script src="<?= base_url() ?>assets/app/relasi/pemetaan/data.js"></script>
</body>

</html>