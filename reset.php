<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
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
    <title>Portline - <?php echo $arrLang['forgotpassword'];?></title>
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
    <?php
// Get tokens
if(isset($_GET['selector'])){
$query = "SELECT * FROM password_reset WHERE selector = '".$_GET['selector']."' AND expires >= ".time();
$results=db_query($query);
}



if ( empty( $results ) && isset($_GET['selector']) ) {
    echo 'There was an error processing your request. Error Code: 002';
}else if(isset($_GET['selector'])){
$auth_token = $results[0]['token'];
$calc = hash('sha256', hex2bin($_GET['validator']));
}
// Validate tokens

    
    
    
    
    /*if ( $update == true ) {
        // New password. New session.
        session_destroy();
    
        return array('status'=>1,'message'=>'Password updated successfully. <a href="index.php">Login here</a>');
    }*/

?>
    <!-- Checkout Section Begin -->
   

    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
            <?php
            if (isset($_GET['success']) && $_GET['success']=="true") {

               echo '<div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="checkout__title">'.$arrLang['alterarpassword'].'</h6>
                    </div>
                </div>';
                echo'<div class="checkout__input__checkbox">
                        <div class="success">
                            <p>'.$arrLang["passalterada"].'</p>'?>
                            <a href="<?php echo $arrSETTINGS['url_site']?>login.php"><?php echo $arrLang['login']?></a>
                        </div>
                    </div>
                    <?php
            $query="DELETE FROM password_reset WHERE email='".$_GET['email']."'";
            db_query($query);
            }else{
                if((isset($auth_token) && isset($calc))){
                    if ( hash_equals( $calc, $auth_token ) )  {
                        $user = isset($results[0]['email']);
                            if ( false === $user ) {
                                return array('status'=>0,'message'=>'There was an error processing your request. Error Code: 003');
                            }

            ?>
            
                <form action="updatepassword.php" method="POST">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <h6 class="checkout__title"><?php echo $arrLang['alterarpassword'];?></h6>
                            <div class="row">
                                
                                <div class="col">
                                    <div class="checkout__input">
                                        <p><?php echo $arrLang['palavra-passe'];?><span>*</span></p>
                                        <input type="password" name="palavra_passe"required>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="checkout__input">
                                        <p><?php echo $arrLang['confirmar']." ".$arrLang['palavra-passe'];?><span>*</span></p>
                                        <input type="password" name="palavra_passe_confirm" required>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="email" value="<?php echo $results[0]['email']?>">
                            <input type="hidden" name="selector" value="<?php echo $_GET['selector']?>">
                            <input type="hidden" name="validator" value="<?php echo $_GET['validator']?>">
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
                                

                            <button type="submit" class="site-btn"><?php echo $arrLang['enviar'];?></button>
                            
                        </div>
                        
                        
                    </div>
                </form>
                <?php
            }
        }
    }
                ?>
            </div>
        </div>
    </section>
    <?php
    
    
    
    ?>
    <!-- Checkout Section End -->
    

<?php ?>
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