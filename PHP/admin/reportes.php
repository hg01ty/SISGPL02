<?php 
  session_start();
  $idEmpresa = $_SESSION['usuario']['ID_EMPRESA'];
  require '../config/conexion.php';
  include("../funciones/funciones.php");

  $sql="SELECT ID_ESTADO
        FROM proyecto WHERE ID_EMPRESA='$idEmpresa'";
        $resultado=$conexion->query($sql);
         $a=0;
                   $b=0;$c=0;$d=0;$e=0;
                    while($obj=$resultado->fetch_object()){
                      if($obj->ID_ESTADO==1){
                        $a=$a+1;
                      }
                      if($obj->ID_ESTADO==2){
                        $b=$b+1;
                      }
                      if($obj->ID_ESTADO==3){
                        $c=$c+1;
                      }
                      if($obj->ID_ESTADO==4){
                        $d=$d+1;
                      }
                      if($obj->ID_ESTADO==5){
                        $e=$e+1;
                      }
                    }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> MODULO REPORTES </title>

    <!-- Bootstrap -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- NProgress -->
    <link href="../../assets/css/nprogress.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="../../assets/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/miestilodash.css">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../admin/" class="site_title"><i class="fa fa-building-o"></i> <span>Licitacion!</span></a>
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
                  <li><a href="personal.php"><i class="fa fa-users"></i> Personal</a>
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
                    <li><a href="javascript:;">Ayuda</a></li>
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
        <div class="right_col" role="main" id="listPersonal">

          <div class="row">
              <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detalles del Reportes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="detallesProyecto">
                    <!-- start project list -->
                    <div class="tabpanel">
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#seccion11" aria-controls="seccion11" data-toggle="tab" role="tab">Resumen</a></li>
                        <li role="presentation"><a href="#seccion22" aria-controls="seccion22" data-toggle="tab" role="tab">Detallado</a></li>
                      </ul>
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="seccion11">
                            <!--    <h3>Resumen</h3>-->
                          <div class="row resumen">

                            <div class="col-sm-3 col-sm-offset-2 col-xs-12 infoEstado">
                              <dl>
                                <div class="alert alert-ganados">
                                  <dt><p>Proyectos Ganados: <?php echo $b; ?></p></dt>
                                </div>
                                <div class="alert alert-perdidos">
                                  <dt><p>Proyectos Perdidos: <?php echo $c; ?></p></dt>
                                </div>
                                <div class="alert alert-inconclusos">
                                  <dt><p>Proyectos Inconclusos: <?php echo $d; ?></p></dt>
                                </div>
                                <div class="alert alert-resultado">
                                  <dt><p>Proyectos Finalizados:<?php echo $e; ?></p></dt>
                                </div>
                              </dl>

                            </div>
                            <div class="col-sm-6 col-xs-12">
                              <div id="container" class="showGrafico"></div>
                            </div>

                          </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="seccion22">
                          <div class="row">
                            <div class="col-sm-12 col-md-12">
                              <div id="detalles" class="showGraficoDetalles"></div>
                            </div>
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
    <!--HightCharts -->
    <script>
    $(document).ready(function(){
       Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
              text: 'Resumen del Status de la Empresa'
            },
            tooltip: {
              pointFormat: '{series.name}: <b>{point.y}%</b>'
            },
            plotOptions: {
              pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                  enabled: false
                },
                showInLegend: true
              }
            },
            series: [{
              name: 'Porcentaje',
              colorByPoint: true,
              data: [
                <?php 
                     $sql1="SELECT count(ID_PROYECTO) as NumProyecto FROM proyecto WHERE ID_EMPRESA='$idEmpresa'";
                     $res=$conexion->query($sql1);
                     $row=$res->fetch_assoc();
                     $total=$row['NumProyecto'];
                ?>
                {
                  name: 'Ganados',
                  y: <?php echo ($total>0)? ($b/$total)*100:$b; ?>
                },
                {
                  name: 'Perdidos',
                  y:  <?php echo ($total>0)? ($c/$total)*100:$c; ?>,
                  sliced: true,
                  selected: true
                }, 
                {
                  name: 'Inconclusos',
                  y:  <?php echo ($total>0)? ($d/$total)*100:$d; ?>
                },
                {
                  name: 'Finalizado',
                  y:  <?php echo ($total>0)? ($e/$total)*100:$e; ?>
                },
              ]
            }]
          });

          Highcharts.chart('detalles', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Status anual de la empresa'
        },
        subtitle: {
            text: 'detallado por meses'
        },
        xAxis: {
            categories: [
                'Ene',
                'Feb',
                'Mar',
                'Abr',
                'May',
                'Jun',
                'Jul',
                'Ago',
                'Sep',
                'Oct',
                'Nov',
                'Dic'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Ganados',
            data: [3,
                   5,
                   6, 
                   3,
                   6,
                   5,
                   <?php echo getCantidad('GANADO','FECHA_REGISTRO_P','2017-07-01','2017-07-31',$idEmpresa);?>,
                   <?php echo getCantidad('GANADO','FECHA_REGISTRO_P','2017-08-01','2017-08-31',$idEmpresa);?>,
                   <?php echo getCantidad('GANADO','FECHA_REGISTRO_P','2017-09-01','2017-09-30',$idEmpresa);?>,
                   <?php echo getCantidad('GANADO','FECHA_REGISTRO_P','2017-10-01','2017-10-31',$idEmpresa);?>,
                   <?php echo getCantidad('GANADO','FECHA_REGISTRO_P','2017-11-01','2017-11-30',$idEmpresa);?>,
                   <?php echo getCantidad('GANADO','FECHA_REGISTRO_P','2017-12-01','2017-12-31',$idEmpresa);?>]

        }, {
            name: 'Perdidos',
            data: [2,
                   3,
                   1,
                   1,
                   2,
                   3,
                   <?php echo getCantidad('PERDIDO','FECHA_REGISTRO_P','2017-07-01','2017-07-31',$idEmpresa);?>,
                   <?php echo getCantidad('PERDIDO','FECHA_REGISTRO_P','2017-08-01','2017-08-31',$idEmpresa);?>,
                   <?php echo getCantidad('PERDIDO','FECHA_REGISTRO_P','2017-09-01','2017-09-30',$idEmpresa);?>,
                   <?php echo getCantidad('PERDIDO','FECHA_REGISTRO_P','2017-10-01','2017-10-31',$idEmpresa);?>,
                   <?php echo getCantidad('PERDIDO','FECHA_REGISTRO_P','2017-11-01','2017-11-30',$idEmpresa);?>,
                   <?php echo getCantidad('PERDIDO','FECHA_REGISTRO_P','2017-12-01','2017-12-31',$idEmpresa);?>]

        }, {
            name: 'Inconclusos',
            data: [1,
                   2,
                   2,
                   1,
                   1,
                   3,
                   <?php echo getCantidad('INCONCLUSO','DATEENDFAKE','2017-07-01','2017-07-31',$idEmpresa);?>,
                   <?php echo getCantidad('INCONCLUSO','DATEENDFAKE','2017-08-01','2017-08-31',$idEmpresa);?>,
                   <?php echo getCantidad('INCONCLUSO','DATEENDFAKE','2017-09-01','2017-09-30',$idEmpresa);?>,
                   <?php echo getCantidad('INCONCLUSO','DATEENDFAKE','2017-10-01','2017-10-31',$idEmpresa);?>,
                   <?php echo getCantidad('INCONCLUSO','DATEENDFAKE','2017-11-01','2017-11-30',$idEmpresa);?>,
                   <?php echo getCantidad('INCONCLUSO','DATEENDFAKE','2017-12-01','2017-12-31',$idEmpresa);?>]

        }]
    });
     });

    </script>
    <script src="../../assets/js/Highcharts-5.0.12/code/highcharts.js"></script>
    <script src="../../assets/js/Highcharts-5.0.12/code/modules/exporting.js"></script>
    <!-- Bootstrap -->
    <script src="../../assets/js/bootstrap.min.js"></script>

    <!-- NProgress -->
    <script src="../../assets/js/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../assets/js/bootstrap-progressbar.min.js"></script>

    <!-- Custom Theme Scripts -->
   <script src="../../assets/js/custom.min.js"></script>
   <!-- Script reportes-->
   <script src="../../assets/js/script-reportes.js"></script>

  </body>
</html>