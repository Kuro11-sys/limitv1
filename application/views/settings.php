<section class="content">
    <div class="container-fluid">
        <div class="card card-danger card-solid">
            <div class="card-header">
                <h3 class="card-title">
                    Kosongkan Table
                </h3>
                <div class="card-tools pull-right">
                    <button type="button" class="btn btn-card-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <p>
                    Semua data akan dihapus kecuali akun admin.
                </p>
                <button type="button" id="truncate" class="btn btn-danger btn-flat">
                    <i class="fa fa-trash"></i> Kosongkan Table
                </button>
            </div>
        </div>
    </div>
</section>
<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>

<script type="text/javascript">
    $(document).ready(function() {

        $('#truncate').on('click', function(e) {
            e.preventDefault();

            Swal.fire({
                text: "Kosongkan Table",
                title: "Anda yakin?",
                icon: "question",
                showCancelButton: true,
                cancelButtonColor: '#dd4b39'
            }).then((result) => {
                if (result.value) {
                    $(this).attr('disabled', 'disabled').text('Proses...');
                    var jqxhr = $.getJSON('<?= base_url() ?>settings/truncate', function(response) {
                        if (response.status) {
                            Swal.fire({
                                title: "Berhasil",
                                text: "Semua table sudah dikosongkan, kecuali akun Admin pada table user.",
                                icon: "success",
                            });
                        }
                    });

                    jqxhr.done(function() {
                        console.log("ajax complete");
                        $('#truncate').removeAttr('disabled').html('<i class="fa fa-trash"></i> Kosongkan Table');
                    });

                }
            });

        });

    });
</script>

</body>

</html>