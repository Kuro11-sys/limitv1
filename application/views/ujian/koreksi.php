<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="card card-gray">
                    <div class="card-header with-header">
                        <h3 class="card-title">Koreksi Jawaban</h3>
                        <div class="float-right">
                            <a href="<?= base_url() ?>hasilujian/detail/<?= $back ?>" class="btn btn-xs btn btn-danger">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <strong>Nama :</strong> <?php echo $datanya->nama ?> <br />
                                <strong>No Peserta :</strong> <?php echo $datanya->no_p ?> <br />
                                <?php
                                for ($i = 0; $i <= $jumlah - 1; $i++) {
                                    echo "<table>";
                                    echo "<tr>";
                                    echo "<td style='width:15cm'>";
                                    echo "<b>Jawaban No </b>";
                                    $j = $i + 1;
                                    echo "<b>$j</b>      ";
                                    echo "<br />";
                                    $jwb = "$jawaban";
                                    $pecah = explode("#", $jwb);
                                    $hasil = $pecah[$i];
                                    $hasil1 = explode("@", $hasil);
                                    $hasil2 = $hasil1[1];
                                    echo $hasil2;
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<div class='switch' style='float:right;'>";
                                    echo "<input type='checkbox' checked data-toggle='toggle' data-on='Benar' data-off='Salah' data-onstyle='primary' data-offstyle='danger'>";
                                    echo "</div>";
                                    echo "</td>";
                                    echo "</tr>";
                                    echo "</table>";
                                    echo "<br />";
                                }
                                ?>
                                <br />
                                <div href="<?= base_url() ?>" class="btn btn-danger" style="float:right">
                                    <i class="nav-icon fas fa-file-alt"></i> Finish
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="card card-red">
                    <div class="card-header with-header">
                        <h3 class="card-title">Kunci Jawaban</h3>
                        <div class="float-right">
                            <a href="<?= base_url() ?>hasilujian/detail/<?= $back ?>" class="btn btn-xs btn btn-warning">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">

                                <?php
                                for ($i = 0; $i <= $jumlah - 1; $i++) {
                                    echo "<b>Kunci Jawaban No </b>";
                                    $j = $i + 1;
                                    echo "<b>$j</b>      ";
                                    echo "<br />";
                                    $jwb = "$kuncii";
                                    $pecah = explode("#", $jwb);
                                    $hasil = $pecah[$i];
                                    echo $hasil;
                                    echo "<br />";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.0/js/bootstrap4-toggle.min.js"></script>
</body>

</html>