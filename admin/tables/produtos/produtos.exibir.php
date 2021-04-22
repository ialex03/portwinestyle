<?php
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
$query="SELECT * FROM produtos P INNER JOIN produtos_idiomas PI ON P.id=PI.id WHERE PI.idioma='$_SESSION[idioma]' ORDER BY P.id";
$arrCamposProdutos=db_query($query);
?>

<!--produtos-->

<div class="col-lg-12">
<?php
if (isset($_GET['img']) || isset($_GET['format']) || isset($_GET['fileerror']) || isset($_GET['castastoolong'])){
?>
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Algo foi mal preenchido!</h4>
    <p>A edição do produto não foi realizada porque um ou mais campos estão preenchidos de forma errada!</p>
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
    ?>
  </div>
  <?php
}
  ?>


  <?php
    if (isset($_GET['success']) && $_GET['success']=="true") {
    ?>
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Sucesso</h4>
    
    <p class="mb-0">Editou o produto com sucesso!</p>
    
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
        <button class="btn btn-primary">
            <div data-toggle="tooltip" data-placement="bottom" title="Inserir"><i class="fa fa-plus"></i></button>
        </button>
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
            <th>Ano de Colheita</th>
            <th>Castas</th>
            <th>Graduação Alcoólica</th>
            <th>Acidez</th>
            <th>Açúcar</th>
            <th>Temperatura de Consumo</th>
            <th>Favoritados</th>
            <th>Visualizações</th>
            <th>Solo</th>
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
                <td>'.FormatField($produto['ano_colheita'],$id).'</td>
                <td>'.FormatField($produto['castas'],$id).'</td>
                <td>'.FormatField($produto['graduacao_alcoolica'],$id).'</td>
                <td>'.FormatField($produto['acidez'],$id).'</td>
                <td>'.FormatField($produto['acucar'],$id).'</td>
                <td>'.FormatField($produto['temperatura_consumo'],$id).'</td>
                <td>'.FormatField($produto['n_likes'],$id).'</td>
                <td>'.FormatField($produto['views'],$id).'</td>
                <td>'.FormatField($produto['solo'],$id).'</td>
                <td>'.FormatField($produto['processo_vinificacao'],$id).'</td>
                <td>'.FormatField($produto['notas_prova'],$id).'</td>
                <td>'.FormatField($produto['info_adicional'],$id).'</td>
                <th>
                  
                  <button type="button" data-toggle="modal" data-target="#modal'.$id.'" class="btn btn-primary"><div data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></div></button>

                  <div id="modal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Editar registo</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Aqui pode editar o produto. Se não quiser alterar nada feche o modal. Se quiser alterar apenas alguns, simplesmente altere os campos que quiser e não preencha os outros.</p>
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
                                <label>Desginação de origem</label>
                                <input type="text" placeholder="<?php echo FormatField($produto['designacao_origem'],$id)?>" class="form-control" name="designacao_origem">
                              </div>
                              <div class="form-group">
                                <label>Região</label>
                                <input type="text" placeholder="<?php echo FormatField($produto['regiao'],$id)?>" class="form-control" name="regiao">
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
                          $url=$_SERVER['REQUEST_URI'];//left off here
                          $arrUrl=explode("&",$url);
                          $url=$arrUrl[0];
                          ?>
                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <input type="hidden" name="url" value="<?php echo $url?>">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Fechar</button>
                            <button type="submit" class="btn btn-primary" name="submit">Salvar Mudanças</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>

                  <button class="btn btn-primary">
                    <div data-toggle="tooltip" data-placement="bottom" title="Remover"><i class="fa fa-remove"></i></button>
                  </button>
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