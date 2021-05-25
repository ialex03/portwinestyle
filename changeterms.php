<?php

 @session_start();
if(isset($_POST['submit'])){
    $_SESSION['acceptterms']=1;
}

header('Location: home.php');
?>