<?php
session_start();
if (isset($_SESSION['usuario'])) {
 if ($_SESSION['usuario']['TIPO_USUARIO'] == 'ADMIN') {
  header('location:PHP/ADMIN/');
 } else if ($_SESSION['usuario']['TIPO_USUARIO'] == 'USER') {
  header('location:PHP/USER/');
 }
}

?>
<?php
include 'PHP/tipoEmpresa.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>HOME LICITACION</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel='stylesheet' id='camera-css'  href='assets/css/camera.css' type='text/css' media='all'>
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/miestilo.css">
	<link rel="stylesheet" href="assets/css/alertify.css">
	<link rel="stylesheet" href="assets/css/themes/bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="assets/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="assets/js/camera.min.js"></script>

	<script>
		jQuery(function(){
			jQuery('#camera_wrap_1').camera({
			transPeriod: 500,
			time: 3000,
			height: '490px',
			thumbnails: false,
			pagination: true,
			playPause: false,
			loader: false,
			navigation: false,
			hover: false
			});
		});
	</script>
</head>
<body data-spy="scroll" data-target=".nav" data-offset="50">

<span class="fa fa-chevron-up icono hidden-md hidden-sm hidden-xs"></span>
<main class="contenedor">
	<!--======= HOME======-->
	<div class="inicio">
		<!--FONDO IMAGEN-->
		<div class="headerLine" id="inicio">
			<!-- MENU NAVBAR-->
			<div class="menuF">
				<div class="container">
					<nav class="navbar navbar-default navbar-fixed">
		        <div class="container-fluid">
		          <div class="navbar-header">
		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#prueba">
		              <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>

		          </div>
		          <div class="collapse navbar-collapse" id="prueba">
		            <ul class="nav navbar-nav navbar-left">
		              <li>
		                <a href="#inicio">
		                  <i class="fa fa-home"></i>
		                  Inicio
		                </a>
		              </li>
		              <li>
		                <a href="#servicios">
		                  <i class="fa fa-wrench"></i>
		                  Servicios
		                </a>
		              </li>
		              <li>
		                <a href="#somos">
		                  <i class="fa fa-users"></i>
		                  Quienes Somos
		                </a>
		              </li>
		              <li>
		                <a href="#ubicacion">
		                  <i class="fa fa-map-marker"></i>
		                  Ubicacion
		                </a>
		              </li>
		              <li>
		                <a href="#contacto">
		                <i class="fa fa-envelope-o"></i>
		                Contacto
		                </a>
		              </li>
		            </ul>
		            <ul class="nav navbar-nav navbar-right">
		              <li>
		                <a data-target="#iniciar" data-toggle="modal">
		                  <i class="fa fa-sign-in"></i>
		                  Iniciar Sesion
		                </a>
		                <div class="modal fade" id="iniciar">
									  	<div class="modal-dialog modal-sm">
									    	<div class="modal-content">
									      	<div class="modal-header">
									      		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									         	  <span aria-hidden="true">&times;</span>
									        	</button>
									        	<h3 class="modal-title">Iniciar Sesion
									        	</h3>
									      	</div>
									      	<div class="modal-body" id="inicioLoginVue">
									      		<div class="form-group" style="text-align: center;margin-bottom: 5px">
									      			<a id="left"><span class="glyphicon glyphicon-chevron-left"></span>
									      			<a id="right"><span class="glyphicon glyphicon-chevron-right"></span></a>
									      		</div>
			<!--========================== LOGIN ADMIN=======================================-->
									        	<form action="" autocomplete="off" class="autenticar" id="authAdmin">
									        		<input type="hidden" id="authadmin" name="authadmin" value="admin">
										        	<div class="form-group">
										        		<label for="usuario" class="sr-only">Usuario</label>
										        		<div class="input-group">
										        		<div class="input-group-addon">
										        			<i class="fa fa-user"></i>
										        		</div>
										        		<input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario" pattern="[A-Za-z0-9_-]{1,10}" required>
										        		</div>
										        	</div>
										        	<div class="form-group">
										        		<label for="pass" class="sr-only">Password</label>
										        		<div class="input-group">
										        		<div class="input-group-addon">
										        		<i class="fa fa-lock" aria-hidden="true"></i>
										        		</div>
										        		<input type="password" class="form-control" placeholder="Password" id="pass" name="password" pattern="[A-Za-z0-9_-]{1,10}" required>
										        		</div>
										        	</div>
										        	<a href="#">Olvidaste tu contraseña?</a>
										        	<div class="form-group">
										        		<div class="alert alert-danger error" style="display: none;">
										        			Datos incorrectos
										        		</div>
										        	</div>
										        	<div class="modal-footer">
										        		<button type="submit" class="btn btn-primary send" >Ingresar</button>
										        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
										      		</div>
									        	</form>
