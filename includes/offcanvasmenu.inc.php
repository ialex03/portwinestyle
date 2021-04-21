<?php
include $arrSETTINGS['dir_site'].'/includes/languages/listaidiomas.inc.php'
?><!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__cart">
        <div class="offcanvas__cart__links">
            <a class="search-switch"><i class="btn btn-outline-dark fa fa-search" href="produto.pesquisa.php"></i></a>
            <a href="<?php echo $arrSETTINGS['url_site']?>favoritos.php"><i class="btn btn-outline-dark fa fa-heart"></i></a>
            <a href="<?php echo $arrSETTINGS['url_site']?>FAQ.php"><i class="btn btn-outline-dark fa fa-info"></i></a>
        </div>
    </div>
    <div class="offcanvas__logo">
        <a href="./index.html"><img src="img/portlinelogo.png" width="200"></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__option">
        <ul>
            <li><?php echo $_SESSION['idioma']?><span class="arrow_carrot-down"></span>
                <ul>
                <?php
                foreach($arrIdiomas as $k => $v) {
                    echo '<li><a href="lang.php?id='.$k.'">'.$v.'</a></li>';
                }
                ?>
                </ul>
            </li>
            <?php
            if(!isset($_SESSION['userid'])){
                ?>
                
                <li><a href="<?php echo $arrSETTINGS['url_site']?>login.php"><?php echo $arrLang['login'];?></a> <span></span></li>
                <li><a href="<?php echo $arrSETTINGS['url_site']?>register.php"><?php echo $arrLang['register'];?></a> <span></span></li>
                <?php
                }else echo "<li><a href=".$arrSETTINGS['url_site']."perfil.php>".$arrLang['perfil']."</a> <span></span></li>";
                ?>
        </ul>
    </div>
</div>
<!-- Offcanvas Menu End -->