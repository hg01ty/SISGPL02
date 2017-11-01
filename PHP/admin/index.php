<?php
session_start();
if ($_SESSION['usuario']) {
 if ($_SESSION['usuario']['TIPO_USUARIO'] != 'ADMIN') {
  header('location:../user');
 }
} else {
 header('location:../../');
}
?>
<?php  
include '../datosHome.php';
$resultado=ultimoPersonal();
$resultado1=ultimosProyectos();
$resultado2=ultimosDocumentos();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PRUEBA DASHBOARD EDIT </title>
    <!-- Bootstrap -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../assets/css/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../../assets/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../../assets/css/custom.min.css" rel="stylesheet">
  <link href="../../assets/css/miestilodash.css" rel="stylesheet">
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../admin/" class="site_title"><i class="fa fa-building-o"></i> <span>SISGPL</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../../assets/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo $_SESSION['usuario']['USUARIO']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="projects.php"><i class="fa fa-book"></i> Proyectos</a>
                  </li>
                  <li><a href="documentos.php"><i class="fa fa-file-text"></i> Documentos</a>
                  </li>

                  <li><a href="personal.php"><i class="fa fa-users"></i>   Personal</a>
                  </li>
                  <li><a href="reportes.php"><i class="fa fa-bar-chart-o"></i> Reportes</a>
                  </li>

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../../assets/images/user.png" alt="">
					<?php echo $_SESSION['usuario']['USUARIO']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">

                        <span>Configuracion</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="../logout.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesion</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Actividades Recientes <small></small></h3>
                  </div>

                </div>
                
                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />

          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Personal <small>Ultimos agregados</small></h2>
                  <ul class="nav navbar-right panel_toolbox" style="min-width: 0px">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  
                    <ul class="list-unstyled top_profiles scroll-view">
                    <?php while ($dato=$resultado->fetch_array()) { ?>
                        <li class="media event">
                          <a class="pull-left border-aero profile_thumb"><i class="fa fa-user aero"></i></a>
                          <div class="media-body">
                            <a class="title"><?php echo $dato['NOMBRE']."<br>"; ?></a>
                            <p><?php echo $dato['OCUPACION']; ?></p>
                            <p><?php echo $dato['EDAD_PERSONAL']."/ <i class='fa fa-phone-square' aria-hidden='true'></i> ".$dato['TELEFONO_PERSONAL'] ?></p>
                          </div>
                        </li>
                      
                      <?php } ?>
                    </ul>
                    
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Proyectos <small>ultimos creados</small></h2>
                  <ul class="nav navbar-right panel_toolbox" style="min-width: 0px">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                 
                   <ul class="list-unstyled top_profiles scroll-view">
                    <?php while ($dato1=$resultado1->fetch_array()) { ?>
                        <li class="media event">
                          <a class="pull-left border-aero profile_thumb"><i class="fa fa-book blue"></i></a>
                          <div class="media-body">
                            <a class="title"><?php echo $dato1['NOMBRE_PROYECTO']; ?></a>
                            <p><?php echo $dato1['TIPO']; ?></p>
                            <p><?php echo "Monto:S/".$dato1['MONTO']; ?></p>
                          </div>
                        </li>
                      <?php } ?>
                    </ul>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Documentos <small>ultimos añadidos</small></h2>
                  <ul class="nav navbar-right panel_toolbox" style="min-width: 0px">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <ul class="list-unstyled top_profiles scroll-view">
                    <?php while ($dato2=$resultado2->fetch_array()) { ?>
                        <li class="media event">
                          <a class="pull-left border-aero profile_thumb"><i class="fa fa-file-text-o green"></i></a>
                          <div class="media-body">
                            <a class="title"><?php echo $dato2['NOMBRE_DOCUMENTO']; ?></a>
                            <p><?php echo $dato2['CATEGORIA']; ?></p>
                            <p><?php echo "Version:".$dato2['VERSION_DOCUMENTO']; ?></p>
                          </div>
                        </li>
                      
                      <?php } ?>
                    </ul>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <p>Copyright &copy; 2017 - Derechos Reservados</p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../assets/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../assets/js/bootstrap.min.js"></script>

    <!-- NProgress -->
    <script src="../../assets/js/nprogress.js"></script>

    <!-- gauge.js -->
    <script src="../../assets/js/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../assets/js/bootstrap-progressbar.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../assets/js/custom.min.js"></script>

  </body>
</html>
