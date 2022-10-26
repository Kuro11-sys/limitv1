<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header with-border">
						<h3 class="card-title"><?= $subjudul ?></h3>
						<div class="card-tools pull-right">
							<button type="button" class="btn btn-card-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<button type="button" onclick="bulk_delete()" class="btn btn btn-sm bg-red"><i class="fa fa-trash"></i> Bulk Delete</button>
							</div>

							<div class="col-sm-4">
								<div class="float-right">
									<a href="<?= base_url('soal/add') ?>" class="btn bg-purple btn btn-sm"><i class="fa fa-plus"></i> Buat Soal</a>
									<button type="button" onclick="reload_ajax()" class="btn btn btn-sm bg-maroon"><i class="fa fa-retweet"></i> Reload</button>
								</div>
							</div>
						</div>

						<?= form_open('soal/delete', array('id' => 'bulk')) ?>
						<div class="table-responsive" style="border: 0">
							<table id="soal" class="w-100 table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th class="text-center">
											<input type="checkbox" class="select_all">
										</th>
										<th width="25">No.</th>
										<th>Tim Soal</th>
										<th>Babak</th>
										<th>Jenjang</th>
										<th>Soal</th>
										<th>Tgl Dibuat</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th class="text-center">
											<input type="checkbox" class="select_all">
										</th>
										<th width="25">No.</th>
										<th>Tim Soal</th>
										<th>Babak</th>
										<th>Jenjang</th>
										<th>Soal</th>
										<th>Tgl Dibuat</th>
										<th class="text-center">Aksi</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php require_once("application/views/_templates/dashboard/_footer.php"); ?>
<script src="<?= base_url() ?>assets/app/soal/data.js"></script>
</body>

</html>