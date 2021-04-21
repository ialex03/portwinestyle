<?php
@session_start();
$_SESSION['idioma']=$_POST['lang'];
header('Location:'.$_POST['url']);
?>