<section class="contact spad">
        <div class="container">
        <?php include $arrSETTINGS['dir_site'].'/includes/map.inc.php'; ?>

            <?php
            $query="SELECT * FROM contactos WHERE is_active = 1 ORDER BY id";
            $arrContactos=db_query($query);
            ?>

            <div class="contact__address">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact__address__item">
                            <h6>Vila Nova de Gaia</h6>
                            <ul>
                            <?php
                            foreach($arrContactos as $c){
                            switch($c['tipo']){
                                case "morada":
                            ?>
                                <li>
                                    <span class="icon_pin_alt"></span>
                                    <p><?php echo $c['texto'];?></p>
                                </li>
                                <?php
                                break;
                                case "telemóvel":
                                ?>
                                <li><span class="icon_phone"></span>
                                    <p><?php echo $c['texto'];?></p>
                                </li>
                                <?php
                                break;
                                case "email":
                                ?>
                                <li><span class="icon_mail_alt"></span>
                                    <p><?php echo $c['texto'];?></p>
                                </li>
                            <?php
                                break;
                                }
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>


            
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact__text">
                        <h3><?php echo $arrLang['contacte-nos']?></h3>
                        <ul>
                            <li><?php echo $arrLang['responderemos']?></li>
                            <li><?php
                            if (isset($_GET['success']) && $_GET['success']=="true") {

               
                                echo'<div class="checkout__input__checkbox">
                                        <div class="success">
                                            <p>'.$arrLang["mensagem_sucesso"].'</p>
                                        </div>
                                    </div>';
                            }else if(isset($_GET['success']) && $_GET['success']=="false"){
                                echo'<div class="checkout__input__checkbox">
                                        <div class="warning">
                                            <p>'.$arrLang["mensagem_fail"].'</p>
                                        </div>
                                    </div>';
                
                            }
                            ?>
                            </li>
                        </ul>
                        <img src="img/wine.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact__form">
                        <form action="contactmail.php" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="<?php echo $arrLang['nome']?>" name="nome">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="<?php echo $arrLang['email']?>" name="email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="<?php echo $arrLang['mensagem']?>" name="texto"></textarea>
                                    <button type="submit" class="site-btn"><?php echo $arrLang['enviar']?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>