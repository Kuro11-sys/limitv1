var table;

$(document).ready(function () {
  ajaxcsrf();

  table = $("#detail_hasil").DataTable({
    initComplete: function () {
      var api = this.api();
      $("#detail_hasil_filter input")
        .off(".DT")
        .on("keyup.DT", function (e) {
          api.search(this.value).draw();
        });
    },
    dom:
      "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        extend: "copy",
        exportOptions: { columns: [1, 2, 3, 4, 5, 6, 7] },
      },
      {
        extend: "print",
        exportOptions: { columns: [1, 2, 3, 4, 5, 6, 7] },
      },
      {
        extend: "excel",
        exportOptions: { columns: [1, 2, 3, 4, 5, 6, 7] },
      },
      {
        extend: "pdf",
        exportOptions: { columns: [1, 2, 3, 4, 5, 6, 7] },
      },
    ],
    oLanguage: {
      sProcessing: "loading...",
    },
    processing: true,
    serverSide: true,
    ajax: {
      url: base_url + "hasilujian/NilaiMhs/" + id,
      type: "POST",
    },
    columns: [
      {
        data: "id",
        orderable: false,
        searchable: false,
      },
      { data: "nama" },
      { data: "no_p" },
    ],
    columnDefs: [
      {
        targets: 3,
        data: "id",
        render: function (data, type, row, meta) {
          return `<div class="text-center">
                                <a href="${base_url}hasilujian/koreksi/${data}" class="btn btn-xs btn-warning">
                                    <i class="fa fa-edit"></i> Koreksi
                                </a>
                            </div>`;
        },
      },
    ],
    order: [[1, "asc"]],
    rowId: function (a) {
      return a;
    },
    rowCallback: function (row, data, iDisplayIndex) {
      var info = this.fnPagingInfo();
      var page = info.iPage;
      var length = info.iLength;
      var index = page * length + (iDisplayIndex + 1);
      $("td:eq(0)", row).html(index);
    },
  });
});
