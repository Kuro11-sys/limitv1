<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header with-border">
                        <h3 class="card-title"><?= $subjudul ?></h3>
                        <div class="card-tools float-right">
                            <button type="button" class="btn btn-card-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mt-2 mb-3">
                            <button type="button" onclick="reload_ajax()" class="btn btn-sm btn bg-purple"><i class="fa fa-retweet"></i> Reload</button>
                            <div class="float-right">
                                <label for="show_me">
                                    <input type="checkbox" id="show_me">
                                    Tampilkan saya
                                </label>
                            </div>
                        </div>

                        <div class="table-responsive" style="border: 0">
                            <table id="users" class="w-100 table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>NIM/No Peserta</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Created On</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>NIM/No Peserta</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Created On</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>
<script type="text/javascript">
    var user_id = '<?= $user->id ?>';
</script>

<script src="<?= base_url() ?>assets/app/users/data.js"></script>
</body>

</html>