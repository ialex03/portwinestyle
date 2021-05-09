<?php
@session_start();
$arrlinguas= array (
                      "pt"=>"Português",
                      "en"=>"Inglês",
                      "ru"=>"Russo",
                  );

$query="SELECT * FROM emails ORDER BY id DESC";
$arrCamposProdutos=db_query($query);
if(isset($_GET['query'])){
$strSearch="";
$arrSearch=explode(" ",$_GET['query']);

$arrTabelasIdiomas=array('emails'=>array(
                                    'id',
                                    'title',
                                    'subject',
                                    'to_email',
                                    'from_email',
                                    'sent_at',
                                    ));
                                    
    foreach ($arrTabelasIdiomas as $nome_tabela=>$tabela) {
        $strSearch.="SELECT * FROM ".$nome_tabela." WHERE ";

        
            $strSearch.="(";
            foreach ($tabela as $campo) {
                foreach($arrSearch as $k => $v) {
                    $strSearch.= $campo . ' LIKE ' . "'%" . $arrSearch[$k] . "%' OR ";
                }
            }
            $strSearch = substr($strSearch, 0, strlen($strSearch) - 4);
            $strSearch.=") ";
        
        
        
        $strSearch.=' ORDER BY id DESC';

    }
    $arrCamposProdutos=db_query($strSearch);
}
    
?>

<!--emails-->

<div class="col-lg-12">
<?php

//algo correu mal
if (isset($_GET['pdf']) 
|| isset($_GET['pdferror'])
|| isset($_GET['pdfformat'])){
?>
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Algo foi mal preenchido!</h4>
    <p>A ação não foi realizada porque um ou mais campos estão preenchidos de forma errada!</p>
    <hr>
    <?php
    
    if (isset($_GET['pdf']) && $_GET['pdf']=="exists") {
    ?>
    <p class="mb-0">Esse anexo já existe! Experimente colocar outro ficheiro...</p>
    <?php
    }
    if (isset($_GET['pdferror']) && $_GET['pdferror']=="exists") {
    ?>
    <p class="mb-0">Ocorreu um erro ao transferir o anexo pdf!</p>
    <?php
    }
    if (isset($_GET['pdfformat']) && $_GET['pdfformat']=="false") {
    ?>
    <p class="mb-0">O anexo não é do formato pdf!</p>
    <?php
    }
    
    ?>
  </div>
  <?php
}
  ?>
  </div>
<!--aviso de algo-->
  <div class="col-lg-12">
  


  <?php
  //sucesso
    if (isset($_GET['success'])
    || isset($_GET['insertsuccess'])  
    || isset($_GET['removesuccess']) 
    || isset($_GET['deletesuccess']) 
    || isset($_GET['returnsuccess'])) {
    ?>
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Sucesso</h4>
    <?php
    if (isset($_GET['success']) && $_GET['success']=="true") {
    ?>
    
    <p class="mb-0">Editou a encomenda com sucesso!</p>
    <?php
    }
    if (isset($_GET['insertsuccess']) && $_GET['insertsuccess']=="true") {
    ?>
    
    <p class="mb-0">Inseriu a encomenda com sucesso!</p>
    <?php
    }
    if (isset($_GET['removesuccess'])) {
    ?>
    
    
    <p class="mb-0">Removeu a encomenda com sucesso! Se não tiver a certeza e quiser voltar atrás, clique no botão "Voltar Atrás". Para eliminar permanentemente clique em "Remover Produto"</p>
    <a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.retornar.php?id='.$_GET['removesuccess']?>" class="btn btn-success">Voltar Atrás</a>
    <a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.eliminar.php?id='.$_GET['removesuccess']?>" class="btn btn-danger">Remover Produto</a>
    <?php
    }
    if (isset($_GET['deletesuccess'])) {
    ?>
    
    <p class="mb-0">Removeu a encomenda permanentemente com sucesso!</p>
    <?php
    }
    if (isset($_GET['returnsuccess'])) {
    ?>
    
    <p class="mb-0">Voltou atrás e a encomenda não foi eliminado!</p>
    <?php
    }
    ?>
    
  </div>
  <?php
    }
    ?>

  <div class="block margin-bottom-sm">
    <div class="row">
      <div class="col-sm-7">
        <div class="title"><strong><a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables.php?table=emails'?>">Emails</a></strong></div>
      </div>

      <div class="col-sm-3">

      </div>
      <div class="col-sm-2">
        <div class="float-right">
        
          <button type="button" data-toggle="modal" data-target="#modalsearch" class="btn btn-primary">
              <div data-toggle="tooltip" data-placement="bottom" title="Pesquisar"><i class="fa fa-search"></i></button>
          </button>
          <div id="modalsearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Pesquisar por um email</strong>
                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                  <p>Aqui pode pesquisar por um email, insira um ou vários termos de pesquisa.</p>
                  <form action="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table']?>.pesquisa.php" method="POST">
                    <div class="form-group">
                      <input type="text" placeholder="Pesquisar..." class="form-control" name="query">
                    </div>
                    <?php
                            $url=$_SERVER['REQUEST_URI'];
                            $arrUrl=explode("&",$url);
                            $url=$arrUrl[0];
                            ?>
                    <input type="hidden" name="url" value="<?php echo $url?>">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="submit">Pesquisar</button>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
          
          </div>
        </div>

    </div>
    <div class="table-responsive"> 
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Data e Hora de Envio</th>
            <th>De</th>
            <th></th>
            <th>Para</th>
            <th>Assunto</th>
            <th>Conteúdo</th>
          </tr>
        </thead>
        <tbody>
        <?php
        foreach ($arrCamposProdutos as $key => $produto) {
          $id=$produto['id'];
          echo'<tr>
          
                <th scope="row">'.$id.'</th>
                <td>'.$produto['sent_at'].'</td>';
          echo '<td>'.FormatField($produto['from_email'],$id).'</td>';
          echo '<th><i class="fa fa-arrow-right" class="h-100 d-inline-block"></i></th>';
          echo '<td>'.FormatField($produto['to_email'],$id).'</td>';
          echo '<td>'.$produto['title'].'</td>';
          echo '<td>'.FormatField($produto['subject'],$id).'</td>';
          
      
          echo "</tr>";
        }
        
        ?>
        
        </tbody>
      </table>
      
    </div>
  </div>
</div>
<!--produtos-->