$(document).ready(function () {
  $("form#login input").on("change", function () {
    $(this).parent().removeClass("has-error");
    $(this).next().next().text("");
  });

  $("form#login").on("submit", function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();

    var infobox = $("#infoMessage");
    infobox
      .addClass("card bg-gradient-warning text-center")
      .text("Checking...");

    var btnsubmit = $("#submit");
    btnsubmit.attr("disabled", "disabled").val("Wait...");

    $.ajax({
      url: $(this).attr("action"),
      type: "POST",
      data: $(this).serialize(),
      success: function (data) {
        infobox.removeAttr("class").text("");
        btnsubmit.removeAttr("disabled").val("Login");
        if (data.status) {
          infobox
            .addClass("card bg-gradient-success text-center")
            .text("Log in Sukses");
          var go = base_url + data.url;
          window.location.href = go;
        } else {
          if (data.invalid) {
            $.each(data.invalid, function (key, val) {
              $('[name="' + key + '"')
                .parent()
                .addClass("has-error");
              $('[name="' + key + '"')
                .next()
                .next()
                .text(val);
              if (val == "") {
                $('[name="' + key + '"')
                  .parent()
                  .removeClass("has-error");
                $('[name="' + key + '"')
                  .next()
                  .next()
                  .text("");
              }
            });
          }
          if (data.failed) {
            infobox
              .addClass("card bg-gradient-danger text-center")
              .text(data.failed);
          }
        }
      },
    });
  });
});
