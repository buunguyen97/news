<?php
$TieuDe_KhongDau = $_GET['TieuDe_KhongDau'];
$idTin = $t->LayidTin($TieuDe_KhongDau);

$row = $t->ChiTietTin($idTin);
$t->CapNhatSolanXemTin($idTin);
$k = $t ->LayCacTags($idTin);
$text = $k['tags'];
$arr = explode(",",$text);
$tl =$t ->LayTheLoaiTrongTin($idTin);
?>

<div class="row">
    <div class="post single">
        <h1 class="post_title">
            <?=$row['TieuDe']?>
        </h1>
        <ul class="post_details clearfix">
            <li class="detail category">In <a href="category_health.html" title="<?=$row['Ten']?>"><?=$row['Ten']?></a></li>
            <li class="detail date"><?=date( 'd/m/Y', strtotime($row['Ngay']) )?></li>

            <li class="detail views"><?=$row['SoLanXem']?> lần xem.</li>

        </ul>

        <div class="post_content noidungtin clearfix">
            <div class="content_box">
                <h3 class="excerpt"><?=$row['TomTat']?>.</h3>
                <div class="text">
                    <?=$row['Content']?>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="row page_margin_top">
    <div class="share_box clearfix">
        <label>Share:</label>
        <ul class="social_icons clearfix">
            <li>
                <a target="_blank" title="" href="http://facebook.com/QuanticaLabs" class="social_icon facebook">
                    &nbsp;
                </a>
            </li>
            <li>
                <a target="_blank" title="" href="https://twitter.com/QuanticaLabs" class="social_icon twitter">
                    &nbsp;
                </a>
            </li>
            <li>
                <a title="" href="mailto:contact@pressroom.com" class="social_icon mail">
                    &nbsp;
                </a>
            </li>
            <li>
                <a title="" href="#" class="social_icon skype">
                    &nbsp;
                </a>
            </li>
            <li>
                <a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon envato">
                    &nbsp;
                </a>
            </li>
            <li>
                <a title="" href="#" class="social_icon instagram">
                    &nbsp;
                </a>
            </li>
            <li>
                <a title="" href="#" class="social_icon pinterest">
                    &nbsp;
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="row page_margin_top">

    <ul class="taxonomies tags left clearfix">
        <?php foreach ($arr as $key => $value){ ?>
        <li>
            <a href="#" title="<?=$value?>"><?=$value?></a>
        </li>
        <?php } ?>
    </ul>


    <ul class="taxonomies categories right clearfix">
        <li>
            <a href="category_health.html" title="<?=$tl['TenTL']?>"><?=$tl['TenTL']?></a>
        </li>
    </ul>
</div>
<div class="row page_margin_top_section">
    <h4 class="box_header">Tin tiếp theo</h4>
    <div class="horizontal_carousel_container page_margin_top">
        <ul class="blog horizontal_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
            <?php $kq = $t->TinCuCungLoai($idTin, $lang, 8);?>
            <?php while ($row = $kq->fetch_assoc()) {?>

            <li class="post tintieptheo">
                <a href="bv/<?=$row['TieuDe_KhongDau'];?>.html" title="<?=$row['TieuDe']?> ">
                    <img src='<?=$row['urlHinh']?> ' alt='img' onerror="this.src='/news/defaultImg.jpg'">
                </a>
                <h5><a href="bv/<?=$row['TieuDe_KhongDau'];?>.html" title="<?=$row['TieuDe']?> "><?=$row['TieuDe']?> </a></h5>
                <ul class="post_details simple">

                    <li class="date">
                        <?=date( 'd/m/Y', strtotime($row['Ngay']) )?>
                    </li>
                </ul>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
<div class="row page_margin_top_section">
    <h4 class="box_header">Ý kiến bạn đọc</h4>

    
   

<div class="thongbaoYK" id="remove" >
    <p id="thongbao"></p>
</div>


    <form class="comment_form margin_top_15" id="comment_form" method="post" action="">
        <input type="hidden" name="idTin" value="<?=$idTin?>">
        <fieldset class="column ">
            <input class="text_input" id="name" name="name" type="text" required placeholder="Họ tên của bạn">
            <p id="themname"></p>
        </fieldset>
        <fieldset class="column ">
            <input class="text_input" id="email" name="email" type="text" required placeholder="Email của bạn">
            <p id="thememail"></p>
        </fieldset>
<!--        <fieldset class="column column_1_3">-->
<!--            <input class="text_input" name="website" type="text" value="Website" placeholder="Website">-->
<!--        </fieldset>-->
        <fieldset>
            <textarea id="message" name="message" placeholder="Ý kiến của bạn"></textarea>
            <p id="themykien"></p>
        </fieldset>
        <fieldset>
            <button id="commentcheck" type="button"  class="more active">GỬI Ý KIẾN</button>
            <a href="#cancel" id="cancel_comment" title="Cancel reply">Cancel reply</a>
        </fieldset>
    </form>
</div>
<div class="row page_margin_top_section">
    <?php $kq= $t->LayCacYKienCua1Tin($idTin); ?>
    <h4 class="box_header"> <span id="sotin"><?=$kq->num_rows; ?></span> ý kiến </h4>

    <ul id="comments_list">
        <li class="comment clearfix binhluan" id="commentthem">
            <div class="comment_author_avatar">
                &nbsp;
            </div>
            <div class="comment_details">
                <div class="posted_by clearfix">
                    <h5><a class="author" id="namethem" href="#"></a></h5>
                    <abbr id="time" class="timeago"></abbr>
                </div>
                <p id="thembinhluan"></p>

            </div>
        </li>
        <?php while ($row= $kq->fetch_assoc() ) {?>
        <li class="comment clearfix" id="comment-1">
            <div class="comment_author_avatar">
                &nbsp;
            </div>
            <div class="comment_details">
                <div class="posted_by clearfix">
                    <h5><a class="author" href="#" title="Kevin Nomad"><?=$row['HoTen']?></a></h5>
                    <abbr title="<?=date( 'd/m/Y H:i:s', strtotime($row['Ngay']) )?> " class="timeago"><?=date( 'd/m/Y H:i:s', strtotime($row['Ngay']) )?> </abbr>
                </div>
                <p>
                    <?=$row['NoiDung']?>
                </p>

            </div>
        </li>
        <?php } ?>

    </ul>

<!--    <ul class="pagination page_margin_top_section">-->
<!--        <li class="left">-->
<!--            <a href="#" title="">&nbsp;</a>-->
<!--        </li>-->
<!--        <li class="selected">-->
<!--            <a href="#" title="">-->
<!--                1-->
<!--            </a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="#" title="">-->
<!--                2-->
<!--            </a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="#" title="">-->
<!--                3-->
<!--            </a>-->
<!--        </li>-->
<!--        <li class="right">-->
<!--            <a href="#" title="">&nbsp;</a>-->
<!--        </li>-->
<!--    </ul>-->
</div>