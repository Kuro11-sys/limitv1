var save_label;
var table;

$(document).ready(function () {
  ajaxcsrf();

  table = $("#kelastim_soal").DataTable({
    initComplete: function () {
      var api = this.api();
      $("#kelastim_soal_filter input")
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
        exportOptions: { columns: [1, 2, 3] },
      },
      {
        extend: "print",
        exportOptions: { columns: [1, 2, 3] },
      },
      {
        extend: "excel",
        exportOptions: { columns: [1, 2, 3] },
      },
      {
        extend: "pdf",
        exportOptions: { columns: [1, 2, 3] },
      },
    ],
    oLanguage: {
      sProcessing: "loading...",
    },
    processing: true,
    serverSide: true,
    ajax: {
      url: base_url + "pemetaan/data",
      type: "POST",
    },
    columns: [
      {
        data: "id",
        orderable: false,
        searchable: false,
      },
      { data: "nim" },
      { data: "nama_tim_soal" },
    ],
    columnDefs: [
      {
        targets: 3,
        searchable: false,
        orderable: false,
        title: "Kelas",
        data: "kelas",
        render: function (data, type, row, meta) {
          let kelas = data.split(",");
          let badge = [];
          $.each(kelas, function (i, val) {
            var newkelas = `<span class="badge bg-maroon">${val}</span>`;
            badge.push(newkelas);
          });
          return badge.join(" ");
        },
      },
      {
        targets: 4,
        searchable: false,
        orderable: false,
        data: "id_tim_soal",
        render: function (data, type, row, meta) {
          return `<div class="text-center">
									<a href="${base_url}pemetaan/edit/${data}" class="btn btn-warning btn-xs">
										<i class="fa fa-user-edit"></i>
									</a>
								</div>`;
        },
      },
      {
        targets: 5,
        searchable: false,
        orderable: false,
        data: "id_tim_soal",
        render: function (data, type, row, meta) {
          return `<div class="text-center">
									<input name="checked[]" class="check" value="${data}" type="checkbox">
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

  table
    .buttons()
    .container()
    .appendTo("#kelastim_soal_wrapper .col-md-6:eq(0)");

  $(".select_all").on("click", function () {
    if (this.checked) {
      $(".check").each(function () {
        this.checked = true;
        $(".select_all").prop("checked", true);
      });
    } else {
      $(".check").each(function () {
        this.checked = false;
        $(".select_all").prop("checked", false);
      });
    }
  });

  $("#kelastim_soal tbody").on("click", "tr .check", function () {
    var check = $("#kelastim_soal tbody tr .check").length;
    var checked = $("#kelastim_soal tbody tr .check:checked").length;
    if (check === checked) {
      $(".select_all").prop("checked", true);
    } else {
      $(".select_all").prop("checked", false);
    }
  });

  $("#bulk").on("submit", function (e) {
    if ($(this).attr("action") == base_url + "pemetaan/delete") {
      e.preventDefault();
      e.stopImmediatePropagation();

      $.ajax({
        url: $(this).attr("action"),
        data: $(this).serialize(),
        type: "POST",
        success: function (respon) {
          if (respon.status) {
            Swal.fire({
              title: "Berhasil",
              text: respon.total + " data berhasil dihapus",
              icon: "success",
            });
          } else {
            Swal.fire({
              title: "Gagal",
              text: "Tidak ada data yang dipilih",
              icon: "error",
            });
          }
          reload_ajax();
        },
        error: function () {
          Swal.fire({
            title: "Gagal",
            text: "Ada data yang sedang digunakan",
            icon: "error",
          });
        },
      });
    }
  });
});

function bulk_delete() {
  if ($("#kelastim_soal tbody tr .check:checked").length == 0) {
    Swal.fire({
      title: "Gagal",
      text: "Tidak ada data yang dipilih",
      icon: "error",
    });
  } else {
    $("#bulk").attr("action", base_url + "pemetaan/delete");
    Swal.fire({
      title: "Anda yakin?",
      text: "Data akan dihapus!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Hapus!",
    }).then((result) => {
      if (result.value) {
        $("#bulk").submit();
      }
    });
  }
}
