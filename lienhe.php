<?php session_start();?>
<div class="row page_margin_top_section">
    <h4 class="box_header">
        Liên hệ với chúng tôi.
    </h4>
    <p class="padding_top_30">Chúng tôi rất vui lòng khi tiếp nhận các ý kiến phản hồi, những mong muốn của bạn, những tin tức từ bạn. Những thông tin từ bạn sẽ giúp chúng tôi hoàn thiện hơn, thông tin nhanh chóng hơn.</p>
    <div  id="thongbaoLH">
    </div>
    <form class="contact_form margin_top_15" id="lienhe" method="post" action="">
        <fieldset class="column column_1_3">
            <div class="block">
                <input class="text_input" name="namelienhe" id="namelienhe" type="text" value="<?php if (isset($_POST['name']) ) echo $_POST['name']?>" placeholder="Họ tên của bạn">
                <p id="notiname"></p>
            </div>
        </fieldset>
        <fieldset class="column column_1_3">
            <div class="block">
                <input class="text_input" name="emaillienhe"  id="emaillienhe" type="email" value="<?php if (isset($_POST['email']) ) echo $_POST['email']?>" placeholder="Email của bạn">
                <p id="notiemail"></p>
            </div>
        </fieldset>
        <fieldset class="column column_1_3">
            <div class="block">
                <input class="text_input" name="subject" id="subject" type="text" value="<?php if (isset($_POST['subject']) ) echo $_POST['subject']?>" placeholder="Tiêu đề">
                <p id="notisub"></p>
            </div>
        </fieldset>
        <fieldset>
            <div class="block">
                <textarea name="messagelienhe" id="messagelienhe" placeholder="Nội dung liên hệ"><?php if (isset($_POST['message']) ) echo $_POST['message']?></textarea>

                <p id="notinoidung"></p></div>
        </fieldset>
        &nbsp;
        <fieldset>
            <div class="block">
                <img src="captcha.php" align="left" height="46" > &nbsp;
                <input class="text_input" name="cap" placeholder="Nhập chữ trong hình" value="<?php if (isset($_POST['cap']) ) echo $_POST['cap']?>" >
            </div>
        </fieldset>

        <fieldset style="margin-top: 20px">
            <input type="hidden" name="action" value="contact_form" />
            <input style="margin: auto" type="button" name="submit" id="checklienhe" value="GỬI LIÊN HỆ" class="more active">
        </fieldset>
    </form>
</div>