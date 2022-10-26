var save_label;
var table;

$(document).ready(function () {
  ajaxcsrf();

  table = $("#kelas").DataTable({
    initComplete: function () {
      var api = this.api();
      $("#kelas_filter input")
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
        exportOptions: { columns: [1, 2] },
      },
      {
        extend: "print",
        exportOptions: { columns: [1, 2] },
      },
      {
        extend: "excel",
        exportOptions: { columns: [1, 2] },
      },
      {
        extend: "pdf",
        exportOptions: { columns: [1, 2] },
      },
    ],
    oLanguage: {
      sProcessing: "loading...",
    },
    processing: true,
    serverSide: true,
    ajax: {
      url: "kelas/data",
      type: "POST",
      //data: csrf
    },
    columns: [
      {
        data: "id_kelas",
        orderable: false,
        searchable: false,
      },
      { data: "nama_kelas" },
      { data: "nama_tahun" },
      {
        data: "bulk_select",
        orderable: false,
        searchable: false,
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

  table.buttons().container().appendTo("#kelas_wrapper .col-md-6:eq(0)");

  $("#myModal").on("shown.modal.bs", function () {
    $(':input[name="banyak"]').select();
  });

  $("#select_all").on("click", function () {
    if (this.checked) {
      $(".check").each(function () {
        this.checked = true;
      });
    } else {
      $(".check").each(function () {
        this.checked = false;
      });
    }
  });

  $("#kelas tbody").on("click", "tr .check", function () {
    var check = $("#kelas tbody tr .check").length;
    var checked = $("#kelas tbody tr .check:checked").length;
    if (check === checked) {
      $("#select_all").prop("checked", true);
    } else {
      $("#select_all").prop("checked", false);
    }
  });

  $("#bulk").on("submit", function (e) {
    if ($(this).attr("action") == "kelas/delete") {
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

function load_tahun() {
  var tahun = $('select[name="nama_tahun"]');
  tahun.children("option:not(:first)").remove();

  ajaxcsrf(); // get csrf token
  $.ajax({
    url: "tahun/load_tahun",
    type: "GET",
    success: function (data) {
      //console.log(data);
      if (data.length) {
        var datatahun;
        $.each(data, function (key, val) {
          datatahun = `<option value="${val.id_tahun}">${val.nama_tahun}</option>`;
          tahun.append(datatahun);
        });
      }
    },
  });
}

function bulk_delete() {
  if ($("#kelas tbody tr .check:checked").length == 0) {
    Swal.fire({
      title: "Gagal",
      text: "Tidak ada data yang dipilih",
      icon: "error",
    });
  } else {
    $("#bulk").attr("action", "kelas/delete");
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

function bulk_edit() {
  if ($("#kelas tbody tr .check:checked").length == 0) {
    Swal.fire({
      title: "Gagal",
      text: "Tidak ada data yang dipilih",
      icon: "error",
    });
  } else {
    $("#bulk").attr("action", "kelas/edit");
    $("#bulk").submit();
  }
}
