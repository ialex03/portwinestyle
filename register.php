<?php
require 'includes/settings.inc.php';
include $arrSETTINGS['dir_site'].'/includes/db.inc.php';
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
    <title>Portline - <?php echo $arrLang['register']?></title>
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
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
            
            <?php 
            if (isset($_GET['success'])) {
               echo '
               <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="checkout__title">'.$arrLang['register'].'</h6>
                    </div>
                </div>';
                echo'<div class="checkout__input__checkbox">
                        <div class="success">
                            <p>'.$arrLang["registo_successo"].'</p>
                        </div>
                    </div>';
            }else{
            ?>
            
            
                


                <form action="insertuser.php" Method="POST">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title"><?php echo $arrLang['register'];?></h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p><?php echo $arrLang['nome'];?><span>*</span></p>
                                        <input type="text" name="nome" value="<?php echo (isset($_GET['nome'])?$_GET['nome']:'');?>" required>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="row">
                            <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p><?php echo $arrLang['nome_utilizador'];?><span>*</span></p>
                                        <input type="text" name="nome_utilizador" value="<?php echo (isset($_GET['nome_utilizador'])?$_GET['nome_utilizador']:'');?>" required>
                                        
                                    </div>
                                </div>
                            </div>
                            <?php
                            if(isset($_GET['nome_utilizador_exists'])){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>'.$arrLang["ja existe utilizador"].'</p>
                                </div>
                                </div>';
                            }
                            ?>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p><?php echo $arrLang['palavra-passe'];?><span>*</span></p>
                                        <input type="password" name="palavra_passe"required>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p><?php echo $arrLang['confirmar']." ".$arrLang['palavra-passe'];?><span>*</span></p>
                                        <input type="password" name="palavra_passe_confirm" required>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if(isset($_GET['passwordconfirmed'])){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>'.$arrLang["palavras-passes não iguais"].'</p>
                                </div>
                                </div>';
                            }
                            ?>
                            <?php
                            if(isset($_GET['tooshort'])){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>'.$arrLang["demasiado curta"].'</p>
                                </div>
                                </div>';
                            }
                            ?>
                            <?php
                            if(isset($_GET['toolong'])){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>'.$arrLang["demasiado comprida"].'</p>
                                </div>
                                </div>';
                            }
                            ?>
                            <?php
                            if(isset($_GET['nosc'])){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>'.$arrLang["sem caracter especial"].'</p>
                                </div>
                                </div>';
                            }
                            ?>
                            <?php
                            if(isset($_GET['nolc'])){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>'.$arrLang["sem minuscula"].'</p>
                                </div>
                                </div>';
                            }
                            ?>
                            <?php
                            if(isset($_GET['nouc'])){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>'.$arrLang["sem maiuscula"].'</p>
                                </div>
                                </div>';
                            }
                            ?>
                            <div class="checkout__input__checkbox">
                                <div class="ppnotice">
                                <p><?php echo $arrLang['requisitos_palavra_passe'];?></p>
                                </div>
                            </div>
                            
                            <div class="checkout__input">
                                <p><?php echo $arrLang['endereco'];?><span></span></p>
                                <input type="text" placeholder="Jurídico" class="checkout__input__add" name="juridico"  value="<?php echo ((isset($_GET['juridico']) or $_GET['juridico']!="NULL")?$_GET['juridico']:'');?>">
                                <input type="text" placeholder="Comercial"class="checkout__input__add" name="comercial" value="<?php echo ((isset($_GET['comercial']) or $_GET['comercial']!="NULL")?$_GET['comercial']:'');?>">
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p><?php echo $arrLang['telemovel'];?><span></span></p>
                                        <input type="tel" name="telemovel" value="<?php echo ((isset($_GET['telemovel']) or $_GET['telemovel']!="NULL")?$_GET['telemovel']:'');?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p><?php echo $arrLang['email'];?><span>*</span></p>
                                        <input type="email" name="email" value="<?php echo (isset($_GET['email'])?$_GET['email']:'');?>"required>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if(isset($_GET['email_exists'])){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>'.$arrLang["ja existe email"].'</p>
                                </div>
                                </div>';
                            }
                            ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p><?php echo $arrLang['NIF'];?><span></span></p>
                                        <input type="text" name="NIF" value="<?php echo ((isset($_GET['NIF']) or $_GET['NIF']!="NULL")?$_GET['NIF']:'');?>">
                                    </div>
                                </div>
                            </div>
                            <?php
                            if(isset($_GET['NIF_exists'])){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>'.$arrLang["ja existe NIF"].'</p>
                                </div>
                                </div>';
                            }
                            ?>
                            <div class="checkout__input__checkbox">
                                <p><?php echo $arrLang['campos obrigatorios'];?></p>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                <?php echo $arrLang['concordo com os termos de utilização'];?>
                                    <input type="checkbox" id="diff-acc" name="concordado">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <?php
                            if(isset($_GET['agreed'])){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>'.$arrLang["nao concordou com os termos"].'</p>
                                </div>
                                </div>';
                            }
                            ?>
                            <input type="hidden" name="comando" value="INSERT">
                            <button type="submit" class="site-btn"><?php echo $arrLang['register'];?></button>
                            
                        </div>
                        <!--
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
                            </div>
                        </div>-->
                        
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