<?php
$query="SELECT * FROM categorias A INNER JOIN categorias_idiomas B ON A.id=B.id WHERE B.idioma='$_SESSION[idioma]' ORDER BY A.id";
$arrCat=db_query($query);

if(isset($arrCat)) {
    foreach ($arrCat as $cat) {
?>
<a href="<?php echo $arrSETTINGS['url_site'];?>produtos.php?id=<?php echo $cat['id']?>">
<div class="categories__item">
    <div class="categories__item__icon">
        
        <span class="<?php echo $cat['flaticon'];?>"></span>
        <h5><?php echo $cat['nome'];?></h5>
        
    </div>
</div>
</a>
      <?php
    }
}
?>          