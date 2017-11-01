<?php
session_start();
if ($_SESSION['usuario']) {
  if ($_SESSION['usuario']['TIPO_USUARIO'] != 'JEFE') {
    header('location:../admin');
  }
} else {
  header('location:../../verproyecto.php');
}
include '../tipoEntregable.php';
include '../addPersonal.php';

$id=base64_decode($_GET['id']);
$sql="SELECT ID_EQUIPO,ID_PERSONAL,ID_PROYECTO,(SELECT CONCAT(NOMBRE_PERSONAL,' ',APELLIDO_PERSONAL) FROM personal WHERE personal.ID_PERSONAL=equipo_proyecto.ID_PERSONAL) AS NOMBRE_COMPLETO,TAREA,FECHA_I,FECHA_F,FECHA_R FROM equipo_proyecto WHERE ID_PROYECTO='$id'";

$resul2=$conexion->query($sql);
$sql1="SELECT ID_PERSONAL,ID_PROYECTO,(SELECT CONCAT(NOMBRE_PERSONAL,' ',APELLIDO_PERSONAL) FROM personal WHERE personal.ID_PERSONAL=equipo_proyecto.ID_PERSONAL) AS NOMBRE_COMPLETO FROM equipo_proyecto where ID_PROYECTO='$id'";
$resul3=$conexion->query($sql1);

