<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-danger">
                    <div class="card-header with-border">
                        <h3 class="card-title">Form <?= $judul ?></h3>
                        <div class="card-tools pull-right">
                            <a href="<?= base_url() ?>pemetaan" class="btn btn-warning btn btn-sm">
                                <i class="fa fa-arrow-left"></i> Batal
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <?= form_open('pemetaan/save', array('id' => 'kelastim_soal'), array('method' => 'edit', 'tim_soal_id' => $id_tim_soal)) ?>
                                <div class="form-group">
                                    <label>Tim Soal</label>
                                    <input type="text" readonly="readonly" value="<?= $tim_soal->nama_tim_soal ?>" class="form-control">
                                    <small class="help-block text-right"></small>
                                </div>
                                <div class="form-group">
                                    <label>Jenjang</label>
                                    <select id="kelas" multiple="multiple" name="kelas_id[]" class="form-control select2" style="width: 100%!important">
                                        <?php
                                        $sk = [];
                                        foreach ($kelas as $key => $val) {
                                            $sk[] = $val->id_kelas;
                                        }
                                        foreach ($all_kelas as $m) : ?>
                                            <option <?= in_array($m->id_kelas, $sk) ? "selected" : "" ?> value="<?= $m->id_kelas ?>"><?= $m->nama_kelas ?> - <?= $m->nama_tahun ?></option>
                                        <?php endforeach; ?>
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

<script src="<?= base_url() ?>assets/app/relasi/pemetaan/edit.js"></script>
</body>

</html>