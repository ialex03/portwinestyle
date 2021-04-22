<?php
require '/Applications/MAMP/htdocs/portwinestyle/includes/settings.inc.php';
@include $arrSETTINGS['dir_site'].'/includes/db.inc.php';
db_connect();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if(isset($_POST["submit"])) {
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

    if(strlen($_POST['castas'])>200){
        $errorstring.="&castastoolong=true";
    }
    if($errorstring == ""){

        $query = "UPDATE produtos SET ";
        $string="";
        if(basename($_FILES["imagem"]["name"])!= ""){
            $string.="foto='".basename($_FILES["imagem"]["name"])."',";
        }
        if($_POST['ano_colheita']!= ""){
            $string.="ano_colheita=".$_POST['ano_colheita'].",";
        }
        if($_POST['castas']!= ""){
            $string.="castas='".$_POST['castas']."',";
        }
        if($_POST['graduacao_alcoolica']!= ""){
            $string.="graduacao_alcoolica='".$_POST['graduacao_alcoolica']." % vol',";
        }
        if($_POST['acidez']!= ""){
            $string.="acidez='".$_POST['acidez']." g/l',";
        }
        if($_POST['acucar']!= ""){
            $string.="acucar='".$_POST['acucar']." g/l',";
        }
        if($_POST['temperatura_consumo']!= ""){
            $string.="temperatura_consumo='".$_POST['tempmin']."-".$_POST['tempmax']." °C',";
        }
        if($_POST['categoria']!= 0){
            $string.="id_categoria=".$_POST['categoria'].",";
        }
        $string=substr($string, 0, strlen($string) - 1);

        $query.=$string." WHERE id=".$_POST['id'].";";

        if($string!=""){
            $confirm=db_query($query);
            header('Location:'.$_POST['url'].'&success=true');
        }
    

    }else{
        header('Location:'.$_POST['url'].$errorstring);
    }
    
    

}else{
    echo "error";
}
?>