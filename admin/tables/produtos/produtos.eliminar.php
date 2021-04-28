<?php
require '/Applications/MAMP/htdocs/portwinestyle/includes/settings.inc.php';
@include $arrSETTINGS['dir_site'].'/includes/db.inc.php';
if(!isset($_SESSION['idioma'])) {
        $_SESSION['idioma'] = $idioma_default;
}  
db_connect();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


    $query="DELETE FROM parceiros WHERE id=".$_GET['id'];
    db_query($query);
    $query="DELETE FROM produtos_idiomas WHERE id=".$_GET['id']." AND idioma=".$_SESSION['idioma'];
    db_query($query);
    header('Location:/portwinestyle/admin/tables.php?table=produtos&deletesuccess=true');

?>