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
    $("#namelienhe").focus(function () {
        $("#notiname").html("");
        $("#notiname").removeClass("thongbao");
    });
    $("#emaillienhe").focus(function () {
        $("#notiemail").html("");
        $("#notiemail").removeClass("thongbao");
    });
    $("#messagelienhe").focus(function () {
        $("#notinoidung").html("");
        $("#notinoidung").removeClass("thongbao");
    });
    $("#subject").focus(function () {
        $("#notisub").html("");
        $("#notisub").removeClass("thongbao");
    });

    //kiểm tra email
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    $('#checklienhe').click(function() {


        var checkformUrl = "checklienhe.php";
        var namelh = $("#namelienhe").val();
        var emaillh = $("#emaillienhe").val();
        var sublh = $("#subject").val();
        var messagelh = $("#messagelienhe").val();
        if (namelh == ""  || namelh == "Họ tên của bạn") {
            $("#notiname").html("Ban chưa nhập họ tên");
            $("#notiname").addClass("thongbao");
            return false;
        }
        if (emaillh == "" || emaillh == "Email của bạn") {
            $("#notiemail").html("Ban chưa nhập email");
            $("#notiemail").addClass("thongbao");
            return false;
        }

        if( !isEmail(emaillh)) {
            $("#notiemail").html("Email không hợp lệ");
            $("#notiemail").addClass("thongbao");
            return false;
        }
        if (sublh == "" || sublh == "Tiêu đề" ) {
            $("#notisub").html("Ban chưa nhập tiêu đề");
            $("#notisub").addClass("thongbao");
            return false;
        }
        if (messagelh == "" || messagelh == "Nội dung liên hệ") {
            $("#notinoidung").html("Ý kiến của bạn");
            $("#notinoidung").addClass("thongbao");
            return false;
        }
        $.ajax({
            url: checkformUrl,
            type: 'POST',
            data: $("#lienhe").serialize(),
            success: function (result) {

                if (result.result == 'co') {
                

                    $("#thongbaoLH").html("Cảm ơn bạn,thông tin đã được ghi nhận.");
                    $("#thongbaoLH").addClass("thongbaoLH");
                    $("#namelienhe").val("");
                    $("#emaillienhe").val("");
                    $("#subject").val("");
                    $("#messagelienhe").val("");

                }

            },
            error: function () {
                console.log('aaaaaaaaaaaaaa')
            }
        });

    })

});