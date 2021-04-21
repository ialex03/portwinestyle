<?php

foreach($arrAssuntos as $ass){
?>
<div class="row">

<div class="about__text">

    <div class="section-title">
    <?php
    if(isset($ass['subtitulo'])){
        echo "<span>".$ass['subtitulo']."</span>";
    }
    if(isset($ass['titulo'])){
        echo "<h2>".$ass['titulo']."</h2>";
    }
    echo "</div><div class='about__text__image__".$ass['foto_pos']."'>";
    if(isset($ass['texto'])){
        echo "<p>".$ass['texto']."</p>";
    }
    if(isset($ass['foto'])){
        echo"<img src='img/".$ass['foto']."'>";
    }
    ?>
    
    </div>
</div>
</div>

<?php
}
?>