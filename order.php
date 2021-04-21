<?php
    @session_start();
    $_SESSION['searchOrderType']=$_POST['order'];
    header('Location:'.$_POST['url']);
?>