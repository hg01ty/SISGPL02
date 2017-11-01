<?php 
	
	require 'config/conexion.php';
	if(isset($_POST['nombre'])){
		$codigo=$_POST['codigo'];
		$id=$_POST['id'];
		$nombre=$conexion->real_escape_string($_POST['nombre']);
		$apellido=$conexion->real_escape_string($_POST['apellido']);
		$dni=$conexion->real_escape_string($_POST['dni']);
		$edad=$conexion->real_escape_string($_POST['edad']);
		$correo=$conexion->real_escape_string($_POST['correo']);
		$direccion=$conexion->real_escape_string($_POST['direccion']);
		$ocupacion=$conexion->real_escape_string($_POST['ocupacion']);
		$usuario=$conexion->real_escape_string($_POST['usuario']);
		$password=$conexion->real_escape_string($_POST['password']);
		$tipo=1;
		if($usuario!="" && $password!=""){
			$stmt=$conexion->prepare("UPDATE personal SET ID_TIPO=?,NOMBRE_PERSONAL=?,APELLIDO_PERSONAL=?,DNI_PERSONAL=?,EDAD_PERSONAL=?,CORREO_PERSONAL=?,DIRECCION_PERSONAL=?,OCUPACION=?,USUARIO=?,PASSWORD=? WHERE ID_PERSONAL=?");
			$stmt->bind_param('isssisssssi',$tipo,$nombre,$apellido,$dni,$edad,$correo,$direccion,$ocupacion,
				$usuario,$password,$id);
			$resultado=$stmt->execute();
		}else{
			$stmt=$conexion->prepare("UPDATE personal SET NOMBRE_PERSONAL=?,APELLIDO_PERSONAL=?,DNI_PERSONAL=?,EDAD_PERSONAL=?,CORREO_PERSONAL=?,DIRECCION_PERSONAL=?,OCUPACION=?,USUARIO=?,PASSWORD=? WHERE ID_PERSONAL=?");
			$stmt->bind_param('sssisssssi',$nombre,$apellido,$dni,$edad,$correo,$direccion,$ocupacion,
				$usuario,$password,$id);
			$resultado=$stmt->execute();
		}	
		if($resultado){
			echo true;
		}else{
			echo false;
		}
	}

 ?>