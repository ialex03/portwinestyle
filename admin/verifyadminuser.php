<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require '/Applications/MAMP/htdocs/portwinestyle/includes/settings.inc.php';
include_once $arrSETTINGS['dir_site'].'/includes/db.inc.php';
if(!isset($_SESSION['idioma'])) {
    $_SESSION['idioma'] = $idioma_default;
} 
if(!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
} 
include 'includes/languages/lang.'.$_SESSION['idioma'].'.inc.php';
db_connect();
function checkUnlocked(){
    $_SESSION['attempts'] += 1;
    $num_attempts=10;
 
    if($_SESSION['unlocked_on'] >= time() || $_SESSION['unlocked_on'] == 0) {
        if($_SESSION['attempts'] == $num_attempts)
            $_SESSION['unlocked_on'] = time() + 30;
    } else $_SESSION['attempts'] = 0;
}

$flagemail=false;
$flagpassword=false;
$stringMissing="?";
$palavra_passe=$_POST['loginPassword'];
$email=$_POST['loginUsername'];

$query="SELECT * FROM utilizadores_admin WHERE email='".$email."'";
$utilizador=db_query($query);

    if (password_verify ($palavra_passe,$utilizador[0]['password'])) {
        $flagpassword=true;
        $id=$utilizador[0]['id'];
        $_SESSION['useridadmin']=$id;
        header('Location: dashboard.php?success=true');
    }else{
        
        checkUnlocked();
        header('Location: login.php?success=false');
    }
?>