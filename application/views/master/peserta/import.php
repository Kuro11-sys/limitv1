<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header with-border">
                        <h3 class="card-title"><?= $subjudul ?></h3>
                        <div class="card-tools pull-right">
                            <button type="button" class="btn btn-card-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="alert alert-info" style="padding-left: 40px">
                            <li>Silahkan import data dari excel, menggunakan format yang sudah disediakan</li>
                            <li>Data tidak boleh ada yang kosong, harus terisi semua.</li>
                            <li>Untuk data Jenjang, hanya bisa diisi menggunakan ID Jenjang. <a data-toggle="modal" href="#kelasId" style="text-decoration:none" class="btn btn-xs btn-primary">Lihat ID</a>.</li>
                        </ul>
                        <div class="text-center">
                            <a href="<?= base_url('uploads/import/format/peserta_form.xlsx') ?>" class="btn-default btn">Download Format</a>
                        </div>
                        <br>
                        <div class="row">
                            <?= form_open_multipart('peserta/preview'); ?>
                            <div class="row">
                                <form role="form-horizontal">
                                    <div class="form-group row">
                                        <label for="file" class="col" style="margin-left: 220pt">Pilih File</label>
                                    </div>
                                    <div class="col">

                                        <input type="file" name="upload_file">

                                    </div>
                                    <div class="col">
                                        <button name="preview" type="submit" class="btn btn-sm btn-success">Preview</button>
                                    </div>
                                </form>
                            </div>
                            <?= form_close(); ?>
                            <div class="col" style="margin-right: 100pt; margin-left: 100pt">
                                <?php if (isset($_POST['preview'])) : ?>
                                    <br>
                                    <h4>Preview Data</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>No Peserta</td>
                                                <td>Nama</td>
                                                <td>Username</td>
                                                <td>Jenis Kelamin</td>
                                                <td>ID Jenjang</td>
                                                <td>Regional</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $status = true;
                                            if (empty($import)) {
                                                echo '<tr><td colspan="2" class="text-center">Data kosong! pastikan anda menggunakan format yang telah disediakan.</td></tr>';
                                            } else {
                                                $no = 1;
                                                foreach ($import as $data) :
                                            ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td class="<?= $data['no_p'] == null ? 'bg-danger' : ''; ?>">
                                                            <?= $data['no_p'] == null ? 'BELUM DIISI' : $data['no_p']; ?>
                                                        </td>
                                                        <td class="<?= $data['nama'] == null ? 'bg-danger' : ''; ?>">
                                                            <?= $data['nama'] == null ? 'BELUM DIISI' : $data['nama'];; ?>
                                                        </td>
                                                        <td class="<?= $data['email'] == null ? 'bg-danger' : ''; ?>">
                                                            <?= $data['email'] == null ? 'BELUM DIISI' : $data['email'];; ?>
                                                        </td>
                                                        <td class="<?= $data['jenis_kelamin'] == null ? 'bg-danger' : ''; ?>">
                                                            <?= $data['jenis_kelamin'] == null ? 'BELUM DIISI' : $data['jenis_kelamin'];; ?>
                                                        </td>
                                                        <td class="<?= $data['kelas_id'] == null ? 'bg-danger' : ''; ?>">
                                                            <?= $data['kelas_id'] == null ? 'BELUM DIISI' : $data['kelas_id'];; ?>
                                                        </td>
                                                        <td class="<?= $data['regional'] == null ? 'bg-danger' : ''; ?>">
                                                            <?= $data['regional'] == null ? 'BELUM DIISI' : $data['regional'];; ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    if ($data['no_p'] == null || $data['nama'] == null || $data['email'] == null || $data['jenis_kelamin'] == null || $data['kelas_id'] == null) {
                                                        $status = false;
                                                    }
                                                endforeach;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php if ($status) : ?>

                                        <?= form_open('peserta/do_import', null, ['data' => json_encode($import)]); ?>
                                        <button type='submit' class='btn btn-block btn bg-purple'>Import</button>
                                        <?= form_close(); ?>

                                    <?php endif; ?>
                                    <br>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="kelasId">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Data Jenjang</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>

                            </div>
                            <div class="modal-body">
                                <table id="kelas" class="table table-bordered table-condensed table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Jenjang</th>
                                        <th>Tahun</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kelas as $k) : ?>
                                            <tr>
                                                <td><?= $k->id_kelas; ?></td>
                                                <td><?= $k->nama_kelas; ?></td>
                                                <td><?= $k->nama_tahun; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>
<script>
    $(document).ready(function() {
        let table;
        table = $("#kelas").DataTable({
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
        });
    });
</script>
</body>

</html>