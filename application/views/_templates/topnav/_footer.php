</section>
<!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
	<div class="container">
		<?= strftime('%A, %d %B %Y') ?>, <span class="live-clock"><?= date('H:i:s') ?></span>
		<div class="float-right hidden-xs">
			<strong>HIMATIKA "Geokompstat"</strong>
		</div>
	</div>
	<!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->

<script src="<?= base_url() ?>assets/admin3/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/admin3/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/admin3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/admin3/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/admin3/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>assets/admin3/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>assets/admin3/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/admin3/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/admin3/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/admin3/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/admin3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/admin3/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/admin3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/admin3/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/admin3/dist/js/demo.js"></script>

<script src="<?= base_url() ?>assets/admin3/plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="<?= base_url() ?>assets/admin3/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>assets/admin3/plugins/pace-progress/pace.min.js"></script>
<script src="<?= base_url() ?>assets/admin3/plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url() ?>assets/app/dashboard.js"></script>
<script src="<?= base_url() ?>assets/admin3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/admin3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/admin3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script type="text/javascript">
	function sisawaktu(t) {
		var time = new Date(t);
		var n = new Date();
		var x = setInterval(function() {
			var now = new Date().getTime();
			var dis = time.getTime() - now;
			var h = Math.floor((dis % (1000 * 60 * 60 * 60)) / (1000 * 60 * 60));
			var m = Math.floor((dis % (1000 * 60 * 60)) / (1000 * 60));
			var s = Math.floor((dis % (1000 * 60)) / (1000));
			h = ("0" + h).slice(-2);
			m = ("0" + m).slice(-2);
			s = ("0" + s).slice(-2);
			var cd = h + ":" + m + ":" + s;
			$('.sisawaktu').html(cd);
		}, 100);
		setTimeout(function() {
			waktuHabis();
		}, (time.getTime() - n.getTime()));
	}

	function countdown(t) {
		var time = new Date(t);
		var n = new Date();
		var x = setInterval(function() {
			var now = new Date().getTime();
			var dis = time.getTime() - now;
			var d = Math.floor(dis / (1000 * 60 * 60 * 24));
			var h = Math.floor((dis % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var m = Math.floor((dis % (1000 * 60 * 60)) / (1000 * 60));
			var s = Math.floor((dis % (1000 * 60)) / (1000));
			d = ("0" + d).slice(-2);
			h = ("0" + h).slice(-2);
			m = ("0" + m).slice(-2);
			s = ("0" + s).slice(-2);
			var cd = d + " Hari, " + h + " Jam, " + m + " Menit, " + s + " Detik ";
			$('.countdown').html(cd);

			setTimeout(function() {
				location.reload()
			}, dis);
		}, 1000);
	}

	function ajaxcsrf() {
		var csrfname = '<?= $this->security->get_csrf_token_name() ?>';
		var csrfhash = '<?= $this->security->get_csrf_hash() ?>';
		var csrf = {};
		csrf[csrfname] = csrfhash;
		$.ajaxSetup({
			"data": csrf
		});
	}

	$(document).ready(function() {
		setInterval(function() {
			var date = new Date();
			var h = date.getHours(),
				m = date.getMinutes(),
				s = date.getSeconds();
			h = ("0" + h).slice(-2);
			m = ("0" + m).slice(-2);
			s = ("0" + s).slice(-2);

			var time = h + ":" + m + ":" + s;
			$('.live-clock').html(time);
		}, 1000);
	});
</script>
<script src="<?= base_url() ?>assets/admin3/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/admin3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/admin3/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/admin3/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/admin3/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/admin3/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/admin3/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/admin3/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
	let base_url = '<?= base_url() ?>';
</script>
<script>
	$('.select2').select2({
		theme: 'bootstrap4'
	})
</script>