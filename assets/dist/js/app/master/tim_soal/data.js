var table;

$(document).ready(function() {
  ajaxcsrf();

  table = $("#tim_soal").DataTable({
    initComplete: function() {
      var api = this.api();
      $("#tim_soal_filter input")
        .off(".DT")
        .on("keyup.DT", function(e) {
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
        exportOptions: { columns: [1, 2, 3, 4] }
      },
      {
        extend: "print",
        exportOptions: { columns: [1, 2, 3, 4] }
      },
      {
        extend: "excel",
        exportOptions: { columns: [1, 2, 3, 4] }
      },
      {
        extend: "pdf",
        exportOptions: { columns: [1, 2, 3, 4] }
      }
    ],
    oLanguage: {
      sProcessing: "loading..."
    },
    processing: true,
    serverSide: true,
    ajax: {
      url: "tim_soal/data",
      type: "POST"
    },
    columns: [
      {
        data: "id_tim_soal",
        orderable: false,
        searchable: false
      },
      { data: "nim" },
      { data: "nama_tim_soal" },
      { data: "email" },
      { data: "nama_babak" }
    ],
    columnDefs: [
      {
        searchable: false,
        targets: 5,
        data: {
          id_tim_soal: "id_tim_soal",
          ada: "ada"
        },
        render: function(data, type, row, meta) {
          let btn;
          if (data.ada > 0) {
            btn = "";
          } else {
            btn = `<button type="button" class="btn btn-aktif btn-primary btn-xs" data-id="${data.id_tim_soal}">
								<i class="fa fa-user-plus"></i> Aktif
							</button>`;
          }
          return `<div class="text-center">
							<a href="tim_soal/edit/${data.id_tim_soal}" class="btn btn-xs btn-warning">
								<i class="fas fa-user-edit"></i> Edit
							</a>
							${btn}
						</div>`;
        }
      },
      {
        targets: 6,
        data: "id_tim_soal",
        render: function(data, type, row, meta) {
          return `<div class="text-center">
									<input name="checked[]" class="check" value="${data}" type="checkbox">
								</div>`;
        }
      }
    ],
    order: [[1, "asc"]],
    rowId: function(a) {
      return a;
    },
    rowCallback: function(row, data, iDisplayIndex) {
      var info = this.fnPagingInfo();
      var page = info.iPage;
      var length = info.iLength;
      var index = page * length + (iDisplayIndex + 1);
      $("td:eq(0)", row).html(index);
    }
  });

  table
    .buttons()
    .container()
    .appendTo("#tim_soal_wrapper .col-md-6:eq(0)");

  $(".select_all").on("click", function() {
    if (this.checked) {
      $(".check").each(function() {
        this.checked = true;
        $(".select_all").prop("checked", true);
      });
    } else {
      $(".check").each(function() {
        this.checked = false;
        $(".select_all").prop("checked", false);
      });
    }
  });

  $("#tim_soal tbody").on("click", "tr .check", function() {
    var check = $("#tim_soal tbody tr .check").length;
    var checked = $("#tim_soal tbody tr .check:checked").length;
    if (check === checked) {
      $(".select_all").prop("checked", true);
    } else {
      $(".select_all").prop("checked", false);
    }
  });

  $("#bulk").on("submit", function(e) {
    e.preventDefault();
    e.stopImmediatePropagation();

    $.ajax({
      url: $(this).attr("action"),
      data: $(this).serialize(),
      type: "POST",
      success: function(respon) {
        if (respon.status) {
          Swal.fire({
            title: "Berhasil",
            text: respon.total + " data berhasil dihapus",
            icon: "success"
          });
        } else {
          Swal.fire({
            title: "Gagal",
            text: "Tidak ada data yang dipilih",
            icon: "error"
          });
        }
        reload_ajax();
      },
      error: function() {
        Swal.fire({
          title: "Gagal",
          text: "Ada data yang sedang digunakan",
          icon: "error"
        });
      }
    });
  });

  $("#tim_soal").on("click", ".btn-aktif", function() {
    let id = $(this).data("id");

    $.ajax({
      url:"tim_soal/create_user",
      data: "id=" + id,
      type: "GET",
      success: function(response) {
        if (response.msg) {
          var title = response.status ? "Berhasil" : "Gagal";
          var type = response.status ? "success" : "error";
          Swal.fire({
            title: title,
            text: response.msg,
            icon: type
          });
        }
        reload_ajax();
      }
    });
  });
});

function bulk_delete() {
  if ($("#tim_soal tbody tr .check:checked").length == 0) {
    Swal.fire({
      title: "Gagal",
      text: "Tidak ada data yang dipilih",
      icon: "error"
    });
  } else {
    Swal.fire({
      title: "Anda yakin?",
      text: "Data akan dihapus!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Hapus!"
    }).then(result => {
      if (result.value) {
        $("#bulk").submit();
      }
    });
  }
}
