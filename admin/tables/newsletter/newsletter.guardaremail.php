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
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions
db_connect();
$body="<html><body>".$_POST['mensagem']."</body></html>";
$date= date('Y-m-d H:i:s');
$subject=$_POST['titulo']." - Newsletter Portwinestyle";

$emailsQuery = "INSERT INTO mensagens_newsletter (titulo, mensagem,sent_date) VALUES 
    ('$subject',
    '$body',
    '$date')";
    
$emailsResult = db_query($emailsQuery);

$query="SELECT * FROM emails_newsletter";
$emails=db_query($query);
foreach ($emails as $email) {
    $id=$email['id'];
    $emailsQuery = "INSERT INTO envios_confirmados (id_mensagem, id_conta,confirmado) VALUES 
    ($emailsResult,
    $id,
    0)";
    $email_confirm = db_query($emailsQuery);

}

echo $emailsResult;

if($emailsResult) {
    header("Location:".$_POST['url']."&success=true");
} else {
    header("Location:".$_POST['url']."&success=false");
}


