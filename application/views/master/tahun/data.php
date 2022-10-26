<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header with-border">
						<h5 class="card-title"><b><?= $subjudul ?></b></h5>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
						<div class="mt-2 mb-4">
							<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-sm bg-purple btn"><i class="fa fa-plus"></i> Add Data</button>
							<button type="button" onclick="reload_ajax()" class="btn btn-sm btn btn-default"><i class="fa fa-retweet"></i> Reload</button>

							<button onclick="bulk_edit()" class="btn btn-sm btn-warning btn" type="button"><i class="fa fa-edit"></i> Edit</button>
							<button onclick="bulk_delete()" class="btn btn-sm btn-danger btn float-right" type="button"><i class="fa fa-trash"></i> Delete</button>

						</div>
						<?= form_open('', array('id' => 'bulk')) ?>
						<table id="tahun" class="w-100 table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Tahun</th>
									<th class="text-center">
										<input type="checkbox" id="select_all">
									</th>
								</tr>
							</thead>
						</table>
						<?= form_close() ?>
					</div>
				</div>

				<div class="modal fade" id="myModal">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Add Data</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<?= form_open('tahun/add', array('id', 'tambah')); ?>
							<div class="modal-body">
								<div class="form-group">
									<label for="banyak">Banyaknya data</label>
									<input value="1" minlength="1" maxlength="50" min="1" max="50" id="banyakinput" type="number" autocomplete="off" required="required" name="banyak" class="form-control">
									<small class="help-block">Max. 50</small>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" name="input">Generate</button>
							</div>
							<?= form_close(); ?>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
			</div>
		</div>
	</div>
</section>

<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>
<script src="<?= base_url() ?>assets/app/master/tahun/data.js"></script>
</body>

</html>