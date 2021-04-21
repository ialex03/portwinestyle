<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require 'includes/settings.inc.php';
    
    @session_start();
    $_SESSION['unlocked_on']=0;
    include $arrSETTINGS['dir_site'].'/includes/db.inc.php';
    db_connect();
// ? Since we're already connected, let's get the informations from the post method
$email = $_POST['email'];
// ? In case you're wondering, this line is to set the e-mail sender as ours
$headers = 'From: KaraSenshi@protonmail.com';
$title="Inscreveu-se no newsletter!";
$subject="Obrigada por se ter inscrito no nosso newletter! Receberá para este email notificações da empresa.";
// ? And, finally, using the mail() function, native to PHP

 
// ? To finish off, we simply register in our table the email that was sent
$date = date('Y-m-d H:i:s');
 


$emailsQuery = "SELECT * FROM emails_newsletter WHERE email='$email'";
$emailsExists= db_query($emailsQuery);
print_r($emailsExists);
if($emailsExists){
    header("Location:home.php?exists=true");
}else{

    $emailsQuery = "INSERT INTO emails_newsletter (email) VALUES ('$email')";
    $emailsInserted= db_query($emailsQuery);
    $emailSent=mail($email, $title, $subject, $headers);
    $emailsQuery = "INSERT INTO emails (title, subject,to_email,from_email,sent_at) VALUES ('$title', '$subject','$email','KaraSenshi@protonmail.com','$date')";
    $emailsResult = db_query($emailsQuery);
    if($emailsInserted){
        header("Location:home.php?newslettersuccess=true");
    }else{
        header("Location:home.php?newslettersuccess=false");

    }
    
}


?>
