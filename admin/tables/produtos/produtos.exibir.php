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
                      "Produtor",
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
$query="SELECT * FROM produtos P INNER JOIN produtos_idiomas PI ON P.id=PI.id WHERE PI.idioma='$_SESSION[idioma]' AND P.is_active=1 ORDER BY P.id";
$arrCamposProdutos=db_query($query);


$strSearch="";
$arrSearch=explode(" ",$_GET['query']);

$arrTabelasIdiomas=array('produtos'=>array(
                                    'ano_colheita',
                                    'castas',
                                    'graduacao_alcoolica',
                                    'acidez',
                                    'acucar',
                                    'temperatura_consumo',
                                    'nome',
                                    'produtor',
                                    'cor',
                                    'designacao_origem',
                                    'pais',
                                    'regiao',
                                    'solo',
                                    'processo_vinificacao',
                                    'notas_prova',
                                    'info_adicional',
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
    $arrCamposProdutos=db_query($strSearch);
?>

<!--produtos-->

<div class="col-lg-12">
<?php

//algo correu mal
if ( 
isset($_GET['format']) 
|| isset($_GET['fileerror']) 
|| isset($_GET['castastoolong']) 

|| isset($_GET['nomepttoolong'])
|| isset($_GET['nomeentoolong'])
|| isset($_GET['nomerutoolong'])
|| isset($_GET['produtorpttoolong'])
|| isset($_GET['produtorentoolong'])
|| isset($_GET['produtorrutoolong'])
|| isset($_GET['corpttoolong'])
|| isset($_GET['corentoolong'])
|| isset($_GET['corrutoolong'])
|| isset($_GET['designacao_origempttoolong'])
|| isset($_GET['designacao_origementoolong'])
|| isset($_GET['designacao_origemrutoolong'])
|| isset($_GET['regiaopttoolong'])
|| isset($_GET['regiaoentoolong'])
|| isset($_GET['regiaorutoolong'])
|| isset($_GET['paispttoolong'])
|| isset($_GET['paisentoolong'])
|| isset($_GET['paisrutoolong'])
|| isset($_GET['solopttoolong'])
|| isset($_GET['soloentoolong'])
|| isset($_GET['solorutoolong'])){
?>
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Algo foi mal preenchido!</h4>
    <p>A acção não foi realizada porque um ou mais campos estão preenchidos de forma errada!</p>
    <hr>
    <?php
    if (isset($_GET['img']) && $_GET['image']=="false") {
    ?>
    <p class="mb-0">O ficheiro anexado não é uma imagem!</p>
    <?php
    }
    if (isset($_GET['img']) && $_GET['image']=="exists") {
    ?>
    <p class="mb-0">Essa imagem já existe! Experimente colocar outra imagem...</p>
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
    if (isset($_GET['castastoolong']) && $_GET['castastoolong']=="true") {
    ?>
    <p class="mb-0">O campo "Castas" é demasiado comprido! Experimente escrever algo mais curto....</p>
    <?php
    }
    foreach ($arrlinguas as $abrv=>$lingua) {
      if (isset($_GET['nome'.$abrv.'toolong']) && $_GET['nome'.$abrv.'toolong']=="true") {
      ?>
      <p class="mb-0">O campo "Nome" no idioma "<?php echo $lingua?>" é demasiado comprido! Experimente escrever algo mais curto....</p>
      <?php
      }
      if (isset($_GET['produtor'.$abrv.'toolong']) && $_GET['produtor'.$abrv.'toolong']=="true") {
      ?>
      <p class="mb-0">O campo "Produtor" no idioma "<?php echo $lingua?>" é demasiado comprido! Experimente escrever algo mais curto....</p>
      <?php
      }
      if (isset($_GET['cor'.$abrv.'toolong']) && $_GET['cor'.$abrv.'toolong']=="true") {
      ?>
      <p class="mb-0">O campo "Cor" no idioma "<?php echo $lingua?>" é demasiado comprido! Experimente escrever algo mais curto....</p>
      <?php
      }
      if (isset($_GET['designacao_origem'.$abrv.'toolong']) && $_GET['designacao_origem'.$abrv.'toolong']=="true") {
      ?>
      <p class="mb-0">O campo "Designação de origem" no idioma "<?php echo $lingua?>" é demasiado comprido! Experimente escrever algo mais curto....</p>
      <?php
      }
      if (isset($_GET['regiao'.$abrv.'toolong']) && $_GET['regiao'.$abrv.'toolong']=="true") {
      ?>
      <p class="mb-0">O campo "Região" no idioma "<?php echo $lingua?>" é demasiado comprido! Experimente escrever algo mais curto....</p>
      <?php
      }
      if (isset($_GET['pais'.$abrv.'toolong']) && $_GET['pais'.$abrv.'toolong']=="true") {
      ?>
      <p class="mb-0">O campo "País" no idioma "<?php echo $lingua?>" é demasiado comprido! Experimente escrever algo mais curto....</p>
      <?php
      }
      if (isset($_GET['solo'.$abrv.'toolong']) && $_GET['solo'.$abrv.'toolong']=="true") {
        ?>
        <p class="mb-0">O campo "Solo" no idioma "<?php echo $lingua?>" é demasiado comprido! Experimente escrever algo mais curto....</p>
        <?php
    
    }
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
    if (isset($_GET['img'])
    || isset($_GET['nomept'])
    || isset($_GET['nomeen'])
    || isset($_GET['nomeru'])
    || isset($_GET['produtorpt'])
    || isset($_GET['produtoren'])
    || isset($_GET['produtorru'])
    || isset($_GET['corpt'])
    || isset($_GET['coren'])
    || isset($_GET['corru'])
    || isset($_GET['designacao_origempt'])
    || isset($_GET['designacao_origemen'])
    || isset($_GET['designacao_origemru'])
    || isset($_GET['regiaopt'])
    || isset($_GET['regiaoen'])
    || isset($_GET['regiaoru'])
    || isset($_GET['paispt'])
    || isset($_GET['paisen'])
    || isset($_GET['paisru'])
    || isset($_GET['solopt'])
    || isset($_GET['soloen'])
    || isset($_GET['soloru'])){
    ?>
  <div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Aviso!</h4>
    <p>Alguns campos não foram preenchidos...Recomendamos vivamente que preencha todos os campos, para proporcionar uma boa experiência ao utilizador e evitar erros no website.</p>
    <hr>
    <?php
    if (isset($_GET['img']) && $_GET['img']=="null") {
    ?>
    <p class="mb-0">O campo "Foto" não foi preenchido</p>
    <?php
    }
    if (isset($_GET['ano_colheita']) && $_GET['ano_colheita']=="null") {
    ?>
    <p class="mb-0">O campo "Ano de colheita" não foi preenchido</p>
    <?php
    }
    if (isset($_GET['castas']) && $_GET['castas']=="null") {
    ?>
    <p class="mb-0">O campo "Castas" não foi preenchido</p>
    <?php
    }
    if (isset($_GET['graduacao_alcoolica']) && $_GET['graduacao_alcoolica']=="null") {
    ?>
    <p class="mb-0">O campo "Graduação Alcoólica" não foi preenchido</p>
    <?php
    }
    if (isset($_GET['acidez']) && $_GET['acidez']=="null") {
    ?>
    <p class="mb-0">O campo "Acidez" não foi preenchido</p>
    <?php
    }
    if (isset($_GET['acucar']) && $_GET['acucar']=="null") {
    ?>
    <p class="mb-0">O campo "Açúcar" não foi preenchido</p>
    <?php
    }
    if (isset($_GET['temperatura_consumo']) && $_GET['temperatura_consumo']=="null") {
    ?>
    <p class="mb-0">O campo "Temperatura de consumo" não foi preenchido</p>
    <?php
    }



    foreach ($arrlinguas as $abrv=>$lingua) {
      
    if (isset($_GET['nome'.$abrv]) && $_GET['nome'.$abrv]=="null") {
    ?>
    <p class="mb-0">O campo "Nome" no idioma "<?php echo $lingua?>" não foi preenchido</p>
    <?php
    }
    
    if (isset($_GET['produtor'.$abrv]) && $_GET['produtor'.$abrv]=="null") {
    ?>
    <p class="mb-0">O campo "Produtor" no idioma "<?php echo $lingua?>" não foi preenchido</p>
    <?php
    }
    
    if (isset($_GET['cor'.$abrv]) && $_GET['cor'.$abrv]=="null") {
    ?>
    <p class="mb-0">O campo "Cor" no idioma "<?php echo $lingua?>" não foi preenchido</p>
    <?php
    }
    
    if (isset($_GET['designacao_origem'.$abrv]) && $_GET['designacao_origem'.$abrv]=="null") {
    ?>
    <p class="mb-0">O campo "Designação de origem" no idioma "<?php echo $lingua?>" não foi preenchido</p>
    <?php
    }
    
    if (isset($_GET['regiao'.$abrv]) && $_GET['regiao'.$abrv]=="null") {
    ?>
    <p class="mb-0">O campo "Região" no idioma "<?php echo $lingua?>" não foi preenchido</p>
    <?php
    }
    
    if (isset($_GET['pais'.$abrv]) && $_GET['pais'.$abrv]=="null") {
    ?>
    <p class="mb-0">O campo "País" no idioma "<?php echo $lingua?>" não foi preenchido</p>
    <?php
    }
    
    if (isset($_GET['solo'.$abrv]) && $_GET['solo'.$abrv]=="null") {
    ?>
    <p class="mb-0">O campo "Solo" no idioma "<?php echo $lingua?>" não foi preenchido</p>
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
    || isset($_GET['removesuccess']) 
    || isset($_GET['deletesuccess']) 
    || isset($_GET['returnsuccess'])) {
    ?>
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Sucesso</h4>
    <?php
    if (isset($_GET['success']) && $_GET['success']=="true") {
    ?>
    
    <p class="mb-0">Editou o produto com sucesso!</p>
    <?php
    }
    if (isset($_GET['insertsuccess']) && $_GET['insertsuccess']=="true") {
    ?>
    
    <p class="mb-0">Inseriu o produto com sucesso!</p>
    <?php
    }
    if (isset($_GET['removesuccess'])) {
    ?>
    
    
    <p class="mb-0">Removeu o produto com sucesso! Se não tiver a certeza e quiser voltar atrás, clique no botão "Voltar Atrás". Para eliminar permanentemente clique em "Remover Produto"</p>
    <a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.retornar.php?id='.$_GET['removesuccess']?>" class="btn btn-success">Voltar Atrás</a>
    <a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.eliminar.php?id='.$_GET['removesuccess']?>" class="btn btn-danger">Remover Produto</a>
    <?php
    }
    if (isset($_GET['deletesuccess'])) {
    ?>
    
    <p class="mb-0">Removeu o produto permanentemente com sucesso!</p>
    <?php
    }
    if (isset($_GET['returnsuccess'])) {
    ?>
    
    <p class="mb-0">Voltou atrás e o produto não foi eliminado!</p>
    <?php
    }
    ?>
    
  </div>
  <?php
    }
    ?>

  <div class="block margin-bottom-sm">
    <div class="row">
      <div class="col-sm-8">
        <div class="title"><strong><a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables.php?table=produtos'?>">Produtos</a></strong></div>
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
      <div class="col-sm-1">
        <button type="button" data-toggle="modal" data-target="#modalsearch" class="btn btn-primary">
            <div data-toggle="tooltip" data-placement="bottom" title="Pesquisar"><i class="fa fa-search"></i></button>
        </button>
        <div id="modalsearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
          <div role="document" class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Pesquisar por um produto</strong>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p>Aqui pode pesquisar por um produto, insira um ou vários termos de pesquisa</p>
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

      <div id="modalinsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Inserir Produto</strong>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <p>Aqui pode inserir um produto. Se não quiser inserir nada feche o modal.</p>
              <form action="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table']?>.inserir.php" method="POST" enctype="multipart/form-data">
              <h2>Informação geral</h2>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" name="imagem" id="imagem">
              </div>
              <div class="form-group">
                <label>Categoria</label>
                  <select class="form-control" name="categoria" required>';
                    <?php
                      $query="SELECT * FROM categorias_idiomas WHERE idioma='".$_SESSION[idioma]."' ORDER BY id";
                      $categorias=db_query($query);
                      echo "<option value=''>Categoria</option>";

                      foreach ($categorias as $categoria) {
                        echo '<option value="'.$categoria['id'].'">'.$categoria['nome'].'</option>';
                      }
                    ?>
                  </select>
              </div>
               <div class="form-group">
                      <label>Ano de colheita</label>
                      <input type="number" placeholder="Ano de colheita" class="form-control" name="ano_colheita" min ="1000"max="<?php echo date("Y")+10?>">
                    </div>
                    <div class="form-group">
                      <label>Castas</label>
                      <textarea placeholder="Castas" class="form-control" name="castas"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Graduação Alcoólica</label>
                      <div class="row">
                        <div class="col-3">
                          <input type="number" step="0.01" placeholder="Graduação Alcoólica" class="form-control" name="graduacao_alcoolica" min="0" max="99">
                        </div>
                        <div class="col-2">
                        <p>% vol</p>
                        </div>
                        <div class="col-7">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Acidez</label>
                      <div class="row">
                        <div class="col-3">
                          <input type="number" step="0.01" placeholder="Acidez" class="form-control" name="acidez" min="0" max="99">
                        </div>
                        <div class="col-2">
                        <p>g/l</p>
                        </div>
                        <div class="col-7">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Açúcar</label>
                      <div class="row">
                        <div class="col-3">
                          <input type="number" step="0.01" placeholder="Açúcar" class="form-control" name="acucar" min="0" max="999">
                        </div>
                        <div class="col-2">
                        <p>g/l</p>
                        </div>
                        <div class="col-7">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Temperatura de consumo</label>
                      <div class="row">
                        <div class="col-3">
                        <?php $temp=explode("-",FormatField($produto['temperatura_consumo'],$id));?>
                          <input type="number" placeholder="Temp. Mín." class="form-control" name="tempmin" min="-20" max="80">
                        </div>
                        <div class="col-1">
                        <p>-</p>
                        </div>
                        <div class="col-3">
                          <input type="number" placeholder="Temp. Máx." class="form-control" name="tempmax" min="-20" max="80">
                        </div>
                        <div class="col-5">
                        <p>°C</p>
                        </div>
                      </div>
                    </div>
              <?php 
              foreach ($arrlinguas as $abrv=>$lingua) {
               
              ?>
              <h2>Idioma <?php echo $lingua?></h2>
                    
                    <div class="form-group">
                      <label>Nome</label>
                      <input type="text" placeholder="Nome" class="form-control" name="nome<?php echo $abrv?>">
                    </div>
                    <div class="form-group">
                      <label>Produtor</label>
                      <input type="text" placeholder="Produtor" class="form-control" name="produtor<?php echo $abrv?>">
                    </div>
                    
                    <div class="form-group">
                      <label>Designação de origem</label>
                      <input type="text" placeholder="Designação de origem" class="form-control" name="designacao_origem<?php echo $abrv?>">
                    </div>
                    <div class="form-group">
                      <label>Região</label>
                      <input type="text" placeholder="Região" class="form-control" name="regiao<?php echo $abrv?>">
                    </div>
                    <div class="form-group">
                      <label>País</label>
                      <input type="text" placeholder="País" class="form-control" name="pais<?php echo $abrv?>">
                    </div>
                   
                    <div class="form-group">
                      <label>Solo</label>
                      <input type="text" placeholder="Solo" class="form-control" name="solo<?php echo $abrv?>">
                    </div>
                    <div class="form-group">
                      <label>Cor</label>
                      <textarea placeholder="Cor" class="form-control" name="cor<?php echo $abrv?>"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Processo de Vinificação</label>
                      <textarea placeholder="Processo de vinificação" class="form-control" name="processo_vinificacao<?php echo $abrv?>"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Notas de Prova</label>
                      <textarea placeholder="Notas de Provas" class="form-control" name="notas_prova<?php echo $abrv?>"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Informação Adicional</label>
                      <textarea placeholder="Informação Adicional" class="form-control" name="info_adicional<?php echo $abrv?>"></textarea>
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
                  <button type="submit" class="btn btn-primary" name="submit">Inserir Produto</button>
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
            <th>Nome</th>
            <th>Produtor</th>
            <th>Categoria</th>
            <th>Designação de Origem</th>
            <th>Região</th>
            <th>País</th>
            <th>Ano de Colheita</th>
            <th>Castas</th>
            <th>Graduação Alcoólica</th>
            <th>Acidez</th>
            <th>Açúcar</th>
            <th>Temperatura de Consumo</th>
            <th>Favoritados</th>
            <th>Visualizações</th>
            <th>Solo</th>
            <th>Cor</th>
            <th>Processo de vinificação</th>
            <th>Notas de Prova</th>
            <th>Informação Adicional</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
        <?php
        foreach ($arrCamposProdutos as $key => $produto) {
          $id=$produto['id'];
          echo'<tr>
                <th scope="row">'.$id.'</th>
                <td><img src="'.$arrSETTINGS['url_site'].'img/shop/'.$produto['foto'].'"></img></td>
                <td>'.$produto['nome'].'</td>
                <td>'.FormatField($produto['produtor'],$id).'</td>';

                $query="SELECT * FROM categorias_idiomas WHERE id=".$produto['id_categoria']." AND idioma='$_SESSION[idioma]' ORDER BY id";
                $categoria=db_query($query);

          echo '<td>'.$categoria[0]['nome'].'</td>
                <td>'.FormatField($produto['designacao_origem'],$id).'</td>
                <td>'.FormatField($produto['regiao'],$id).'</td>
                <td>'.FormatField($produto['pais'],$id).'</td>
                <td>'.FormatField($produto['ano_colheita'],$id).'</td>
                <td>'.FormatField($produto['castas'],$id).'</td>
                <td>'.FormatField($produto['graduacao_alcoolica'],$id).'</td>
                <td>'.FormatField($produto['acidez'],$id).'</td>
                <td>'.FormatField($produto['acucar'],$id).'</td>
                <td>'.FormatField($produto['temperatura_consumo'],$id).'</td>
                <td>'.FormatField($produto['n_likes'],$id).'</td>
                <td>'.FormatField($produto['views'],$id).'</td>
                <td>'.FormatField($produto['solo'],$id).'</td>
                <td>'.FormatField($produto['cor'],$id).'</td>
                <td>'.FormatField($produto['processo_vinificacao'],$id).'</td>
                <td>'.FormatField($produto['notas_prova'],$id).'</td>
                <td>'.FormatField($produto['info_adicional'],$id).'</td>
                <th>';

                //editar
                  
             echo '<button type="button" data-toggle="modal" data-target="#modal'.$id.'" class="btn btn-primary"><div data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></div></button>

                  <div id="modal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Editar Produto</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Aqui pode editar o produto. Se não quiser alterar nada feche o modal. Se quiser alterar apenas alguns, simplesmente altere os campos que quiser e não preencha os outros.</p>
                            <p>Atenção! Editar informação neste modal, apenas altera a informação relativa a esta língua!</p>
                            <form action="'.$arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.editar.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="imagem" id="imagem">
                              </div>
                              <div class="form-group">
                                <label>Nome</label>
                                <input type="text" placeholder="'.$produto['nome'].'" class="form-control name="nome">
                              </div>
                              <div class="form-group">
                                <label>Produtor</label>
                                <input type="text" placeholder="'.FormatField($produto['produtor'],$id).'" class="form-control" name="produtor">
                              </div>
                              <div class="form-group">
                                <label>Categoria</label>
                                  <select class="form-control" name="categoria">';

                              $query="SELECT * FROM categorias_idiomas WHERE idioma='".$_SESSION[idioma]."' ORDER BY id";
                              $categorias=db_query($query);
                              echo "<option value='0'>Não alterar categoria</option>";

                              foreach ($categorias as $categoria) {
                                echo '<option value="'.$categoria['id'].'">'.$categoria['nome'].'</option>';
                              }
                              ?>
                                  </select>
                              </div>
                              <div class="form-group">
                                <label>Designação de origem</label>
                                <input type="text" placeholder="<?php echo FormatField($produto['designacao_origem'],$id)?>" class="form-control" name="designacao_origem">
                              </div>
                              <div class="form-group">
                                <label>Região</label>
                                <input type="text" placeholder="<?php echo FormatField($produto['regiao'],$id)?>" class="form-control" name="regiao">
                              </div>
                              <div class="form-group">
                                <label>País</label>
                                <input type="text" placeholder="<?php echo FormatField($produto['pais'],$id)?>" class="form-control" name="pais">
                              </div>
                              <div class="form-group">
                                <label>Ano de colheita</label>
                                <input type="number" placeholder="<?php echo FormatField($produto['ano_colheita'],$id)?>" class="form-control" name="ano_colheita" min ="1000"max="<?php echo date("Y")+10?>">
                              </div>
                              <div class="form-group">
                                <label>Castas</label>
                                <textarea placeholder="<?php echo $produto['castas']?>" class="form-control" name="castas"></textarea>
                              </div>
                              <div class="form-group">
                                <label>Graduação Alcoólica</label>
                                <div class="row">
                                  <div class="col-3">
                                    <input type="number" step="0.01" placeholder="<?php echo FormatField($produto['graduacao_alcoolica'],$id)?>" class="form-control" name="graduacao_alcoolica" min="0" max="99">
                                  </div>
                                  <div class="col-2">
                                  <p>% vol</p>
                                  </div>
                                  <div class="col-7">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Acidez</label>
                                <div class="row">
                                  <div class="col-3">
                                    <input type="number" step="0.01" placeholder="<?php echo FormatField($produto['acidez'],$id)?>" class="form-control" name="acidez" min="0" max="99">
                                  </div>
                                  <div class="col-2">
                                  <p>g/l</p>
                                  </div>
                                  <div class="col-7">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Açucar</label>
                                <div class="row">
                                  <div class="col-3">
                                    <input type="number" step="0.01" placeholder="<?php echo FormatField($produto['acucar'],$id)?>" class="form-control" name="acucar" min="0" max="999">
                                  </div>
                                  <div class="col-2">
                                  <p>g/l</p>
                                  </div>
                                  <div class="col-7">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Temperatura de consumo</label>
                                <div class="row">
                                  <div class="col-3">
                                  <?php $temp=explode("-",FormatField($produto['temperatura_consumo'],$id));?>
                                    <input type="number" placeholder="<?php echo $temp[0]?>" class="form-control" name="tempmin" min="-20" max="80">
                                  </div>
                                  <div class="col-1">
                                  <p>-</p>
                                  </div>
                                  <div class="col-3">
                                    <input type="number" placeholder="<?php echo $temp[1]?>" class="form-control" name="tempmax" min="-20" max="80">
                                  </div>
                                  <div class="col-5">
                                  <p>°C</p>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Solo</label>
                                <input type="text" placeholder="<?php echo FormatField($produto['solo'],$id)?>" class="form-control" name="solo">
                              </div>
                              <div class="form-group">
                                <label>Cor</label>
                                <textarea placeholder="<?php echo $produto['cor']?>" class="form-control" name="cor"></textarea>
                              </div>
                              <div class="form-group">
                                <label>Processo de Vinificação</label>
                                <textarea placeholder="<?php echo $produto['processo_vinificacao']?>" class="form-control" name="processo_vinificacao"></textarea>
                              </div>
                              <div class="form-group">
                                <label>Notas de Prova</label>
                                <textarea placeholder="<?php echo $produto['notas_prova']?>" class="form-control" name="notas_prova"></textarea>
                              </div>
                              <div class="form-group">
                                <label>Informação Adicional</label>
                                <textarea placeholder="<?php echo $produto['info_adicional']?>" class="form-control" name="info_adicional"></textarea>
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
                            <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Remover Produto</strong>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <p>De certeza que deseja remover o produto "<?php echo $produto['nome'] ?>"?</p>
                              <form action="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table']?>.remover.php" method="POST" enctype="multipart/form-data">
                              <?php
                          $url=$_SERVER['REQUEST_URI'];
                          $arrUrl=explode("&",$url);
                          $url=$arrUrl[0];
                          ?>
                              <input type="hidden" name="id" value="<?php echo $id?>">
                              <input type="hidden" name="url" value="<?php echo $url?>">
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                            <button type="submit" class="btn btn-primary" name="submit">Remover Produto</button>
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
<!--produtos-->