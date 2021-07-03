<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

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

    
     
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PortlineAdmin - Recuperar</title>
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

               ?>
               <div class="text-success">
                    <p>Mensagem enviada com sucesso!</p>
                  </div>
               <?php
            }
                  ?>
                  <form method="POST" class="form-validate mb-4" action="<?php echo $arrSETTINGS['url_site']?>forgotpassword.php">
                    
                    <div class="form-group">
                      <input id="login-username" type="text" name="loginUsername" required data-msg="Por favor preencha com o email" class="input-material">
                      <label for="login-username" class="label-material">Email</label>
                    </div>
                    <input type="hidden" value="true" name="admin">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                <br><br><a class="forgot-pass">Insira o email, de forma a enviarmos uma hiperligação de recuperação para o seu email</a><br>
                  </form>
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