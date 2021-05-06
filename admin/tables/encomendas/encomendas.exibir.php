<?php
@session_start();
$arrlinguas= array (
                      "pt"=>"Português",
                      "en"=>"Inglês",
                      "ru"=>"Russo",
                  );

$query="SELECT * FROM encomendas ORDER BY id DESC";
$arrCamposProdutos=db_query($query);
$arrCampos=array('E'=>array(
                                'id',
                                'data_hora',
                                'id_utilizador'


                            )
                  ,'LE'=>array(
                                'quantidade',
                                'estado'
                  )
                  ,'PI'=>array(
                                'nome',
                                'produtor',
                                'designacao_origem'
                  )
                  ,'P'=>array(
                                'ano_colheita'
                  )
                  ,'U'=>array(
                                
                                'nome'
                  ));


$strSearch="";

$arrSearch=explode(" ",$_GET['query']);
$strSearch.="SELECT DISTINCT E.id,E.data_hora,E.id_utilizador,E.is_active FROM encomendas E
            INNER JOIN linhas_encomenda LE
              ON E.id = LE.id_encomenda
            INNER JOIN produtos_idiomas PI
              ON PI.id = LE.id_produto
            INNER JOIN produtos P
            ON PI.id = P.id
            INNER JOIN utilizadores U
            ON U.id = E.id_utilizador WHERE (";
                                    
    foreach ($arrCampos as $nome_tabela=>$tabela) {
            foreach ($tabela as $campo) {
                foreach($arrSearch as $k => $v) {
                    $strSearch.= $nome_tabela.".".$campo . ' LIKE ' . "'%" . $arrSearch[$k] . "%' OR ";
                }
            }
            
        

    }
    $strSearch = substr($strSearch, 0, strlen($strSearch) - 4);
            $strSearch.=")";
        
        
        
        $strSearch.=' ORDER BY E.id DESC';
    
    $arrCamposProdutos=db_query($strSearch);
    
?>

<!--encomendas-->

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
        <div class="title"><strong><a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables.php?table=encomendas'?>">Encomendas</a></strong></div>
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
                <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Pesquisar por uma encomenda</strong>
                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                  <p>Aqui pode pesquisar por uma encomenda, insira um ou vários termos de pesquisa.
                  (Pode pesquisar pelo número e data da encomenda; o nome,produtor,ano de colheita,ou designação de origem de produto incluído numa encomenda; o nome do cliente)</p>
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
            <th>Data e Hora</th>
            <th>Utilizador</th>
            <th>Detalhes</th>
            <th>Estado</th>
            <th>Mudar Estado</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
        <?php
        foreach ($arrCamposProdutos as $key => $produto) {
          $id=$produto['id'];
          echo'<tr>
          
                <th scope="row">'.$id.'</th>
                <td>'.$produto['data_hora'].'</td>';
                $query="SELECT * FROM utilizadores WHERE id=".$produto['id_utilizador']." ORDER BY id";
                $utilizador=db_query($query);
          echo '<td><a href="'.$arrSETTINGS['url_site_admin'].'/tables.php?table=utilizadores#:~:text='.$utilizador[0]['id'].'" class="btn btn-link">#'.FormatField($utilizador[0]['id'],$id)." ".FormatField($utilizador[0]['nome'],$id).'</a></td>';
          echo '<td>
                  <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="heading'.$id.'">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapse'.$id.'" aria-expanded="false" aria-controls="collapse'.$id.'">
                          
                          Abrir para ver detalhes...
                          
                          </button>
                        </h5>
                      </div>

                      <div id="collapse'.$id.'" class="collapse" aria-labelledby="heading'.$id.'" data-parent="#accordion">
                        <div class="card-body">';
                        $query="SELECT * FROM linhas_encomenda WHERE id_encomenda=".$id;
                        $linhas=db_query($query);
                        foreach ($linhas as $key => $linha) {
                      echo "<h4>Produto ".($key+1)."</h4>";
                        $query="SELECT * FROM produtos P INNER JOIN produtos_idiomas PI ON P.id=PI.id WHERE PI.idioma='$_SESSION[idioma]' AND P.is_active=1 AND P.id=".$linha['id_produto']." ORDER BY P.id";
                        $produtos=db_query($query);
                      echo "<p>Número do produto: ".$produtos[0]['id']."</p>";
                      echo "<p>Nome do produto: ".FormatField($produtos[0]['nome'],$id)."</p>";
                      echo "<p>Quantidade sugerida: ".FormatField($linha['quantidade'],$id)."</p>";
                        $query="SELECT * FROM contratos WHERE id=".$linha['id_contrato']." ORDER BY id";
                        $contrato=db_query($query);
                        
                      echo "<p>Estado: ".FormatField($linha['estado'],$id)."</p>";
                        if(isset($contrato[0]['anexo'])){
                        $path=$arrSETTINGS['url_site'].'Docs/'.$contrato[0]['anexo'];
                        ?>
                            <p>
                              <button type="button" onclick="location.href='<?php echo $path?>';" target="_blank" class="btn btn-primary">
                                <div data-toggle="tooltip" data-placement="bottom" title="Abrir Contrato">
                                  <i class="fa fa-file-pdf-o"></i>
                                </div>
                              </button>
                            </p>
                      
                        <?php
                        }else{
                      echo "<p>Não existe contrato de momento!</p>";

                        }
                        
                        }
                        
                         
                        '</div>
                      </div>
                  </div>';
          echo '</div>
            </td>';
      echo '<th>'.FormatField($produto['is_active'],$id).'</th>
                <th>';

                //editar
                $checkvaluefill=($produto['is_active']=='1'?' checked':'');
                
             echo '<form action="'.$arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.editar.php" method="POST" enctype="multipart/form-data">
                      <div class="i-checks">
                        <input type="hidden" name="id" value="'.$id.'">
                        <input type="hidden" name="url" value="'.$url.'">
                        <input id="checkboxCustom1" type="checkbox" name="is_active_order" class="checkbox-template" onChange="this.form.submit()"'.$checkvaluefill.'>
                      </div>
                  </form>
                </th>';
      echo '<th>';
                //editar
                  
             echo '
             <button type="button" data-toggle="modal" data-target="#modal'.$id.'" class="btn btn-primary"><div data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></div></button>
             

                  <div id="modal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Editar Produto</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Aqui pode editar a encomenda. Se não quiser alterar nada feche o modal. </p>
                            <p>Pode alterar os campos que preferir e deixar em branco o que não necessita de preencher!</p>
                            
                            
                            <form action="'.$arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.editar.php" method="POST" enctype="multipart/form-data">';
                            
                            foreach ($linhas as $key => $linha) {
                              
                             
                      echo "<h4>Produto ".($key+1)."</h4>";
                        $query="SELECT * FROM produtos P INNER JOIN produtos_idiomas PI ON P.id=PI.id WHERE PI.idioma='$_SESSION[idioma]' AND P.is_active=1 AND P.id=".$linha['id_produto']." ORDER BY P.id";
                        $produto=db_query($query);
                        
                        
                      echo "<p>Número do produto: ".$produto[0]['id']."</p>";
                      echo "<p>Nome do produto: ".$produto[0]['nome']."</p>";
                      ?>
                        <div class="form-group">
                          <label>Quantidade sugerida</label>
                          <input type="number" placeholder="<?php echo intval($linha['quantidade'])?>" class="form-control" name="quantidade<?php echo $key?>" min ="1">
                        </div>
                        <label>Estado</label>
                        <div class="i-checks">
                          <input id="radioCustom1" type="radio" value="1" name="is_active<?php echo $key?>" class="radio-template" >
                          <label for="radioCustom1">Finalizado!</label>
                        </div>
                        <div class="i-checks">
                          <input id="radioCustom2" type="radio" checked="" value="2" name="is_active<?php echo $key?>" class="radio-template" >
                          <label for="radioCustom2">Em progresso...</label>
                        </div>
                        <div class="i-checks">
                          <input id="radioCustom2" type="radio" checked="" value="0" name="is_active<?php echo $key?>" class="radio-template" >
                          <label for="radioCustom2">Desativo</label>
                        </div>
                        <div class="i-checks">
                          <input id="radioCustom2" type="radio" checked="" value="null" name="is_active<?php echo $key?>" class="radio-template" >
                          <label for="radioCustom2">Não alterar o estado</label>
                        </div>
                        <div class="form-group">
                          <label>Contrato</label>
                          <input type="file" name="anexo<?php echo $key?>" id="anexo<?php echo $key?>">
                        </div>
                        <br>
                        <input type="hidden" value="<?php echo $linha['id_contrato']?>" name="id_contrato<?php echo $key?>">
                        <input type="hidden" value="<?php echo $linha['id_produto']?>" name="id_prod<?php echo $key?>">
                        <input type="hidden" value="<?php echo $linha['id_encomenda']?>" name="id_encomenda<?php echo $key?>">
                        <?php
                        
                        
                        }
                        ?>
                        <input type="hidden" value="<?php echo count($linhas)?>" name="count">
                          
                          </div>
                          <div class="modal-footer">
                          <?php
                          $url=$_SERVER['REQUEST_URI'];
                          $arrUrl=explode("&",$url);
                          $url=$arrUrl[0];
                          ?>
                            
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