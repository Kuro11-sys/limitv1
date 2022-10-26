<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-danger">
                    <div class="card-header with-border">
                        <h3 class="card-title">Form <?= $judul ?></h3>
                        <div class="card-tools pull-right">
                            <a href="<?= base_url('peserta') ?>" class="btn btn-sm btn btn-warning">
                                <i class="fa fa-arrow-left"></i> Batal
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <?= form_open('peserta/save', array('id' => 'peserta'), array('method' => 'edit', 'id_peserta' => $peserta->id_peserta)) ?>
                                <div class="form-group">
                                    <label for="no_p">No Peserta</label>
                                    <input value="<?= $peserta->no_p ?>" autofocus="autofocus" onfocus="this.select()" placeholder="No Peserta" type="text" name="no_p" class="form-control">
                                    <small class="help-block"></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input value="<?= $peserta->nama ?>" placeholder="Nama" type="text" name="nama" class="form-control">
                                    <small class="help-block"></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Regional</label>
                                    <input value="<?= $peserta->regional ?>" placeholder="Regional" type="text" name="regional" class="form-control">
                                    <small class="help-block"></small>
                                </div>
                                <div class="form-group">
                                    <label for="email">Username</label>
                                    <input value="<?= $peserta->email ?>" placeholder="Username" type="text" name="email" class="form-control">
                                    <small class="help-block"></small>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control select2">
                                        <option value="">-- Pilih --</option>
                                        <option <?= $peserta->jenis_kelamin === "L" ? "selected" : "" ?> value="L">Laki-laki</option>
                                        <option <?= $peserta->jenis_kelamin === "P" ? "selected" : "" ?> value="P">Perempuan</option>
                                    </select>
                                    <small class="help-block"></small>
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <select id="tahun" name="tahun" class="form-control select2">
                                        <option value="" disabled selected>-- Pilih --</option>
                                        <?php foreach ($tahun as $j) : ?>
                                            <option <?= $peserta->id_tahun === $j->id_tahun ? "selected" : "" ?> value="<?= $j->id_tahun ?>">
                                                <?= $j->nama_tahun ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <small class="help-block"></small>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Jenjang</label>
                                    <select id="kelas" name="kelas" class="form-control select2">
                                        <option value="" disabled selected>-- Pilih --</option>
                                        <?php foreach ($kelas as $k) : ?>
                                            <option <?= $peserta->id_kelas === $k->id_kelas ? "selected" : "" ?> value="<?= $k->id_kelas ?>">
                                                <?= $k->nama_kelas ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <small class="help-block"></small>
                                </div>
                                <div class="form-group pull-right">
                                    <button type="reset" class="btn btn btn-default"><i class="fa fa-redo"></i> Reset</button>
                                    <button type="submit" id="submit" class="btn btn bg-purple float-right"><i class="fa fa-save"></i> Simpan</button>
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
<script src="<?= base_url() ?>assets/app/master/peserta/edit.js"></script>
</body>

</html>