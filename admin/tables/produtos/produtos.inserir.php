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

    $target_dir= $arrSETTINGS['dir_site']."/img/shop/";
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

    //tabela produtos
    if(strlen($_POST['castas'])>200){
        $errorstring.="&castastoolong=true";
    }
    //tabela produtos END

    //tabela produtos_idiomas
    foreach ($arrlinguas as $abrv=>$lingua) {
        $key='nome'.$abrv;
        if($_POST[$key]==""){
            $nullstring.="&".$key."=null";

        }elseif(strlen($_POST[$key])>100){
        $errorstring.="&".$key."toolong=true";
        }//fix this
        $key='produtor'.$abrv;
        if($_POST[$key]==""){
            $nullstring.="&".$key."=null";

        }elseif(strlen($_POST[$key])>150){
        $errorstring.="&".$key."toolong=true";
        }
        $key='cor'.$abrv;
        if($_POST[$key]==""){
            $nullstring.="&".$key."=null";

        }elseif(strlen($_POST[$key])>100){
        $errorstring.="&".$key."toolong=true";
        }
        $key='designacao_origem'.$abrv;
        if($_POST[$key]==""){
            $nullstring.="&".$key."=null";

        }elseif(strlen($_POST[$key])>150){
        $errorstring.="&".$key."toolong=true";
        }
        $key='regiao'.$abrv;
        $field=$_POST[$key];
        if($_POST[$key]==""){
            $nullstring.="&".$key."=null";

        }elseif(strlen($_POST[$key])>150){
        $errorstring.="&".$key."toolong=true";
        }
        $key='pais'.$abrv;
        if($_POST[$key]==""){
            $nullstring.="&".$key."=null";

        }elseif(strlen($_POST[$key])>100){
        $errorstring.="&".$key."toolong=true";
        }
        $key='solo'.$abrv;
        if($_POST[$key]==""){
            $nullstring.="&".$key."=null";

        }elseif(strlen($_POST[$key])>50){
        $errorstring.="&".$key."toolong=true";
        }
    }
    echo "here:".$nullstring;
    //tabela produtos_idiomas END

    //Tabela produtos

    if($errorstring == ""){

        $query = "INSERT INTO `produtos`(
            `foto`, 
            `ano_colheita`, 
            `castas`, 
            `graduacao_alcoolica`, 
            `acidez`, 
            `acucar`, 
            `temperatura_consumo`, 
            `n_likes`, 
            `views`, 
            `id_categoria`, 
            `is_active`) VALUES (";
        $string="";

        if(basename($_FILES["imagem"]["name"])!= ""){
            $string.="'".basename($_FILES["imagem"]["name"])."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['ano_colheita']!= ""){
            $string.=$_POST['ano_colheita'].",";
        }else{
            $string.="NULL,";
        }
        if($_POST['castas']!= ""){
            $string.="'".$_POST['castas']."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['graduacao_alcoolica']!= ""){
            $string.="'".$_POST['graduacao_alcoolica']." % vol',";
        }else{
            $string.="NULL,";
        }
        if($_POST['acidez']!= ""){
            $string.="'".$_POST['acidez']." g/l',";
        }else{
            $string.="NULL,";
        }
        if($_POST['acucar']!= ""){
            $string.="'".$_POST['acucar']." g/l',";
        }else{
            $string.="NULL,";
        }
        if($_POST['temperatura_consumo']!= ""){
            $string.="'".$_POST['tempmin']."-".$_POST['tempmax']." °C',";
        }else{
            $string.="NULL,";
        }
        $string.="0,0,";
        if($_POST['categoria']!= ""){
            $string.=$_POST['categoria'].",1,";
        }
        $string=substr($string, 0, strlen($string) - 1);

        echo $query.=$string.");";

        if($string!=""){
            $confirm=db_query($query);
        }

        //Tabela produtos END
        foreach ($arrlinguas as $abrv=>$lingua) {

        //tabela produtos_idiomas
         $query = "INSERT INTO `produtos_idiomas`(
            `id`, 
            `idioma`, 
            `nome`, 
            `produtor`, 
            `cor`, 
            `designacao_origem`, 
            `pais`, 
            `regiao`, 
            `solo`, 
            `processo_vinificacao`, 
            `notas_prova`, 
            `info_adicional`) VALUES (";
        $string="";
        
            $string.=$confirm.",";
            $string.="'".$abrv."',";
        if($_POST['nome']!= ""){
            $string.=$_POST['nome'].",";
        }else{
            $string.="NULL,";
        }
        if($_POST['produtor']!= ""){
            $string.="'".$_POST['castas']."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['cor']!= ""){
            $string.="'".$_POST['cor']."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['designacao_origem']!= ""){
            $string.="'".$_POST['designacao_origem']."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['pais']!= ""){
            $string.="'".$_POST['pais']."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['regiao']!= ""){
            $string.="'".$_POST['regiao']."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['solo']!= ""){
            $string.="".$_POST['solo'].",";
        }else{
            $string.="NULL,";
        }
        if($_POST['processo_vinificacao']!= ""){
            $string.="'".$_POST['processo_vinificacao']."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['notas_prova']!= ""){
            $string.="'".$_POST['notas_prova']."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['info_adicional']!= ""){
            $string.="'".$_POST['info_adicional']."',";
        }else{
            $string.="NULL,";
        }
        $string=substr($string, 0, strlen($string) - 1);

        echo $query.=$string.");";
        echo $nullstring;
        

        //tabela produtos_idiomas END

        if($string!=""){
            $confirm=db_query($query);
            
        }
    }
    header('Location:'.$_POST['url'].'&success=true'.$nullstring);
    

    }else{
        echo $errorstring;
        echo $nullstring;
        header('Location:'.$_POST['url'].$errorstring.$nullstring);
    }
    
    

}else{
    echo "error";
}
?>