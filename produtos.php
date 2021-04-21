<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function writeClassSearchViewType($tipo){
    switch ($tipo) {
        case 1:
            $class='col-lg-3 col-md-6 col-sm-6';
            break;
        
        case 2:
            $class='col-6';
            break;
    }
    return $class;
}

require 'includes/settings.inc.php';
@session_start();
include $arrSETTINGS['dir_site'].'/includes/db.inc.php';
db_connect();

$idcat=$_GET['id'];
$keyword=$_GET['keyword'];
$url = $_SERVER['REQUEST_URI'];

if(!isset($_SESSION['idioma'])) {
    $_SESSION['idioma'] = $idioma_default;
} 

include 'includes/languages/lang.'.$_SESSION['idioma'].'.inc.php';


if(!isset($_SESSION['favorites_id'])) {
    $_SESSION['favorites_id'] = ';';
}



if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    // cast var as int
    $page = (int) $_GET['page'];
} else {
    // default page num
    $page = 1;
} // end if

if(isset($_GET['page'])) {
    $_SESSION['page'] = $_GET['page'];
    if (strlen($_GET['page'])==1) {
        $takeaway=7;
    }
    else {
        $takeaway=8;
    }
    $url = substr($url, 0, strlen($url) - $takeaway);
    
}



//echo $_SERVER['REQUEST_URI'];
if(isset($_GET['tipo'])) {
    $_SESSION['searchViewType'] = $_GET['tipo'];
    $url = substr($url, 0, strlen($url) - 7);
    
}

if(!isset($_SESSION['searchOrderType'])) {
    $_SESSION['searchOrderType'] = 1;
}

switch($_SESSION['searchOrderType']) {
    case 0: $strSearchOrderBy = '';
            break;
    case 1: $strSearchOrderBy = 'ORDER BY views DESC';
            break;
    case 2: $strSearchOrderBy = 'ORDER BY nome ASC';
            break;
    case 3: $strSearchOrderBy = 'ORDER BY nome DESC';
            break;
}

//se o user selecionou uma categoria
if($idcat){

$query="SELECT * FROM produtos A INNER JOIN produtos_idiomas B ON A.id=B.id WHERE A.is_active=1 AND B.idioma='$_SESSION[idioma]' AND A.id_categoria=$idcat ".$strSearchOrderBy." LIMIT 0,12";
$arrProdutos=db_query($query);
}
else{//senão, apenas buscará produtos aleatórios
$query="SELECT * FROM produtos A INNER JOIN produtos_idiomas B ON A.id=B.id WHERE A.is_active=1 AND B.idioma='$_SESSION[idioma]' ".$strSearchOrderBy." LIMIT 0,12";
$arrProdutos=db_query($query);
}
//se houver uma keyword, os elementos que contêm a keyword, são guardados nosso array de produtos

$numMinChar=3;

$arrSearch = explode(' ', $keyword);
foreach($arrSearch as $k => $v) {
    if(strlen($v) < $numMinChar) {
        unset($arrSearch[$k]);
        $flag_erro = 1;
    }
    else{
        $flag_erro = 0;
    }
}

$strSearch="";

$arrTabelasIdiomas=array('produtos'=>array('ano_colheita',
                                    'castas',
                                    'graduacao_alcoolica',
                                    'acidez','acucar',
                                    'temperatura_consumo',
                                    'nome',
                                    'produtor',
                                    'cor',
                                    'designacao_origem',
                                    'pais',
                                    'regiao',
                                    'solo',
                                    'processo_vinificacao',
                                    'notas_prova',
                                    'info_adicional',
                                    'id_categoria'));

                    
        
foreach ($arrTabelasIdiomas as $nome_tabela=>$tabela) {
    $strSearch.="SELECT * FROM ".$nome_tabela." A INNER JOIN ".$nome_tabela."_idiomas B ON A.id=B.id WHERE ";

    if ($keyword) {
        $strSearch.="(";
        foreach ($tabela as $campo) {
            foreach($arrSearch as $k => $v) {
                $strSearch.= $campo . ' LIKE ' . "'%" . $arrSearch[$k] . "%' OR ";
            }
        }
        $strSearch = substr($strSearch, 0, strlen($strSearch) - 4);
        $strSearch.=") AND";
    }
    
    
    $strSearch.=" B.idioma='$_SESSION[idioma]'".($idcat? " AND id_categoria=".$idcat: '').' '.$strSearchOrderBy;

}

$arrregistos=db_query($strSearch);
$numregistos=count($arrregistos);
$registosporpagina = 8;
$totalpages = ceil($numregistos / $registosporpagina);

if ($page > $totalpages) {
    // set current page to last page
    $page = $totalpages;
} // end if
if ($page < 1) {
// set current page to first page
$page = 1;
} // end if

$offset = ($page - 1) * $registosporpagina;

//die($strSearch);
$strLimit=" LIMIT ".$offset.",".$registosporpagina;
$strSearch.=$strLimit;
//echo $strSearch."<br>";
$arrPesquisa=db_query($strSearch);
//print_r($arrPesquisa);
$arrProd=$arrPesquisa;
//print_r($arrProd);

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portline - <?php echo $arrLang['produtos']?></title>
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
                        <h2><?php echo $arrLang['produtos']?></h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./home.php"><?php echo $arrLang['home']?></a>
                        <span><?php echo $arrLang['produtos']?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    
    <?php
    $query="SELECT * FROM categorias A INNER JOIN categorias_idiomas B ON A.id=B.id WHERE B.idioma='$_SESSION[idioma]'";
    $arrcat=db_query($query);

    ?>
    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="shop__option">
                <div class="row">


                    <div class="col-lg-7 col-md-7">
                        <div class="shop__option__search">

                        <?php include $arrSETTINGS['dir_site'].'/includes/searchcatkeyword.inc.php'; ?>

                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">

                    <?php include $arrSETTINGS['dir_site'].'/includes/order.inc.php'; ?>

                    </div>

                </div>
            </div>
            <div class="row">
                
            <?php 
            $flag_related=false;
            include $arrSETTINGS['dir_site'].'/includes/produtos.inc.php'; 
            ?>
            
            </div>
            <?php
            if(empty($arrProd)){
                echo "<h2>".$arrLang['search_not_found']."</h2><br>";
                echo "<h6>".$arrLang['search_troubleshoot']."</h6>";
            }
            else{
            ?>

            
            <div class="shop__last__option">
                <div class="row">
                        <?php
                        include $arrSETTINGS['dir_site'].'/includes/pagination.inc.php'; 
                        ?>
                </div>
            </div>
            <?php
            }
            ?>

            </div>
        </div>
    </section>
    
    <!-- Shop Section End -->

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