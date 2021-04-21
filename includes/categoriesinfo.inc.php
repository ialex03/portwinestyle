
<?php
$query="SELECT * FROM categorias A INNER JOIN categorias_idiomas B ON A.id=B.id WHERE B.idioma='$_SESSION[idioma]' ORDER BY A.id";
$arrCat=db_query($query);
if(isset($arrCat)) {
    
?>

<section class="testimonial spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <span><?php echo $arrLang['confuso']?></span>
                        <h2><?php echo $arrLang['aprenda mais sobre cada tipo de vinho']?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="testimonial__slider owl-carousel">
                    <?php
                    foreach ($arrCat as $cat) {
                    ?>


                    <div class="col-lg-6">
                        <div class="testimonial__item">
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                <span class="<?php echo $cat['flaticon'];?>"></span>
                                </div>
                                <div class="testimonial__author__text">
                                    <h5><?php echo $cat['nome']?></h5>
                                    <span> <?php echo $arrLang['mantenha premido']?></span>
                                </div>
                            </div>
                            <p><?php echo $cat['descricao']?></p>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </section>
    <?php
}
    ?>