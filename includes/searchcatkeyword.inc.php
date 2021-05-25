
<form action="produto.pesquisa.php" method="POST">
    <select name="categoria" default="" onchange="this.form.submit()">
    <?php 
    $query="SELECT * FROM categorias_idiomas WHERE idioma='$_SESSION[idioma]' AND id=$_GET[id]";
    $arrcategorias=db_query($query);
    ?>
        
        <option value="" <?php echo ($_GET['id']==""? "selected":"")?>><?php echo $arrLang['categorias'];?></option>
        <?php
        
        foreach($arrcat as $cats){
            $selec=$_GET['id']==$cats["id"]? "selected":"";
            echo '<option value="'.$cats["id"].'"'.$selec.'>'.$cats['nome'].'</option>';
        }
        ?>
    </select>
    <input type="text" name="keyword" placeholder="<?php echo $arrLang['pesquisar']."...";?>" default="" value="<?php echo $_GET['keyword']?>">
    <button type="submit"><i class="fa fa-search"></i></button>
</form>