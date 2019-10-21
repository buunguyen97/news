<?php
$idLT=$_GET['idLT']; settype($idLT, "int");
$kq = $t->TinTrongLoai($idLT);
$pageSize = PAGEGINATION_PERPAGE ; //số tin sẽ hiện trong 1 trang
if (isset($_GET['pageNum'])) $pageNum = $_GET['pageNum'];//trang user xem
settype($pageNum, "int");
if ($pageNum<=0) $pageNum=1;
$totalRows=0;
$offset = PAGEGINATION_OFFSET;
$kq = $t->TinTrongLoai($idLT ,$pageNum, $pageSize,$totalRows ); //chỉ lấy 1 trang thứ $pageNum , với $pageSize record

?>
<style>
    /*Tin trong loại*/
    .blog.big .tintrongloai .tieude { font-size:20px}
    .blog.big .tintrongloai img {height:200px;width:250px;border:1px solid #aaa}
    .blog.big .tintrongloai .post_details { margin-top:0px; float:right}
    .blog.big .tintrongloai .post_content p { margin-top:0px; padding:0; text-align:justify; font-size:17px; height:155px; overflow:hidden}
    .blog.big .post_content {width:420px; margin-left:10px}
    .blog.big .post_details li.date {padding: 8px 10px; background:#ddd;}
    h1.page_title {font-size:28px; text-transform: uppercase; margin:0}
    .page_header_right {float:none; width:100%;}

</style>
<div class="page_header clearfix ">
    <div class="page_header_left">
        <h1 class="page_title"><?=$t->LayTenLoaiTin($idLT);?> </h1>
    </div>
    <div class="page_header_right">
        <ul class="bread_crumb">
            <li>
                <a title="Home" href="index.php">
                    Trang chủ
                </a>
            </li>
            <li class="separator icon_small_arrow right_gray">
                &nbsp;
            </li>
            <li>
                <?=$t->LayTenLoaiTin($idLT);?>
            </li>
        </ul>
    </div>
</div>
<ul class="blog big">
    <?php while ($row=$kq->fetch_assoc()) {?>
    <li class="post tintrongloai">
        <a class="tieude" href="index.php?p=detail&idTin=<?=$row['idTin']?>" title="<?=$row['TieuDe']?> ">
            <img src='<?=$row['urlHinh']?> ' alt='img' onerror="this.src='/news/defaultImg.jpg'">
        </a>
        <div class="post_content">
            <h2 class="with_number">
                <a href="index.php?p=detail&idTin=<?=$row['idTin']?>" title="<?=$row['TieuDe']?> "><?=$row['TieuDe']?> </a>
                <a class="comments_number" href="post.html#comments_list" title="2 comments">2<span class="arrow_comments"></span></a>
            </h2>
            <ul class="post_details">
                <li class="date">
                    <?=date( 'd/m/Y', strtotime($row['Ngay']) )?>
                </li>
            </ul>
            <p><?=$row['TomTat']?></p>

        </div>
    </li>
    <?php } ?>
</ul>
<div class="page_margin_top_section">&nbsp;</div>
<?php if ($totalRows>$pageSize) {?>
<ul class="pagination clearfix page_margin_top_section">
    <li class="left">
        <a href="#" title="">&nbsp;</a>
    </li>
    <li class="selected">
        <a href="#" title="">
            1
        </a>
    </li>
    <li>
        <a href="#" title="">
            2
        </a>
    </li>
    <li>
        <a href="#" title="">
            3
        </a>
    </li>
    <li class="right">
        <a href="#" title="">&nbsp;</a>
    </li>
</ul>
<?php } ?>