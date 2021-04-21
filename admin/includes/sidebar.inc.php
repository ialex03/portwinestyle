<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar" ><a href="#"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></a></div>
          <div class="title">
            <h1 class="h5">Nome de utilizador</h1>
            <p>Administrador</p>
          </div>
        </div>

        <!-- Sidebar Navidation Menus--><span class="heading">Principal</span>
        <ul class="list-unstyled">
          <li class="active"><a href="dashboard.php"> <i class="icon-home"></i>Home </a></li>
          <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Estatísticas</a></li>
          <!--
          <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Estatísticas</a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
              <li><a href="#">Page</a></li>
              <li><a href="#">Page</a></li>
              <li><a href="#">Page</a></li>
            </ul>
          </li>-->
        </ul><span class="heading">Tabelas</span>
        <ul class="list-unstyled">
          <li> <a href="<?php echo $arrSETTINGS['url_site_admin'].'/tables.php?table=produtos'?>"> <i class="icon-grid"></i>Tabela Produtos</a></li>
          <li> <a href="#"> <i class="icon-grid"></i>Tabela 2</a></li>
        </ul>
      </nav>