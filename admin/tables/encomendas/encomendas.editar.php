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
    for ($i = 0; $i <= intval($_POST['count'])-1; $i++) {

    
    $errorstring="";
    // anexo


    $targetfolder =  $arrSETTINGS['dir_site']."/Docs/";

    $targetfolder = $targetfolder . basename( $_FILES['anexo'.$i]['name']) ;

    $ok=1;

    $file_type=$_FILES['anexo'.$i]['type'];

    if(basename($_FILES["anexo".$i]["name"])){
    if ($file_type=="application/pdf") {
    if (file_exists($targetfolder)) {
            echo "Sorry, file already exists.";
            $errorstring.="&pdf=exists";
            $ok = 0;
    }elseif(move_uploaded_file($_FILES['anexo'.$i]['tmp_name'], $targetfolder))

    {

    echo "The file ". basename( $_FILES['anexo'.$i]['name']). " is uploaded";

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
}
    //anexo END

    

   
    if($errorstring == ""){

        

             
            //Tabela contratos
            $confirmcontrato=0;
            $keyanexo='anexo'.$i;

            if($_POST['id_contrato'.$i]!=""){
                
                $query = "UPDATE contratos SET ";
                $string="";
                echo "ooga";

                if(basename($_FILES[$keyanexo]["name"])!= ""){
                    $string.="anexo='".basename($_FILES[$keyanexo]["name"])."',";
                }
                $string=substr($string, 0, strlen($string) - 1);
                $key="id_prod".$i;

                $query.=$string." WHERE id=".$_POST[$key].";";

                if($string!=""){
                    db_query($query);
                }
                
            }elseif(basename($_FILES[$keyanexo]["name"])!= ""){
                $query = "INSERT INTO `contratos`(
                anexo) VALUES (";
                $string="";
                $key='anexo'.$i;

                if(basename($_FILES[$key]["name"])!= ""){
                    $string.="'".basename($_FILES[$key]["name"])."',";
                }else{
                    $string.="NULL,";
                    $nullstring.="&contrato=null";
                }
                $string=substr($string, 0, strlen($string) - 1);

                echo $query.=$string.");";

                if($string!=""){
                    $confirmcontrato=db_query($query);
                }
            }
            
        

        //Tabela contratos END

        //tabela linhas_encomenda
            $query = "UPDATE linhas_encomenda SET ";
            $string="";
            if($confirmcontrato!= 0){
                $string.="id_contrato=".$confirmcontrato.",";
            }
            $key='quantidade'.$i;
            if($_POST[$key]!= ""){
                $string.="quantidade=".$_POST[$key].",";
            }
            $key='is_active'.$i;
            $string.="estado=".$_POST[$key].",";
            $string=substr($string, 0, strlen($string) - 1);
            $key1='id_prod'.$i;
            $key='id_encomenda'.$i;

            $query.=$string." WHERE id_produto=".$_POST[$key1]." AND id_encomenda=".$_POST[$key].";";

            //tabela produtos_idiomas END

            if($string!=""){
                $confirm2=db_query($query);
            }
            
            
        
        
        
        header('Location:'.$_POST['url'].'&success=true');
    

    }else{
        header('Location:'.$_POST['url'].$errorstring);
    }
    }
    

}else{
    header('Location:/portwinestyle/admin/tables.php?table=produtos&img=toobig');
}
?>