<section class="content">
    <div class="container-fluid">
        <?php
        if (time() >= $soal->waktu_habis) {
            redirect('ujian/list', 'location', 301);
        }
        ?>
        <div class="row">
            <div class="col-sm-3">
                <div class="card card-primary">
                    <div class="card-header with-border">
                        <h3 class="card-title">Navigasi Soal</h3>
                        <div class="card-tools pull-right">
                            <button type="button" class="btn btn-card-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body text-center" id="tampil_jawaban">
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <?= form_open('', array('id' => 'ujian'), array('id' => $id_tes)); ?>
                <div class="card card-primary">
                    <div class="card-header with-border">
                        <h1 class="card-title" style="font-size: 20pt"><span class="badge bg-blue">Soal #<span id="soalke"></span> </span></h1>
                        <div class="card-tools pull-right">
                            <span class="badge bg-red"><i class="fas fa-stopwatch"></i> Sisa Waktu <span class="sisawaktu" data-time="<?= $soal->tgl_selesai ?>"></span></span>
                            <button type="button" class="btn btn-card-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= $html ?>
                    </div>
                    <div class="card-footer text-center">
                        <a class="action back btn btn-info" rel="0" onclick="return back();"><i class="fas fa-arrow-circle-left"></i> Back</a>
                        <a class="ragu_ragu btn btn-warning" rel="1" onclick="return tidak_jawab();"><i class="fas fa-exclamation"></i> Ragu</a>
                        <a class="action next btn btn-info" rel="2" onclick="return next();">Next <i class="fas fa-arrow-circle-right"></i></a>
                        <a class="selesai action submit btn btn-danger" onclick="return simpan_akhir();"><i class="fas fa-stop-circle"></i> Selesai</a>
                        <input type="hidden" name="jml_soal" id="jml_soal" value="<?= $no; ?>">
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</section>
<?php require_once("application/views/_templates/topnav/_footer.php"); ?>

<script type="text/javascript">
    var id_tes = "<?= $id_tes; ?>";
    var widget = $(".step");
    var total_widget = widget.length;
</script>


<script src="<?= base_url() ?>assets/app/ujian/sheet.js"></script>
</body>

</html>