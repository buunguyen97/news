$(function () {

    var dNow = new Date();
    var localdate= dNow.getDate() + '/' + (dNow.getMonth()+ 1) + '/' + dNow.getFullYear() + ' ' + dNow.getHours() + ':' + dNow.getMinutes()+ ':' + dNow.getSeconds();
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

        if (name=="") {
            $("#themname").html("Ban chưa nhập họ tên");
            $("#themname").addClass("thongbao");
            $("#name").select();
            return false;}
        if (email=="") {
            $("#thememail").html("Ban chưa nhập email");
            $("#thememail").addClass("thongbao");
            $("#email").select(); return false;}
        if (message=="") {
            $("#themykien").html("Ban chưa nhập nội dung ý kiến");
            $("#themykien").addClass("thongbao");
            $("#message").select(); return false;}

        $.ajax({
            url: checkformUrl,
            type: 'POST',
            data: $("#comment_form").serialize(),
            success: function(result) {

                if(result.result == 'co'){
                    $("#thongbao").html("Cảm ơn bạn, ý kiến đã được ghi nhận.");
                    $("#remove").addClass("thongbaoYK");
                    $("#commentthem").removeClass("binhluan");
                    $("#namethem").html(name);
                    $("#thembinhluan").html(message);
                    $("#time").html(localdate);
                }

            },
            error: function () {
                console.log('aaaaaaaaaaaaaa')
            }
        });
    });

});