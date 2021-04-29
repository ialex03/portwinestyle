<?php
@session_start();
$arrlinguas= array (
                      "pt"=>"Português",
                      "en"=>"Inglês",
                      "ru"=>"Russo",
                  );
$arrCampos= array (
                      "#",
                      "Nome",
                      "Bannerr",
                      "Categoria",
                      "Designação de Origem",
                      "Região",
                      "Ano de Colheita",
                      "Castas",
                      "Graduação Alcoólica",
                      "Acidez",
                      "Açúcar",
                      "Temperatura de Consumo",
                      "Favoritados",
                      "Visualizações",
                      "Fornecedor",
                      "Solo",
                      "Processo de vinificação",
                      "Notas de Prova",
                      "Informação Adicional",
                  );
$query="SELECT * FROM banner B INNER JOIN banner_idiomas BI ON B.id=BI.id WHERE BI.idioma='$_SESSION[idioma]' AND B.is_active=1 ORDER BY B.id";
$arrCamposBanners=db_query($query);


$strSearch="";
$arrSearch=explode(" ",$_GET['query']);

$arrTabelasIdiomas=array('banner'=>array(
                                    'foto',
                                    'route_botao',
                                    'texto',
                                    'texto_botao',
                                    ));
                                    
    foreach ($arrTabelasIdiomas as $nome_tabela=>$tabela) {
        $strSearch.="SELECT * FROM ".$nome_tabela." A INNER JOIN ".$nome_tabela."_idiomas B ON A.id=B.id WHERE ";

        
            $strSearch.="(";
            foreach ($tabela as $campo) {
                foreach($arrSearch as $k => $v) {
                    $strSearch.= $campo . ' LIKE ' . "'%" . $arrSearch[$k] . "%' OR ";
                }
            }
            $strSearch = substr($strSearch, 0, strlen($strSearch) - 4);
            $strSearch.=") AND";
        
        
        
        $strSearch.=" B.idioma='$_SESSION[idioma]'".($idcat? " AND id_categoria=".$idcat: '').' ORDER BY A.id DESC';

    }
    $arrCamposBanners=db_query($strSearch);
?>

<!--banners-->

<div class="col-lg-12">
<?php

