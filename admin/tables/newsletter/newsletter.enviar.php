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
        

    


//PHPMailer Object
 //Argument true in constructor enables exceptions
db_connect();
$query="SELECT * FROM envios_confirmados WHERE confirmado=0 ORDER BY id_mensagem ASC LIMIT 0,20 ";
$envios=db_query($query);
print_r($envios);
$anterior=0;

foreach ($envios as $envio) {
    

    $query="SELECT * FROM emails_newsletter WHERE id=".$envio['id_conta'];
    $conta=db_query($query);
    $query="SELECT * FROM mensagens_newsletter WHERE id=".$envio['id_mensagem'];
    $mensagem=db_query($query);
    $mail = new PHPMailer(true);

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
    $mail->addAddress($conta[0]['email']);
    $mail->isHTML(true);
    $body="<html><body>".$mensagem[0]['mensagem']."</body></html>";
    $from_email="ialexandra2003@gmail.com";
    $date= date('Y-m-d H:i:s');
    $subject=$mensagem[0]['titulo']." - Newsletter Portwinestyle";
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AltBody = "Use um email compatível com HTML para visualizar a mensagem";
    
    
        if($mail->send()){
            $query="UPDATE envios_confirmados SET confirmado=1 WHERE id=".$envio['id'];
            $confirmado=db_query($query);
            $mail->clearAddresses();
            $mail->clearAttachments();
            $mail->ClearAllRecipients();
            echo "success";
        }else{
            echo "fail";
            $mail->clearAddresses();
            $mail->clearAttachments();
            $mail->ClearAllRecipients();
            
        }
    
}

?>