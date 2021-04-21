<?php
if ($_SESSION['favorites_id']!=";" && isset($_SESSION['favorites_id'])) {
?>
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-8">
                    <div class="shopping__cart__table">

                    <?php include $arrSETTINGS['dir_site'].'/includes/listing.inc.php'; ?>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="<?php echo $arrSETTINGS['url_site'].'produtos.php?id=&keyword=&page=1'?>"><?php echo $arrLang['continuar a ver produtos']?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    
                    <div class="cart__total">
                        <h6><?php echo $arrLang['produtos favoritados']?></h6>
                        <ul>
                        <?php 
                    $arrFavorites=explode(";",$_SESSION['favorites_id']);
                    $arrFavorites= array_slice($arrFavorites, 1, -1);
                    foreach ($arrFavorites as $prodid) {

                        $query="SELECT * FROM produtos A INNER JOIN produtos_idiomas B ON A.id=B.id WHERE A.is_active=1 AND B.idioma='$_SESSION[idioma]' AND A.id=$prodid";
                        $arrProduto=db_query($query);
                        $query="SELECT * FROM categorias A INNER JOIN categorias_idiomas B ON A.id=B.id WHERE B.idioma='$_SESSION[idioma]' AND A.id=".$arrProduto[0]['id_categoria'];
                        $cat=db_query($query);
                    ?>
                            <li><?php echo substr($arrProduto[0]['nome'], 0, 15)."...";?><span><?php echo $cat[0]['nome']?></span></li>
                    <?php
                    }
                    ?>
                        <li><span><p><?php echo $arrLang['expressar interesse']?></p></span></li>
                        </ul>
                        <!-- verificar se já está registado, senão pedir para registar ou fazer login  -->
                        <button type="button" class="btn primary-btn" data-toggle="modal" data-target="#Modal"><?php echo $arrLang['contacte-nos']?></button>
                    </div>
                </div>

                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $arrLang['aviso']?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>

                
            </div>
            <div class="modal-body">
            <?php echo $arrLang['aviso encomenda'];?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal"><?php echo $arrLang['cancelar']?></button>
                <button type="button" class="btn btn-warning"><a href="<?php echo $arrSETTINGS['url_site']?>orderprod.php?idfavorites=<?php echo $_SESSION['favorites_id']?>"><?php echo $arrLang['contacte-nos']?></a></button>
            </div>
            </div>
        </div>

            </div>
        </div>
    </section>
    <!-- Modal -->
    
    <?php
    }else{
    ?>
    <section class="shop spad">
        <div class="container">
            <div class="row">
                
                        
            </div>
            <?php
                echo "<h2>Uh oh!</h2><br>";
                echo "<h6>".$arrLang['fav_troubleshoot']."</h6>";
            ?>
            </div>
        
    </section>
    



    <?php
    }
    ?>