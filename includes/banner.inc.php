

<?php


$query="SELECT * FROM banner A INNER JOIN banner_idiomas B ON A.id=B.id WHERE A.is_active = 1 AND B.idioma='$_SESSION[idioma]' ORDER BY rand() LIMIT 0,1";
$arrBanner=db_query($query);
if(isset($arrBanner)) {
    foreach($arrBanner as $banner){
?>
<div class="hero__item set-bg" data-setbg="img/hero/<?php echo (!isset($banner['foto']))? "douro.jpg":$banner['foto'];?>">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="hero__text">
                    <h2><?php echo $banner['texto']?></h2>
                    <a href="<?php echo $arrSETTINGS['url_site'].$banner['route_botao']?>" class="primary-btn"><?php echo $banner['texto_botao']?></a>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php
    }
} else {
?>
<div class="hero__item set-bg" data-setbg="img/hero/hero-1.jpg">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="hero__text">
                    <h2>Portline</h2>
                    <a href="<?php echo $arrSETTINGS['url_site']."produtos.php?id=&keyword="?>" class="primary-btn">Os nossos vinhos</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
} 
?>