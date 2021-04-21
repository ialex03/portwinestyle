<?php
    

        $idcat=$_POST['categoria'];
        $keyword=$_POST['keyword'];
        //header('Location:'.$_POST['url']);
        header('Location: produtos.php?id='.$idcat.'&keyword='.$keyword.'&page=1');

    
?>