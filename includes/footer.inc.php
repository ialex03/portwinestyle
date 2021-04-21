<?php
$query="SELECT * FROM footer WHERE is_active = 1 ORDER BY id";
$arrFooter=db_query($query);
$query="SELECT * FROM contactos WHERE is_active = 1 ORDER BY id";
$arrContactos=db_query($query);
?>
<!-- Footer Section Begin -->
<footer class="footer set-bg" data-setbg="img/footer-bg.jpg">
    <div class="container">
        <div class="row">
        <?php
        if(isset($arrFooter[0])){
        ?>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6><?php echo $arrLang['contactos']?></h6>
                    <ul>
                    <?php
                        
                        foreach($arrContactos as $c){
                            if($c['tipo']!='facebook' & $c['tipo']!='instagram' ){
                        echo "<li>".$c['texto']."</li>";
                        }
                    }

                    ?>
                        
                    </ul>
                </div>
            </div>



            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="index.php"><img src="img/portlinelogo.png" alt="logótipo da portline"></a>
                    </div>
                    <?php
                    foreach($arrFooter as $c){
                        if($c['tipo']=='descrição'){
                            echo "<p>".$c['texto']."</p>";
                    

                        }
                    }
                    ?>
                    <div class="footer__social">
                    <?php
                    foreach($arrContactos as $c){
                        
                        if($c['tipo']=='facebook'||$c['tipo']=='instagram' ){
                                echo '<a href="'.$c['texto'].'"><i class="fa fa-'.$c['tipo'].'"></i></a>';
                }
            }
                ?>
                    </div>
                </div>
            </div>
            <?php
            }else{
            ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6></h6>
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>



            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="index.php"><img src="img/portlinelogo.png" alt="logótipo da portline"></a>
                    </div>
                    <p></p>
                    <div class="footer__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
            </div>


            <?php
            }
            ?>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__newslatter">
                    <h6><?php echo $arrLang['inscrever-se']?></h6>
                    <p><?php echo $arrLang['desc_news']?></p>
                    <?php
                    if (isset($_GET['newslettersuccess']) && $_GET['newslettersuccess']=="true") {

               
                        echo'<div class="checkout__input__checkbox">
                                <div class="success">
                                    <p>'.$arrLang['newsletter_sucesso'].'</p>
                                </div>
                            </div>';
                    }else if(isset($_GET['newslettersuccess']) && $_GET['newslettersuccess']=="false"){
                        echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                    <p>'.$arrLang["newsletter_fail"].'</p>
                                </div>
                            </div>';
        
                    }else if(isset($_GET['exists']) && $_GET['exists']=="true"){
                        echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                    <p>'.$arrLang["newsletter_existe"].'</p>
                                </div>
                            </div>';

                    }
                    ?>

                    <form action="insertnewsletteremail.php" method="POST">
                        <input type="text" placeholder="<?php echo $arrLang['email']?>" name="email">
                        <button type="submit"><i class="fa fa-send-o"></i></button>
                    </form>
                </div>
            </div>

            


        </div>
    </div>

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <p class="copyright__text text-white"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      </p>
                  </div>
                  <div class="col-lg-5">
                    <div class="copyright__widget">
                        <ul>
                            <li><a href="privacypolicy.php"><?php echo $arrLang['Política de Privacidade']?></a></li>
                            <li><a href="termsandconditions.php"><?php echo $arrLang['termos']?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>
</footer>
<!-- Footer Section End -->