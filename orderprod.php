<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require 'includes/settings.inc.php';
    
@session_start();
include $arrSETTINGS['dir_site'].'/includes/db.inc.php';
db_connect();
if(!isset($_SESSION['idioma'])) {
    $_SESSION['idioma'] = $idioma_default;
}  
include 'includes/languages/lang.'.$_SESSION['idioma'].'.inc.php';
db_connect();

if ($_GET['idfavorites']!=";") {
    if (!isset($_SESSION['userid'])) {
        header("Location: login.php?nologin=true");
    }else{

        $query="INSERT INTO `encomendas`(`data_hora`, `id_utilizador`, `is_active`) VALUES ('".date('Y-m-d H:i:s')."',".$_SESSION['userid'].",1)";
        $idencomenda=db_query($query);
        $arrFavorites=explode(";",$_GET['idfavorites']);
        $arrFavorites= array_slice($arrFavorites, 1, -1);
        $query="";
        $success="";
        foreach ($arrFavorites as $prodid) {
        $query="INSERT INTO `linhas_encomenda`(`id_produto`, `id_encomenda`, `quantidade`, `id_contrato`, `estado`) VALUES ($prodid,$idencomenda,NULL,NULL,1)";
        $success.=db_query($query);
        }
        


        if($success){
        header("Location: favoritos.php?success=true");
        }else{
        header("Location: favoritos.php?success=false");
        }


    }

}
?>