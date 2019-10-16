$(function () {


    $("#remove").removeClass("thongbaoYK");

    $('#commentcheck').click(function (e) {
        setTimeout(function(){
            $("#thongbao").html("");
            $("#remove").removeClass("thongbaoYK");
            }, 3000);
        var checkformUrl = "checkcomment.php";
        
        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        if (name=="") { alert("Chưa nập tên"); return false;}
        if (email=="") { alert("Chưa nập tên"); return false;}
        if (message=="") { alert("Chưa nập tên"); return false;}
        
        $.ajax({
            url: checkformUrl,
            type: 'POST',
            data: $("#comment_form").serialize(),
            success: function(result) {

                if(result.result == 'co'){
                    $("#thongbao").html("Cảm ơn bạn, ý kiến đã được ghi nhận.");
                    $("#remove").addClass("thongbaoYK");
                }

            },
            error: function () {
                console.log('aaaaaaaaaaaaaa')
            }
        });    
    });

});