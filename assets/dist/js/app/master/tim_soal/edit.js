$(document).ready(function () {
    $('#formtim_soal').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        var btn = $('#submit');
        
        btn.attr('disabled', 'disabled').text('Wait...');

        $.ajax({
            url: $(this).attr('action'),
            data: $(this).serialize(),
            type: 'POST',
            success: function (data) {
                btn.removeAttr('disabled').text('Update');
                if (data.status) {
                    Swal.fire({
                        "title": "Sukses",
                        "text": "Data Berhasil diupdate",
                        "icon": "success"
                    })
                        .then((result) => {
                            if (result.value) {
                                window.location.href = 'http://localhost/new/tim_soal';
                            }
                        });
                } else {
                    $.each(response.errors, function (key, val) {
                        $('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                        $('[name="' + key + '"]').nextAll('.help-block').eq(0).text(val);
                        if (val === '') {
                            $('[name="' + key + '"]').closest('.form-group').removeClass('has-error').addClass('has-success');
                            $('[name="' + key + '"]').nextAll('.help-block').eq(0).text('');
                        }
                    });
                }
            }
        })
    });

    $('#formtim_soal input, #formtim_soal select').on('change', function () {
        $(this).closest('.form-group').removeClass('has-error has-success');
        $(this).nextAll('.help-block').eq(0).text('');
    });
});