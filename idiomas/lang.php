<?php
@session_start();
$_SESSION['idioma'] = $_GET['id'];
header('Location: index.php');
?>