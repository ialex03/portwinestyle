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
// ? Since we're already connected, let's get the informations from the post method

$title = "Hiperligação para mudança de palavra_passe";

$message = '<p>We received a password reset request. The link to reset your password is below. ';
$message .= 'If you did not make this request, you can ignore this email</p>';
$message .= '<p>Here is your password reset link:</br>';
$message .= sprintf('<a href="%s">%s</a></p>', $url, $url);
$message .= '<p>Thanks!</p>';

// Headers
$headers = "From: ialexandra2003@gmail.com <ialexandra2003@gmail.com>\r\n";
$headers .= "Reply-To: ialexandra2003@gmail.com\r\n";
$headers .= "Content-type: text/html\r\n";
$emailSent=mail($email, $title, $message, $headers);
$date = date('Y-m-d H:i:s');
if ($emailSent) {
    echo "success!";
}
echo $message;
$emailsQuery = "INSERT INTO emails (title, subject,to_email,from_email,sent_at) VALUES ('$title', '$message','$email','ialexandra2003@gmail.com','$date')";
//$emailsResult = db_query($emailsQuery);


// ? And, finally, using the mail() function, native to PHP

 
// ? To finish off, we simply register in our table the email that was sent






/*
if($emailSent && $emailsResult!=0){
header("Location: contactos.php?success=true");
}else{
header("Location: contactos.php?success=false");
}*/