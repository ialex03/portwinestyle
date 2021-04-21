<?php
require 'settings.inc.php';


$query="SELECT * FROM menu A INNER JOIN menu_idiomas B ON A.id=B.id WHERE A.is_active = 1 AND A.pai = 0 AND B.idioma='$_SESSION[idioma]' ORDER BY A.id";
$arrMenu=db_query($query);

//Header Section Begin
if(isset($arrMenu[0])) {
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <nav class="header__menu mobile-menu nowrap">
                <ul>
                <?php
                foreach($arrMenu as $v){
                    $query="SELECT * FROM menu A INNER JOIN menu_idiomas B ON A.id=B.id WHERE A.is_active = 1 AND A.pai = $v[id] AND B.idioma='$_SESSION[idioma]' ORDER BY A.id";
                    $arrSubMenu=db_query($query);
                    if(!count($arrSubMenu)) {
                        if($_SERVER['REQUEST_URI']==$v['route']){
                            echo '<li class="active"><a href="'.$arrSETTINGS['url_site'].$v['route'].'">'.$v['nome'].'</a></li>';
                        }else{
                            echo '<li><a href="'.$arrSETTINGS['url_site'].$v['route'].'">'.$v['nome'].'</a></li>';

                        }
                    }else{
                        echo '<li><a href="'.$arrSETTINGS['url_site'].$v['route'].'">'.$v['nome'].'</a>';
                        echo '<ul class="dropdown">';
                        foreach($arrSubMenu as $sm){
                            if($_SERVER['REQUEST_URI']==$sm['route']){
                                echo '<li class="active"><a href="'.$arrSETTINGS['url_site'].$sm['route'].'">'.$sm['nome'].'</a></li>';
                            }else{
                                echo '<li><a href="'.$arrSETTINGS['url_site'].$sm['route'].'">'.$sm['nome'].'</a></li>';
        
                            }
                    }
                        echo'</ul>';
                        echo'</li>';
                    }
                ?>
                    <?php
                }
                
                    ?>
                </ul>




            </nav>
        </div>
    </div>
</div>
<?php
}
?>
    <!-- Header Section End -->