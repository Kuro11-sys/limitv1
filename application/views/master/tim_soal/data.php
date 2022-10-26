<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header with-border">
                        <h5 class="card-title"><b><?= $subjudul ?></b></h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mt-2 mb-4">
                            <a href="<?= base_url('tim_soal/add') ?>" class="btn btn-sm bg-purple"><i class="fa fa-plus"></i> Add Data</a>
                            <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-default"><i class="fas fa-retweet"></i> Reload</button>

                            <button onclick="bulk_delete()" class="btn btn-sm btn-danger float-right" type="button"><i class="fa fa-trash"></i> Delete</button>

                        </div>
                        <?= form_open('tim_soal/delete', array('id' => 'bulk')) ?>
                        <div class="table-responsive" style="border: 0">
                            <table id="tim_soal" class="w-100 table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIM</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Stage</th>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">
                                            <input type="checkbox" class="select_all">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIM</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Stage</th>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">
                                            <input type="checkbox" class="select_all">
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>


<script src="<?= base_url() ?>assets/app/master/tim_soal/data.js"></script>

</body>

</html>