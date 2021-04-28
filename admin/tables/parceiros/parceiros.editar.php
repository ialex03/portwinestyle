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

    

    
    
    $targetfolder =  $arrSETTINGS['dir_site']."/Docs/";

    $targetfolder = $targetfolder . basename( $_FILES['anexo']['name']) ;

    $ok=1;

    $file_type=$_FILES['anexo']['type'];

    if ($file_type=="application/pdf") {
    if (file_exists($targetfolder)) {
            echo "Sorry, file already exists.";
            $errorstring.="&ipdf=exists";
            $ok = 0;
    }elseif(move_uploaded_file($_FILES['anexo']['tmp_name'], $targetfolder))

    {

    echo "The file ". basename( $_FILES['anexo']['name']). " is uploaded";

    }

    else {

    echo "Problem uploading file";
    $errorstring.="&pdferror=true";

    }

    }

    else {

    echo "You may only upload PDFs<br>";
    $errorstring.="&pdfformat=false";

    }

    

    
    if(strlen($_POST['nome'])>200){
        $errorstring.="&nometoolong=true";
    }
    

    

    if($errorstring == ""){

        $query = "UPDATE parceiros SET ";
        $string="";
        if(basename($_FILES["imagem"]["name"])!= ""){
            $string.="foto='".basename($_FILES["imagem"]["name"])."',";
        }
        if($_POST['nome']!= ""){
            $string.="nome=".$_POST['nome'].",";
        }
        if(basename($_FILES["anexo"]["name"])!= ""){
            $string.="anexo='".basename($_FILES["anexo"]["name"])."',";
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