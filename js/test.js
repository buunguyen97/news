$(function () {

    // lấy thời gian hiện tại
    var dNow = new Date();
    var localdate = dNow.getDate() + '/' + (dNow.getMonth() + 1) + '/' + dNow.getFullYear() + ' ' + dNow.getHours() + ':' + dNow.getMinutes() + ':' + dNow.getSeconds();
    $("#remove").removeClass("thongbaoYK");

    // Remove thông báo sau khi focus vào input
    $("#name").focus(function () {
        $("#themname").html("");
        $("#themname").removeClass("thongbao");
    });
    $("#email").focus(function () {
        $("#thememail").html("");
        $("#thememail").removeClass("thongbao");
    });
    $("#message").focus(function () {
        $("#themykien").html("");
        $("#themykien").removeClass("thongbao");
    });


    // xử lý khi sumit form
    $('#commentcheck').click(function (e) {

        // set thời gian để tắt thông báo khi submit thành công
        setTimeout(function () {
            $("#thongbao").html("");
            $("#remove").removeClass("thongbaoYK");
        }, 3000);


        var checkformUrl = "checkcomment.php";
        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();


        // kiểm tra điều kiện khi cmt
        if (name == "" || name == "Họ tên của bạn") {
            $("#themname").html("Ban chưa nhập họ tên");
            $("#themname").addClass("thongbao");

            return false;
        }
        if (email == "" || email == "Email của bạn") {
            $("#thememail").html("Ban chưa nhập email");
            $("#thememail").addClass("thongbao");
            return false;
        }
        if (message == "" || message == "Ý kiến của bạn") {
            $("#themykien").html("Ý kiến của bạn");
            $("#themykien").addClass("thongbao");
            return false;
        }


        $.ajax({
            url: checkformUrl,
            type: 'POST',
            data: $("#comment_form").serialize(),
            success: function (result) {

                if (result.result == 'co') {

                    // hiện thị thông báo khi cmt thành công
                    $("#thongbao").html("Cảm ơn bạn, ý kiến đã được ghi nhận.");
                    $("#remove").addClass("thongbaoYK");
                    $("#commentthem").removeClass("binhluan");

                    //tên và nội dung cmt
                    $("#namethem").html(name);
                    $("#thembinhluan").html(message);

                    //thời gian cmt
                    $("#time").html(localdate);

                    // cộng số tin đếm đc
                    dem = ($("#sotin").text()) * 1 + 1;
                    $("#sotin").html(dem);

                }

            },
            error: function () {
                console.log('aaaaaaaaaaaaaa')
            }
        });
    });

});