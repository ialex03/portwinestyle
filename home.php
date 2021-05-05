
<?php

    require 'includes/settings.inc.php';
    
    @session_start();
    $_SESSION['unlocked_on']=0;
    include $arrSETTINGS['dir_site'].'/includes/db.inc.php';
    db_connect();
    if(!isset($_SESSION['idioma'])) {
        $_SESSION['idioma'] = $idioma_default;
    }  
    include 'includes/languages/lang.'.$_SESSION['idioma'].'.inc.php';
   
    function writeClassSearchViewType ($tipo) {
        switch($tipo) {
            case 1: $class = 'col-lg-3 col-md-6 col-sm-6'; 
                    break;
            case 2: $class = 'col-12'; 
                    break;
        }
        return $class;
    }
    if(!isset($_SESSION['searchViewType'])) {
        $_SESSION['searchViewType'] = 1;
        
    }
    
    db_connect();
    
     
?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portline - Home</title>
    <link rel="shortcut icon" href="img/portlinefav.png">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" type="text/css" href="css/flaticon.css">
</head>

<body>



    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    
    <!-- MENUS (Off Canvas & Normal) -->
    <?php include $arrSETTINGS['dir_site'].'/includes/offcanvasmenu.inc.php'; ?>
    <header class="header">
        <?php include $arrSETTINGS['dir_site'].'/includes/headertop.inc.php'; 
        
        ?>
        <?php include $arrSETTINGS['dir_site'].'/includes/menu.inc.php'; ?>
    </header>
    <!-- Hero Section Begin -->
    
    <section class="hero">
        <?php include $arrSETTINGS['dir_site'].'/includes/banner.inc.php'; ?>
    </section>
    <!-- Hero Section End -->
    
    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="row">
            <?php
            $query="SELECT * FROM paginas A INNER JOIN paginas_idiomas B ON A.id=B.id WHERE A.nome='quemsomos' AND A.is_active = 1 AND B.idioma='$_SESSION[idioma]' AND A.route='sobrenos.php' ORDER BY A.id";
            $arrAssuntos=db_query($query);
             include $arrSETTINGS['dir_site'].'/includes/info.inc.php'; ?>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Categories Section Begin -->

    <div class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                <?php include $arrSETTINGS['dir_site'].'/includes/categories.inc.php'; ?>
                    <!--
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <i class="flaticon-glass-of-burgundy"></i>
                            <h5>Vinho Tinto</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <i class="flaticon-glass-of-champagne"></i>
                            <h5>Espumante</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-wine"></span>
                            <h5>Vinho Branco</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-030-cupcake-2"></span>
                            <h5>Biscuit</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Donut</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Cupcake</h5>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>
    
    <!-- Categories Section End -->

    
    <!-- Product Section Begin-->
    <section class="product spad">
        <div class="container">
            <div class="row">
            <?php
            $query="SELECT * FROM produtos A INNER JOIN produtos_idiomas B ON A.id=B.id WHERE A.is_active=1 AND B.idioma='$_SESSION[idioma]' ORDER BY rand() LIMIT 0,8";
            $arrProd=db_query($query);
            ?>
            
            <?php 
            $flag_related=false;
            include $arrSETTINGS['dir_site'].'/includes/produtos.inc.php'; ?>
            </div>
        </div>
    </section>
    <!--Product Section End -->

    <!-- Class Section Begin
    <section class="class spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="class__form">
                        <div class="section-title">
                            <span>Class cakes</span>
                            <h2>Made from your <br />own hands</h2>
                        </div>
                        <form action="#">
                            <input type="text" placeholder="Name">
                            <input type="text" placeholder="Phone">
                            <select>
                                <option value="">Studying Class</option>
                                <option value="">Writting Class</option>
                                <option value="">Reading Class</option>
                            </select>
                            <input type="text" placeholder="Type your requirements">
                            <button type="submit" class="site-btn">registration</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="class__video set-bg" data-setbg="img/class-video.jpg">
                <a href="https://www.youtube.com/watch?v=8PJ3_p7VqHw&list=RD8PJ3_p7VqHw&start_radio=1"
                class="play-btn video-popup"><i class="fa fa-play"></i></a>
            </div>
        </div>
    </section>
    <!-- Class Section End -->

    <!-- Team Section Begin 
    <section class="team spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <div class="section-title">
                        <span>Our team</span>
                        <h2>Sweet Baker </h2>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="team__btn">
                        <a href="#" class="primary-btn">Join Us</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item set-bg" data-setbg="img/team/team-1.jpg">
                        <div class="team__item__text">
                            <h6>Randy Butler</h6>
                            <span>Decorater</span>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item set-bg" data-setbg="img/team/team-2.jpg">
                        <div class="team__item__text">
                            <h6>Randy Butler</h6>
                            <span>Decorater</span>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item set-bg" data-setbg="img/team/team-3.jpg">
                        <div class="team__item__text">
                            <h6>Randy Butler</h6>
                            <span>Decorater</span>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item set-bg" data-setbg="img/team/team-4.jpg">
                        <div class="team__item__text">
                            <h6>Randy Butler</h6>
                            <span>Decorater</span>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <!-- Testimonial Section Begin -->
    <?php include $arrSETTINGS['dir_site'].'/includes/categoriesinfo.inc.php'; ?>
    <!-- Testimonial Section End -->

    <!-- Instagram Section Begin
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-0">
                    <div class="instagram__text">
                        <div class="section-title">
                            <span>Follow us on instagram</span>
                            <h2>Sweet moments are saved as memories.</h2>
                        </div>
                        <h5><i class="fa fa-instagram"></i> @sweetcake</h5>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/instagram/instagram-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic middle__pic">
                                <img src="img/instagram/instagram-2.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/instagram/instagram-3.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/instagram/instagram-4.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic middle__pic">
                                <img src="img/instagram/instagram-5.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/instagram/instagram-3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

    <!-- Map Begin -->
    <?php include $arrSETTINGS['dir_site'].'/includes/map.inc.php'; ?>
    
    <!-- Map End -->

    <!-- FOOTER -->
    <?php include $arrSETTINGS['dir_site'].'/includes/footer.inc.php'; ?>

<!-- Search Begin -->
<?php include $arrSETTINGS['dir_site'].'/includes/search.inc.php'; ?>
<!-- Search End -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.barfiller.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>