<!--=================================LOGIN USER====================================-->
									        	<form action="" autocomplete="off" class="autenticar" id="authUser" " style="display: none;">
									        	<input type="hidden" id="authuser" name="authadmin" value="user">
									        	<div class="form-group">
									        		<label for="usuario" class="sr-only">Usuario</label>
									        		<div class="input-group">
									        		<div class="input-group-addon">
									        			<i class="fa fa-id-card" aria-hidden="true"></i>
									        		</div>
									        		<input type="text" class="form-control" placeholder="DNI" id="usuario" name="usuario" pattern="[A-Za-z0-9_-]{1,10}" required>
									        		</div>
									        	</div>
									        	<div class="form-group">
									        		<label for="pass" class="sr-only">Password</label>
									        		<div class="input-group">
									        		<div class="input-group-addon">
									        		<i class="fa fa-lock" aria-hidden="true" style="padding-right: 6px;"></i>
									        		</div>
									        		<input type="password" class="form-control" placeholder="Password" id="pass" name="password" pattern="[A-Za-z0-9_-]{1,10}" required>
									        		</div>
									        	</div>
									        	<a href="#">Olvidaste tu contraseña?</a>
									        	<div class="modal-footer">
									        		<button type="submit" class="btn btn-primary send" >Ingresar</button>
									        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
									      		</div>
									        	</form>

									      	</div>

									    </div>
									  </div>
										</div>
		              </li>
		              <li>
		                <a data-target="#registro" data-toggle="modal">
		                  <i class="fa fa-pencil-square-o"></i>
		                  Registrate
		                </a>
		                <div class="modal fade" id="registro">
									  	<div class="modal-dialog modal-sm" role="document">
									    	<div class="modal-content">
									      	<div class="modal-header">
									      		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          	<span aria-hidden="true">&times;</span>
									        	</button>
									        	<h3 class="modal-title">Registrate</h3>
									      	</div>
	<!--================== REGISTRATE======================-->
									      	<div class="modal-body">
									        	<form action="" autocomplete="off" id="registrar">
									        		<div class="form-group">
									        			<label for="empresaName" class="sr-only">Empresa
									        			</label>
									        			<div class="input-group">
									        				<div class="input-group-addon">
									        					<i class="fa fa-home" aria-hidden="true"></i>
									        				</div>
									        				<input type="text" class="form-control" placeholder="Nombre Empresa" id="empresaName" name="nombreEmpresa" required>
									        			</div>
									        		</div>
									        		<div class="form-group">
									        			<label for="" class="sr-only">Tipo Empresa</label>
									        			<div class="input-group">
									        				<div class="input-group-addon">
									        				<i class="fa fa-building" aria-hidden="true"></i>
									        				</div>
									        				<select name="tipo" class="myselect" id="selectTipo" required>
									        					<option disabled value="" selected="">Seleccione tipo:</option>
									        					<?php while ($fila = $tipos->fetch_array()) {?>
									        					 <option value="<?php echo $fila['ID_TIPO_EMPRESA'] ?>"><?php echo $fila['DESCRIPCION']; ?></option>
									        					 <?php }?>
									        				</select>
									        			</div>
									        		</div>
									        		<div class="form-group" id="existeRuc">
									        			<label for="ruc" class="sr-only">RUC</label>
									        			<div class="input-group">
									        				<div class="input-group-addon">
									        					<i class="fa fa-address-book"></i>
									        				</div>
									        				<input type="text" class="form-control" placeholder="RUC" id="ruc" name="numberRuc" maxlength="11" required>
									        			</div>
									        		</div>
									        		<div class="form-group">
									        			<label for="correo" class="sr-only">Email</label>
									        			<div class="input-group">
									        				<div class="input-group-addon">
									        					@
									        				</div>
									        				<input type="email" placeholder="Correo" class="form-control" name='correoEmpresa' id="correo" required>
									        			</div>
									        		</div>
									        		<div class="form-group">
									        			<label for="correo" class="sr-only">Direccion</label>
									        			<div class="input-group">
									        				<div class="input-group-addon">
									        					<i class="fa fa-location-arrow" aria-hidden="true"></i>
									        				</div>
									        				<input type="text" placeholder="Direccion" class="form-control" name='addressEmpresa' id="direccion" required>
									        			</div>
									        		</div>
									        		<div class="form-group" id="existeUsuario">
									        			<label for="usu" class="sr-only">Usuario</label>
									        			<div class="input-group">
									        				<div class="input-group-addon">
									        					<i class="fa fa-user"></i>
									        				</div>
									        				<input type="text" class="form-control" placeholder="Usuario" id="usu" name="usuarioEmpresa"  required>
									        			</div>
									        		</div>
									        		<div class="form-group">
									        			<label for="contra" class="sr-only">Password</label>
									        			<div class="input-group">
									        				<div class="input-group-addon">
									        				<i class="fa fa-lock" aria-hidden="true"></i>
									        				</div>
									        				<input type="password" class="form-control" placeholder="Password" id="contra" name="contraEmpresa" required>
									        			</div>
									        		</div>
									        		<div class="form-group" id="wait" style="text-align: center;color: white; display:none;">
									        			<span><img src="assets/images/15 (blanco).gif" alt=""></span>
									        			<p>Cargando....</p>
									        		</div>
									        		<div class="modal-footer">
									        		<button  type="submit" class="btn btn-primary">Crear</button>
									        		<button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
									      			</div>
									        	</form>
									      	</div>
									    	</div>
									  	</div>
										</div>
		              </li>
		            </ul>
		          </div>
		        </div>
	       	</nav>
				</div>
			</div>
			<!-- HEADER LETRAS CAROUSEL-->
			<div class="container">
				<div class="row">
					<div class="col-md-12 gallery">
						<div class="camera_wrap camera_white_skin" id="camera_wrap_1">
							<div  data-src="assets/images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h2>Almacena</h2>
								</div>
							</div>
							<div  data-src="assets/images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h2>Gestiona</h2>
								</div>
							</div>
							<div data-src="assets/images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h2>Controla</h2>
								</div>
							</div>
						</div><!-- #camera_wrap_1 -->
					</div>
				</div>
			</div>
		</div>
		<!--TEXTO CONTENIDO HEADER-->
		<div class="container scrollflow -pop -opacity">
			<div class="row">
				<div class="col-md-12 cBusiness">
					<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt quidem nostrum voluptas ea assumenda saepe doloremque nam velit impedit tempore. At, optio accusantium dolores! Voluptas numquam illum vero vel dolores!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates pariatur porro repellat quidem suscipit expedita totam optio soluta nobis corporis aspernatur, officiis, ullam iste atque incidunt dolorem, ipsum non fugit.</h3>
				</div>
			</div>
			</div>
	</div>


	<!--====== SERVICIO =====-->
	<div class="servicios" >
		<!--FONDO IMAGEN-->
		<div class="line2">
			<div class="container" id="servicios">
				<div class="row Items">
					<div class="col-md-4 Alma wow zoomIn" data-wow-duration="2s" >
						<i class="fa fa-hdd-o"></i>
						<h4>Almacenamiento</h4>
						<p>Nulla consectetur ornare nibh, a auctor mauris scelerisque eu proin nec urna quis justo adipiscing auctor ut auctor. feugiat </p>
					</div>
					<div class="col-md-4 File wow zoomIn" data-wow-duration="2s" >
						<i class="fa fa-files-o"></i>
						<h4>Gestiona</h4>
						<p>Nulla consectetur ornare nibh, a auctor mauris scelerisque eu proin nec urna quis justo adipiscing auctor ut auctor. feugiat </p>
					</div>
					<div class="col-md-4 Buscar wow zoomIn" data-wow-duration="2s" >
						<i class="fa fa-search"></i>
						<h4>Revisar</h4>
						<p>Nulla consectetur ornare nibh, a auctor mauris scelerisque eu proin nec urna quis justo adipiscing auctor ut auctor. feugiat </p>
					</div>
				</div>
				</div>
		</div>
		<!--TEXTO CONTENIDO SERVICIOS-->
		<div class="container scrollflow -pop -opacity">
			<div class="row">
				<div class="col-md-12 ">
					<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis aperiam aut inventore. Numquam pariatur aperiam tenetur rem, asperiores explicabo beatae, est aspernatur, nemo consequatur laudantium error quaerat dolores? Similique, eos.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad placeat ab eaque dolores maiores ratione enim, esse porro asperiores accusamus autem, sunt rem voluptate reiciendis ullam quidem, aut et. Dolor.
					</h3>
				</div>
			</div>
		</div>
	</div>

	<!--===== QUIENES SOMOS=====-->
	<div id="qsomos">
		<!--FONDO IMAGEN-->
		<div class="line3">
			<div class="container" id="somos">
				<div class="row Ama">
					<div class="col-md-12 wow bounceInLeft">
						<h3>QUIENES SOMOS?</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In vero culpa beatae atque ipsum. Facere dolorum rerum quas vitae. Odio laudantium incidunt quam, molestiae quis iure molestias cupiditate! Placeat, harum.</p>
					</div>
				</div>
			</div>
		</div>
    	<!--CONTENEDOR IMG CLIENTES-->
       	<div class="container">
			<div class="row">
				<div class="col-md-12" style="text-align: center;">
					<h2>NUESTROS CLIENTES</h2>
				</div>
				<!-- IMAGENES CLIENTES-->
				<div class="pretty">
					<div class="col-sm-4 gall scrollflow -slide-right -opacity">
						<a class="plS" href="assets/images/Logo-combinado-electric.png">
							<img class="img-responsive" src="assets/images/Logo-combinado-electric.png" alt=""/>
						</a>
					</div>
					<div class="col-sm-4 gall scrollflow -slide-right -opacity">
						<a class="plS" href="assets/images/logo-corporativo-aquapalms.png">
							<img class="img-responsive" src="assets/images/logo-corporativo-aquapalms.png" alt=""/>
						</a>
					</div>
					<div class="col-sm-4 gall scrollflow -slide-right -opacity">
						<a class="plS" href="assets/images/logo-corporativo-electric.png" >
							<img class="img-responsive" src="assets/images/logo-corporativo-electric.png" alt=""/>
						</a>
					</div>
					<div class=" col-sm-4 gall scrollflow -slide-left -opacity">
						<a class="plS" href="assets/images/logo-corporativo-guitar.png">
							<img class="img-responsive" src="assets/images/logo-corporativo-guitar.png" alt=""/>
						</a>
					</div>
					<div class="col-sm-4 gall scrollflow -slide-left -opacity">
						<a class="plS" href="assets/images/Logo-Corporativo-Nive.png">
							<img class="img-responsive" src="assets/images/Logo-Corporativo-Nive.png" alt=""/>
						</a>
					</div>
					<div class="col-sm-4 gall scrollflow -slide-left -opacity">
						<a class="plS" href="assets/images/logo-corporativo-veterinario.png">
							<img class="img-responsive" src="assets/images/logo-corporativo-veterinario.png" alt="pic1 Gallery"/>
						</a>
					</div>
				</div>
			</div>
		</div>
  </div>


	<!--====== UBICACION =====-->
    <div id="ubica">
    	<!--FONDO IMAGEN-->
    	<div class="line4">
				<div class="container" id="ubicacion">
					<div class="row Ama">
						<div class="col-md-12 wow bounceInRight">
							<h3>NUESTRA UBICACION</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, nobis consectetur, temporibus blanditiis eveniet nesciunt incidunt corrupti voluptates. Molestias commodi facilis adipisci unde iste impedit maxime incidunt, repellat quaerat nesciunt.</p>
						</div>
					</div>
				</div>
			</div>
		<!--MAPA UBICACION-->
			<div class="container textUbi scrollflow -pop -opacity">
			<h3 class="te">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, labore ut modi distinctio repellendus aspernatur fuga laboriosam asperiores esse, enim unde aut accusantium dolore minus veniam vero eligendi facilis nulla.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam suscipit quisquam minima harum porro eum? Sit quisquam asperiores beatae, libero iure eligendi saepe, quae quo inventore quasi pariatur, ab autem.
			</h3>
			</div>
    </div>

	<!--==== CONTACTO =====-->
    <div id="contact">
    	<!--FONDO IMAGEN-->
    	<div class="line5">
				<div class="container" id="contacto">
					<div class="row Ama">
						<div class="col-md-12 wow bounceInUp">
							<h3>CONTACTAME</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, totam. Soluta excepturi sint vitae maxime est odit illum ex illo incidunt porro distinctio, cum officia iste nobis blanditiis modi neque.</p>
						</div>
					</div>
				</div>
			</div>
		<!--FORMULARIO CONTACTO-->
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-xs-12 forma">
						<form autocomplete="off">
							<div class="form-group">
								<div class="col-md-6 col-xs-12">
									<input type="text" class="form-control" placeholder="Nombre *">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-xs-12">
									<input type="email" class="form-control" placeholder="Email *">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12 col-xs-12">
									<input type="text" class="form-control" placeholder="Nombre de la Empresa *">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12 col-xs-12">
									<textarea name="" id="" cols="30" rows="6" placeholder="Mensaje *" class="form-control area"></textarea>
								</div>
							</div>
							<div class="form-group clearfix">
								<div class="col-xs-12">
									<a href="" class="btn btn-danger limpiar">
										<i class="fa fa-times"></i>
										Limpiar
									</a>
									<a href="" class="btn btn-primary enviar">
										<i class="fa fa-share"></i>
										Enviar
									</a>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-3 col-xs-12 cont">
						<ul>
							<li><i class="fa fa-home"></i>5512 Lorem Ipsum Vestibulum 999</li>
							<li><i class="fa fa-phone"></i>+5454545555, +45545455</li>
							<li><a href="#"><i class="fa fa-envelope"></i>caña@gmail.com</a></li>
							<li><i class="fa fa-building"></i>Nombre empresa</li>
							<li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
							<li><a href="#"><i class="fa fa-facebook-square"></i>Facebook</a></li>
							<li><a href="#"><i class="fa fa-youtube-play"></i>YouTube</a></li>
						</ul>
					</div>
				</div>
			</div>
    </div>

	<footer class="pie">
		<p><img src="assets/images/logosisgpl.jpg" alt=""> Copyright &copy; 2017 - Derechos Reservados</p>
	</footer>

	</main>

	<script src="assets/js/app.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/alertify.js"></script>
	<script src="assets/js/eskju.jquery.scrollflow.min.js"></script>
	<script src="assets/js/myscript.js"></script>
	<script src="assets/js/wow.min.js"></script>
</body>
</html>
