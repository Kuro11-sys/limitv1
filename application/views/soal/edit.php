<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col12">
                <?= form_open_multipart('soal/save', array('id' => 'formsoal'), array('method' => 'edit', 'id_soal' => $soal->id_soal)); ?>
                <div class="card card-info">
                    <div class="card-header with-border">
                        <h3 class="card-title"><?= $subjudul ?></h3>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="tim_soal_id" class="control-label">Tim Soal</label>
                                        <?php if ($this->ion_auth->is_admin()) : ?>
                                            <select required="required" name="tim_soal_id" id="tim_soal_id" class="select2 form-group" style="width:100% !important">
                                                <option value="" disabled selected>Pilih tim_soal</option>
                                                <?php
                                                $sdm = $soal->tim_soal_id . ':' . $soal->babak_id;
                                                foreach ($tim_soal as $d) :
                                                    $dm = $d->id_tim_soal . ':' . $d->babak_id; ?>
                                                    <option <?= $sdm === $dm ? "selected" : ""; ?> value="<?= $dm ?>"><?= $d->nama_tim_soal ?> (<?= $d->nama_babak ?>)</option>
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
                                            <label for="soal" class="control-label text-center">Soal</label>
                                            <div class="row">
                                                <div class="form-group col-sm-3">
                                                    <input type="file" name="file_soal" class="form-control">
                                                    <small class="help-block" style="color: #dc3545"><?= form_error('file_soal') ?></small>
                                                    <?php if (!empty($soal->file)) : ?>
                                                        <?= tampil_media('uploads/bank_soal/' . $soal->file); ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group col-sm-9">
                                                    <textarea name="soal" id="soal" class="textEditor" style="height: 250pt"><?= $soal->soal ?></textarea>
                                                    <small class="help-block" style="color: #dc3545"><?= form_error('soal') ?></small>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Membuat perulangan A-E-->
                                        <?php
                                        $abjad = ['a', 'b', 'c', 'd', 'e'];
                                        foreach ($abjad as $abj) :
                                            $ABJ = strtoupper($abj); // Abjad Kapital
                                            $file = 'file_' . $abj;
                                            $opsi = 'opsi_' . $abj;
                                        ?>

                                            <div class="col-sm-12">
                                                <label for="jawaban_<?= $abj; ?>" class="control-label text-center">Jawaban <?= $ABJ; ?></label>
                                                <div class="row">
                                                    <div class="form-group col-sm-3">
                                                        <input type="file" name="<?= $file; ?>" class="form-control">
                                                        <small class="help-block" style="color: #dc3545"><?= form_error($file) ?></small>
                                                        <?php if (!empty($soal->$file)) : ?>
                                                            <?= tampil_media('uploads/bank_soal/' . $soal->$file); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="form-group col-sm-9">
                                                        <textarea name="jawaban_<?= $abj; ?>" id="jawaban_<?= $abj; ?>" class="textEditor"><?= $soal->$opsi ?></textarea>
                                                        <small class="help-block" style="color: #dc3545"><?= form_error('jawaban_' . $abj) ?></small>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endforeach; ?>

                                        <div class="form-group col-sm-12">
                                            <label for="jawaban" class="control-label">Kunci Jawaban</label>
                                            <select required="required" name="jawaban" id="jawaban" class="form-control select2" style="width:100%!important">
                                                <option value="" disabled selected>Pilih Kunci Jawaban</option>
                                                <option <?= $soal->jawaban === "A" ? "selected" : "" ?> value="A">A</option>
                                                <option <?= $soal->jawaban === "B" ? "selected" : "" ?> value="B">B</option>
                                                <option <?= $soal->jawaban === "C" ? "selected" : "" ?> value="C">C</option>
                                                <option <?= $soal->jawaban === "D" ? "selected" : "" ?> value="D">D</option>
                                                <option <?= $soal->jawaban === "E" ? "selected" : "" ?> value="E">E</option>
                                            </select>
                                            <small class="help-block" style="color: #dc3545"><?= form_error('jawaban') ?></small>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group pull-right">
                                                <a href="<?= base_url('soal') ?>" class="btn btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                                <button type="submit" id="submit" class="btn btn bg-purple float-right"><i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <?php if ($soal->babak_id == 4) : ?>
                                            <?php if ($soal->tim_soal_id == $tim_soal->id_tim_soal) : ?>
                                                <div class="col-sm-12">
                                                    <label for="soal" class="control-label text-center">Soal</label>
                                                    <div class="row">
                                                        <div class="form-group col-sm-3">
                                                            <input type="file" name="file_soal" class="form-control">
                                                            <small class="help-block" style="color: #dc3545"><?= form_error('file_soal') ?></small>
                                                            <?php if (!empty($soal->file)) : ?>
                                                                <?= tampil_media('uploads/bank_soal/' . $soal->file); ?>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="form-group col-sm-9">
                                                            <textarea name="soal" id="soal" class="textEditor" style="height: 250pt"><?= $soal->soal ?></textarea>
                                                            <small class="help-block" style="color: #dc3545"><?= form_error('soal') ?></small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- 
                                Membuat perulangan A-E 
                            -->
                                                <?php
                                                $abjad = ['a', 'b', 'c', 'd', 'e'];
                                                foreach ($abjad as $abj) :
                                                    $ABJ = strtoupper($abj); // Abjad Kapital
                                                    $file = 'file_' . $abj;
                                                    $opsi = 'opsi_' . $abj;
                                                ?>

                                                    <div class="col-sm-12">
                                                        <label for="jawaban_<?= $abj; ?>" class="control-label text-center">Jawaban <?= $ABJ; ?></label>
                                                        <div class="row">
                                                            <div class="form-group col-sm-3">
                                                                <input type="file" name="<?= $file; ?>" class="form-control">
                                                                <small class="help-block" style="color: #dc3545"><?= form_error($file) ?></small>
                                                                <?php if (!empty($soal->$file)) : ?>
                                                                    <?= tampil_media('uploads/bank_soal/' . $soal->$file); ?>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="form-group col-sm-9">
                                                                <textarea name="jawaban_<?= $abj; ?>" id="jawaban_<?= $abj; ?>" class="textEditor"><?= $soal->$opsi ?></textarea>
                                                                <small class="help-block" style="color: #dc3545"><?= form_error('jawaban_' . $abj) ?></small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php endforeach; ?>

                                                <div class="form-group col-sm-12">
                                                    <label for="jawaban" class="control-label">Kunci Jawaban</label>
                                                    <select required="required" name="jawaban" id="jawaban" class="form-control select2" style="width:100%!important">
                                                        <option value="" disabled selected>Pilih Kunci Jawaban</option>
                                                        <option <?= $soal->jawaban === "A" ? "selected" : "" ?> value="A">A</option>
                                                        <option <?= $soal->jawaban === "B" ? "selected" : "" ?> value="B">B</option>
                                                        <option <?= $soal->jawaban === "C" ? "selected" : "" ?> value="C">C</option>
                                                        <option <?= $soal->jawaban === "D" ? "selected" : "" ?> value="D">D</option>
                                                        <option <?= $soal->jawaban === "E" ? "selected" : "" ?> value="E">E</option>
                                                    </select>
                                                    <small class="help-block" style="color: #dc3545"><?= form_error('jawaban') ?></small>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group pull-right">
                                                        <a href="<?= base_url('soal') ?>" class="btn btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                                        <button type="submit" id="submit" class="btn btn bg-purple float-right"><i class="fa fa-save"></i> Simpan</button>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <div class="col-sm-12">
                                                    <label for="soal" class="control-label text-center">Soal</label>
                                                    <div class="row">
                                                        <div class="form-group col-sm-3">
                                                            <input type="file" name="file_soal" class="form-control">
                                                            <small class="help-block" style="color: #dc3545"><?= form_error('file_soal') ?></small>
                                                            <?php if (!empty($soal->file)) : ?>
                                                                <?= tampil_media('uploads/bank_soal/' . $soal->file); ?>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="form-group col-sm-9">
                                                            <textarea name="soal" id="soal" class="textEditor" style="height: 250pt"><?= $soal->soal ?></textarea>
                                                            <small class="help-block" style="color: #dc3545"><?= form_error('soal') ?></small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- 
                                Membuat perulangan A-E 
                            -->
                                                <?php
                                                $abjad = ['a', 'b', 'c', 'd', 'e'];
                                                foreach ($abjad as $abj) :
                                                    $ABJ = strtoupper($abj); // Abjad Kapital
                                                    $file = 'file_' . $abj;
                                                    $opsi = 'opsi_' . $abj;
                                                ?>

                                                    <div class="col-sm-12">
                                                        <label for="jawaban_<?= $abj; ?>" class="control-label text-center">Jawaban <?= $ABJ; ?></label>
                                                        <div class="row">
                                                            <div class="form-group col-sm-3">
                                                                <input type="file" name="<?= $file; ?>" class="form-control">
                                                                <small class="help-block" style="color: #dc3545"><?= form_error($file) ?></small>
                                                                <?php if (!empty($soal->$file)) : ?>
                                                                    <?= tampil_media('uploads/bank_soal/' . $soal->$file); ?>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="form-group col-sm-9">
                                                                <textarea name="jawaban_<?= $abj; ?>" id="jawaban_<?= $abj; ?>" class="textEditor"><?= $soal->$opsi ?></textarea>
                                                                <small class="help-block" style="color: #dc3545"><?= form_error('jawaban_' . $abj) ?></small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php endforeach; ?>

                                                <div class="form-group col-sm-12">
                                                    <label for="jawaban" class="control-label">Kunci Jawaban</label>
                                                    <select required="required" name="jawaban" id="jawaban" class="form-control select2" style="width:100%!important">
                                                        <option value="" disabled selected>Pilih Kunci Jawaban</option>
                                                        <option <?= $soal->jawaban === "A" ? "selected" : "" ?> value="A">A</option>
                                                        <option <?= $soal->jawaban === "B" ? "selected" : "" ?> value="B">B</option>
                                                        <option <?= $soal->jawaban === "C" ? "selected" : "" ?> value="C">C</option>
                                                        <option <?= $soal->jawaban === "D" ? "selected" : "" ?> value="D">D</option>
                                                        <option <?= $soal->jawaban === "E" ? "selected" : "" ?> value="E">E</option>
                                                    </select>
                                                    <small class="help-block" style="color: #dc3545"><?= form_error('jawaban') ?></small>
                                                </div>
                                                <div class="form-group">
                                                    <label>Maaf soal ini bukan milik anda, untuk mengeditnya hubungi pemilik soal!</label>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group pull-right">
                                                        <a href="<?= base_url('soal') ?>" class="btn btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php elseif ($soal->babak_id == 9) : ?>
                                            <div class="col-sm-12">
                                                <label for="soal" class="control-label text-center">Soal</label>
                                                <div class="row">
                                                    <div class="form-group col-sm-3">
                                                        <input type="file" name="file_soal" class="form-control">
                                                        <small class="help-block" style="color: #dc3545"><?= form_error('file_soal') ?></small>
                                                        <?php if (!empty($soal->file)) : ?>
                                                            <?= tampil_media('uploads/bank_soal/' . $soal->file); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="form-group col-sm-9">
                                                        <textarea name="soal" id="soal" class="textEditor" style="height: 250pt"><?= $soal->soal ?></textarea>
                                                        <small class="help-block" style="color: #dc3545"><?= form_error('soal') ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="jawaban" class="control-label">Kunci Jawaban</label>
                                                <input required="required" name="jawaban" id="jawaban" class="form-control" value="<?= $soal->jawaban ?>" style="width:100%!important">
                                                </input>
                                                <small class="help-block" style="color: #dc3545"><?= form_error('jawaban') ?></small>
                                            </div>
                                            <div class="col-sm-12">
                                                    <div class="form-group pull-right">
                                                        <a href="<?= base_url('soal') ?>" class="btn btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                                        <button type="submit" id="submit" class="btn btn bg-purple float-right"><i class="fa fa-save"></i> Simpan</button>
                                                    </div>
                                                </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
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

</body>

</html>