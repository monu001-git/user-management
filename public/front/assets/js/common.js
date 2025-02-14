//jqery validation

$('.preventnumeric').keypress(function (e) {
    var regex = new RegExp(/^[a-zA-Z\s]+$/);
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
});

$('.mobile_no').keypress(function (e) {
    var regex = new RegExp("^[0-9_]");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
    f
});


var doc_file3 = "";
$('.image').on('change', function () {
    doc_file3 = $(".image").val();
    console.log(doc_file3);
    var doc_file3_ext = doc_file3.split('.').pop()
        .toLowerCase();
    if (doc_file3_ext == 'png' || doc_file3_ext == 'jpg' || doc_file3_ext == 'jpeg' || doc_file3_ext == 'svg') {
    } else {
        alert("Only PNG, JPG, and JPEG files are allowed");
        $('.image').val("");
    }
});




$(".department").change(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data = $(".department").val();

    $.ajax({
        url: 'doctor-list',
        type: "get",
        data: { id: data },
        success: function (data) {
            var resdata = data.doctor
            var formoption = "<option value=''>Please doctor</option>";
            for (i = 0; i < resdata.length; i++) {
                formoption += "<option value='" + resdata[i].id + "'>" + resdata[i].name + "</option>";
            }
            $('#doctor_value').html(formoption);

        }
    });

});


$(document).ready(function () {
    $('#refresh-captcha').click(function () {

        $.ajax({
            url: "/captcha-refresh",
            type: "GET",
            success: function (data) {
                $('#captcha-image').attr('src', data.captcha);
            },
            error: function () {
                alert('Error refreshing CAPTCHA. Please try again.');
            }
        });
    });
});
