<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require '../../../includes/settings.inc.php';
include_once $arrSETTINGS['dir_site'].'/includes/db.inc.php';
if(!isset($_SESSION['idioma'])) {
    $_SESSION['idioma'] = $idioma_default;
} 
if(!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
} 
include $arrSETTINGS['dir_site'].'/includes/languages/lang.'.$_SESSION['idioma'].'.inc.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once $arrSETTINGS['dir_site']."/vendor/autoload.php";


//Disable SMTP debugging.
    $mail->SMTPDebug =0;                               
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();            
    //Set SMTP host name                          
    $mail->Host = "smtp.gmail.com";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                          
                        //Provide username and password     
    $mail->Username = "ialexandra2003@gmail.com";                 
    $mail->Password = "Ialex.2003";      
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";                           
    //Set TCP port to connect to
    $mail->Port = 587;                                   

    // Define o remetente

    //From email address and name
    $mail->From = "ialexandra2003@gmail.com";
    $mail->FromName = "Alexandra";

    
    //Address to which recipient will reply
    $mail->addReplyTo("ialexandra2003@gmail.com", "Alexandra");


//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions
db_connect();
$query="SELECT * FROM envios_confirmados WHERE confirmado=0 LIMIT 0,20";
$envios=db_query($query);
foreach ($envios as $envio) {
    $query="SELECT * FROM emails_newsletter WHERE id=".$envio['id_conta'];
    $conta=db_query($query);
    $query="SELECT * FROM mensagens_newsletter WHERE id=".$envio['id_mensagem'];
    $mensagem=db_query($query);
    
    $mail->addBcc($conta[0]['email']);


}

    //Send HTML or Plain Text email
    $mail->isHTML(true);
    $body="<html><body>".$_POST['mensagem']."</body></html>";
    $from_email="ialexandra2003@gmail.com";
    $date= date('Y-m-d H:i:s');
    $subject=$_POST['titulo']." - Newsletter Portwinestyle";
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AltBody = "Use um email compatível com HTML para visualizar a mensagem";
        
    $mail->send();


?>