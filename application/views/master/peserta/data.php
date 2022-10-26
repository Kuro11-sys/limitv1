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
                        <div class="mt-2 mb-3">
                            <a href="<?= base_url('peserta/add') ?>" class="btn btn-sm btn bg-purple"><i class="fa fa-plus"></i> Tambah</a>
                            <a href="<?= base_url('peserta/import') ?>" class="btn btn-sm btn btn-success"><i class="fa fa-upload"></i> Import</a>
                            <button type="button" onclick="reload_ajax()" class="btn btn-sm btn btn-default"><i class="fa fa-retweet"></i> Reload</button>
                            <div class="float-right">
                                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-sm bg-blue btn"><i class="fa fa-user-plus"></i>Active</button>
                                <button onclick="bulk_delete()" class="btn btn-sm btn btn-danger" type="button"><i class="fa fa-trash"></i> Delete</button>
                            </div>
                        </div>
                        <?= form_open('peserta/delete', array('id' => 'bulk')); ?>
                        <div class="table-responsive">
                            <table id="peserta" class="w-100 table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>No Peserta</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Jenjang</th>
                                        <th>Regional</th>
                                        <th>Tahun</th>

                                        <th width="100" class="text-center">Aksi</th>
                                        <th width="100" class="text-center">
                                            <input class="select_all" type="checkbox">
                                        </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>No Peserta</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Jenjang</th>
                                        <th>Regional</th>
                                        <th>Tahun</th>

                                        <th width="100" class="text-center">Aksi</th>
                                        <th width="100" class="text-center">
                                            <input class="select_all" type="checkbox">
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>

                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Active User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="banyak">Batas Bawah ID</label>
                                    <input id="bawah" type="number" autocomplete="off" required="required" name="bawah" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="banyak">Batas Atas ID</label>
                                    <input id="atas" type="number" autocomplete="off" required="required" name="atas" class="form-control">

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="bulk_active()" name="input">Active</button>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>
<script src="<?= base_url() ?>assets/app/master/peserta/data.js"></script>
</body>

</html>