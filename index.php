<?php session_start();
      require_once "class/tin.php";
      $t = new tin;
      $lang='vi';
        if (isset($_GET['lang'])==true) $lang=$_GET['lang'];
        else if (isset($_SESSION['lang'])==true) $lang = $_SESSION['lang'];
        $arrLang= array('vi','en');
        if (in_array($lang, $arrLang)==false) $lang='vi';
        $_SESSION['lang']=$lang;

$p=$_GET['p']; //đây là tham số
?>
<?php ob_start();?>

<!DOCTYPE html>
<html>
	<head>
		<title><?=$t->getTitle($p); ?></title>
        <base href="http://localhost/news/"/>
		<!--meta-->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.2" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="keywords" content="Medic, Medical Center" />
		<meta name="description" content="Responsive Medical Health Template" />
		<!--style-->
		<link href='//fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="style/reset.css">
		<link rel="stylesheet" type="text/css" href="style/superfish.css">
		<link rel="stylesheet" type="text/css" href="style/prettyPhoto.css">
		<link rel="stylesheet" type="text/css" href="style/jquery.qtip.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<link rel="stylesheet" type="text/css" href="style/menu_styles.css">
		<link rel="stylesheet" type="text/css" href="style/animations.css">
		<link rel="stylesheet" type="text/css" href="style/responsive.css">
		<link rel="stylesheet" type="text/css" href="style/odometer-theme-default.css">
		<!--<link rel="stylesheet" type="text/css" href="style/dark_skin.css">-->
		<!--<link rel="stylesheet" type="text/css" href="style/high_contrast_skin.css">-->
		<link rel="shortcut icon" href="images/favicon.ico">
	</head>
	<!--<body class="image_1">
	<body class="image_1 overlay">
	<body class="image_2">
	<body class="image_2 overlay">
	<body class="image_3">
	<body class="image_3 overlay">
	<body class="image_4">
	<body class="image_4 overlay">
	<body class="image_5">
	<body class="image_5 overlay">
	<body class="pattern_1">
	<body class="pattern_2">
	<body class="pattern_3">
	<body class="pattern_4">
	<body class="pattern_5">
	<body class="pattern_6">
	<body class="pattern_7">
	<body class="pattern_8">
	<body class="pattern_9">
	<body class="pattern_10">-->
	<body>
		<div class="site_container">
			<!--<div class="header_top_bar_container style_2 clearfix">
			<div class="header_top_bar_container style_2 border clearfix">
			<div class="header_top_bar_container style_3 clearfix">
			<div class="header_top_bar_container style_3 border clearfix">
			<div class="header_top_bar_container style_4 clearfix">
			<div class="header_top_bar_container style_4 border clearfix">
			<div class="header_top_bar_container style_5 clearfix">
			<div class="header_top_bar_container style_5 border clearfix"> -->
			<div class="header_top_bar_container style_3 clearfix">
				<?php require "header_top.php" ?>
			</div>
			<!--<div class="header_container small">
			<div class="header_container style_2">
			<div class="header_container style_2 small">
			<div class="header_container style_3">
			<div class="header_container style_3 small">-->
			<div class="header_container">
				<div class="header clearfix">
					<div class="logo">
						<h1><a href="index.php" title="{Tin_Tuc_Tong_Hop}">{Tin_Tuc_Tong_Hop}</a></h1>
						<h4>{Sub_SiteTitle}</h4>
					</div>
					<div class="placeholder">728 x 90</div>
				</div>
			</div>
			<!-- <div class="menu_container style_2 clearfix">
			<div class="menu_container style_3 clearfix">
			<div class="menu_container style_... clearfix">
			<div class="menu_container style_10 clearfix">
			<div class="menu_container sticky clearfix">-->
			<?php require "menu.php"?>
			<div class="page">
				<div class="page_layout clearfix">
					<div class="row page_margin_top">
						<div class="column column_2_3">
                            <?php
                            if ($p=="detail") require "chitiettin.php";
							else if ($p=="cat") require "tintrongloai.php";
							else if ($p=="search") require "ketquatimkiem.php";
                            else if ($p=="lienhe") require "lienhe.php";
                            else {
                            ?>

                                <?php require "slider.php" ?>
                                <div id="small_slider" class='slider_posts_list_container small'>
                                </div>
                                <div class="row page_margin_top">
                                    <h4 class="box_header page_margin_top_section">{Tin_Noi_Bat}</h4>
                                    <?php require "slider2.php"?>
                                </div>
                                <h4 class="box_header page_margin_top_section">{Tin_Moi_Nhat}</h4>

                                <div class="row">
                                    <?php $kq = $t->TinMoi(0, 2, $lang); include "tinmoi.php"?>
                                    <?php $kq = $t->TinMoi(2, 2, $lang); include "tinmoi.php"?>

                                </div>
                            <?php } ?>
						</div>
						<div class="column column_1_3">
                            <?php $idLT=12; require "tinmoitrongloai.php"?>
                            <?php $idLT=3; require "tinmoitrongloai.php"?>


							<h4 class="box_header page_margin_top_section">{Ban_Xem_Chua}</h4>
							<div class="vertical_carousel_container clearfix">
                                <?php require "tinngaunhien.php"; ?>
							</div>

                            <?php require "listloaitin.php";?>
						</div>
					</div>
					<?php if ($p=="") { ?>
					<div class="row page_margin_top_section">
						<div class="column column_1_1">
							<h4 class="box_header">Top Posts</h4>
							<div class="tabs no_scroll margin_top_10 clearfix">
								<ul class="tabs_navigation small clearfix">

									<li>
										<a href="#most-read" title="{Tin_Xem_Nhieu}">
                                            {Tin_Xem_Nhieu}
										</a>
									</li>
									<li>
										<a href="#most-commented" title="{Moi_Phan_Hoi}">
                                            {Moi_Phan_Hoi}
										</a>
									</li>
								</ul>

                                <?php require "tinxemnhieu.php";?>
                                <?php require "tinmoicophanhoi.php";?>

							</div>
						</div>
					</div>
					<?php } ?>

				</div>
			</div>
						<div class="footer_container">
				<div class="footer clearfix">
					<div class="row">
						<?php require "footer1.php" ?>
						<?php require "footer2.php" ?>
						<?php require "footer3.php" ?>

					</div>
					<div class="row page_margin_top_section">
						<div class="column column_3_4">
							<ul class="footer_menu">
                                <?php $kq = $t->ListTheLoai($lang);	?>
                                <?php while ($rowTL = $kq->fetch_assoc() ) {?>
								<li>
									<h6><a href="category_world.html" title="<?=$rowTL['TenTL']?>"><?=$rowTL['TenTL']?></a></h6>
								</li>
                                <?php }?>
							</ul>
						</div>
						<div class="column column_1_4">
							<a class="scroll_top" href="#top" title="Lên đầu trang">Đầu trang</a>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="background_overlay"></div>
		<!--js-->
		<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery-migrate-1.4.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.ba-bbq.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.11.1.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
		<script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
		<script type="text/javascript" src="js/jquery.transit.min.js"></script>
		<script type="text/javascript" src="js/jquery.sliderControl.js"></script>
		<script type="text/javascript" src="js/jquery.timeago.js"></script>
		<script type="text/javascript" src="js/jquery.hint.js"></script>
		<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
		<script type="text/javascript" src="js/jquery.qtip.min.js"></script>
		<script type="text/javascript" src="js/jquery.blockUI.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="js/odometer.min.js"></script>
		<script type="text/javascript" src="js/test.js"></script>
	</body>
</html>
<?php
$str = ob_get_clean();
require "lang_$lang.php";
$str = str_replace("{Ban_Xem_Chua}", BAN_XEM_CHUA, $str);
$str = str_replace("{Loai_Tin}", LOAI_TIN, $str);
$str = str_replace("{Trang_Chu}", TRANG_CHU, $str);
$str = str_replace("{Moi_Nhan}", MOI_NHAN, $str);
$str = str_replace("{Tu_Khoa}", TU_KHOA, $str);
$str = str_replace("{Tin_Tuc_Tong_Hop}", TIN_TUC_TONG_HOP, $str);
$str = str_replace("{Sub_SiteTitle}", SUB_SITETITLE, $str);
$str = str_replace("{Tin_Moi_Nhat}", TIN_MOI_NHAT, $str);
$str = str_replace("{Tin_Noi_Bat}", TIN_NOI_BAT, $str);
$str = str_replace("{Tin_Xem_Nhieu}", TIN_XEM_NHIEU, $str);
$str = str_replace("{Moi_Phan_Hoi}", MOI_PHAN_HOI, $str);
echo $str;
?>
