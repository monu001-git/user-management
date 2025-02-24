//data table
$(document).ready(function () {
    $("#basic-datatables").DataTable({});
    $("#multi-filter-select").DataTable({
        pageLength: 5
        , initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    var column = this;
                    var select = $(
                        '<select class="form-select"><option value=""></option></select>'
                    )
                        .appendTo($(column.footer()).empty())
                        .on("change", function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());

                            column
                                .search(val ? "^" + val + "$" : "", true, false)
                                .draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append(
                                '<option value="' + d + '">' + d + "</option>"
                            );
                        });
                });
        },
    });
});




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
$('.image3').on('change', function () {
    doc_file3 = $(".image3").val();
    console.log(doc_file3);
    var doc_file3_ext = doc_file3.split('.').pop()
        .toLowerCase();
    if (doc_file3_ext == 'png' || doc_file3_ext == 'jpg' || doc_file3_ext == 'jpeg' || doc_file3_ext == 'svg') {
    } else {
        alert("Only PNG, JPG, and JPEG files are allowed");
        $('.image3').val("");
    }
});

var doc_file1 = "";
$('.image1').on('change', function () {
    doc_file1 = $(".image1").val();
    console.log(doc_file3);
    var doc_file1_ext = doc_file1.split('.').pop()
        .toLowerCase();
    if (doc_file1_ext == 'png' || doc_file1_ext == 'jpg' || doc_file1_ext == 'jpeg' || doc_file1_ext == 'svg') {
    } else {
        alert("Only PNG, JPG, and JPEG files are allowed");
        $('.image1').val("");
    }
});

var doc_file2 = "";
$('.image2').on('change', function () {
    doc_file2 = $(".image2").val();
    var doc_file2_ext = doc_file2.split('.').pop()
        .toLowerCase();
    if (doc_file2_ext == 'png' || doc_file2_ext == 'jpg' || doc_file2_ext == 'jpeg' || doc_file2_ext == 'svg') {
    } else {
        alert("Only PNG, JPG, and JPEG files are allowed");
        $('.image2').val("");
    }
});

var doc_file4 = "";
$('.image4').on('change', function () {
    doc_file4 = $(".image4").val();
    var doc_file4_ext = doc_file4.split('.').pop()
        .toLowerCase();
    if (doc_file4_ext == 'png' || doc_file4_ext == 'jpg' || doc_file4_ext == 'jpeg' || doc_file4_ext == 'svg') {
    } else {
        alert("Only PNG, JPG, and JPEG files are allowed");
        $('.image4').val("");
    }
});

var doc_file5 = "";
$('.image5').on('change', function () {
    doc_file5 = $(".image5").val();
    var doc_file5_ext = doc_file5.split('.').pop()
        .toLowerCase();
    if (doc_file5_ext == 'png' || doc_file5_ext == 'jpg' || doc_file5_ext == 'jpeg' || doc_file5_ext == 'svg') {
    } else {
        alert("Only PNG, JPG, and JPEG files are allowed");
        $('.image5').val("");
    }
});




$(".department").change(function (e) {
    var baseurl=  window.location;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data = $(".department").val();
    $.ajax({
        url: baseurl+'doctor-list',
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
        var baseurl=  window.location;
        $.ajax({
            url: baseurl+"captcha-refresh",
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


//eye toggle button 
$('#togglePassword').click(function () {
    var passwordField = $('#password');
    var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
    passwordField.attr('type', type);
    $(this).text(type === 'password' ? '👁️' : '🙈');
});

$('#ctogglePassword').click(function () {
    var passwordField = $('#confirm-password');
    var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
    passwordField.attr('type', type);
    $(this).text(type === 'password' ? '👁️' : '🙈');
});





