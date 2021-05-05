<?php
if(isset($_POST['submit'])){
    header("Location:".$_POST['url']."&query=".$_POST['query']);
}
    
?>