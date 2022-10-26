<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-danger">
                    <div class="card-header with-border">
                        <h3 class="card-title"><?= $subjudul ?></h3>
                        <div class="card-tools pull-right">
                            <a href="<?= base_url() ?>ujian/master" class="btn btn-sm btn btn-warning">
                                <i class="fa fa-arrow-left"></i> Batal
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="alert bg-purple">
                                    <h4><i class="fa fa-book pull-right"></i> Babak</h4>
                                    <p><?= $babak->nama_babak ?></p>
                                </div>
                                <div class="alert bg-purple">
                                    <h4>Tim Soal<i class="fa fa-address-book-o pull-right"></i></h4>
                                    <p><?= $tim_soal->nama_tim_soal ?></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <?= form_open('ujian/save', array('id' => 'formujian'), array('method' => 'edit', 'tim_soal_id' => $tim_soal->id_tim_soal, 'babak_id' => $babak->babak_id, 'id_ujian' => $ujian->id_ujian)) ?>
                                <div class="form-group">
                                    <label for="nama_ujian">Nama Ujian</label>
                                    <input value="<?= $ujian->nama_ujian ?>" autofocus="autofocus" onfocus="this.select()" placeholder="Nama Ujian" type="text" class="form-control" name="nama_ujian">
                                    <small class="help-block"></small>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_soal">Jumlah Soal</label>
                                    <input value="<?= $ujian->jumlah_soal ?>" placeholder="Jumlah Soal" type="number" class="form-control" name="jumlah_soal">
                                    <small class="help-block"></small>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_mulai">Tanggal Mulai</label>
                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                        <input id="tgl_mulai" name="tgl_mulai" type="text" class="datetimepicker-input form-control" data-target="#datetimepicker1" placeholder="Tanggal Mulai">
                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            <small class="help-block"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_selesai">Tanggal Selesai</label>
                                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                        <input id="tgl_selesai" name="tgl_selesai" type="text" class="datetimepicker-input form-control" data-target="#datetimepicker2" placeholder="Tanggal Selesai">
                                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            <small class="help-block"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="waktu">Waktu</label>
                                    <input value="<?= $ujian->waktu ?>" placeholder="menit" type="number" class="form-control" name="waktu">
                                    <small class="help-block"></small>
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Acak Soal</label>
                                    <select name="jenis" class="form-control">
                                        <option value="" disabled selected>--- Pilih ---</option>
                                        <option <?= $ujian->jenis === "Acak" ? "selected" : ""; ?> value="Acak">Acak Soal</option>
                                        <option <?= $ujian->jenis === "Urut" ? "selected" : ""; ?> value="Urut">Urut Soal</option>
                                    </select>
                                    <small class="help-block"></small>
                                </div>
                                <div class="form-group float-right">
                                    <button type="reset" class="btn btn-default btn">
                                        <i class="fa fa-redo"></i> Reset
                                    </button>
                                    <button id="submit" type="submit" class="btn btn bg-purple"><i class="fa fa-save"></i> Simpan</button>
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
<script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker();
        format: 'YYYY-MM-DD HH:mm:ss'
    });
    $(function() {
        $('#datetimepicker2').datetimepicker();
        format: 'YYYY-MM-DD HH:mm:ss'
    });
</script>
<script type="text/javascript">
    var tgl_mulai = '<?= $ujian->tgl_mulai ?>';
    var terlambat = '<?= $ujian->terlambat ?>';
</script>

<script src="<?= base_url() ?>assets/app/ujian/edit.js"></script>

</body>

</html>