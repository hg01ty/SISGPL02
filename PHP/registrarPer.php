<?php 
	
	require 'config/conexion.php';
	session_start();
	
	$idEmpresa = $_SESSION['usuario']['ID_EMPRESA'];

	if(isset($_POST['nombre'])){
		$codigo=$conexion->real_escape_string($_POST['codigo']);
		$nombre=$conexion->real_escape_string($_POST['nombre']);
		$apellido=$conexion->real_escape_string($_POST['apellido']);
		$dni=$conexion->real_escape_string($_POST['dni']);
		$edad=$conexion->real_escape_string($_POST['edad']);
		$correo=$conexion->real_escape_string($_POST['correo']);
		$direccion=$conexion->real_escape_string($_POST['direccion']);
		$telefono=$conexion->real_escape_string($_POST['telefono']);
		$ocupacion=$conexion->real_escape_string($_POST['ocupacion']);

		$stmt=$conexion->prepare("INSERT INTO personal(ID_EMPRESA,ID_TIPO,NOMBRE_PERSONAL,APELLIDO_PERSONAL,DNI_PERSONAL,EDAD_PERSONAL,CORREO_PERSONAL,DIRECCION_PERSONAL,TELEFONO_PERSONAL,OCUPACION,USUARIO,PASSWORD,ESTADO) VALUES (?,2,?,?,?,?,?,?,?,?,null,null,0)");
		$stmt->bind_param('isssissis',$idEmpresa,$nombre,$apellido,$dni,$edad,$correo,$direccion,$telefono,$ocupacion);
		$resultado=$stmt->execute(); 

		if($resultado){
			echo true;
		}
	}


 ?>