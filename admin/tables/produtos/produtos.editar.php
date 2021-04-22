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

    //tabela produtos
    if(strlen($_POST['castas'])>200){
        $errorstring.="&castastoolong=true";
    }
    //tabela produtos END

    //tabela produtos_idiomas
    if(strlen($_POST['nome'])>100){
        $errorstring.="&nometoolong=true";
    }
    if(strlen($_POST['produtor'])>150){
        $errorstring.="&produtortoolong=true";
    }
    if(strlen($_POST['desginacao_origem'])>150){
        $errorstring.="&desginacao_origemtoolong=true";
    }
    if(strlen($_POST['regiao'])>150){
        $errorstring.="&regiaotoolong=true";
    }
    if(strlen($_POST['pais'])>100){
        $errorstring.="&paistoolong=true";
    }
    if(strlen($_POST['solo'])>50){
        $errorstring.="&solotoolong=true";
    }
    //tabela produtos_idiomas END

    //Tabela produtos

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
        }

        //Tabela produtos END

        //tabela produtos_idiomas
        $query = "UPDATE produtos_idiomas SET ";
        $string="";
        if($_POST['nome']!= ""){
            $string.="nome=".$_POST['nome'].",";
        }
        if($_POST['produtor']!= ""){
            $string.="castas='".$_POST['castas']."',";
        }
        if($_POST['cor']!= ""){
            $string.="cor='".$_POST['cor']."',";
        }
        if($_POST['designacao_origem']!= ""){
            $string.="designacao_origem='".$_POST['designacao_origem']."',";
        }
        if($_POST['pais']!= ""){
            $string.="pais='".$_POST['pais']."',";
        }
        if($_POST['regiao']!= ""){
            $string.="regiao='".$_POST['regiao']."',";
        }
        if($_POST['solo']!= ""){
            $string.="solo=".$_POST['solo'].",";
        }
        if($_POST['processo_vinificacao']!= ""){
            $string.="processo_vinificacao=".$_POST['processo_vinificacao'].",";
        }
        if($_POST['notas_prova']!= ""){
            $string.="notas_prova=".$_POST['notas_prova'].",";
        }
        if($_POST['info_adicional']!= ""){
            $string.="info_adicional=".$_POST['info_adicional'].",";
        }
        $string=substr($string, 0, strlen($string) - 1);

        $query.=$string." WHERE idioma='".$_SESSION['idioma']."' AND id=".$_POST['id'].";";

        //tabela produtos_idiomas END

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