var table;

$(document).ready(function () {
  ajaxcsrf();

  table = $("#soal").DataTable({
    oLanguage: {
      sProcessing: "loading...",
    },
    processing: true,
    serverSide: true,
    ajax: {
      url: base_url + "hasilujian/cekkk/",
      type: "POST",
    },
    columns: [{ cekkk: "jawaban" }],
    order: [[0, "asc"]],
    rowId: function (a) {
      return a;
    },
  });
});
