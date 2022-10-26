<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <?= form_open('tim_soal/save', array('id' => 'formtim_soal'), array('method' => 'add')); ?>
                <div class="card card-secondary">
                    <div class="card-header with-border">
                        <h3 class="card-title"><b>Form <?= $subjudul ?></b></h3>
                        <div class="card-tools pull-right">
                            <a href="<?= base_url() ?>tim_soal" class="btn btn-sm btn btn-warning">
                                <i class="fa fa-arrow-left"></i> Batal
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form role="form-horizontal">

                                    <div class="form-group row">
                                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                                        <div class="col">
                                            <input autofocus="autofocus" onfocus="this.select()" type="number" id="nim" class="form-control" name="nim" placeholder="NIM">
                                            <small class="help-block"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_tim_soal" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col">
                                            <input type="text" class="form-control" name="nama_tim_soal" placeholder="Nama">
                                            <small class="help-block"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col">
                                            <input type="text" class="form-control" name="email" placeholder="Username">
                                            <small class="help-block"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="babak" class="col-sm-2 col-form-label">Babak</label>
                                        <div class="col">
                                            <select name="babak" id="babak" class="form-control select2" style="width: 100">
                                                <option value="" disabled selected>Pilih Babak</option>
                                                <?php foreach ($babak as $row) : ?>
                                                    <option value="<?= $row->id_babak ?>"><?= $row->nama_babak ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="help-block"></small>
                                        </div>
                                    </div>

                                    <div class="form-group pull-right">
                                        <button type="reset" class="btn btn btn-default">
                                            <i class="fas fa-redo"></i> Reset
                                        </button>
                                        <button type="submit" id="submit" class="btn btn bg-purple float-right">
                                            <i class="fas fa-save"></i> Simpan
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</section>
<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>
<script src="<?= base_url() ?>assets/app/master/tim_soal/add.js"></script>
</body>

</html>