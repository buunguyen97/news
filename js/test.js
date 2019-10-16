$(function () {


    $('#comment_form').submit(function (e) {
        var checkformUrl = "checkcomment.php";
        var val = $(this).val();
        alert(val);
        if(val.trim()){
            $.ajax({
                url: checkformUrl,
                type: 'POST',
                data: {name: val},
                success: function(result) {
                    if(result.result == 'co'){
                        $("#thongbao").html("ghi ý kiến thành công");

                    }

                },
                error: function () {
                    console.log('aaaaaaaaaaaaaa')
                }
            });
        }
    });


});