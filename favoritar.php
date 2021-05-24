<?php
require 'includes/settings.inc.php';
include $arrSETTINGS['dir_site'].'/includes/db.inc.php';
db_connect();
    @session_start();
        $idcat=$_GET['id'];
        $keyword=$_GET['keyword'];
        $page=$_GET['page'];
        $idfav=$_GET['idfav'];
        if(!strpos ($_SESSION['favorites_id'],$idfav)){
            $_SESSION['favorites_id'].=$idfav.";";
            $query="UPDATE produtos SET n_likes=n_likes+1 WHERE id=$idfav AND is_active=1";
            db_query($query);
        }
        if (!isset($_GET['url'])) {
            header('Location: produtos.php?id='.$idcat.'&keyword='.$keyword.'&page='.$page);
        }else {
            header('Location: '.$_GET['url']);
        }
        
        
?>