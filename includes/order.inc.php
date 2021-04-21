<form  method="POST" action="<?php echo $arrSETTINGS['url_site']; ?>order.php">
    <div class="shop__option__right">
        <input type="hidden" name="url" value="<?php echo $url; ?>">
    
        <select name="order" id="order" onchange="this.form.submit()">
            

            <option value="1" <?php echo ( $_SESSION['searchOrderType'] == 1 ? 'selected="selected"' : ''); ?>><?php echo $arrLang['mais_popular'];?></option>
            <option value="2" <?php echo ( $_SESSION['searchOrderType'] == 2 ? 'selected="selected"' : ''); ?>><?php echo $arrLang['AZ'];?></option>
            <option value="3" <?php echo ( $_SESSION['searchOrderType'] == 3 ? 'selected="selected"' : ''); ?>><?php echo $arrLang['ZA'];?></option>
            
        </select>
    
        <a href="<?php echo $url; ?>&tipo=1"><i class="fa fa-th-large"></i></a>
        <a href="<?php echo $url; ?>&tipo=2"><i class="fa fa-th-list"></i></a>
        
    </div>
</form>

