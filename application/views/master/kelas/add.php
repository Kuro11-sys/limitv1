<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-secondary">
                    <div class="card-header with-border">
                        <h3 class="card-title">Form <?= $judul ?></h3>
                        <div class="card-tools pull-right">
                            <button type="button" class="btn btn-card-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="col">
                                    <div class="form">
                                        <a href="<?= base_url('kelas') ?>" class="btn btn-default btn-xs">
                                            <i class="fa fa-arrow-left"></i> Batal
                                        </a>
                                        <div class="float-right">
                                            <span> Jumlah : </span><label for=""><?= $banyak ?></label>
                                        </div>
                                    </div>
                                </div>
                                <?= form_open('kelas/save', array('id' => 'kelas'), array('mode' => 'add')) ?>
                                <table id="form-table" class="table text-center table-condensed">
                                    <thead>
                                        <tr>
                                            <th># No</th>
                                            <th>Jenjang</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 1; $i <= $banyak; $i++) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td>
                                                    <div class="form-group">
                                                        <input autofocus="autofocus" onfocus="this.select()" required="required" autocomplete="off" type="text" name="nama_kelas[<?= $i ?>]" class="form-control">
                                                        <span class="d-none">DON'T DELETE THIS</span>
                                                        <small class="help-block text-right"></small>
                                                    </div>
                                                </td>
                                                <td width="200">
                                                    <div class="form-group">
                                                        <select required="required" name="tahun_id[<?= $i ?>]" class="form-control input-sm select2" style="width: 100%!important">
                                                            <option value="" disabled selected>-- Pilih --</option>
                                                            <?php foreach ($tahun as $j) : ?>
                                                                <option value="<?= $j->id_tahun ?>"><?= $j->nama_tahun ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <small class="help-block text-right"></small>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                                <button id="submit" type="submit" class="mb-4 btn btn-block btn bg-purple">
                                    <i class="fa fa-save"></i> Simpan
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

<script type="text/javascript">
    var inputs = '';
    var banyak = '<?= $banyak; ?>';
</script>

<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>
<script src="<?= base_url() ?>assets/app/master/kelas/add.js"></script>

</body>

</html>