var table;

$(document).ready(function () {
  ajaxcsrf();

  table = $("#peserta").DataTable({
    initComplete: function () {
      var api = this.api();
      $("#peserta_filter input")
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
        exportOptions: { columns: [1, 2, 3, 4, 5, 6] },
      },
      {
        extend: "print",
        exportOptions: { columns: [1, 2, 3, 4, 5, 6] },
      },
      {
        extend: "excel",
        exportOptions: { columns: [1, 2, 3, 4, 5, 6] },
      },
      {
        extend: "pdf",
        exportOptions: { columns: [1, 2, 3, 4, 5, 6] },
      },
    ],
    oLanguage: {
      sProcessing: "loading...",
    },
    processing: true,
    serverSide: true,
    ajax: {
      url: base_url + "peserta/data",
      type: "POST",
      //data: csrf
    },
    columns: [
      {
        data: "id_peserta",
        orderable: false,
        searchable: false,
      },
      { data: "no_p" },
      { data: "nama" },
      { data: "email" },
      { data: "nama_kelas" },
      { data: "regional" },
      { data: "nama_tahun" },
    ],
    columnDefs: [
      {
        searchable: false,
        targets: 7,
        data: {
          id_peserta: "id_peserta",
          ada: "ada",
        },
        render: function (data, type, row, meta) {
          let btn;
          if (data.ada > 0) {
            btn = "";
          } else {
            btn = `<button data-id="${data.id_peserta}" type="button" class="btn btn-xs btn-primary btn-aktif">
								<i class="fa fa-user-plus"></i>
							</button>`;
          }
          return `<div class="text-center">
									<a class="btn btn-xs btn-warning" href="${base_url}peserta/edit/${data.id_peserta}">
										<i class="fa fa-user-edit"></i>
									</a>
									${btn}
								</div>`;
        },
      },
      {
        targets: 8,
        data: "id_peserta",
        render: function (data, type, row, meta) {
          return `<div class="text-center">
									<input name="checked[]" class="check" value="${data}"  type="checkbox">
								</div>`;
        },
      },
    ],
  });

  table.buttons().container().appendTo("#peserta_wrapper .col-md-6:eq(0)");

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

  $("#peserta tbody").on("click", "tr .check", function () {
    var check = $("#peserta tbody tr .check").length;
    var checked = $("#peserta tbody tr .check:checked").length;
    if (check === checked) {
      $(".select_all").prop("checked", true);
    } else {
      $(".select_all").prop("checked", false);
    }
  });

  $("#bulk").on("submit", function (e) {
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
  });

  $("#peserta").on("click", ".btn-aktif", function () {
    let id = $(this).data("id");

    $.ajax({
      url: base_url + "peserta/create_user",
      data: "id=" + id,
      type: "GET",
      success: function (response) {
        if (response.msg) {
          var title = response.status ? "Berhasil" : "Gagal";
          var type = response.status ? "success" : "error";
          Swal.fire({
            title: title,
            text: response.msg,
            icon: type,
          });
        }
        reload_ajax();
      },
    });
  });

  $("#peserta").on("submit", function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    var bwh = document.getElementById("bawah").value;
    var ats = document.getElementById("atas").value;
    for (i = bwh; i <= ats; i++) {
      let id = i;
      $.ajax({
        url: base_url + "peserta/create_user",
        data: "id=" + id,
        type: "GET",
        success: function (response) {
          if (response.msg) {
            var title = response.status ? "Berhasil" : "Gagal";
            var type = response.status ? "success" : "error";
            Swal.fire({
              title: title,
              text: response.msg,
              icon: type,
            });
          }
          reload_ajax();
        },
      });
    }
  });
});

function bulk_delete() {
  if ($("#peserta tbody tr .check:checked").length == 0) {
    Swal.fire({
      title: "Gagal",
      text: "Tidak ada data yang dipilih",
      icon: "error",
    });
  } else {
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

function bulk_active() {
  $("#peserta").submit();
}
