<div class="menu_container clearfix style_3  ">
    <nav>
        <ul class="sf-menu">
            <li class="selected">
                <a href="index.php" title="Home">
                    Trang Chủ
                </a>

            </li>

            <?php $kq = $t->ListTheLoai($lang);	?>
            <?php while ($rowTL = $kq->fetch_assoc() ) {?>

            <li class="submenu">
                <a href="#" title=" <?=$rowTL['TenTL']?>">
                    <?=$rowTL['TenTL']?>
                </a>
                <ul>
                    <?php $kq1 = $t->ListLoaiTinTrong1TheLoai($rowTL['idTL']);?>
                    <?php while ($rowLT = $kq1->fetch_assoc() ) {?>

                    <li>
                        <a href="cat/<?php echo $rowLT['Ten_KhongDau']?>/" title=" <?=$rowLT['Ten'] ?>">
                            <?=$rowLT['Ten'] ?>
                        </a>
                    </li>
                    <?php }?>
                </ul>
            </li>
            <?php }?>
        </ul>
    </nav>
    <div class="mobile_menu_container">
        <a href="#" class="mobile-menu-switch">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </a>
        <div class="mobile-menu-divider"></div>
        <nav>
            <ul class="mobile-menu">
                <li class="submenu selected">
                    <a href="index.php" title="{Trang_Chu}">
                        {Trang_Chu}
                    </a>

                </li>
                <?php $kq = $t->ListTheLoai($lang);	?>
                <?php while ($rowTL = $kq->fetch_assoc() ) {?>
                <li class="submenu">
                    <a href="#" title=" <?=$rowTL['TenTL']?>">
                        <?=$rowTL['TenTL']?>
                    </a>
                    <ul>
                        <?php $kq1 = $t->ListLoaiTinTrong1TheLoai($rowTL['idTL']);?>
                        <?php while ($rowLT = $kq1->fetch_assoc() ) {?>
                            <li>
                                <a href="cat/<?php echo $rowLT['Ten_KhongDau']?>/" title="<?=$rowLT['Ten'] ?>">
                                    <?=$rowLT['Ten'] ?>
                                </a>
                            </li>
                        <?php }?>

                    </ul>
                </li>

                <?php }?>
            </ul>
        </nav>
    </div>
</div>