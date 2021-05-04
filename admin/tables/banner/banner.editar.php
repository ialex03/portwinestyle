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

if(isset($_POST["submit"])) {

    //imagem

    $target_dir= $arrSETTINGS['dir_site']."/img/shop/";
    $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $errorstring="";
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["imagem"]["tmp_name"]);


    if(basename($_FILES["imagem"]["name"])){

        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            ($errorstring!=""?$errorstring.="&":$errorstring="");
            $errorstring.="&img=false";
            
            
            $uploadOk = 0;
        }
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $errorstring.="&img=exists";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $errorstring.="&format=false";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            $errorstring.="&fileerror=true";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["imagem"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
                $errorstring.="&fileerror=true";
            }
        }
    }
    //imagem END

    //tabela banner
    if(strlen($_POST['route_botao'])>100){
        $errorstring.="&route_botaotoolong=true";
    }
    if(strlen($_POST['is_active'])>1){
        $errorstring.="&is_activetoolong=true";
    }
    //tabela banner END

    //tabela banner_idiomas
    if(strlen($_POST['texto'])>50){
        $errorstring.="&textotoolong=true";
    }
    if(strlen($_POST['texto_botao'])>20){
        $errorstring.="&texto_botaotoolong=true";
    }
    //tabela banner_idiomas END

    //Tabela banner

    if($errorstring == ""){

        $query = "UPDATE banner SET ";
        $string="";
        if(basename($_FILES["imagem"]["name"])!= ""){
            $string.="foto='".basename($_FILES["imagem"]["name"])."',";
        }
        if($_POST['route_botao']!= ""){
            $string.="route_botao='".$_POST['route_botao']."',";
        }
        
            $string.="is_active=".$_POST['is_active'].",";
        
        $string=substr($string, 0, strlen($string) - 1);

        $query.=$string." WHERE id=".$_POST['id'].";";

        if($string!=""){
            $confirm1=db_query($query);
        }

        //Tabela banner END

        //tabela banner_idiomas
        $query = "UPDATE banner_idiomas SET ";
        $string="";
        if($_POST['texto']!= ""){
            $string.="texto='".$_POST['texto']."',";
        }
        if($_POST['texto_botao']!= ""){
            $string.="texto_botao='".$_POST['texto_botao']."',";
        }
        $string=substr($string, 0, strlen($string) - 1);

            echo $query.=$string." WHERE idioma='".$_SESSION['idioma']."' AND id=".$_POST['id'].";";
            if($string!=""){
                $confirm2=db_query($query);
            
            }

        //tabela banner_idiomas END

        
        if($confirm1 || $confirm2){
            header('Location:'.$_POST['url'].'&success=true');

        }
    

    }else{
        header('Location:'.$_POST['url'].$errorstring);
    }
    
    

}else{
    header('Location:/portwinestyle/admin/tables.php?table=banner&img=toobig');
}
?>