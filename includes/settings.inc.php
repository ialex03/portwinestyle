<?php
@session_start();

$idioma_default='pt';
$_SESSION['produtos_favoritos']=array();
if($_SERVER['HTTP_HOST'] == 'web.colgaia.local') {
    $arrSETTINGS['dir_site'] = 'C:/Share/12itm01/www/colgaia';
    $arrSETTINGS['url_site'] = 'http://web.colgaia.local/12itm01/colgaia';

    $arrSETTINGS['dir_site_admin'] = 'C:/Share/12itm01/www/colgaia/admin';
    $arrSETTINGS['url_site_admin'] = 'http://web.colgaia.local/12itm01/colgaia/admin';

    // definições de variáveis para ligar ao servidor MYSQL
    $arrSETTINGS['hostname'] = 'localhost';
    $arrSETTINGS['username'] = '12itm01';
    $arrSETTINGS['password'] = '12itm015f6dd798a5d02';
    $arrSETTINGS['database'] = '12itm01_colgaia';

} else if($_SERVER['HTTP_HOST'] == 'portwinestyle.local'){
    $arrSETTINGS['dir_site'] = "/Applications/MAMP/htdocs/portwinestyle";
    $arrSETTINGS['url_site'] = 'http://portwinestyle.local/';
    $arrSETTINGS['dir_site_admin'] = '/Applications/MAMP/htdocs/portwinestyle/admin';
    $arrSETTINGS['url_site_admin'] = 'http://portwinestyle.local/admin';

    // definições de variáveis para ligar ao servidor MYSQL
    $arrSETTINGS['hostname'] = 'localhost';
    $arrSETTINGS['username'] = 'root';
    $arrSETTINGS['password'] = 'root';
    $arrSETTINGS['database'] = 'portwinestyle';

}else{

    $arrSETTINGS['dir_site'] = "/Applications/MAMP/htdocs/portwinestyle";
    $arrSETTINGS['url_site'] = 'http://localhost:8888/portwinestyle/';
    $arrSETTINGS['dir_site_admin'] = '/Applications/MAMP/htdocs/portwinestyle/admin';
    $arrSETTINGS['url_site_admin'] = 'http://localhost:8888/portwinestyle/admin';

    // definições de variáveis para ligar ao servidor MYSQL
    $arrSETTINGS['hostname'] = 'localhost';
    $arrSETTINGS['username'] = 'root';
    $arrSETTINGS['password'] = 'root';
    $arrSETTINGS['database'] = 'portwinestyle';
}

// incluir a minha libraria para trabalhar com as minhas funções (não nativas) de MYSQL
//include 'include/db.inc.php';


?>