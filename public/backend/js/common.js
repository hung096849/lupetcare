// slug
$("#title").keyup(function() {
    var Text = $(this).val();
    Text = Text.toLowerCase();
    Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
    $("#slug").val(Text);
});

// checked all
$(document).on('change', '.form__check-all', (event) => {
    $('.form__check-all-target').prop('checked', event.target.checked)
});

// delete all

$('.delete_all').on('click', function(e) {
    var allVals = [];  
    $(".sub_chk:checked").each(function() {  
        allVals.push($(this).attr('data-id'));
    });

    if(allVals.length <=0) {
        toastr.error('Please select row to delete');
    } else {  
        Swal.fire({
                title: 'Do you want to delete？',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Delete`,
                denyButtonText: `Don't delete`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    var join_selected_values = allVals.join(","); 
                    var url = $(this).data('url');
                    var params = 'ids='+join_selected_values;
                    ajaxDeleteRecords(url, params)
                }
            })
    }
});

// ajax Delete
function ajaxDeleteRecords(url, params ) {
    $.ajax({
        url: url,
        type: 'DELETE',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: params,
        success: function (data) {
            if (data['success']) {
                $(".sub_chk:checked").each(function() {  
                    $(this).parents("tr").remove();
                });
                toastr.success('Delete Successful');
            } else {
                toastr.error('Delete Fail');
            }
        },
        error: function (data) {
            toastr.error('Delete Fail');
        }
    });
    $.each(allVals, function( index, value ) {
        $('table tr').filter("[data-row-id='" + value + "']").remove();
    });
}

// ajaxload
function ajaxReloadList(url, params ) {
    $.ajax({
        url:url,
        type: 'GET',
        data: {'params': params},
        success:function(data) {
            $('#input').html(data);
        }
    });
}