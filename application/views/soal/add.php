<?= form_open_multipart('soal/save', array('id' => 'formsoal'), array('method' => 'add')); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header with-border">
                        <h3 class="card-title"><?= $subjudul ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group col-sm-12">
                                    <label>Tim Soal</label>
                                    <?php if ($this->ion_auth->is_admin()) : ?>
                                        <select name="tim_soal_id" required="required" id="tim_soal_id" class="select2 form-group" style="width:100% !important">
                                            <option value="" disabled selected>Pilih Tim Soal</option>
                                            <?php foreach ($tim_soal as $d) : ?>
                                                <option value="<?= $d->id_tim_soal ?>:<?= $d->babak_id ?>"><?= $d->nama_tim_soal ?> (<?= $d->nama_babak ?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="help-block" style="color: #dc3545"><?= form_error('tim_soal_id') ?></small>
                                    <?php else : ?>
                                        <input type="hidden" name="tim_soal_id" value="<?= $tim_soal->id_tim_soal; ?>">
                                        <input type="hidden" name="babak_id" value="<?= $tim_soal->babak_id; ?>">
                                        <input type="text" readonly="readonly" class="form-control" value="<?= $tim_soal->nama_tim_soal; ?> (<?= $tim_soal->nama_babak; ?>)">
                                    <?php endif; ?>
                                </div>
                                <?php if ($this->ion_auth->is_admin()) : ?>
                                    <div class="col-sm-12">
                                        <label for="soal" class="control-label">Soal</label>
                                        <div class="form-group">
                                            <input type="file" name="file_soal" class="form-control">
                                            <small class="help-block" style="color: #dc3545"><?= form_error('file_soal') ?></small>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="soal" id="soal" class="textEditor" style="height: 250pt"><?= set_value('soal') ?></textarea>
                                            <small class="help-block" style="color: #dc3545"><?= form_error('soal') ?></small>
                                        </div>
                                    </div>
                                    <?php
                                    $abjad = ['a', 'b', 'c', 'd', 'e'];
                                    foreach ($abjad as $abj) :
                                        $ABJ = strtoupper($abj); // Abjad Kapital
                                    ?>

                                        <div class="col-sm-12">
                                            <label for="file">Jawaban <?= $ABJ; ?></label>
                                            <div class="form-group">
                                                <input type="file" name="file_<?= $abj; ?>" class="form-control">
                                                <small class="help-block" style="color: #dc3545"><?= form_error('file_' . $abj) ?></small>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="jawaban_<?= $abj; ?>" id="jawaban_<?= $abj; ?>" class="textEditor"><?= set_value('jawaban_a') ?></textarea>
                                                <small class="help-block" style="color: #dc3545"><?= form_error('jawaban_' . $abj) ?></small>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>

                                    <div class="form-group col-sm-12">
                                        <label for="jawaban" class="control-label">Kunci Jawaban</label>
                                        <select required="required" name="jawaban" id="jawaban" class="form-control select2" style="width:100%!important">
                                            <option value="" disabled selected>Pilih Kunci Jawaban</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                        </select>
                                        <small class="help-block" style="color: #dc3545"><?= form_error('jawaban') ?></small>
                                    </div>
                                <?php else : ?>
                                    <?php if ($tim_soal->babak_id == 4) : ?>
                                        <div class="col-sm-12">
                                            <label for="soal" class="control-label">Soal</label>
                                            <div class="form-group">
                                                <input type="file" name="file_soal" class="form-control">
                                                <small class="help-block" style="color: #dc3545"><?= form_error('file_soal') ?></small>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="soal" id="soal" class="textEditor" style="height: 250pt"><?= set_value('soal') ?></textarea>
                                                <small class="help-block" style="color: #dc3545"><?= form_error('soal') ?></small>
                                            </div>
                                        </div>
                                        <?php
                                        $abjad = ['a', 'b', 'c', 'd', 'e'];
                                        foreach ($abjad as $abj) :
                                            $ABJ = strtoupper($abj); // Abjad Kapital
                                        ?>

                                            <div class="col-sm-12">
                                                <label for="file">Jawaban <?= $ABJ; ?></label>
                                                <div class="form-group">
                                                    <input type="file" name="file_<?= $abj; ?>" class="form-control">
                                                    <small class="help-block" style="color: #dc3545"><?= form_error('file_' . $abj) ?></small>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="jawaban_<?= $abj; ?>" id="jawaban_<?= $abj; ?>" class="textEditor"><?= set_value('jawaban_a') ?></textarea>
                                                    <small class="help-block" style="color: #dc3545"><?= form_error('jawaban_' . $abj) ?></small>
                                                </div>
                                            </div>

                                        <?php endforeach; ?>

                                        <div class="form-group col-sm-12">
                                            <label for="jawaban" class="control-label">Kunci Jawaban</label>
                                            <select required="required" name="jawaban" id="jawaban" class="form-control select2" style="width:100%!important">
                                                <option value="" disabled selected>Pilih Kunci Jawaban</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                            </select>
                                            <small class="help-block" style="color: #dc3545"><?= form_error('jawaban') ?></small>
                                        </div>
                                    <?php elseif ($tim_soal->babak_id == 9) : ?>
                                        <div class="col-sm-12">
                                            <label for="soal" class="control-label">Soal</label>
                                            <div class="form-group">
                                                <input type="file" name="file_soal" class="form-control">
                                                <small class="help-block" style="color: #dc3545"><?= form_error('file_soal') ?></small>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="soal" id="soal" class="textEditor" style="height: 250pt"><?= set_value('soal') ?></textarea>
                                                <small class="help-block" style="color: #dc3545"><?= form_error('soal') ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="jawaban" class="control-label">Kunci Jawaban</label>
                                            <input required="required" name="jawaban" id="jawaban" class="form-control" style="width:100%!important">
                                            </input>
                                            <small class="help-block" style="color: #dc3545"><?= form_error('jawaban') ?></small>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <div class="form-group pull-right">
                                    <a href="<?= base_url('soal') ?>" class="btn btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <button type="submit" id="submit" class="btn btn bg-purple float-right"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= form_close(); ?>

<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>

</body>

</html>