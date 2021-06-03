<?php
require 'includes/settings.inc.php';
include $arrSETTINGS['dir_site'].'/includes/db.inc.php';
@session_start();
if (!isset($_SESSION['unlocked_on'])){
    $_SESSION['unlocked_on']=0;
}
if (!isset($_SESSION['attempts'])){
    $_SESSION['attempts']=0;
}
if(!isset($_SESSION['idioma'])) {
    $_SESSION['idioma'] = $idioma_default;
}
include 'includes/languages/lang.'.$_SESSION['idioma'].'.inc.php';
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
    <title>Portline - <?php echo $arrLang['login'];?></title>
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
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- MENUS (Off Canvas & Normal) -->
    <?php include $arrSETTINGS['dir_site'].'/includes/offcanvasmenu.inc.php'; ?>
    <header class="header">
        <?php include $arrSETTINGS['dir_site'].'/includes/headertop.inc.php'; ?>
        <?php include $arrSETTINGS['dir_site'].'/includes/menu.inc.php'; ?>
    </header>

    <!-- Breadcrumb Begin
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Login</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <?php
    if(isset($_GET['nologin']) && $_GET['nologin']=="true"){
    ?>
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <div class="container">
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col-8">
                    
            <?php
                echo "<h2>Uh oh!</h2><br>";
                echo "<h6>".$arrLang['order_troubleshoot']."</h6>";
            ?>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    
    <?php
    }

    ?>

    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
            <?php
            if (isset($_GET['success']) && $_GET['success']=="true") {

               echo '<div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="checkout__title">'.$arrLang['login'].'</h6>
                    </div>
                </div>';
                echo'<div class="checkout__input__checkbox">
                        <div class="success">
                            <p>'.$arrLang["login_sucesso"].'</p>
                        </div>
                    </div>';
            }else{
            ?>
                <form action="verifyuser.php" method="POST">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <h6 class="checkout__title"><?php echo $arrLang['login'];?></h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p><?php echo $arrLang['email'];?><span></span></p>
                                        <input type="text" name="email" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p><?php echo $arrLang['palavra-passe'];?><span></span></p>
                                        <input type="password" name="palavra_passe" required>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if(isset($_GET['success']) && $_GET['success']=="false"){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>'.$arrLang["password ou email incorreto"].'</p>
                                </div>
                                </div>';
                            }
                            ?>
                            <?php
                            if(isset($_SESSION['attempts']) && $_SESSION['attempts']>=2){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>'.$arrLang["demasiadas tentativas"].'</p>
                                </div>
                                </div>';
                            }
                            ?>
                            <div class="forgotpassword">
                            <a href="<?php echo $arrSETTINGS['url_site']?>recover.php">Esqueceu-se da palavra-passe?</a>
                            </div>

                            
                            <button type="submit" class="site-btn"><?php echo $arrLang['login'];?></button>
                            <!--<div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Name<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Username<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add">
                                <input type="text" placeholder="Apartment, suite, unite ect (optinal)">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Create an account?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                                <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            </div>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Note about your order, e.g, special noe for delivery
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text"
                                placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h6 class="order__title">Your order</h6>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    <li><samp>01.</samp> Vanilla salted caramel <span>$ 300.0</span></li>
                                    <li><samp>02.</samp> German chocolate <span>$ 170.0</span></li>
                                    <li><samp>03.</samp> Sweet autumn <span>$ 170.0</span></li>
                                    <li><samp>04.</samp> Cluten free mini dozen <span>$ 110.0</span></li>
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span>$750.99</span></li>
                                    <li>Total <span>$750.99</span></li>
                                </ul>
                                <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>-->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <h6 class="checkout__title"><?php echo $arrLang['register'];?></h6>
                            <p><?php echo $arrLang['ainda nao tem conta']?></p>
                            <a href="<?php echo $arrSETTINGS['url_site']?>register.php" class="site-btn"><?php echo $arrLang['register'];?></a>
                        </div>
                        
                        
                    </div>
                </form>
                <?php
            }
                ?>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

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