<?php
$arrIdiomas = array(
    'pt' => 'português',
    'en' => 'english',
    'ru' => 'русский'  
);
$idioma_default = 'ru';

echo '<ul>';
foreach($arrIdiomas as $k => $v) {
    echo '<li><a href="lang.php?id='.$k.'">'.$v.'</a></li>';
}
echo '</ul>';
?>