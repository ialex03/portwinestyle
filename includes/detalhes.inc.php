
<section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__img">
                        <div class="product__details__big__img" >
                            <img class="big_img" src="img/shop/<?php echo $produto[0]['foto']?>" alt="" >
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <?php
                        $idcat=$produto[0]['id_categoria'];
                        $query="SELECT * FROM categorias A INNER JOIN categorias_idiomas B ON A.id=B.id WHERE B.idioma='$_SESSION[idioma]' AND A.id=$idcat";
                        $categoria=db_query($query);
                        ?>
                        <div class="product__label"><?php echo $categoria[0]['nome']?></div>
                        <h4><?php echo $produto[0]['nome']?></h4>
                        <p><?php echo $produto[0]['notas_prova']?></p>
                        <ul>
                            <?php
                            if(isset($produto[0]['produtor'])){
                            ?>

                            <li><?php echo $arrLang['produtor']?><span><?php echo $produto[0]['produtor']?></span></li>

                            <?php
                            }
                            if(isset($produto[0]['regiao'])){
                            ?>

                            <li><?php echo $arrLang['regiao']?><span><?php echo $produto[0]['regiao']?></span></li>
                            
                            <?php
                            }
                            if(isset($produto[0]['pais'])){
                            ?>

                            <li><?php echo $arrLang['pais']?><span><?php echo $produto[0]['pais']?></span></li>
                            
                            <?php
                            }
                            if(isset($produto[0]['designacao_origem'])){
                            ?>
                            
                            <li><?php echo $arrLang['designacao_origem']?><span><?php echo $produto[0]['designacao_origem']?></span></li>
                            
                            <?php
                            }
                            if(isset($produto[0]['ano_colheita'])){
                            ?>
                            
                            <li><?php echo $arrLang['ano']?><span><?php echo $produto[0]['ano_colheita']?></span></li>
                            
                            <?php
                            }
                            if(isset($produto[0]['solo'])){
                            ?>
                            
                            <li><?php echo $arrLang['solo']?><span><?php echo $produto[0]['solo']?></span></li>
                            
                            <?php
                            }
                            if(isset($produto[0]['graduacao_alcoolica'])){
                            ?>
                            
                            <li><?php echo $arrLang['graduacao_alcoolica']?><span><?php echo $produto[0]['graduacao_alcoolica']?></span></li>
                            
                            <?php
                            }
                            if(isset($produto[0]['acidez'])){
                            ?>
                            
                            
                            <li><?php echo $arrLang['acidez']?><span><?php echo $produto[0]['acidez']?></span></li>
                            <?php
                            }
                            if(isset($produto[0]['acucar'])){
                            ?>
                            
                            <li><?php echo $arrLang['acucar'].": "?><span><?php echo $produto[0]['acucar']?></span></li>
                            
                            <?php
                            }
                            if(isset($produto[0]['temperatura_consumo'])){
                            ?>
                            
                            <li><?php echo $arrLang['temperatura_consumo']?><span><?php echo $produto[0]['temperatura_consumo']?></span></li>

                            <?php
                            }
                            ?>
                        </ul>
                        <div class="product__details__option">
                        <?php 
                        
                        if(!strpos($_SESSION['favorites_id'],$id)){
                         echo  '<a href="'.$arrSETTINGS['url_site'].'favoritar.php?id='.$id.
                                    '&keyword='.(isset($_GET['keyword'])?$_GET['keyword']:"").
                                    '&page='.(isset($_GET['page'])?$_GET['page']:"1").
                                    '&idfav='.$id.
                                    '&url=detalhes.php?id='.$id.'
                                    " class="primary-btn">'.$arrLang['adicionar a favoritos'].'</a>';
                            
                        }else{
                            echo  '<a href="'.$arrSETTINGS['url_site'].'desfavoritar.php?id='.$id.
                                    '&keyword='.(isset($_GET['keyword'])?$_GET['keyword']:"").
                                    '&page='.(isset($_GET['page'])?$_GET['page']:"1").
                                    '&idfav='.$id.
                                    '&url=detalhes.php?id='.$id.'
                                    " class="primary-btn">'.$arrLang['remover dos favoritos'].'</a>';
                        }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product__details__tab">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"><?php echo $arrLang['processo_vinificacao']?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"><?php echo $arrLang['castas']?></a>
                        </li>
                        <?php
                        if($produto[0]['info_adicional']!=""){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"><?php echo $arrLang['info_adicional']?></a>
                        </li>
                    
                        <?php
                        }
                        ?>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p><?php
                                    if(isset($produto[0]['processo_vinificacao'])){
                                        echo $produto[0]['processo_vinificacao'];
                                    }
                                    else{
                                        echo $arrLang['indisponível'];
                                    }
                                    ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p><?php
                                    if(isset($produto[0]['castas'])){
                                        echo $produto[0]['castas'];
                                    }
                                    else{
                                        echo $arrLang['castas'];
                                    }
                                    ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        if(isset($produto[0]['info_adicional'])){
                            ?>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p><?php
                                        echo $produto[0]['info_adicional'];
                                    ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>