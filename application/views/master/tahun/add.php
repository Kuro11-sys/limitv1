<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-secondary">
                    <div class="card-header with-border">
                        <h3 class="card-title">Form <?= $judul ?></h3>
                        <div class="card-tools pull-right">
                            <button type="button" class="btn btn-card-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="col">
                                    <div class="form">
                                        <a href="<?= base_url('tahun') ?>" class="btn btn-default btn-xs">
                                            <i class="fa fa-arrow-left"></i> Batal
                                        </a>
                                        <div class="float-right">
                                            <span> Jumlah : </span><label for=""><?= $banyak ?></label>
                                        </div>
                                    </div>
                                </div>
                                <?= form_open('tahun/save', array('id' => 'tahun'), array('mode' => 'add')) ?>
                                <table id="form-table" class="table text-center table-condensed">
                                    <thead>
                                        <tr>
                                            <th># No</th>
                                            <th>Year</th>
                                        </tr>
                                    </thead>
                                    <tbody id="inputs">
                                    </tbody>
                                </table>
                                <button type="submit" class="mb-4 btn btn-block bg-purple btn-flat">
                                    <i class="fa fa-save"></i> Save
                                </button>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>
<script type="text/javascript">
    var inputs = '';
    var banyak = '<?= $banyak; ?>';
</script>
<script src="<?= base_url() ?>assets/app/master/tahun/add.js"></script>

</body>

</html>