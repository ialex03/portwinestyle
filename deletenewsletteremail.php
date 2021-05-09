<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require 'includes/settings.inc.php';
    
@session_start();
$_SESSION['unlocked_on']=0;
include $arrSETTINGS['dir_site'].'/includes/db.inc.php';
if(!isset($_SESSION['idioma'])) {
$_SESSION['idioma'] = $idioma_default;
} 
include 'includes/languages/lang.'.$_SESSION['idioma'].'.inc.php';
    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once $arrSETTINGS['dir_site']."/vendor/autoload.php";

//PHPMailer Object
$mail = new PHPMailer(true);
db_connect();
$date = date('Y-m-d H:i:s');
 

$emailsQuery = "SELECT * FROM emails_newsletter WHERE id=".$_GET['id'];
$email= db_query($emailsQuery);

    //Disable SMTP debugging.
    $mail->SMTPDebug = 0;                               
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

    //To address and name
    $mail->addAddress($email[0]['email'], "User");
    $mail->addAddress($email[0]['email']); //Recipient name is optional

    //Address to which recipient will reply
    $mail->addReplyTo("ialexandra2003@gmail.com", "Alexandra");

    //CC and BCC
    //$mail->addCC("cc@example.com");
    //$mail->addBCC("bcc@example.com");
    
    //Send HTML or Plain Text email
    $mail->isHTML(true);
    $body=$arrLang['newsletter_removido'].$arrLang['newsletter_add'];
    $to_email=$email[0]['email'];
    $date= date('Y-m-d H:i:s');

    $mail->Subject = "Newsletter portwinestyle";
    $mail->Body = $body;
    $mail->AltBody = $body;

    $emailsQuery = "INSERT INTO emails (title, subject,to_email,from_email,sent_at) VALUES 
    ('Newsletter portwinestyle',
    '$body',
    '$to_email',
    'ialexandra2003@gmail.com',
    '$date')";
    
    $emailsQuery = "DELETE FROM emails_newsletter WHERE id=".$_GET['id'];
    $emailsInserted= db_query($emailsQuery);
    if($emailsInserted && $mail->send()){
        header("Location:home.php?newslettersuccess=removed");
    }
    



?>
