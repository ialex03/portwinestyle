<?php
include $arrSETTINGS['dir_site'].'/includes/languages/listaidiomas.inc.php'
?>

<div class="header__top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header__top__inner">
                    <div class="header__top__left">
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
                            include 'languages/lang.'.$_SESSION['idioma'].'.inc.php';
                            if(!isset($_SESSION['userid'])){
                            ?>
                            
                            <li><a href="<?php echo $arrSETTINGS['url_site']?>login.php"><?php echo $arrLang['login'];?></a> <span></span></li>
                            <li><a href="<?php echo $arrSETTINGS['url_site']?>register.php"><?php echo $arrLang['register'];?></a> <span></span></li>
                            <?php
                            }else echo "<li><a href=".$arrSETTINGS['url_site']."perfil.php>".$arrLang['perfil']."</a> <span></span></li>";
                            ?>
                        </ul>
                    </div>
                    <div class="header__logo">
                        <a href="./home.php"><img src="img/portlinelogo.png" alt="logótipo da portline" width="150"></a>
                    </div>
                    <div class="header__top__right">
                        <div class="header__top__right__links">
                            <!--<a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                            <a href="#"><img src="img/icon/heart.png" alt=""></a>-->
                            <a class="search-switch"><i class="btn btn-outline-dark fa fa-search" href="produto.pesquisa.php"></i></a>
                            <a href="<?php echo $arrSETTINGS['url_site']?>favoritos.php"><i class="btn btn-outline-dark fa fa-heart"></i></a>
                            <a href="<?php echo $arrSETTINGS['url_site']?>FAQ.php"><i class="btn btn-outline-dark fa fa-info"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</div>