<?php



if(isset($arrProd[0])) {
    
?>
                <?php
                foreach ($arrProd as $prod) {
                    if($flag_related){
                ?>
                <div class="col-lg-3">

                    
                <?php
                    }else{
                    

                ?>
                    <div class="<?php echo writeClassSearchViewType($_SESSION['searchViewType'])?>">
                        
                <?php
                    }
                ?>
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/shop/<?php echo $prod['foto'] ?>" style="cursor: pointer;" 
                            onclick="window.location='<?php echo $arrSETTINGS['url_site']?>detalhes.php?id=<?php echo $prod['id']?>';" 
                            data-toggle="tooltip" data-html="true" title="Produtor: <?php echo $prod['produtor']?>">
                                <div class="product__label">
                                    
                                    <?php
                                    
                                    $idcat=$prod['id_categoria'];
                                    $query="SELECT * FROM categorias_idiomas WHERE idioma='$_SESSION[idioma]' AND id=$idcat";
                                    $arrcat=db_query($query);
                                    
                                    ?>
                                    <a href="<?php echo $arrSETTINGS['url_site'];?>produtos.php?id=<?php echo urlencode($arrcat[0]['id']);?>&keyword=">
                                    <span>
                                    
                                        <?php echo $arrcat[0]['nome']?>
                                    
                                    </span>
                                    </a>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="<?php echo $arrSETTINGS['url_site']?>detalhes.php?id=<?php echo $prod['id']?>"><?php echo $prod['nome']?></a></h6>
                                <!-- dizer se o utilizador já adicionou o produto aos favoritos-->
                               
                                <?php

                                if(strpos ($_SESSION['favorites_id'],$prod['id'])){
                                    echo '<div class="product__item__price"><i class="fa fa-heart"></i></div>
                                    <div class="cart_add">
                                    <a href="'.$arrSETTINGS['url_site'].'desfavoritar.php?id='.$_GET['id'].
                                    '&keyword='.(isset($_GET['keyword'])?$_GET['keyword']:"").
                                    '&page='.(isset($_GET['page'])?$_GET['page']:"1").
                                    '&idfav='.$prod['id'].
                                    '">'.$arrLang['remover dos favoritos'].'</a>
                                    </div>
                                    </div>';
                                
                                }else{

                                    echo '<div class="product__item__price"><i class="fa fa-heart-o"></i></div>
                                    <div class="cart_add">
                                    <a href="'.$arrSETTINGS['url_site'].'favoritar.php?id='.$_GET['id'].
                                    '&keyword='.(isset($_GET['keyword'])?$_GET['keyword']:"").
                                    '&page='.(isset($_GET['page'])?$_GET['page']:"1").
                                    '&idfav='.$prod['id'].
                                    '">'.$arrLang['adicionar a favoritos'].'</a>
                                    </div>
                                    </div>';
                                }
                                ?>
                                
                                
                            
                        </div>
                    </div>
                    
                    

                    <?php
                }
            
}
    ?>