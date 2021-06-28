<?php

 @session_start();

    $_SESSION['acceptterms']=1;

header('Location: home.php');
?>