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
                                        <a href="<?= base_url('tahun') ?>" class="btn btn-default btn-xs">
                                            <i class="fa fa-arrow-left"></i> Batal
                                        </a>
                                        <div class="float-right">
                                            <span> Jumlah : </span><label for=""><?= count($tahun) ?></label>
                                        </div>
                                    </div>
                                </div>
                                <?= form_open('tahun/save', array('id' => 'tahun'), array('mode' => 'edit')) ?>
                                <table id="form-table" class="table text-center table-condensed">
                                    <thead>
                                        <tr>
                                            <th># No</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($tahun as $j) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td>
                                                    <div class="form-group">
                                                        <?= form_hidden('id_tahun[' . $no . ']', $j->id_tahun) ?>
                                                        <input autofocus="autofocus" onfocus="this.select()" autocomplete="off" value="<?= $j->nama_tahun ?>" type="text" name="nama_tahun[<?= $no ?>]" class="input-sm form-control">
                                                        <small class="help-block text-right"></small>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                                <button type="submit" class="mb-4 btn btn-block btn-flat bg-purple">
                                    <i class="fa fa-save"></i> Simpan Perubahan
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
<script src="<?= base_url() ?>assets/app/master/tahun/edit.js"></script>

</body>

</html>