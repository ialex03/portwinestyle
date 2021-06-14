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
    if($_POST['castas']==""){
            $nullstring.="&castas=null";

    }elseif(strlen($_POST['castas'])>200){
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
            $nullstring.="&img=null";
        }
        if($_POST['ano_colheita']!= ""){
            $string.=$_POST['ano_colheita'].",";
        }else{
            $string.="NULL,";
            $nullstring.="&ano_colheita=null";
        }
        if($_POST['castas']!= ""){
            $string.="'".$_POST['castas']."',";
            $nullstring.="&castas=null";
        }else{
            $string.="NULL,";
        }
        if($_POST['graduacao_alcoolica']!= ""){
            $string.="'".$_POST['graduacao_alcoolica']." % vol',";
        }else{
            $string.="NULL,";
            $nullstring.="&graduacao_alcoolica=null";
        }
        if($_POST['acidez']!= ""){
            $string.="'".$_POST['acidez']." g/l',";
        }else{
            $string.="NULL,";
            $nullstring.="&acidez=null";
        }
        if($_POST['acucar']!= ""){
            $string.="'".$_POST['acucar']." g/l',";
            
        }else{
            $string.="NULL,";
            $nullstring.="&acucar=null";
        }
        if($_POST['tempmin']!= "" || $_POST['tempmax']!= "" ){
            $string.="'".$_POST['tempmin']."-".$_POST['tempmax']." °C',";
        }else{
            $string.="NULL,";
            $nullstring.="&temperatura_consumo=null";
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
        if($_POST['nome'.$abrv]!= ""){
            $string.="'".$_POST['nome'.$abrv]."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['produtor'.$abrv]!= ""){
            $string.="'".$_POST['produtor'.$abrv]."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['cor'.$abrv]!= ""){
            $string.="'".$_POST['cor'.$abrv]."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['designacao_origem'.$abrv]!= ""){
            $string.="'".$_POST['designacao_origem'.$abrv]."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['pais'.$abrv]!= ""){
            $string.="'".$_POST['pais'.$abrv]."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['regiao'.$abrv]!= ""){
            $string.="'".$_POST['regiao'.$abrv]."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['solo'.$abrv]!= ""){
            $string.="".$_POST['solo'.$abrv].",";
        }else{
            $string.="NULL,";
        }
        if($_POST['processo_vinificacao'.$abrv]!= ""){
            $string.="'".$_POST['processo_vinificacao'.$abrv]."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['notas_prova'.$abrv]!= ""){
            $string.="'".$_POST['notas_prova'.$abrv]."',";
        }else{
            $string.="NULL,";
        }
        if($_POST['info_adicional'.$abrv]!= ""){
            $string.="'".$_POST['info_adicional'.$abrv]."',";
        }else{
            $string.="NULL,";
        }
        $string=substr($string, 0, strlen($string) - 1);

        echo $query.=$string.");";
        $nullstring;
        

        //tabela produtos_idiomas END

        if($string!=""){
            echo db_query($query);
            
        }
        
    }
    header('Location:'.$_POST['url'].'&insertsuccess=true'.$nullstring);
    

    }else{
        echo $errorstring;
        echo $nullstring;
        header('Location:'.$_POST['url'].$errorstring.$nullstring);
    }
    
    

}else{
    header('Location:/portwinestyle/admin/tables.php?table=produtos&img=toobig');
}
?>