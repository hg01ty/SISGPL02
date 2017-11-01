<?php 

	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$body=json_decode(file_get_contents("php://input"),true);
			
			$idPersonal=$body["idPersonal"];
			$idProyecto=$body["idProyecto"];
			$idTipo=$body["idTipo"];
			$usuarioPersonal=$body["usuarioPersonal"];
			$passwordPersonal=$body["passwordPersonal"];


			$sql="UPDATE personal SET ID_TIPO=1, USUARIO='$usuarioPersonal',PASSWORD='$passwordPersonal'
				WHERE ID_PERSONAL='$idPersonal'";
			$sql2="UPDATE proyecto SET ID_ESTADO=2 WHERE ID_PROYECTO='$idProyecto'";
			$resultado=$conexion->query($sql);
			$resultado2=$conexion->query($sql2);

			if($resultado && $resultado2){
				$json_str =json_encode(array('estado' => '1', 'mensaje' => 'Se asigno jefe Correctamente' ));
				echo $json_str;
			}else{
				$json_str =json_encode(array('estado' => '2', 'mensaje' => 'Error,Intentalo nuevamente' ));
				echo $json_str;
			}	

	}


 ?>