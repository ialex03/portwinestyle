<?php
if(isset($_POST['submit'])){
    if (isset($_POST['queryemail'])) {
        $string="&queryemail=".$_POST['queryemail'];
    }elseif(isset($_POST['queryconta'])){
        $string="&queryconta=".$_POST['queryconta'];
    }

    header("Location:".$_POST['url'].$string);
}
    
?>