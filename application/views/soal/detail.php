<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-gray">
                    <div class="card-header with-header">
                        <h3 class="card-title">Detail Soal</h3>
                        <div class="float-right">
                            <a href="<?= base_url() ?>soal" class="btn btn-xs btn btn-danger">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                            <a href="<?= base_url() ?>soal/edit/<?= $this->uri->segment(3) ?>" class="btn btn-xs btn btn-warning">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="text-center">Soal</h3>
                                <?php if (!empty($soal->file)) : ?>
                                    <div class="w-50">
                                        <?= tampil_media('uploads/bank_soal/' . $soal->file); ?>
                                    </div>
                                <?php endif; ?>
                                <?= $soal->soal ?>
                                <hr class="my-4">

                                <?php if ($soal->babak_id == 4) : ?>
                                    <h3 class="text-center">Jawaban</h3>

                                    <?php
                                    $abjad = ['a', 'b', 'c', 'd', 'e'];
                                    $benar = "<i class='fa fa-check-circle text-purple'></i>";

                                    foreach ($abjad as $abj) :

                                        $ABJ = strtoupper($abj);
                                        $opsi = 'opsi_' . $abj;
                                        $file = 'file_' . $abj;
                                    ?>

                                        <h4>Pilihan <?= $ABJ ?> <?= $soal->jawaban === $ABJ ? $benar : "" ?></h4>
                                        <?= $soal->$opsi ?>

                                        <?php if (!empty($soal->$file)) : ?>
                                            <div class="w-50 mx-auto">
                                                <?= tampil_media('uploads/bank_soal/' . $soal->$file); ?>
                                            </div>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                <?php elseif ($soal->babak_id == 9) : ?>
                                    <h3 class="text-center">Jawaban</h3>
                                    <?= $soal->jawaban ?>
                                <?php endif; ?>

                                <hr class="my-4">
                                <strong>Dibuat pada :</strong> <?= strftime("%A, %d %B %Y", date($soal->created_on)) ?>
                                <br>
                                <strong>Terkahir diupdate :</strong> <?= strftime("%A, %d %B %Y", date($soal->updated_on)) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>

</body>

</html>