<!-- Team Section Begin -->
<section class="team spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <div class="section-title">
                        <span><?php echo $arrLang['os nossos '.$membro]?></span>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="team__btn">
                        <a href="<?php echo $arrSETTINGS['url_site']?>contactos.php" class="primary-btn"><?php echo $arrLang['junte-se']?></a>
                    </div>
                </div>
            </div>

            <div class="row">
            <?php
            $query="SELECT * FROM $membro WHERE is_active=1 ORDER BY id";
            $arrPar=db_query($query);
            foreach($arrPar as $par){
            ?>


                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="team__item set-bg" data-setbg="img/<?php echo $par['foto']?>">
                        <div class="team__item__text">
                        
                            <h6><?php echo $par['nome']?></h6>
                            <span><?php echo $arrLang['saber mais']?></span>
                            <div class="team__item__social">
                                <a href="<?php echo $arrSETTINGS['url_site']?>Docs/<?php echo $par['anexo']?>"><i class="fa fa-file-pdf-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


            <?php
            }
            ?>

                


        </div>
    </section>
    <!-- Team Section End -->