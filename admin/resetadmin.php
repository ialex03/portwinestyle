<?php

    require '/Applications/MAMP/htdocs/portwinestyle/includes/settings.inc.php';
include $arrSETTINGS['dir_site'].'/includes/db.inc.php';
@session_start();
if (!isset($_SESSION['unlocked_on'])){
    $_SESSION['unlocked_on']=0;
}
if (!isset($_SESSION['attempts'])){
    $_SESSION['attempts']=0;
}
db_connect();

    if(isset($_GET['selector'])){
$query = "SELECT * FROM password_reset WHERE selector = '".$_GET['selector']."' AND expires >= ".time();
$results=db_query($query);
}



if ( empty( $results ) && isset($_GET['selector']) ) {
    echo 'There was an error processing your request. Error Code: 002';
}else if(isset($_GET['selector'])){
$auth_token = $results[0]['token'];
$calc = hash('sha256', hex2bin($_GET['validator']));
}
     
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PortlineAdmin - Alterar palavra-passe</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/portlinefav.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="login-page">
      <a href='https://br.freepik.com/fotos/restaurante'>Restaurante foto criado por azerbaijan_stockers - br.freepik.com</a>
      
      <div class="container d-flex align-items-center">
        
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <?php include $arrSETTINGS['dir_site_admin']."/includes/logoinfo.inc.php";?>
            <!-- Form Panel    -->
            <div class="col-lg-6">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <div class="header">
                  <p>Alterar palavra-passe</p>
                  </div>
                  <?php
                  if(isset($_GET['success']) && $_GET['success']=="false"){
                  ?>
                  <div class="warning">
                    <p>A password ou email não estão corretos!</p>
                  </div>
                                
                  <?php
                  }
            if (isset($_GET['success']) && $_GET['success']=="true") {

               
                echo'<div class="checkout__input__checkbox">
                        <div class="text-success">
                            <p>Palavra-passe alterada com sucesso!</p>'?>
                            <a href="<?php echo $arrSETTINGS['url_site_admin']?>/index.php">Iniciar sessão</a>
                        </div>
                    </div>
                    <?php
                    $query="DELETE FROM password_reset WHERE email='".$_GET['email']."'";
            db_query($query);
            
            }else{
                if((isset($auth_token) && isset($calc))){
                    if ( hash_equals( $calc, $auth_token ) )  {
                        $user = isset($results[0]['email']);
                            if ( false === $user ) {
                                return array('status'=>0,'message'=>'There was an error processing your request. Error Code: 003');
                            }

            ?>
                  <form method="POST" class="form-validate mb-4" action="<?php echo $arrSETTINGS['url_site']?>updatepassword.php">
                    
                    <div class="form-group">
                      <input id="login-username" type="password" name="loginUsername" required data-msg="Por favor preencha com a palavra-passe" class="input-material">
                      <label for="login-username" class="label-material">Palavra-passe</label>
                    </div>
                    <div class="form-group">
                      <input id="login-username" type="password" name="loginPassword" required data-msg="Por favor preencha com a palavra-passe" class="input-material">
                      <label for="login-username" class="label-material">Confirmar palavra-passe</label>
                    </div>
                    <input type="hidden" value="true" name="admin">
                    <input type="hidden" value="<?php echo $results[0]['email']?>" name="email">
                    <input type="hidden" name="selector" value="<?php echo $_GET['selector']?>">
                            <input type="hidden" name="validator" value="<?php echo $_GET['validator']?>">
                    <button type="submit" class="btn btn-primary">Alterar</button>
                <br><br><a class="forgot-pass">A palavra passe deve conter pelo menos 8 caracteres, com um máximo de 20, um carácter especial e uma letra maiúscula e minúscula.</a><br>
                <?php
                            if(isset($_GET['passwordconfirmed'])){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>As palavras-passes não são iguas, experimente digitar devagarinho...</p>
                                </div>
                                </div>';
                            }
                            ?>
                            <?php
                            if(isset($_GET['tooshort'])){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>A palavra-passe é demasiado curta :/</p>
                                </div>
                                </div>';
                            }
                            ?>
                            <?php
                            if(isset($_GET['toolong'])){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>A sua palavra-passe é demasiado comprida</p>
                                </div>
                                </div>';
                            }
                            ?>
                            <?php
                            if(isset($_GET['nosc'])){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>A palavra-passe não tem caracteres especiais</p>
                                </div>
                                </div>';
                            }
                            ?>
                            <?php
                            if(isset($_GET['nolc'])){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>Não há minúsculas na palavra-passe</p>
                                </div>
                                </div>';
                            }
                            ?>
                            <?php
                            if(isset($_GET['nouc'])){
                                echo'<div class="checkout__input__checkbox">
                                <div class="warning">
                                <p>Não há maiúsculas na palavra-passe</p>
                                </div>
                                </div>';
                            }
                            ?>
                  </form>
                  <?php
                    }
                  }
                }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dark-admin" class="external">Bootstrapious</a></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>