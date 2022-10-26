<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-danger">
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
                                            <span> Jumlah : </span><label for=""><?= count($kelas) ?></label>
                                        </div>
                                    </div>
                                </div>
                                <?= form_open('kelas/save', array('id' => 'kelas'), array('mode' => 'edit')) ?>
                                <table id="form-table" class="table text-center table-condensed">
                                    <thead>
                                        <tr>
                                            <th># No</th>
                                            <th>Jenjang</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($kelas as $row) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td>
                                                    <div class="form-group">
                                                        <?= form_hidden('id_kelas[' . $i . ']', $row->id_kelas); ?>
                                                        <input required="required" autofocus="autofocus" onfocus="this.select()" value="<?= $row->nama_kelas ?>" type="text" name="nama_kelas[<?= $i ?>]" class="form-control">
                                                        <span class="d-none">DON'T DELETE THIS</span>
                                                        <small class="help-block text-right"></small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <select required="required" name="tahun_id[<?= $i ?>]" class="input-sm form-control select2" style="width: 100%!important">
                                                            <option value="" disabled>-- Pilih --</option>
                                                            <?php foreach ($tahun as $j) : ?>
                                                                <option <?= $row->tahun_id == $j->id_tahun ? "selected='selected'" : "" ?> value="<?= $j->id_tahun ?>"><?= $j->nama_tahun ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <small class="help-block text-right"></small>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                                <button id="submit" type="submit" class="mb-4 btn btn-block btn bg-purple">
                                    <i class="fa fa-edit"></i> Simpan Perubahan
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
<script src="<?= base_url() ?>assets/app/master/kelas/edit.js"></script>
</body>

</html>