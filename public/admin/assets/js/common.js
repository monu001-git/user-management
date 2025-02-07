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
