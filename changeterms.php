<?php

 @session_start();
 session_destroy();
 @session_start();

    $_SESSION['acceptterms']=1;

header('Location: home.php');
?>