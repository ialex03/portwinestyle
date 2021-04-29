<?php
require '/Applications/MAMP/htdocs/portwinestyle/includes/settings.inc.php';
@include $arrSETTINGS['dir_site'].'/includes/db.inc.php';
include $arrSETTINGS['dir_site_admin'].'/includes/functions.inc.php';
if(!isset($_SESSION['idioma'])) {
        $_SESSION['idioma'] = $idioma_default;
}  
db_connect();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$arrlinguas= array (
                      "pt"=>"Português",
                      "en"=>"Inglês",
                      "ru"=>"Russo",
                  );
if(isset($_POST["submit"])) {

    //imagem

    $target_dir= $arrSETTINGS['dir_site']."/img/hero/";
    $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $errorstring="";
    $nullstring="";
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
    }else{
        $nullstring.="&img=null";
    }
    //imagem END

    //tabela banner
    if(strlen($_POST['route_botao'])>100){
        $errorstring.="&route_botaotoolong=true";
    }
    //tabela banner END

    //tabela banner_idiomas
    foreach ($arrlinguas as $abrv=>$lingua) {
        $key='texto'.$abrv;
        if(strlen($_POST[$key])>50){
        $errorstring.="&".$key."toolong=true";
        }//fix this
        $key='texto_botao'.$abrv;
        if(strlen($_POST[$key])>20){
        $errorstring.="&".$key."toolong=true";
        }
    }
    //tabela banner_idiomas END

    //Tabela banner

    if($errorstring == ""){

        $query = "INSERT INTO `banner`(
            `route_botao`, 
            `foto`, 
            `is_active`) VALUES (";
        $string="";
        
        if($_POST['route_botao']!= ""){
            $string.="'".$_POST['route_botao']."',";
        }else{
            $string.="NULL,";
        }
        if(basename($_FILES["imagem"]["name"])!= ""){
            $string.="'".basename($_FILES["imagem"]["name"])."',";
        }else{
            $string.="NULL,";
        }
        
        
            $string.=$_POST['is_active'].",";
        
        $string=substr($string, 0, strlen($string) - 1);

        echo $query.=$string.");";

        if($string!=""){
            $confirm1=db_query($query);
        }
        $ok=1;

        //Tabela banner END
        foreach ($arrlinguas as $abrv=>$lingua) {


        //tabela banner_idiomas
         $query = "INSERT INTO `banner_idiomas`(
            `id`, 
            `idioma`, 
            `texto`, 
            `texto_botao`) VALUES (";
        $string="";
        
            $string.=$confirm1.",";
            $string.="'".$abrv."',";
        if($_POST['texto'.$abrv]!= ""){
            $string.="'".$_POST['texto'.$abrv]."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['texto_botao'.$abrv]!= ""){
            $string.="'".$_POST['texto_botao'.$abrv]."',";
        }else{
            $string.="NULL,";
        }
        $string=substr($string, 0, strlen($string) - 1);

        echo $query.=$string.");";
        $nullstring;

        //tabela banner_idiomas END

        if($string!=""){
            $confirm2=db_query($query);
            if($confirm2 && $ok=1){
                $ok=1;
            }else{
                $ok=0;
            }
            
        }
        
    }
    if($confirm1 || $ok){
           header('Location:'.$_POST['url'].'&insertsuccess=true');

    }
    
    

    }else{
        echo $errorstring;
        echo $nullstring;
        header('Location:'.$_POST['url'].$errorstring.$nullstring);
    }
    
    

}else{
    header('Location:/portwinestyle/admin/tables.php?table=banner&img=toobig');
}
?>