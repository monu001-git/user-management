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
    if (doc_file3_ext == 'png' || doc_file3_ext == 'jpg' || doc_file3_ext == 'jpeg') {
    } else {
        alert("Only PNG, JPG, and JPEG files are allowed");
        $('.image').val(""); 
    }
});


'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix']
