<table>
                            <thead>
                                <tr>
                                    <th><?php echo $arrLang['produtos']?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $arrFavorites=explode(";",$_SESSION['favorites_id']);
                            $arrFavorites= array_slice($arrFavorites, 1, -1);
                            foreach ($arrFavorites as $prodid) {

                                $query="SELECT * FROM produtos A INNER JOIN produtos_idiomas B ON A.id=B.id WHERE A.is_active=1 AND B.idioma='$_SESSION[idioma]' AND A.id=$prodid";
                                $arrProduto=db_query($query);
                                $query="SELECT * FROM categorias A INNER JOIN categorias_idiomas B ON A.id=B.id WHERE B.idioma='$_SESSION[idioma]' AND A.id=".$arrProduto[0]['id_categoria'];
                                $cat=db_query($query);
                            ?>

                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="img/shop/<?php echo $arrProduto[0]['foto']?>" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6><?php echo $arrProduto[0]['nome']?></h6>
                                            <h5><?php echo $cat[0]['nome']?></h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                        </div>
                                    </td>
                                    <td class="cart__price"><a href="<?php echo $arrSETTINGS['url_site']?>detalhes.php?id=<?php echo $arrProduto[0]['id']?>"><?php echo $arrLang['ver detalhes']?></a></td>
                                    <td class="cart__close">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <span class="icon_close" ></span>
                                    </button>
                                    </td>
                                    
                                    
                                    
                                    <!-- Button trigger modal -->
                                    

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $arrLang['aviso']?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <?php echo $arrLang['de certeza que deseja remover o produto']?><?php echo $arrProduto[0]['nome']?><?php echo $arrLang['pode voltar a adicionar']?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal"><?php echo $arrLang['cancelar']?></button>
                                            <button type="button" class="btn btn-warning"><a href="<?php echo $arrSETTINGS['url_site']?>desfavoritar.php?id=&keyword=&page=1&idfav=<?php echo $arrProduto[0]['id']?>&oncart=1'"><?php echo $arrLang['remover']?></a></button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>



                                </tr>
                            <?php
                            }
                            ?>
                                


                            </tbody>
                        </table>