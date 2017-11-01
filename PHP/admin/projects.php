<?php
session_start();
?>
<?php
include '../categoriaEmpresa.php';
include '../listaProyectos.php';
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
                <h2><?php echo $_SESSION['usuario']['USUARIO']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br/>
            <!-- sidebar menu -->
            <div class="main_menu_side hidden-print main_menu" id="sidebar-menu">
              <div class="menu_section">
                <h3> General</h3>
                <ul class="nav side-menu">
                  <li><a href="projects.php"><i class="fa fa-book"></i>Proyectos</a></li>
                  <li><a href="documentos.php"><i class="fa fa-file-text"></i>Documentos</a>
                  </li>
                  <li><a href="personal.php"><i class="fa fa-users"></i>Personal</a></li>
                  <li><a href="reportes.php"><i class="fa fa-bar-chart-o"></i>Reportes</a>
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
                    <?php echo $_SESSION['usuario']['USUARIO']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href="javascript:;">Perfil</a>
                    </li>
                    <li>
                      <a href="javascript:;"><span>Configuracion</span></a>
                    </li>
                    <li>
                      <a href="javascript:;">Ayuda</a>
                    </li>
                    <li>
                      <a href="../logout.php"><i class="fa fa-sign-out pull-right"></i>
                        Cerrar Sesion
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="dropdown" role="presentation">
                  <a aria-expanded="false" class="dropdown-toggle info-number" data-toggle="dropdown" href="javascript:;">
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
        <div class="right_col" id="lislist" role="main">
          <div class="row">
           <!--   <registrar></registrar>-->
             <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="page-title">
                <div class="title_left">
                    <h3>Proyectos</h3>
                </div>
                <div class="title_right">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                      <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <div class="input-group">
                          <input class="form-control" placeholder="Buscar" id="search" name="search" type="text">
                            <span class="input-group-btn">
                              <button class="btn btn-default">
                                <i aria-hidden="true" class="fa fa-search"></i>
                              </button>
                            </span>
                        </div>
                      </div>
                      <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <button class="btn btn-primary" data-target="#registraProyecto" data-toggle="modal">
                          <i aria-hidden="true" class="fa fa-plus"></i>
                          Añadir proyecto
                        </button>
                        <div class="modal fade" id="registraProyecto">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                  <span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title">
                                <i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 40px;"></i> Nuevo Proyecto</h4>
                              </div>
                              <div class="modal-body">
                                <form id="anadirProyecto" action="" class="form-horizontal" autocomplete="off">
                                  <div class="form-group">
                                    <label class="col-sm-2 col-xs-2 control-label" for="codigo">
                                      Codigo:
                                    </label>
                                    <div class="col-sm-10 col-xs-12">
                                      <input class="form-control" placeholder="Codigo" type="text" id="codigoP" name="codigo" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-sm-2 col-xs-2 control-label" for="nombre">
                                      Nombre:
                                    </label>
                                    <div class="col-sm-10 col-xs-12">
                                      <input class="form-control" placeholder="Nombre Proyecto" id="nombreP" type="text" name="name" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-sm-2 col-xs-2 control-label" for="responsable">
                                      Responsable:
                                    </label>
                                    <div class="col-sm-10 col-xs-12">
                                      <input class="form-control" placeholder="Buscar responsable" type="search" name="responsable" id="responP" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-sm-2 col-xs-2 control-label">
                                      Categoria:
                                    </label>
                                    <div class="col-sm-10 col-xs-12">
                                      <select class="form-control" name="cate" id="categoriaP" required>
                                        <option disabled="" value="" selected="">
                                          Seleccione Categoria:
                                        </option>
                                        <?php while ($datos = $lista->fetch_array()) {?>
                                        <option value="<?php echo $datos['ID_CATEGORIA_P'] ?>"><?php echo $datos['DESCRIPCION']; ?>
                                        </option>
                                        <?php }?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-sm-2 col-xs-2 control-label" for="fechaIni">
                                      Fecha Inicio:
                                    </label>
                                    <div class="col-sm-10 col-xs-12">
                                      <div class="input-group">
                                        <input class="form-control" type="date" data-toggle="datepicker" name="dateI" id="fechaIP" required>
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-sm-2 col-xs-2 control-label" for="fechaFin">
                                      Fecha Fin:
                                    </label>
                                    <div class="col-sm-10 col-xs-12">
                                      <div class="input-group">
                                        <input class="form-control" type="date" name="dateF" id="fechaFP" required>
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </div>
                                      </div>
                                      
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-sm-2 col-xs-2 control-label" for="fechaFin">
                                      Monto:
                                    </label>
                                    <div class="col-sm-10 col-xs-12">
                                      <input class="form-control" type="text" name="monto" id="montoP" title="Utilice solo numeros" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-sm-2 col-xs-2 control-label" for="descrip">
                                      Descripcion:
                                    </label>
                                    <div class="col-sm-10 col-xs-12">
                                      <textarea class="form-control" cols="20" name="descripcion" rows="3" id="comenta" required>
                                      </textarea>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                  <div class="alert alert-success" id="registroExito" style="display:none; ">
                                    Registro exitoso!! <i class="fa fa-check" aria-hidden="true"></i>
                                  </div>
                                    <button class="btn btn-primary" style="margin-bottom: 5px" type="submit">
                                      Aceptar
                                    </button>
                                    <button class="btn btn-danger" data-dismiss="modal" type="button">
                                      Cancelar
                                    </button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> Proyectos</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="table-responsive">
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th>Nombre del Proyecto</th>
                          <th class="hidden-xs"> Pregreso</th>
                          <th>Tipo</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody id="mostrarDatos" >
                        <?php while ($dat = $proyectos->fetch_array()) {?>
                        <tr>
                          <td><?php echo $dat['CODIGO_PROYECTO'] ?></td>
                          <td><?php echo $dat['NOMBRE_PROYECTO'] ?></td>
                          <td class="hidden-xs">
                            <div class="progress progress-striped active barra" >
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                              </div>
                            </div>
                            <small>80% completado</small>
                          </td>
                          <td><?php echo $dat['CATEGORIA'] ?></td>
                          <td><a class='btn btn-<?php echo returnStatus($dat['ESTADO']) ?>'><?php echo ucfirst(strtolower($dat['ESTADO'])); ?></a></td>

                          <td>
                            <a href="verproyecto.php?comen=<?php echo base64_encode($dat['DESCRIPCION_PROYECTO']) ?>&codigo=<?php echo base64_encode($dat['CODIGO_PROYECTO']) ?>&name=<?php echo base64_encode($dat['NOMBRE_PROYECTO']) ?>&est=<?php echo base64_encode($dat['ESTADO']) ?>&cat=<?php echo base64_encode($dat['CATEGORIA']) ?>
                            &dateI=<?php echo base64_encode($dat['DATESTART']) ?>&dateF=<?php echo base64_encode($dat['DATEEND']) ?>&id=<?php echo base64_encode($dat['ID_PROYECTO']); ?>" class="btn btn-primary btn-xs">  <i class="fa fa-folder"></i> Ver </a>
                            <a class="btn btn-info btn-xs editar" id="<?php echo $dat['ID_PROYECTO'] ?>" data-target="#modaledit" data-toggle="modal"><i class="fa fa-pencil"></i> Editar </a>
                            <a class="btn btn-danger btn-xs eliminar" id="<?php echo $dat['ID_PROYECTO'] ?>"><i class="fa fa-trash-o"></i> Eliminar </a>
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
    <!-- <script>
       $("select#categoriaP option")
   .each(function() { this.selected = (this.text == 'OBRAS') }).attr('disabled','true');
    </script> -->
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
<div class="modal fade" id="modaledit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">
          <i class="fa fa-pencil" aria-hidden="true" style="font-size: 40px;"></i> Editar Proyecto</h4>
      </div>
      <div class="modal-body">
        <form action="" class="form-horizontal" id="actualizarProyecto">
          <div class="form-group">
            <label for="" class="col-sm-2 col-xs-2 control-label">Codigo:</label>
            <div class="col-sm-10 col-xs-12">
              <input type="text" class="form-control" id="mod_code" name="mod_code">
              <input type="hidden" id="mod_id" name="mod_id">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 col-xs-2 control-label">Nombre:</label>
            <div class="col-sm-10 col-xs-12">
              <input type="text" class="form-control" id="mod_nombre" name="mod_nombre">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 col-xs-2 control-label">Estado:</label>
            <div class="col-sm-10 col-xs-12">
              <select name="mod_estado" id="mod_estado" class="form-control">
                <option value="1">EN ESPERA</option>
                <option value="2">GANADO</option>
                <option value="3">PERDIDO</option>
                <option value="4">INCONCLUSO</option>
                <option value="5">FINALIZADO</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 col-xs-2 control-label">Categoria:</label>                            
            <div class="col-sm-10 col-xs-12">                            
              <select name="mod_cate" id="mod_cate" class="form-control">                            
                <option value="1">BIENES</option>                            
                <option value="2">SERVICIOS</option>                            
                <option value="3">OBRAS</option>                            
              </select>                            
            </div>                            
          </div>                                                        
          <div class="form-group">                            
            <label for="" class="col-sm-2 col-xs-2 control-label">Fecha Inicio:</label>                            
            <div class="col-sm-10 col-xs-12">                            
              <input type="date" class="form-control" id="mod_fechai" name="mod_fechai"> 
            </div>                            
          </div>                            
          <div class="form-group">                            
            <label for="" class="col-sm-2 col-xs-2 control-label">Fecha Fin:</label>                            
            <div class="col-sm-10 col-xs-12">                            
              <input type="date" class="form-control" id="mod_fechaf" name="mod_fechaf">                  
            </div>                            
          </div>                            
          <div class="form-group">                            
            <label for="" class="col-sm-2 col-xs-2 control-label">Monto:</label>                            
            <div class="col-sm-10 col-xs-12">                            
              <input type="text" class="form-control" id="mod_monto" name="mod_monto" pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Utilice solo numeros">                          
            </div>                              
          </div>                              
          <div class="form-group">                            
            <label for="" class="col-sm-2 col-xs-2 control-label">Descripcion:</label>                          
            <div class="col-sm-10 col-xs-12">                          
              <textarea name="mod_des" id="mod_des" cols="20" rows="3" class="form-control"></textarea>
            </div>                            
          </div>                            
          <div class="modal-footer">                            
            <div class="alert " id="editarExito" style="display:none;">                              
              Actualizacion exitosa!! <i class="fa fa-check" aria-hidden="true"></i>                      
            </div>                      
            <button type="submit" class="btn btn-primary">Actualizar</button>                             
            <button class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
          </div>                          
        </form>                            
      </div>                            
    </div>                            
  </div>                            
</div>
                     