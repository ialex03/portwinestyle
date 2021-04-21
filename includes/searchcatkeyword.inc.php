
<form action="produto.pesquisa.php" method="POST">
    <select name="categoria" default="" onchange="this.form.submit()">
        <option value="" selected><?php echo $arrLang['categorias']?></option>
        <?php
        foreach($arrcat as $cats){
            echo '<option value="'.$cats["id"].'">'.$cats['nome'].'</option>';
        }
        ?>
    </select>
    <input type="text" name="keyword" placeholder="<?php echo $arrLang['pesquisar']."...";?>" default="">
    <button type="submit"><i class="fa fa-search"></i></button>
</form>