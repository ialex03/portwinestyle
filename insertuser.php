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
$stringMissing="?";
$nome=$_POST['nome'];
$nome_utilizador=$_POST['nome_utilizador'];
$palavra_passe=$_POST['palavra_passe'];
$palavra_passe_confirm=$_POST['palavra_passe_confirm'];
$email=$_POST['email'];
$juridico=($_POST['juridico']!=""?$_POST['juridico']:"NULL");
$comercial=($_POST['comercial']!=""?$_POST['comercial']:"NULL");
$telemovel=($_POST['telemovel']!=""?$_POST['telemovel']:"NULL");
$NIF=($_POST['NIF']!=""?$_POST['NIF']:"NULL");
$stringValues="&nome=".$nome."&nome_utilizador=".$nome_utilizador."&email=".$email."&juridico=".$juridico."&comercial=".$comercial."&telemovel=".$telemovel."&NIF".$NIF;

if (isset($_POST['concordado'])) {

    if ($palavra_passe!=$palavra_passe_confirm){
        $stringMissing.="passwordconfirmed=false";
        header('Location: register.php'.$stringMissing.$stringValues);
    }else{

        $stringPass="?";
        

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
    
    



        if($stringPass!="?"){

            header('Location: register.php'.$stringPass.$stringValues);

        }else{

        $nova_palavra_passe=password_hash($palavra_passe,PASSWORD_DEFAULT);
        $query="SELECT * FROM utilizadores WHERE is_active=1";
        $utilizadores=db_query($query);
        $stringExists="?";
        foreach ($utilizadores as $utilizador) {
            if ($utilizador['username']==$nome_utilizador) {
                ($stringExists!="?"?$stringExists.="&":$stringExists="?");
                $stringExists.="nome_utilizador_exists=true";
            }
            if ($utilizador['NIF']==$NIF && $NIF!="NULL") {
                ($stringExists!="?"?$stringExists.="&":$stringExists="?");
                $stringExists.="NIF_exists=true";
            }
            if ($utilizador['email']==$email) {
                ($stringExists!="?"?$stringExists.="&":$stringExists="?");
                $stringExists.="email_exists=true";
            }
        }
    }

        if ($stringExists=="?") {

                $query="INSERT INTO utilizadores (username, password, nome, endereco_juridico, endereco_comercial, email, telefone, NIF, is_active) 
                VALUES ('$nome_utilizador','$nova_palavra_passe','$nome','$juridico','$comercial','$email',".$telemovel.",".$NIF.",1)";
                $result=db_query($query);

                if ($result) {
                    header('Location: register.php?success=true');
                }

        }else{
            header('Location: register.php'.$stringExists.$stringValues);

        }
            
        
        
    }
    

}else {
    header('Location: register.php?agreed=false'.$stringValues);
}
?>