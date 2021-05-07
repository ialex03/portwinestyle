<?php
require 'includes/settings.inc.php';
include_once $arrSETTINGS['dir_site'].'/includes/db.inc.php';
if(!isset($_SESSION['idioma'])) {
    $_SESSION['idioma'] = $idioma_default;
} 
if(!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
} 
include 'includes/languages/lang.'.$_SESSION['idioma'].'.inc.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once $arrSETTINGS['dir_site']."/vendor/autoload.php";

//PHPMailer Object
$mail = new PHPMailer(true);
db_connect();
 
/*
 
MIT License
-----------
 
Copyright (c) 2021 Miguel Ferreira (github.com/esfoliante)
Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:
 
The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.
 
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
 
*/
$admin = $_POST['admin'];
$email = ($admin?$_POST['loginUsername']:$_POST['email']);


$selector = bin2hex(random_bytes(8));
$token = random_bytes(32);

$url = $arrSETTINGS['url_site'].($admin?"admin/":"")."reset".($admin?"admin":"").".php?selector=".$selector."&validator=".bin2hex($token);

// Token expiration
$expires = new DateTime('NOW');
$expires->add(new DateInterval('PT01H')); // 1 hour
$query="DELETE * FROM password_reset WHERE email='".$email."'";
db_query($query);
$hashed_token=hash('sha256',$token);
$expires=$expires->format('U');
$query="INSERT INTO password_reset(email,selector,token,expires) VALUES ('".$email."','".$selector."','".$hashed_token."',$expires)";
db_query($query);
$date= date('Y-m-d H:i:s');







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
$mail->addAddress($email, "User");
$mail->addAddress($email); //Recipient name is optional

//Address to which recipient will reply
$mail->addReplyTo("ialexandra2003@gmail.com", "Alexandra");

//CC and BCC
//$mail->addCC("cc@example.com");
//$mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$message = "<p>".$arrLang['instructions_forgot']."</p><p>".$arrLang['showlink_forgot']."</p></br>";
$message .= sprintf('<a href="%s">%s</a></p>', $url, $url);
$message .= '<p>'.$arrLang['thanks_forgot'].'</p>';

$mail->Subject = $arrLang['link_forgot'];
$mail->Body = $message;
$mail->AltBody = $arrLang['instructions_forgot'].$arrLang['showlink_forgot'].sprintf('<a href="%s">%s</a></p>', $url, $url).$arrLang['thanks_forgot'];

$emailsQuery = "INSERT INTO emails (title,subject,to_email,from_email,sent_at) VALUES (".$arrLang['link_forgot'].", '$message','$email','ialexandra2003@gmail.com','$date')";
$emailsResult = db_query($emailsQuery);
if($mail->Send()){
header("Location: recover.php?success=true");
}else{
header("Location: recover.php?success=false");
}





/*
if($emailSent && $emailsResult!=0){
header("Location: contactos.php?success=true");
}else{
header("Location: contactos.php?success=false");
}*/