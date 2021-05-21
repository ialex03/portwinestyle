<?php
@session_start();
require '/Applications/MAMP/htdocs/portwinestyle/includes/settings.inc.php';
include $arrSETTINGS['dir_site'].'/includes/db.inc.php';
db_connect();
?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin by Bootstrapious.com</title>
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
            <li class="breadcrumb-item active"><?php echo $_GET['chart']?></li>
          </ul>
        </div>
        



        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <?php
              include $arrSETTINGS['dir_site_admin'].'/charts/'.$_GET['chart'].'.exibir.php';
              ?>
              </div>
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
      <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Charts</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Charts        </li>
          </ul>
        </div>
        <section>
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-8">
                <div class="line-chart block chart">
                  <div class="title"><strong>Line Chart Example</strong></div>
                  <canvas id="lineChartCustom1"></canvas>
                </div>
              </div>
              <div class="col-lg-4">       
                <div class="lin-chart block chart">
                  <div class="title"><strong>Line Chart Example</strong></div>
                  <div class="line-chart chart margin-bottom-sm">
                    <canvas id="lineChartCustom2"></canvas>
                  </div>
                  <div class="line-chart chart">
                    <canvas id="lineChartCustom3"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="chart block">
                  <div class="title"> <strong>Bar Chart Example</strong></div>
                  <div class="bar-chart chart margin-bottom-sm">
                    <canvas id="barChartCustom1"></canvas>
                  </div>
                  <div class="bar-chart chart">
                    <canvas id="barChartCustom2"></canvas>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-6">
                <div class="pie-chart chart block">
                  <div class="title"><strong>Pie Chart Example</strong></div>
                  <div class="pie-chart chart margin-bottom-sm">
                    <canvas id="pieChartCustom1"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="doughnut-chart chart block">
                  <div class="title"><strong>Pie Chart Example</strong></div>
                  <div class="doughnut-chart chart margin-bottom-sm">
                    <canvas id="doughnutChartCustom1"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="polar-chart chart block">
                  <div class="title"><strong>Polar Chart Example</strong></div>
                  <div class="polar-chart chart margin-bottom-sm">
                    <canvas id="polarChartCustom"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="radar-chart chart block">
                  <div class="title"><strong>Radar Chart Example</strong></div>
                  <div class="radar-chart chart margin-bottom-sm">
                    <canvas id="radarChartCustom"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              <p class="no-margin-bottom">2020 &copy; Your company. Design by <a href="https://bootstrapious.com/p/bootstrap-4-dark-admin">Bootstrapious</a>.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-custom.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>