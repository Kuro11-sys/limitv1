<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header with-border">
						<h3 class="card-title">Relasi <?= $subjudul ?></h3>
						<div class="card-tools pull-right">
							<button type="button" class="btn btn-card-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
						<div class="mt-2 mb-3">
							<a href="<?= base_url('tahunbabak/add') ?>" class="btn btn-sm btn bg-purple"><i class="fa fa-plus"></i> Tambah Data</a>
							<button type="button" onclick="reload_ajax()" class="btn btn-sm btn btn-default"><i class="fa fa-refresh"></i> Reload</button>
							<div class="float-right">
								<button onclick="bulk_delete()" class="btn btn-sm btn btn-danger" type="button"><i class="fa fa-trash"></i> Delete</button>
							</div>
						</div>

						<?= form_open('', array('id' => 'bulk')) ?>
						<div class="table-responsive px-4 pb-3" style="border:0">
							<table id="tahunbabak" class="w-100 table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Babak</th>
										<th>Tahun</th>
										<th class="text-center">Edit</th>
										<th class="text-center">
											<input type="checkbox" class="select_all">
										</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No.</th>
										<th>Babak</th>
										<th>Tahun</th>
										<th class="text-center">Edit</th>
										<th class="text-center">
											<input type="checkbox" class="select_all">
										</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<?= form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>
<script src="<?= base_url() ?>assets/app/relasi/tahunbabak/data.js"></script>
</body>

</html>