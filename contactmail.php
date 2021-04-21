<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
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
 
// ? Since we're already connected, let's get the informations from the post method
$email = $_POST['email'];
$title = $_POST['nome'];
$subject = $_POST['texto'];
// ? In case you're wondering, this line is to set the e-mail sender as ours
$headers = 'From: '.$email;
 
// ? And, finally, using the mail() function, native to PHP
$emailSent=mail('KaraSenshi@protonmail.com', $title, $subject, $headers);
 
// ? To finish off, we simply register in our table the email that was sent
$date = date('Y-m-d H:i:s');
 
$emailsQuery = "INSERT INTO emails (title, subject,to_email,from_email,sent_at) VALUES ('$title', '$subject','KaraSenshi@protonmail.com','$email','$date')";
$emailsResult = db_query($emailsQuery);





if($emailSent && $emailsResult!=0){
header("Location: contactos.php?success=true");
}else{
header("Location: contactos.php?success=false");
}