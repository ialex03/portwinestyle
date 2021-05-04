<?php
@session_start();
$arrlinguas= array (
                      "pt"=>"Português",
                      "en"=>"Inglês",
                      "ru"=>"Russo",
                  );
$query="SELECT * FROM paginas B INNER JOIN paginas_idiomas BI ON B.id=BI.id WHERE BI.idioma='$_SESSION[idioma]' AND B.is_active=1 AND B.route='FAQ.php' ORDER BY B.id";
$arrCamposFAQs=db_query($query);


$strSearch="";
$arrSearch=explode(" ",$_GET['query']);

$arrTabelasIdiomas=array('paginas'=>array(
                                    'foto',
                                    'foto_pos',
                                    'is_active',
                                    'subtitulo',
                                    'texto'
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
        
        
        
        $strSearch.=" B.idioma='$_SESSION[idioma]'".($idcat? " AND id_categoria=".$idcat: '').' AND A.route="FAQ.php" ORDER BY A.id DESC';

    }
    $arrCamposFAQs=db_query($strSearch);
?>

<!--paginas-->
<!--aviso de algo-->
  <div class="col-lg-12">
    <?php
    if ((isset($_GET['img']) && $_GET['img']=="null")
    || isset($_GET['subtitulopt'])
    || isset($_GET['subtituloen'])
    || isset($_GET['subtituloru'])
    || isset($_GET['textopt'])
    || isset($_GET['textoen'])
    || isset($_GET['textoru'])){
    ?>
  <div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Aviso!</h4>
    <p>Alguns campos não foram preenchidos...</p>
    <hr>
    <?php
    if (isset($_GET['img']) && $_GET['img']=="null") {
    ?>
    <p class="mb-0">O campo "Foto" não foi preenchido</p>
    <?php
    }
    ?>

  </div>
  <?php
}
  ?>

<div class="col-lg-12">
<?php

//algo correu mal
if ( 
isset($_GET['format']) 
|| isset($_GET['fileerror']) 
|| isset($_GET['subtitulotoolong'])
|| isset($_GET['subtitulopttoolong'])
|| isset($_GET['subtituloentoolong'])
|| isset($_GET['subtitulorutoolong'])){
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
    
    foreach ($arrlinguas as $abrv=>$lingua) {
      if (isset($_GET['subtitulo'.$abrv.'toolong']) && $_GET['subtitulo'.$abrv.'toolong']=="true") {
      ?>
      <p class="mb-0">O campo "Pergunta" no idioma "<?php echo $lingua?>" é demasiado comprido! Experimente escrever algo mais curto....</p>
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
    
    <p class="mb-0">Editou a secção de FAQ com sucesso!</p>
    <?php
    }
    if (isset($_GET['insertsuccess']) && $_GET['insertsuccess']=="true") {
    ?>
    
    <p class="mb-0">Inseriu a secção de FAQ com sucesso!</p>
    <?php
    }
    if (isset($_GET['removesuccess'])) {
    ?>
    
    
    <p class="mb-0">Removeu a secção de FAQ com sucesso! Se não tiver a certeza e quiser voltar atrás, clique no botão "Voltar Atrás". Para eliminar permanentemente clique em "Remover FAQ"</p>
    <a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.retornar.php?id='.$_GET['removesuccess']?>" class="btn btn-success">Voltar Atrás</a>
    <a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.eliminar.php?id='.$_GET['removesuccess']?>" class="btn btn-danger">Remover FAQ</a>
    <?php
    }
    if (isset($_GET['deletesuccess'])) {
    ?>
    
    <p class="mb-0">Removeu a secção de FAQ permanentemente com sucesso!</p>
    <?php
    }
    if (isset($_GET['returnsuccess'])) {
    ?>
    
    <p class="mb-0">Voltou atrás e a secção de FAQ não foi eliminado!</p>
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
        <div class="title"><strong><a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables.php?table=faq'?>">FAQs</a></strong></div>
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
                <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Pesquisar por uma secção de FAQ</strong>
                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                  <p>Aqui pode pesquisar por uma secção de FAQ, insira um ou vários termos de pesquisa</p>
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
            <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Inserir FAQ</strong>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <p>Aqui pode inserir uma secção de FAQ. Se não quiser inserir nada feche o modal.</p>
              <form action="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table']?>.inserir.php" method="POST" enctype="multipart/form-data">
              <h2>Informação geral</h2>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" name="imagem" id="imagem">
              </div>
              <div class="form-group">
                <label>Posição da Foto (caso carregue foto)</label>
                <div class="i-checks">
                  <input id="radioCustom2" type="radio" checked="" value="NULL" name="foto_pos" class="radio-template" required>
                  <label for="radioCustom2">Não carreguei foto</label>
                </div>
                  <div class="i-checks">
                  <input id="radioCustom1" type="radio" value="right" name="foto_pos" class="radio-template" required>
                  <label for="radioCustom1">Direita</label>
                </div>
                <div class="i-checks">
                  <input id="radioCustom2" type="radio" checked="" value="center" name="foto_pos" class="radio-template" required>
                  <label for="radioCustom2">Centro (grande plano)</label>
                </div>
              </div>
              <div class="form-group">
              <label>Estado</label>
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
                      <label>Pergunta</label>
                      <input type="text" placeholder="Pergunta" class="form-control" name="subtitulo<?php echo $abrv?>" required>
                    </div>
                    <div class="form-group">
                      <label>Resposta</label>
                      <input type="text" placeholder="Resposta" class="form-control" name="texto<?php echo $abrv?>" required>
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
                  <button type="submit" class="btn btn-primary" name="submit">Inserir FAQ</button>
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
            <th>Posição da foto</th>
            <th>Pergunta</th>
            <th>Resposta</th>
            <th>Estado</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
        <?php
        foreach ($arrCamposFAQs as $key => $produto) {
          $id=$produto['id'];
          echo'<tr>
                <th scope="row">'.$id.'</th>
                <td>';if (isset($produto['foto'])) {
                  echo '<img src="'.$arrSETTINGS['url_site'].'img/'.$produto['foto'].'"></img>';
                }else{
                  echo 'Não existe foto para este FAQ';

                }
                echo '</td>
                <td>'.FormatField($produto['foto_pos'],$id).'</td>
                <td>'.FormatField($produto['subtitulo'],$id).'</td>

                <td>'.FormatField($produto['texto'],$id).'</td>
                <td>'.FormatField($produto['is_active'],$id).'</td>
                <th>';

                //editar
                  
             echo '
             <button type="button" data-toggle="modal" data-target="#modal'.$id.'" class="btn btn-primary"><div data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></div></button>
             

                  <div id="modal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Editar FAQ</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Aqui pode editar a secção de FAQ. Se não quiser alterar nada feche o modal. Se quiser alterar apenas alguns, simplesmente altere os campos que quiser e não preencha os outros.</p>
                            <p>Atenção! Editar informação neste modal, apenas altera a informação relativa a esta língua!</p>
                            <form action="'.$arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.editar.php" method="POST" enctype="multipart/form-data">';
                            ?>
                            <div class="form-group">
                              <label>Foto</label>
                              <input type="file" name="imagem" id="imagem" required>
                            </div>
                            <div class="form-group">
                              <label>Posição da Foto</label>
                                <div class="i-checks">
                                <input id="radioCustom1" type="radio" value="right" name="foto_pos" class="radio-template" required>
                                <label for="radioCustom1">Direita</label>
                              </div>
                              <div class="i-checks">
                                <input id="radioCustom2" type="radio" checked="" value="center" name="foto_pos" class="radio-template" required>
                                <label for="radioCustom2">Centro (grande plano)</label>
                              </div>
                            </div>
                            <div class="form-group">
                            <label>Estado</label>
                              <div class="i-checks">
                                <input id="radioCustom1" type="radio" value="1" name="is_active" class="radio-template" required>
                                <label for="radioCustom1">Ativo</label>
                              </div>
                              <div class="i-checks">
                                <input id="radioCustom2" type="radio" checked="" value="0" name="is_active" class="radio-template" required>
                                <label for="radioCustom2">Desativo</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Pergunta</label>
                              <input type="text" placeholder="<?php echo FormatField($produto['subtitulo'],$id)?>" class="form-control" name="subtitulo" required>
                            </div>
                            <div class="form-group">
                              <label>Resposta</label>
                              <textarea placeholder="<?php echo $produto['texto']?>" class="form-control" name="texto" required></textarea>
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
                            <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Remover FAQ</strong>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <p>De certeza que deseja remover a secção de FAQ "<?php echo $produto['subtitulo'] ?>"?</p>
                              <form action="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table']?>.remover.php" method="POST" enctype="multipart/form-data">
                              <?php
                          $url=$_SERVER['REQUEST_URI'];
                          $arrUrl=explode("&",$url);
                          $url=$arrUrl[0];
                          ?>
                              <input type="hidden" name="id" value="<?php echo $id?>">
                              <input type="hidden" name="url" value="<?php echo $url?>">
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                            <button type="submit" class="btn btn-primary" name="submit">Remover FAQ</button>
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
<!--paginas-->