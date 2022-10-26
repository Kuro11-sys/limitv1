</div>


<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; 2021 <a>HIMATIKA "Geokompstat"</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> Beta
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
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
  $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
    return {
      "iStart": oSettings._iDisplayStart,
      "iEnd": oSettings.fnDisplayEnd(),
      "iLength": oSettings._iDisplayLength,
      "iTotal": oSettings.fnRecordsTotal(),
      "iFilteredTotal": oSettings.fnRecordsDisplay(),
      "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
      "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
    };
  };

  function ajaxcsrf() {
    var csrfname = '<?= $this->security->get_csrf_token_name() ?>';
    var csrfhash = '<?= $this->security->get_csrf_hash() ?>';
    var csrf = {};
    csrf[csrfname] = csrfhash;
    $.ajaxSetup({
      "data": csrf
    });
  }

  function reload_ajax() {
    table.ajax.reload(null, false);
  }
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
<script src="<?= base_url() ?>assets/bower_components/codemirror/lib/codemirror.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/codemirror/mode/xml.min.js"></script>