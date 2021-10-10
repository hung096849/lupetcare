// Text
$("#title").keyup(function() {
    var Text = $(this).val();
    Text = Text.toLowerCase();
    Text = Text.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    Text = Text.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    Text = Text.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    Text = Text.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    Text = Text.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    Text = Text.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    Text = Text.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    Text = Text.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    Text = Text.replace(/ /gi, " - ");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    Text = Text.replace(/\-\-\-\-\-/gi, '-');
    Text = Text.replace(/\-\-\-\-/gi, '-');
    Text = Text.replace(/\-\-\-/gi, '-');
    Text = Text.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    Text = '@' + Text + '@';
    Text = Text.replace(/\@\-|\-\@|\@/gi, '');
    $("#slug").val(Text);
});

// Checked All
$(document).on('change', '.form__check-all', (event) => {
    $('.form__check-all-target').prop('checked', event.target.checked)
});

// Delete All
$('.delete_all').on('click', function(e) {
    var allVals = [];  
    $(".sub_chk:checked").each(function() {  
        allVals.push($(this).attr('data-id'));
    });

    if(allVals.length <=0) {
        toastr.error('Vui lòng chọn hàng để xóa !');
    } else {  
        Swal.fire({
                title: 'Bạn có muốn xóa không ?',
                showDenyButton: true,
                confirmButtonText: `Xóa`,
                denyButtonText: `Không xóa`,
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

// Ajax Delete Many
function ajaxDeleteRecords(url, params ) {
    $.ajax({
        url: url,
        type: 'DELETE',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: params,
        success: function (data) {
            console.log(data)
            if (data['success']) {
                $(".sub_chk:checked").each(function() {  
                    $(this).parents("tr").remove();
                });
                toastr.success('Xóa thành công !');
            } else {
                toastr.error('Xóa không thành công !');
            }
        },
        error: function (data) {
            toastr.error('Xóa không thành công');
        }
    });
    $.each(allVals, function( index, value ) {
        $('table tr').filter("[data-row-id='" + value + "']").remove();
    });
}

// Ajaxload
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

//Search Ajax Admin
$('#search').on('keyup',function(){
    var value = $(this).val();
    var url = $(this).attr('data-url');
    searchData(url, value);
});

// Ajax Search
function searchData(url, search){
    $.ajax({
                url: url,
                type: "GET",
                data: {
                    search
                },
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
          })
          .done(function(data) {
              console.log(data)
              if(data.html == " "){
                  $('.ajax-load').html("No more records found");
                  return;
              }
              $('.ajax-load').hide();
              $("#search-data tr").remove();
              $("#search-data").append(data.html);
          })
          .fail(function(jqXHR, ajaxOptions, thrownError) {
                toastr.error('Máy chủ không phản hồi...');
          });
  }