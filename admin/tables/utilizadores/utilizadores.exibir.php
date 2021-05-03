<?php
@session_start();
$arrlinguas= array (
                      "pt"=>"Português",
                      "en"=>"Inglês",
                      "ru"=>"Russo",
                  );
$query="SELECT * FROM utilizadores ORDER BY id DESC";
$arrCamposProdutos=db_query($query);

if(isset($_GET['query'])){
$strSearch="";
$arrSearch=explode(" ",$_GET['query']);

$arrTabelasIdiomas=array('utilizadores'=>array(
                                    'nome',
                                    'foto',
                                    'anexo',
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

<!--utilizadores-->

<div class="col-lg-12">
<?php

//algo correu mal
if ( 
isset($_GET['format']) 
|| isset($_GET['fileerror']) 
|| isset($_GET['img']) 
|| isset($_GET['pdf']) 
|| isset($_GET['pdferror'])
|| isset($_GET['pdfformat'])
|| isset($_GET['nometoolong'])){
?>
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Algo foi mal preenchido!</h4>
    <p>A ação não foi realizada porque um ou mais campos estão preenchidos de forma errada!</p>
    <hr>
    <?php
    if (isset($_GET['img']) && $_GET['img']=="false") {
    ?>
    <p class="mb-0">O ficheiro anexado não é uma imagem!</p>
    <?php
    }
    if (isset($_GET['img']) && $_GET['img']=="exists") {
    ?>
    <p class="mb-0">Essa imagem já existe! Experimente colocar outra imagem...</p>
    <?php
    }
    if (isset($_GET['img']) && $_GET['img']=="toobig") {
    ?>
    <p class="mb-0">Essa imagem é demasiado grande! Experimente colocar outra imagem...</p>
    <?php
    }
    if (isset($_GET['format']) && $_GET['format']=="false") {
    ?>
    <p class="mb-0">A imagem não é do formato pedido!</p>
    <?php
    }
    if (isset($_GET['fileerror']) && $_GET['fileerror']=="true") {
    ?>
    <p class="mb-0">Ocorreu um erro ao transferir o ficheiro da imagem!</p>
    <?php
    }
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
    if (isset($_GET['nometoolong']) && $_GET['nometoolong']=="true") {
    ?>
    <p class="mb-0">O campo "Nome" é demasiado comprido! Experimente escrever algo mais curto....</p>
    <?php
    }
    
    ?>
  </div>
  <?php
}
  ?>
  


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
    
    <p class="mb-0">Editou o utilizador com sucesso!</p>
    <?php
    }
    if (isset($_GET['insertsuccess']) && $_GET['insertsuccess']=="true") {
    ?>
    
    <p class="mb-0">Inseriu o utilizador com sucesso!</p>
    <?php
    }
    if (isset($_GET['removesuccess'])) {
    ?>
    
    
    <p class="mb-0">Removeu o utilizador com sucesso! Se não tiver a certeza e quiser voltar atrás, clique no botão "Voltar Atrás". Para eliminar permanentemente clique em "Remover utilizador"</p>
    <a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.retornar.php?id='.$_GET['removesuccess']?>" class="btn btn-success">Voltar Atrás</a>
    <a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.eliminar.php?id='.$_GET['removesuccess']?>" class="btn btn-danger">Remover utilizador</a>
    <?php
    }
    if (isset($_GET['deletesuccess'])) {
    ?>
    
    <p class="mb-0">Removeu o utilizador permanentemente com sucesso!</p>
    <?php
    }
    if (isset($_GET['returnsuccess'])) {
    ?>
    
    <p class="mb-0">Voltou atrás e o utilizador não foi eliminado!</p>
    <?php
    }
    ?>
    
  </div>
  <?php
    }
    ?>

  <div class="block margin-bottom-sm">
    <div class="row">
      <div class="col-sm-10">
        <div class="title"><strong><a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables.php?table=utilizadores'?>">Utilizadores</a></strong></div>
      </div>

      <div class="col-sm-2">
        <div class="float-right">
          <button type="button" data-toggle="modal" data-target="#modalsearch" class="btn btn-primary">
              <div data-toggle="tooltip" data-placement="bottom" title="Pesquisar"><i class="fa fa-search"></i></button>
          </button>
          <div id="modalsearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Pesquisar por um utilizador</strong>
                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                  <p>Aqui pode pesquisar por um utilizador, insira um ou vários termos de pesquisa</p>
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
            <th>Nome</th>
            <th>Nome de utilizador</th>
            <th>Email</th>
            <th>Password</th>
            <th>Endereço Jurídico</th>
            <th>Endereço Comercial</th>
            <th>Telefone</th>
            <th>NIF</th>
            <th>Ativo</th>
            <th>Ativar ou Desativar Utilizador</th>
            <th>Remover</th>
          </tr>
        </thead>
        <tbody>
        <?php
        foreach ($arrCamposProdutos as $key => $produto) {
          $id=$produto['id'];
          echo'<tr>
                <th scope="row">'.$id.'</th>
                <td>'.FormatField($produto['nome'],$id).'</td>
                <td>'.FormatField($produto['username'],$id).'</td>
                <td>'.FormatField($produto['email'],$id).'</td>
                <td>Campo encriptado</td>
                <td>'.FormatField($produto['endereco_juridico'],$id).'</td>
                <td>'.FormatField($produto['endereco_comercial'],$id).'</td>
                <td>'.FormatField($produto['telefone'],$id).'</td>
                <td>'.FormatField($produto['NIF'],$id).'</td>
                <th>'.FormatField($produto['is_active'],$id).'</th>
                <th>';

                //editar
                $checkvalue=$produto['is_active']=='1'?'is_active':'not_active';
                $checkvaluefill=$produto['is_active']=='1'?'checked':'not_active';
                
                  
             echo '<form action="'.$arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.editar.php" method="POST" enctype="multipart/form-data">
             <div class="i-checks">
                    <input type="hidden" name="id" value="'.$id.'">
                    <input type="hidden" name="url" value="'.$url.'">
                    <input id="checkboxCustom1" type="checkbox" name="is_active" class="checkbox-template" onChange="this.form.submit()" '.$checkvaluefill.'>
                    <label for="checkboxCustom1"></label>
                  </div>
                  </form>
                  </th>';

                    //editar end
                    ?>
                    

                  <th>
                    <button type="button" data-toggle="modal" data-target="#modalremove<?php echo $id?>" class="btn btn-primary"><div data-toggle="tooltip" data-placement="bottom" title="Remover"><i class="fa fa-remove"></i></div></button>
                      <div id="modalremove<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Remover Utilizador</strong>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <p>De certeza que deseja remover o utilizador "<?php echo $utilizador['nome'] ?>"?</p>
                              <form action="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table']?>.remover.php" method="POST" enctype="multipart/form-data">
                              <?php
                          $url=$_SERVER['REQUEST_URI'];
                          $arrUrl=explode("&",$url);
                          $url=$arrUrl[0];
                          ?>
                              <input type="hidden" name="id" value="<?php echo $id?>">
                              <input type="hidden" name="url" value="<?php echo $url?>">
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                            <button type="submit" class="btn btn-primary" name="submit">Remover Utilizador</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                  
                  </th>
              </tr>
              <?php
        }
        ?>
        
        </tbody>
      </table>
      
    </div>
  </div>
</div>
<!--utilizadores-->
