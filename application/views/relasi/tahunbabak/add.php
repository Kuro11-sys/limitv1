<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-secondary">
                    <div class="card-header with-border">
                        <h3 class="card-title">Form <?= $judul ?></h3>
                        <div class="card-tools pull-right">
                            <a href="<?= base_url() ?>tahunbabak" class="btn btn-warning btn btn-sm">
                                <i class="fa fa-arrow-left"></i> Batal
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col">
                                <?= form_open('tahunbabak/save', array('id' => 'tahunbabak'), array('method' => 'add')) ?>
                                <div class="form-group">
                                    <label>Babak</label>
                                    <select name="babak_id" class="form-control select2" style="width: 100%!important">
                                        <option value="" disabled selected></option>
                                        <?php foreach ($babak as $m) : ?>
                                            <option value="<?= $m->id_babak ?>"><?= $m->nama_babak ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="help-block text-right"></small>
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <select id="tahun" multiple="multiple" name="tahun_id[]" class="form-control select2" style="width: 100%!important">
                                    </select>
                                    <small class="help-block text-right"></small>
                                </div>
                                <div class="form-group pull-right">
                                    <button type="reset" class="btn btn btn-default">
                                        <i class="fa fa-redo"></i> Reset
                                    </button>
                                    <button id="submit" type="submit" class="btn btn bg-purple float-right">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                </div>
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

<script src="<?= base_url() ?>assets/app/relasi/tahunbabak/add.js"></script>
</body>

</html>