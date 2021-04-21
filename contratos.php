<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require 'includes/settings.inc.php';
include $arrSETTINGS['dir_site'].'/includes/db.inc.php';
if(!isset($_SESSION['idioma'])) {
    $_SESSION['idioma'] = $idioma_default;
} 
include 'includes/languages/lang.'.$_SESSION['idioma'].'.inc.php';

function orderstate($estado){
    switch ($estado) {
        case 0:
            return 0;
            break;
        case 1:
            return "finalizada";
            break;
        case 2:
            return "em progresso";
            break;
    }
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
    <title>Portline - <?php echo $arrLang['encomendas']?></title>

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

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2><?php echo $arrLang['encomendas']?></h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="<?php echo include $arrSETTINGS['url_site'];?>/home.php">Home</a>
                        <a href="<?php echo include $arrSETTINGS['url_site'];?>/perfil.php"><?php echo $arrLang['perfil'];?></a>
                        <span><?php echo $arrLang['encomendas']?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <?php
    
    $query="SELECT * FROM encomendas WHERE id_utilizador=".$_SESSION['userid'];
    $arrEncomendas=db_query($query);
    if(isset($arrEncomendas[0])){
        foreach($arrEncomendas as $encomenda){
    ?>

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                        <h2><?php echo $arrLang['encomenda']?> <?php echo $encomenda['data_hora'];?></h2>
                </div>
            </div>
        </div>
    </div>
    <?php
    $query="SELECT * FROM linhas_encomenda WHERE id_encomenda=".$encomenda['id']." ORDER BY estado";
    $arrids=db_query($query);

    ?>
    <!-- Wishlist Section Begin -->
    <section class="wishlist spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wishlist__cart__table">

                        <table>
                            <thead>
                                <tr>
                                    <th><?php echo $arrLang['produtos']?></th>
                                    <th><?php echo $arrLang['quantidade']?></th>
                                    <th><?php echo $arrLang['estado']?></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                                foreach ($arrids as $prodid) {
                                    $query="SELECT * FROM produtos A INNER JOIN produtos_idiomas B ON A.id=B.id WHERE A.is_active=1 AND B.idioma='$_SESSION[idioma]' AND A.id=".$prodid['id_produto'];
                                    $arrProduto=db_query($query);
                                    $query="SELECT * FROM linhas_encomenda WHERE id_encomenda=".$encomenda['id']." AND id_produto=".$prodid['id_produto'];
                                    $arrLinha=db_query($query);
                                    if($arrLinha[0]['estado']!=0){
                            ?>
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="img/shop/<?php echo $arrProduto[0]['foto']?>" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6><?php echo $arrProduto[0]['nome']?></h6>
                                        </div>
                                    </td>
                                    <td class="cart__price"><?php echo $arrLinha[0]['quantidade']?></td>
                                    <td class="cart__stock"><?php echo $arrLang[orderstate($arrLinha[0]['estado'])]?></td>
                                    <?php
                                    if (isset($arrLinha[0]['contrato'])) {
                                    ?>

                                    <td class="cart__btn"><a href="<?php echo include $arrSETTINGS['dir_site'];?>/Docs/"<?php echo $arrLinha[0]['contrato'];?>" class="primary-btn">contrato</a></td>
                                    <?php
                                    }
                                    ?>

                                    <!-- Modal -->
                                    
                                </tr>
                                <?php
                                    }

                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Wishlist Section End -->
    <?php
    }
    }else{

    ?>
    <section class="shop spad">
        <div class="container">
            <div class="row">
                
                        
            </div>
            <?php
                echo "<h2>Uh oh!</h2><br>";
                echo "<h6>".$arrLang['order_view_troubleshoot']."</h6>";
            ?>
            </div>
        
    </section>
    



    <?php
    }
    ?>

    

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