$sql2="SELECT (SELECT NOMBRE_CATEGORIA FROM tipo_entregable WHERE tipo_entregable.ID_CATEGORIA=entregable.ID_CATEGORIA) as NOMBRE,(SELECT CONCAT(NOMBRE_PERSONAL,' ',APELLIDO_PERSONAL) FROM personal WHERE personal.ID_PERSONAL=entregable.ID_PERSONAL) as RESPONSABLE,NOMBRE_DOCUMENTO,VERSION_DOCUMENTO,COMENTARIO_DOCUMENTO,DATECREATED,URL_DOCUMENTO FROM entregable WHERE ID_PROYECTO='$id' ";
$resul4=$conexion->query($sql2);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> MODULO VER PROYECTO JEFE </title>
    <!-- Bootstrap -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../assets/css/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../../assets/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/miestilodash.css">
    <link rel="stylesheet" href="../../assets/css/default.min.css">
    <link rel="stylesheet" href="../../assets/css/semantic.min.css">
    <link rel="stylesheet" href="../../assets/css/alertify.css">

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
                <h2><?php echo $_SESSION['usuario']['NOMBRE_PERSONAL']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li class="active"><a href="../user/"><i class="fa fa-book"></i> Proyectos</a>
                  </li>
                  <li><a style="pointer-events: none;cursor: default;"><i class="fa fa-file-text"></i> Documentos</a>
                  </li>
                  <li><a style="pointer-events: none;cursor: default;"><i class="fa fa-users"></i> Personal</a>
                  </li>
                  <li><a style="pointer-events: none;cursor: default;"><i class="fa fa-bar-chart-o"></i> Reportes</a>
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
              <a data-toggle="tooltip" data-placement="top" title="Logout">
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
                    <img src="../../assets/images/user.png" alt="">Cerrar Sesion
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="../logout.php"><i class="fa fa-sign-out pull-right"></i>Logout</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="page-title">
              <div class="title_left">
                <h3><?php echo base64_decode($_GET['name']) ?></h3>
              </div>

              <div class="title_right" style="float: right;width: initial;">
                <h3>CODIGO:<?php echo base64_decode($_GET['codigo']) ?></h3>
                <h4>ID: <?php echo base64_decode($_GET['id']); ?></h4>
              </div>

              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
              <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detalles del proyecto</h2>
                    <div class="pull-right">
                      <button class="btn btn-primary"  data-toggle="modal" id="btnadd" disabled>
                        <i class="fa fa-plus"></i>
                        Añadir
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="detallesProyecto">
                    <!-- start project list -->
                    <div class="pull-right">
                      <div class="modal fade" id="anadirDoc">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>

                              <h4 class="modal-title" style="font-size: 18px;"><i class="fa fa-file-text" aria-hidden="true" style="font-size: 40px;"></i> Registrar Documentos</h4>
                            </div>
                            <div class="modal-body">
                              <form action="" class="form-horizontal" id="addDocumento" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label for="" class="control-label col-sm-2 col-xs-2">Categoria:</label>
                                  <input type="hidden" name="idProyecto" value="<?php echo base64_decode($_GET['id']); ?>">
                                  <div class="col-sm-10 col-xs-12">
                                    <div class="col-sm-9 col-xs-9" style="padding-left: 0">
                                      <select name="doc" id="doc" class="form-control">
                                        <option value="" disabled selected>Selecionar tipo:</option>
                                        <?php while ($datos=$resultado->fetch_assoc()) { ?>
                                        <option value="<?php echo $datos['ID_CATEGORIA'] ?>"><?php echo ucfirst(strtolower($datos['NOMBRE_CATEGORIA'])) ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                    <div class="col-sm-3 col-xs-3">
                                      <a class="btn btn-default " id="addDoc">
                                        <i class="fa fa-plus"> Agregar</i>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="control-label col-sm-2 col-xs-2">Nombre:</label>
                                  <div class="col-sm-10 col-xs-12">
                                    <input type="text" name="nameDoc" id="nameDoc" class="form-control" placeholder="Nombre">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="control-label col-sm-2 col-xs-2">Version:</label>
                                  <div class="col-sm-10 col-xs-12">
                                    <input type="text" name="versionDoc" id="versionDoc" class="form-control" placeholder="Version">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="control-label col-sm-2 col-xs-2">Responsable:</label>
                                  <div class="col-sm-10 col-xs-12">
                                    <select name="responsableDoc" id="responsableDoc" class="form-control">
                                      <option value="" disabled selected>Selecionar responsable:</option>
                                      <?php while ($dato4=$resul3->fetch_assoc()) { ?>
                                      <option value="<?php echo $dato4['ID_PERSONAL']; ?>"><?php echo $dato4['NOMBRE_COMPLETO']; ?></option>
                                      <?php } ?>
                                  </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="control-label col-sm-2">Comentarios:</label>
                                  <div class="col-sm-10 col-xs-12">
                                    <textarea name="comenDoc" id="comenDoc" cols="15" rows="4" class="form-control" placeholder="Escriba una descripcion"></textarea>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="control-label col-sm-2 col-xs-2">Subir archivo:</label>
                                  <div class="col-sm-10 col-xs-12">
                                    <input type="file" name="fileDoc" id="fileDoc">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-primary" type="submit">Aceptar</button>
                                  <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>
                              </form>
                            </div>

                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="anadirPer">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>

                              <h4 class="modal-title" style="font-size: 18px;"><i class="fa fa-users" aria-hidden="true" style="font-size: 40px;"></i> Registrar Personal</h4>
                            </div>
                            <div class="modal-body">
                              <form action="" class="form-horizontal" id="addEquipo">
                                <div class="form-group">
                                  <input type="hidden" name="idProyecto" value="<?php echo base64_decode($_GET['id']); ?>">
                                  <label for="" class="control-label col-sm-2 col-xs-2">Nombre:</label>
                                  <div class="col-sm-10 col-xs-12">
                                    <select name="addPersona" id="cargarPersonal" class="form-control">
                                      <option value="" disabled selected>Seleccione personal</option>
                                    <?php while ($dato2=$res->fetch_assoc()) { ?>
                                      <option value="<?php echo $dato2['ID_PERSONAL']; ?>"><?php echo $dato2['NOMBRE_COMPLETO'] ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="control-label col-sm-2 col-xs-2">Tarea:</label>
                                  <div class="col-sm-10 col-xs-12">
                                    <input type="text" name="tarea" class="form-control" placeholder="Tarea">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="control-label col-sm-2 col-xs-2">Fecha inicio:</label>
                                  <div class="col-sm-10 col-xs-12">
                                    <div class="input-group">
                                      <input type="date" name="fechaI" class="form-control">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="control-label col-sm-2 col-xs-2">Fecha fin:</label>
                                  <div class="col-sm-10 col-xs-12">
                                    <div class="input-group">
                                      <input type="date" name="fechaF" class="form-control">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-primary" type="submit">Aceptar</button>
                                  <button class="btn btn-danger" data-dismiss="modal">Cancelar
                                  </button>
                                </div>
                              </form>
                            </div>

                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="tabpanel">
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#seccion11" aria-controls="seccion11" data-toggle="tab" role="tab">Resumen</a></li>
                        <li role="presentation"><a href="#seccion22" aria-controls="seccion22" data-toggle="tab" role="tab">Documentos</a></li>
                        <li role="presentation"><a href="#seccion33" aria-controls="seccion33" data-toggle="tab" role="tab">Personal</a></li>
                      </ul>
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="seccion11">
                          <dl>
                            <dl><h3><?php echo base64_decode($_GET['comen']) ?></h3></dl>
                            <dl><p>Estado: <?php echo base64_decode($_GET['est']); ?></p></dl>
                            <dl><p>Categoria:<?php echo base64_decode($_GET['cat']); ?> </p></dl>
                            <dl><p>Fecha de inicio: <?php echo base64_decode($_GET['dateI']); ?></p></dl>
                            <dl><p>Fecha estimado de cierre: <?php echo base64_decode($_GET['dateF']); ?></p></dl>
                            <dl><p style="color:red;">Fecha real de cierre: 15/12/2017</p></dl>
                          </dl>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="seccion22">
                          <br>
                          <div class="table-responsive">
                            <table class="table table-striped document">
                              <thead>
                                <th>Categoria</th>
                                <th>Nombre</th>
                                <th>Version</th>
                                <th>Fecha registro</th>
                                <th>Descripcion</th>
                                <th>Responsable</th>
                                <th>Acciones</th>
                              </thead>
                              <tbody id="showDocumentos">
                                <?php while ($data=$resul4->fetch_assoc()) { ?>
                                  <tr>
                                    <td><?php echo $data['NOMBRE']; ?></td>
                                    <td><?php echo $data['NOMBRE_DOCUMENTO']; ?></td>
                                    <td><?php echo $data['VERSION_DOCUMENTO']; ?></td>
                                    <td><?php echo $data['DATECREATED']; ?></td>
                                    <td><?php echo $data['COMENTARIO_DOCUMENTO']; ?></td>
                                    <td><?php echo $data['RESPONSABLE']; ?></td>
                                    <td style="text-align: center;">
                                      <a href="<?php echo $data['URL_DOCUMENTO'] ?>" class="btn btn-default" download><i class="fa fa-download" aria-hidden="true"></i></a>
                                    </td>
                                  </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                         </div>

                        </div>

                        <div role="tabpanel" class="tab-pane" id="seccion33">
                          <br>
                          <div class="table-responsive">
                            <table class="table table-striped equipo">
                              <thead>
                                <th>Nombre</th>
                                <th>Tarea</th>
                                <th>Fecha inicio</th>
                                <th>Fecha finalizacion</th>
                                <th>Fecha de registro</th>
                                <th>Acciones</th>
                              </thead>
                              <tbody id="equipoPersonal">
                                <?php while ($dato3=$resul2->fetch_assoc()) { ?>
                                  <tr>
                                    <td><?php echo $dato3['NOMBRE_COMPLETO']; ?></td>
                                    <td><?php echo $dato3['TAREA']; ?></td>
                                    <td><?php echo $dato3['FECHA_I']; ?></td>
                                    <td><?php echo $dato3['FECHA_F']; ?></td>
                                    <td><?php echo $dato3['FECHA_R']; ?></td>
                                    <td>
                                      <a class="btn btn-info edit" data-target="#editEquipo" data-toggle="modal" id="<?php echo $dato3['ID_EQUIPO']; ?>"><i class="fa fa-pencil"></i> Editar</a>
                                      <a class="btn btn-danger delete" id="<?php echo $dato3['ID_EQUIPO']; ?>" data-persona="<?php echo $dato3['ID_PERSONAL']; ?>" data-proyecto="<?php echo $dato3['ID_PROYECTO'] ?>"><i class="fa fa-trash-o"></i> Eliminar</a>
                                    </td>
                                  </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        
                      </div>

                   </div>
                    <!-- end project list -->
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
    <script src="../../assets/js/accionesEquipo.js"></script>
    <script src="../../assets/js/alertify.js"></script>
    <!-- NProgress -->
    <script src="../../assets/js/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../assets/js/bootstrap-progressbar.min.js"></script>

    <!-- Custom Theme Scripts -->
   <script src="../../assets/js/custom.min.js"></script>
  <script>
    $(document).ready(function() {
     
      $("a[href='#seccion11']").on('shown.bs.tab', function(){
        $('#btnadd').attr('disabled',true);
          console.log("estoy en tab resumen");
        });

      $("a[href='#seccion22']").on('shown.bs.tab', function(){
         console.log("estoy en tab docs");
         $('#btnadd').removeAttr('disabled','data-target');
         $('#btnadd').attr('data-target','#anadirDoc')

      });
      $("a[href='#seccion33']").on('shown.bs.tab', function(){
        $('#btnadd').removeAttr('disabled','data-target');
        $('#btnadd').attr('data-target','#anadirPer');
        console.log("estoy en tab people");
      });

    })

  </script>

  </body>
</html>