//algo correu mal
if ( 
isset($_GET['format']) 
|| isset($_GET['fileerror']) 
|| isset($_GET['route_botaotoolong'])
|| isset($_GET['is_activetoolong'])

|| isset($_GET['textotoolong'])
|| isset($_GET['textopttoolong'])
|| isset($_GET['textoentoolong'])
|| isset($_GET['textorutoolong'])
|| isset($_GET['texto_botaotoolong'])
|| isset($_GET['texto_botaopttoolong'])
|| isset($_GET['texto_botaoentoolong'])
|| isset($_GET['texto_botaorutoolong'])){
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
    <p class="mb-0">Ocorreu um erro ao transferir o ficheiro!</p>
    <?php
    }
    if (isset($_GET['route_botaotoolong']) && $_GET['route_botaotoolong']=="true") {
    ?>
    <p class="mb-0">O campo "Hiperligação" é demasiado comprido! Experimente escrever algo mais curto....</p>
    <?php
    }
    if (isset($_GET['is_activetoolong']) && $_GET['is_activetoolong']=="true") {
    ?>
    <p class="mb-0">O campo "Ativo" é demasiado comprido! Experimente escrever algo mais curto....</p>
    <?php
    }
    if (isset($_GET['textotoolong']) && $_GET['textotoolong']=="true") {
    ?>
    <p class="mb-0">O campo "Texto" é demasiado comprido! Experimente escrever algo mais curto....</p>
    <?php
    }
    if (isset($_GET['texto_botaotoolong']) && $_GET['texto_botaotoolong']=="true") {
    ?>
    <p class="mb-0">O campo "Texto do botão" é demasiado comprido! Experimente escrever algo mais curto....</p>
    <?php
    }
    foreach ($arrlinguas as $abrv=>$lingua) {
      if (isset($_GET['texto'.$abrv.'toolong']) && $_GET['texto'.$abrv.'toolong']=="true") {
      ?>
      <p class="mb-0">O campo "Texto" no idioma "<?php echo $lingua?>" é demasiado comprido! Experimente escrever algo mais curto....</p>
      <?php
      }
      if (isset($_GET['texto_botao'.$abrv.'toolong']) && $_GET['texto_botao'.$abrv.'toolong']=="true") {
      ?>
      <p class="mb-0">O campo "Texto do botão" no idioma "<?php echo $lingua?>" é demasiado comprido! Experimente escrever algo mais curto....</p>
      <?php
      }
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
    
    <p class="mb-0">Editou a banner com sucesso!</p>
    <?php
    }
    if (isset($_GET['insertsuccess']) && $_GET['insertsuccess']=="true") {
    ?>
    
    <p class="mb-0">Inseriu a banner com sucesso!</p>
    <?php
    }
    if (isset($_GET['removesuccess'])) {
    ?>
    
    
    <p class="mb-0">Removeu a banner com sucesso! Se não tiver a certeza e quiser voltar atrás, clique no botão "Voltar Atrás". Para eliminar permanentemente clique em "Remover Banner"</p>
    <a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.retornar.php?id='.$_GET['removesuccess']?>" class="btn btn-success">Voltar Atrás</a>
    <a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.eliminar.php?id='.$_GET['removesuccess']?>" class="btn btn-danger">Remover Banner</a>
    <?php
    }
    if (isset($_GET['deletesuccess'])) {
    ?>
    
    <p class="mb-0">Removeu a banner permanentemente com sucesso!</p>
    <?php
    }
    if (isset($_GET['returnsuccess'])) {
    ?>
    
    <p class="mb-0">Voltou atrás e a banner não foi eliminado!</p>
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
        <div class="title"><strong><a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables.php?table=produtos'?>">Banners</a></strong></div>
      </div>

      <div class="col-sm-3">

        <form action="changelang.php" method="POST">
          <input type="hidden" name="url" value="<?php echo $_SERVER['REQUEST_URI']?>">
          <select name="lang" class="form-control mb-3 mb-3" onchange="this.form.submit()">
            <option value="<?php $_SESSION['idioma']?>">Idiomas</option>
            <option value="pt">Português</option>
            <option value="en">English</option>
            <option value="ru">русский</option>
          </select>
        </form>
      </div>
      <div class="col-sm-2">
        <div class="float-right">
        
          <button type="button" data-toggle="modal" data-target="#modalsearch" class="btn btn-primary">
              <div data-toggle="tooltip" data-placement="bottom" title="Pesquisar"><i class="fa fa-search"></i></button>
          </button>
          <div id="modalsearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Pesquisar por uma banner</strong>
                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                  <p>Aqui pode pesquisar por uma banner, insira um ou vários termos de pesquisa</p>
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
          <button type="button" data-toggle="modal" data-target="#modalinsert" class="btn btn-primary">
              <div data-toggle="tooltip" data-placement="bottom" title="Inserir"><i class="fa fa-plus"></i></button>
          </button>
          </div>
        </div>

      <div id="modalinsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Inserir Banner</strong>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <p>Aqui pode inserir uma banner. Se não quiser inserir nada feche o modal.</p>
              <form action="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table']?>.inserir.php" method="POST" enctype="multipart/form-data">
              <h2>Informação geral</h2>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" name="imagem" id="imagem" required>
              </div>
              <div class="form-group">
                <label>Hiperligação</label>
                  <input type="text" placeholder="Hiperligação" class="form-control" name="route_botao" required>
              </div>
              <div class="form-group">
              <label>Ativo</label>
                <div class="i-checks">
                  <input id="radioCustom1" type="radio" value="1" name="is_active" class="radio-template" required>
                  <label for="radioCustom1">Ativo</label>
                </div>
                <div class="i-checks">
                  <input id="radioCustom2" type="radio" checked="" value="0" name="is_active" class="radio-template" required>
                  <label for="radioCustom2">Desativo</label>
                </div>
              </div>
              <?php 
              foreach ($arrlinguas as $abrv=>$lingua) {
               
              ?>
              <h2>Idioma <?php echo $lingua?></h2>
                  
            
                    <div class="form-group">
                      <label>Texto</label>
                      <input type="text" placeholder="Texto" class="form-control" name="texto<?php echo $abrv?>" required>
                    </div>
                    <div class="form-group">
                      <label>Texto do botão</label>
                      <input type="text" placeholder="Texto do botão" class="form-control" name="texto_botao<?php echo $abrv?>" required>
                    </div>
                <?php
              }
                ?>
                </div>
                
                <div class="modal-footer">
                <?php
                $url=$_SERVER['REQUEST_URI'];
                $arrUrl=explode("&",$url);
                $url=$arrUrl[0];
                ?>
                  <input type="hidden" name="id" value="<?php echo $id?>">
                  <input type="hidden" name="url" value="<?php echo $url?>">
                  <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                  <button type="submit" class="btn btn-primary" name="submit">Inserir Banner</button>
                </div>
              </form>
            </div>
          </div>
        </div>


    </div>
    <div class="table-responsive"> 
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Texto</th>
            <th>Texto do botão</th>
            <th>Hiperligação</th>
            <th>Ativo</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
        <?php
        foreach ($arrCamposBanners as $key => $produto) {
          $id=$produto['id'];
          echo'<tr>
                <th scope="row">'.$id.'</th>
                <td><img src="'.$arrSETTINGS['url_site'].'img/hero/'.$produto['foto'].'"></img></td>
                <td>'.FormatField($produto['texto'],$id).'</td>
                <td>'.FormatField($produto['texto_botao'],$id).'</td>

                <td>'.FormatField($produto['route_botao'],$id).'</td>
                <td>'.FormatField($produto['is_active'],$id).'</td>
                <th>';

                //editar
                  
             echo '
             <button type="button" data-toggle="modal" data-target="#modal'.$id.'" class="btn btn-primary"><div data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></div></button>
             

                  <div id="modal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Editar Banner</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Aqui pode editar a banner. Se não quiser alterar nada feche o modal. Se quiser alterar apenas alguns, simplesmente altere os campos que quiser e não preencha os outros.</p>
                            <p>Atenção! Editar informação neste modal, apenas altera a informação relativa a esta língua!</p>
                            <form action="'.$arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.editar.php" method="POST" enctype="multipart/form-data">';
                            ?>
                            
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="imagem" id="imagem">
                              </div>
                              <div class="form-group">
                                <label>Texto</label>
                                <input type="text" placeholder="<?php echo $produto['texto']?>" class="form-control" name="texto">
                              </div>
                              <div class="form-group">
                                <label>Texto do botão</label>
                                <input type="text" placeholder="<?php echo FormatField($produto['texto_botao'],$id)?>" class="form-control" name="texto_botao">
                              </div>
                              <div class="form-group">
                                <label>Hiperligação</label>
                                <input type="text" placeholder="<?php echo FormatField($produto['route_botao'],$id)?>" class="form-control" name="route_botao">
                              </div>
                              
                              <label>Ativo</label>
                                <div class="i-checks">
                                  <input id="radioCustom1" type="radio" value="1" name="is_active" class="radio-template">
                                  <label for="radioCustom1">Ativo</label>
                                </div>
                                <div class="i-checks">
                                  <input id="radioCustom2" type="radio" checked="" value="0" name="is_active" class="radio-template">
                                  <label for="radioCustom2">Desativo</label>
                                </div>
                              </div>
                              
                              
                            
                          </div>
                          <div class="modal-footer">
                          <?php
                          $url=$_SERVER['REQUEST_URI'];
                          $arrUrl=explode("&",$url);
                          $url=$arrUrl[0];
                          ?>
                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <input type="hidden" name="url" value="<?php echo $url?>">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                            <button type="submit" class="btn btn-primary" name="submit">Salvar Mudanças</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <?php
                    //editar end
                    ?>

                  
                    <button type="button" data-toggle="modal" data-target="#modalremove<?php echo $id?>" class="btn btn-primary"><div data-toggle="tooltip" data-placement="bottom" title="Remover"><i class="fa fa-remove"></i></div></button>
                      <div id="modalremove<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Remover Banner</strong>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <p>De certeza que deseja remover a banner "<?php echo $produto['texto'] ?>"?</p>
                              <form action="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table']?>.remover.php" method="POST" enctype="multipart/form-data">
                              <?php
                          $url=$_SERVER['REQUEST_URI'];
                          $arrUrl=explode("&",$url);
                          $url=$arrUrl[0];
                          ?>
                              <input type="hidden" name="id" value="<?php echo $id?>">
                              <input type="hidden" name="url" value="<?php echo $url?>">
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                            <button type="submit" class="btn btn-primary" name="submit">Remover Banner</button>
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
<!--banners-->