<?php
    @session_start();
        $idcat=$_GET['idcat'];
        $keyword=$_GET['keyword'];
        $page=$_GET['page'];
        $idfav=$_GET['idfav'];
        $search=$idfav.";";
        if(strpos ($_SESSION['favorites_id'],$idfav)){
            $_SESSION['favorites_id']=str_replace($search,"",$_SESSION['favorites_id']);
        }
        if (!isset($_GET['oncart'])) {
            header('Location: produtos.php?id='.$idcat.'&keyword='.$keyword.'&page='.$page);
        }
        else{
            header('Location: favoritos.php');
        }
        
        
        
?>