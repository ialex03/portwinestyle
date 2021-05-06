<?php
@session_start();
require '/Applications/MAMP/htdocs/portwinestyle/includes/settings.inc.php';
include $arrSETTINGS['dir_site'].'/includes/db.inc.php';
include $arrSETTINGS['dir_site_admin'].'/includes/functions.inc.php';
db_connect();
if(!isset($_SESSION['idioma'])) {
        $_SESSION['idioma'] = $idioma_default;
    }  
?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PortlineAdmin - <?php echo $_GET['table'];?></title>
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
    <?php
      if(!isset($_SESSION['useridadmin'])){
        echo "não tem sessão iniciada";
      }else{
      ?>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <!--pesquisar-->
        
        <?php
        include $arrSETTINGS['dir_site_admin'].'/includes/search.inc..php';
        ?>
        <!--pesquisar-->

        <!--header-->
        <?php
        include $arrSETTINGS['dir_site_admin'].'/includes/header.inc.php';
        ?>
        <!--header-->

        

    <div class="d-flex align-items-stretch">

      <!-- Sidebar Navigation-->

      <?php
        include $arrSETTINGS['dir_site_admin'].'/includes/sidebar.inc.php';
        ?>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Tabelas</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $_GET['table']?></li>
          </ul>
        </div>
        



        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <?php
              include $arrSETTINGS['dir_site_admin'].'/tables/'.$_GET['table'].'/'.$_GET['table'].'.exibir.php';
              ?>

              <!--

              <div class="col-lg-12">
                <div class="block margin-bottom-sm">
                  <div class="row">
                    <div class="col-sm-11">
                      <div class="title"><strong><a href="#">Produtos</a></strong></div>
                    </div>
                    <div class="col-sm-1">
                      <select name="account" class="form-control mb-3 mb-3">
                        <option>Idiomas</option>
                        <option>Português</option>
                        <option>English</option>
                        <option>русский</option>
                      </select>
                    </div>
                  </div>
                  <div class="table-responsive"> 
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nome</th>
                          <th>Produtor</th>
                          <th>ooga</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td></td>
                          
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter  </td>
                        </tr>
                      </tbody>
                    </table>
                    
                  </div>
                </div>
              </div>




              <div class="col-lg-6">
                <div class="block">
                  <div class="title"><strong>Striped table with hover effect</strong></div>
                  <div class="table-responsive"> 
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter       </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>



              
              <div class="col-lg-6">
                <div class="block">
                  <div class="title"><strong>Compact Table</strong></div>
                  <div class="table-responsive"> 
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter      </td>
                        </tr>
                        <tr>
                          <th scope="row">4</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">5</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>-->



          </div>
        </section>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              <p class="no-margin-bottom">2020 &copy; Portline. Design by <a href="https://bootstrapious.com/p/bootstrap-4-dark-admin">Bootstrapious</a>.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <?php
      }
    ?>
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