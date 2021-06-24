<?php
@session_start();
$arrlinguas= array (
                      "pt"=>"Português",
                      "en"=>"Inglês",
                      "ru"=>"Russo",
                  );

$query="SELECT * FROM mensagens_newsletter ORDER BY id DESC";
$arrCamposProdutos=db_query($query);
if(isset($_GET['queryemail'])){
$strSearch="";
$arrSearch=explode(" ",$_GET['queryemail']);

$arrTabelasIdiomas=array('mensagens_newsletter'=>array(
                                    'id',
                                    'titulo',
                                    'mensagem',
                                    'sent_date',
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
<script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>

<!--emails-->
<div class="col-lg-12">
<?php
//sucesso
if ( 
isset($_GET['success'])&& $_GET['success']=="true"){
?>
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Guardou uma mensagem da newsletter com sucesso!</h4>
    <p>As mensagens serão enviadas para os emails ao longo do tempo, para evitar que estas acabem na caixa de spam.</p>
  </div>
  <?php
}
  ?>
</div>
<div class="col-lg-12">
<?php

//algo correu mal
if ( 
isset($_GET['success'])&& $_GET['success']=="false"){
?>
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Algo correu mal!</h4>
    <p>As mensagens não foram guardadas, tente novamente.</p>
  </div>
  <?php
}
  ?>
</div>
<div class="col-lg-12">
  <div class="block margin-bottom-sm">
    <div class="row">
      <div class="table-responsive"> 
        <form method="POST" action="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table']?>.guardaremail.php">
          <div class="col-12">
            <h1>Guardar e enviar uma mensagem da newsletter</h1>
            <div class="form-group">
            <p>Título</p>
              <input type="text" placeholder="Título..." class="form-control" name="titulo" maxlength="100" required>
            </div>
          
            <textarea id="mytextarea" name="mensagem" placeholder="Escreva aqui o conteúdo, preferencialmente em múltiplos idiomas..."></textarea>
          
          </div>

          <div class="col-12">
            <div class="float-right">
              <button type="button" data-toggle="modal" data-target="#modalletter" class="btn btn-primary mt-3">
                  Enviar Mensagem
              </button>
              <div id="modalletter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                <div role="document" class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Guardar e enviar uma mensagem da newsletter</strong>
                      <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                      <p>De certeza que deseja enviar esta mensagem?</p>
                      
                        <?php
                        
                                $url=$_SERVER['REQUEST_URI'];
                                $arrUrl=explode("&",$url);
                                $url=$arrUrl[0];
                                ?>
                        <input type="hidden" name="url" value="<?php echo $url?>">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
                    </div>
                  </div>
                </div>
              </div>
        
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
<div class="col-lg-6">

  <div class="block margin-bottom-sm">
    <div class="row">
      <div class="col-sm-7">
        <div class="title"><strong><a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables.php?table=newsletter'?>">Emails da newsletter</a></strong></div>
      </div>

      <div class="col-sm-3">
        

      </div>
      <div class="col-sm-2">
        <div class="float-right">
        
          <button type="button" data-toggle="modal" data-target="#modalsearchemail" class="btn btn-primary">
              <div data-toggle="tooltip" data-placement="bottom" title="Pesquisar"><i class="fa fa-search"></i></button>
          </button>
          <div id="modalsearchemail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Pesquisar por um email</strong>
                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                  <p>Aqui pode pesquisar por um email, insira um ou vários termos de pesquisa.</p>
                  <form action="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table']?>.pesquisa.php" method="POST">
                    <div class="form-group">
                      <input type="text" placeholder="Pesquisar..." class="form-control" name="queryemail">
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
                <td>'.$produto['sent_date'].'</td>';
          echo '<td>'.$produto['titulo'].'</td>';
          echo '<td>'.FormatField($produto['mensagem'],$id).'</td>';
          
      
          echo "</tr>";
        }
        
        ?>
        
        </tbody>
      </table>
      
    </div>
  </div>
</div>

<?php
$query="SELECT * FROM emails_newsletter ORDER BY id DESC";
$arrCamposProdutos=db_query($query);
if(isset($_GET['queryconta'])){
$strSearch="";
$arrSearch=explode(" ",$_GET['queryconta']);

$arrTabelasIdiomas=array('emails_newsletter'=>array(
                                    'id',
                                    'email'
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
<div class="col-lg-6">

  <div class="block margin-bottom-sm">
    <div class="row">
      <div class="col-sm-7">
        <div class="title"><strong><a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables.php?table=newsletter'?>">Contas da newsletter</a></strong></div>
      </div>

      <div class="col-sm-3">
        

      </div>
      <div class="col-sm-2">
        <div class="float-right">
        
          <button type="button" data-toggle="modal" data-target="#modalsearchconta" class="btn btn-primary">
              <div data-toggle="tooltip" data-placement="bottom" title="Pesquisar"><i class="fa fa-search"></i></button>
          </button>
          <div id="modalsearchconta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Pesquisar por um email</strong>
                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                  <p>Aqui pode pesquisar por um email, insira um ou vários termos de pesquisa.</p>
                  <form action="<?php echo $arrSETTINGS['url_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table']?>.enviaremails.php" method="POST">
                    <div class="form-group">
                      <input type="text" placeholder="Pesquisar..." class="form-control" name="queryconta">
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
            <th>Conta</th>
          </tr>
        </thead>
        <tbody>
        <?php
        foreach ($arrCamposProdutos as $key => $produto) {
          $id=$produto['id'];
          echo'<tr>
          
                <th scope="row">'.$id.'</th>
                <td>'.$produto['email'].'</td>';
          
      
          echo "</tr>";
        }
        
        ?>
        
        </tbody>
      </table>
      
    </div>
  </div>
</div>
</div>
<!--produtos-->