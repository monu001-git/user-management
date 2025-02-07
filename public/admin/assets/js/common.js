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

 
    // // Add Row
    // $("#add-row").DataTable({
    //     pageLength: 5
    //     ,
    // });

    // var action =
    //     '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

    // $("#addRowButton").click(function () {
    //     $("#add-row")
    //         .dataTable()
    //         .fnAddData([
    //             $("#addName").val()
    //             , $("#addPosition").val()
    //             , $("#addOffice").val()
    //             , action
    //             ,]);
    //     $("#addRowModal").modal("hide");
    // });

});
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
