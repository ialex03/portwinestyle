<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require 'includes/settings.inc.php';
include_once $arrSETTINGS['dir_site'].'/includes/db.inc.php';
if(!isset($_SESSION['idioma'])) {
    $_SESSION['idioma'] = $idioma_default;
} 
include 'includes/languages/lang.'.$_SESSION['idioma'].'.inc.php';
db_connect();
$admin=$_POST['admin'];
$stringMissing="?";
$palavra_passe=($admin?$_POST['loginUsername']:$_POST['palavra_passe']);
$palavra_passe_confirm=($admin?$_POST['loginPassword']:$_POST['palavra_passe_confirm']);
$email=$_POST['email'];




    if ($palavra_passe!=$palavra_passe_confirm){
        $stringMissing.="passwordconfirmed=false";
        header('Location: '.($admin?"admin/":"").'reset'.($admin?"admin":"").'.php'.$stringMissing."&selector=".$_POST['selector']."&validator=".$_POST['validator']);
    }else{

        $stringPass="?";
        if($palavra_passe!=""){

            if(strlen($palavra_passe)<8){
                ($stringPass!="?"?$stringPass.="&":$stringPass="?");
                $stringPass.="tooshort=true";
            }
            if(strlen($palavra_passe)>20){
                ($stringPass!="?"?$stringPass.="&":$stringPass="?");
                $stringPass.="toolong=true";
            }
            
            $blacklistChars = '"%\'*;<>?^`{|}~/\\#=&';
            $pattern = preg_quote($blacklistChars, '/');
            if(!preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $palavra_passe)){
                ($stringPass!="?"?$stringPass.="&":$stringPass="?");
                $stringPass.="nosc=true";
            }
            if(!preg_match('/[a-z]/',$palavra_passe)){
                ($stringPass!="?"?$stringPass.="&":$stringPass="?");
                $stringPass.="nolc=true";
            }
            if(!preg_match('/[A-Z]/',$palavra_passe)){
                ($stringPass!="?"?$stringPass.="&":$stringPass="?");
                $stringPass.="nouc=true";
            }
        }
    
    

        

    if($stringPass=="?"){

        

        $nova_palavra_passe=password_hash($palavra_passe,PASSWORD_DEFAULT);
        $query="SELECT * FROM utilizadores".($admin?"_admin":"")." WHERE is_active=1 AND email=".$email;
        $utilizador=db_query($query);

        


                $query="UPDATE utilizadores".($admin?"_admin":"")." SET 
                password='".$nova_palavra_passe."' WHERE email='".$email."'";
                $result=db_query($query);

                if ($result) {
                    $query="DELETE FROM password_reset WHERE email='".$email."'";
                    db_query($query);
                    header('Location: '.($admin?"admin/":"").'reset'.($admin?"admin":"").'.php?success=true&email='.$email);
                }
    }else{
        header('Location: '.($admin?"admin/":"").'reset'.($admin?"admin":"").'.php'.$stringPass."&selector=".$_POST['selector']."&validator=".$_POST['validator']);
    }
}
            
        
       
    

?>