<?php
session_start();
if ($_SESSION['usuario']) {
  if ($_SESSION['usuario']['TIPO_USUARIO'] != 'JEFE') {
    header('location:../admin');
  }
} else {
  header('location:../../');
}
?>
<?php 
	require '../config/conexion.php';
	$id=$_SESSION['usuario']['ID_PROYECTO'];
	$sql = "SELECT ID_PROYECTO,CODIGO_PROYECTO,NOMBRE_PROYECTO,(SELECT DESCRIPCION FROM estado_proyecto WHERE estado_proyecto.ID_ESTADO=proyecto.ID_ESTADO) AS ESTADO,(SELECT DESCRIPCION FROM categoria_proyecto WHERE categoria_proyecto.ID_CATEGORIA_P=proyecto.ID_CATEGORIA_P) AS CATEGORIA,DESCRIPCION_PROYECTO,DATESTART,DATEEND,DATEENDFAKE,MONTO FROM proyecto WHERE ID_PROYECTO='$id'";
	$resul=$conexion->query($sql);

 ?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
      <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>MODULO PROYECTOS</title>
    <!-- Bootstrap -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="../../assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- NProgress -->
    <link href="../../assets/css/nprogress.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/datepicker.min.css">
    <!-- Custom Theme Style -->
    <link href="../../assets/css/custom.min.css" rel="stylesheet">
    <link href="../../assets/css/miestilodash.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/themes/default.min.css">
    <link rel="stylesheet" href="../../assets/css/themes/semantic.min.css">
    <link rel="stylesheet" href="../../assets/css/alertify.css">
    <!-- <link rel="stylesheet" href="../../assets/css/alertify.min.css"> -->

  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a class="site_title" href="../admin/">
                <i class="fa fa-building-o"></i>
                <span>SISGPL </span>
              </a>
            </div>
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img alt="..." class="img-circle profile_img" src="../../assets/images/user.png">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo $_SESSION['usuario']['NOMBRE_PERSONAL']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br/>
            <!-- sidebar menu -->
            <div class="main_menu_side hidden-print main_menu" id="sidebar-menu">
              <div class="menu_section">
                <h3> General</h3>
                <ul class="nav side-menu">
                  <li class="active"><a href="../user/"><i class="fa fa-book"></i>Proyectos</a></li>
                  <li><a style="pointer-events: none;cursor: default;"><i class="fa fa-file-text"></i>Documentos</a>
                  </li>
                  <li><a style="pointer-events: none;cursor: default;"><i class="fa fa-users"></i>Personal</a></li>
                  <li><a style="pointer-events: none;cursor: default;"><i class="fa fa-bar-chart-o"></i>Reportes</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-placement="top" data-toggle="tooltip" title="Settings">
                <span aria-hidden="true" class="glyphicon glyphicon-cog"></span>
              </a>
              <a data-placement="top" data-toggle="tooltip" title="FullScreen">
                <span aria-hidden="true" class="glyphicon glyphicon-fullscreen"></span>
              </a>
              <a data-placement="top" data-toggle="tooltip" title="Lock">
                <span aria-hidden="true" class="glyphicon glyphicon-eye-close"></span>
              </a>
              <a data-placement="top" data-toggle="tooltip" href="login.html" title="Logout">
                <span aria-hidden="true" class="glyphicon glyphicon-off"></span>
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
                  <a aria-expanded="false" class="user-profile dropdown-toggle" data-toggle="dropdown" href="javascript:;">
                    <img alt="" src="../../assets/images/user.png">
                    Cerrar sesion
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href="../logout.php"><i class="fa fa-sign-out pull-right"></i>
                        Logout
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" id="lislist" role="main">
          <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="page-title">
                <div class="title_left">
                    <h3>Proyecto</h3>
                </div>
                
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> Proyecto</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="table-responsive">
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th>Nombre del Proyecto</th>
                          <th>Categoria</th>
                          <th>Estado</th>
                          <th>Monto</th>
                          <th>Fecha Inicio</th>
                          <th>Fecha Fin</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody id="mostrarDatos" >
                        <?php while ($data=$resul->fetch_array()) {?>
                        <tr>
                          <td><?php echo $data['CODIGO_PROYECTO'] ?></td>
                          <td><?php echo $data['NOMBRE_PROYECTO'] ?></td>
                          <td><?php echo $data['CATEGORIA'] ?></td>
                          <td><a class='btn btn-<?php echo returnStatus($data['ESTADO']) ?>'><?php echo ucfirst(strtolower($data['ESTADO'])); ?></a>
                          </td>
                          <td><?php echo $data['MONTO']; ?></td>
                          <td><?php echo $data['DATESTART']; ?></td>
                          <td><?php echo $data['DATEEND']; ?></td>
                          <td>
                            <a href="verproyecto.php?comen=<?php echo base64_encode($data['DESCRIPCION_PROYECTO']) ?>&codigo=<?php echo base64_encode($data['CODIGO_PROYECTO']) ?>&name=<?php echo base64_encode($data['NOMBRE_PROYECTO']) ?>&est=<?php echo base64_encode($data['ESTADO']) ?>&cat=<?php echo base64_encode($data['CATEGORIA']) ?>
                            &dateI=<?php echo base64_encode($data['DATESTART']) ?>&dateF=<?php echo base64_encode($data['DATEEND']) ?>&id=<?php echo base64_encode($data['ID_PROYECTO']); ?>" class="btn btn-primary btn-xs">  <i class="fa fa-folder"></i> Ver </a>
                            
                          </td>
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <p> Copyright © 2017 - Derechos Reservados</p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/accionesProyecto.js"></script>
    <script src="../../assets/js/alertify.js"></script>
    <script src="../../assets/js/datepicker.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <!-- NProgress -->
    <script src="../../assets/js/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../assets/js/bootstrap-progressbar.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../assets/js/custom.min.js"></script>
    <script>
      $(document).ready(function(){
        $.fn.datepicker();
        $('[data-toggle="datepicker"]').datepicker();
        
      })
    </script>
  </body>
</html>
<?php 
  function returnStatus($esta){
    switch ($esta) {
      case 'EN ESPERA':$status='espera';
        break;
      case 'GANADO':$status='ganado';
        break;  
      case 'PERDIDO':$status='perdido';
        break;
      case 'INCONCLUSO':$status='inconcluso';
        break;
      case 'FINALIZADO':$status='finalizado';
        break;    
      default:
        break;
    }
    return $status;
  }


 ?>