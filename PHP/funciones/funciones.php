<?php 
	

	function test($dato) {
	  $dato = trim($dato);
 	  $dato = stripslashes($dato);
 	  $dato = htmlspecialchars($dato);
 	  return $dato;
	}
	function isNull($nombre, $user, $pass, $pass_con){
		if(strlen(test($nombre)) < 1 || strlen(test($user)) < 1 || strlen(test($pass)) < 1 || strlen(test($pass_con)) < 1)
		{
			return true;
			} else {
			return false;
		}		
	}
	function validaPassword($pass1, $pass2)
	{
		if (strcmp($pass1, $pass2) !== 0){
			return false;
			} else {
			return true;
		}
	}
	function usuarioExiste($usuario)
	{
		global $conexion;

		$sql="SELECT * FROM empresa WHERE usuario = '$usuario'";
		$resultado=$conexion->query($sql);
		$numero=$resultado->num_rows;
		if ($numero > 0){
			return true;
			} else {
			return false;
		}
	}
	function hashPassword($password) 
	{
		$hash = password_hash($password, PASSWORD_DEFAULT);
		return $hash;
	}
	function sacar_pass($usuario){
		$passw="";
		global $conexion;
		$sql="SELECT PASSWORD FROM empresa WHERE USUARIO='$usuario'";
		$resul=$conexion->query($sql);
		while($row=$resul->fetch_assoc()){
			$passw=$row['PASSWORD'];
		}
		return $passw;
	}
	
	function loginUsuario($usuario,$password){
		global $conexion;
		$sql="SELECT * FROM personal WHERE usuario='$usuario' AND password='$password'";
		$resul=$conexion->query($sql);
		$num=$resul->num_rows;
		return $num;
	}

	function isNullLogin($usuario, $password){
		if(strlen(test($usuario)) < 1 || strlen(test($password)) < 1)
		{
			return true;
		}
		else
		{
			return false;
		}		
	}
	function loginEmpresa($usuario){
		global $conexion;
		$sql="SELECT * FROM empresa WHERE usuario='$usuario'";
		$resul=$conexion->query($sql);
		$num=$resul->num_rows;
		return $num;
	}
	function ID($usuario){
		global $conexion;
		$sql="SELECT ID_EMPRESA FROM empresa WHERE USUARIO='$usuario'";
		$resul=$conexion->query($sql);
		while($row=$resul->fetch_assoc()){
			$id=$row['ID_EMPRESA'];
		}
		return $id;

	}
	function getCantidad($estado,$dato,$fechaI,$fechaF,$idEmpresa){
		global $conexion;
		$sql="SELECT COUNT(p.ID_ESTADO) as cantidad,ID_EMPRESA FROM proyecto p
			  JOIN estado_proyecto e ON e.ID_ESTADO=p.ID_ESTADO 
			  WHERE e.DESCRIPCION='$estado' AND $dato BETWEEN '$fechaI' AND '$fechaF' AND ID_EMPRESA='$idEmpresa'";
			  $resul=$conexion->query($sql);
			  $row=$resul->fetch_assoc();
			  $tot=$row['cantidad'];
			  return $tot;
	}
	header('Access-Control-Allow-Origin:*');
 ?>