<?php 

	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$body=json_decode(file_get_contents("php://input"),true);
			
			$idPersonal=$body["idPersonal"];
			$idProyecto=$body["idProyecto"];
			$idTipo=$body["idTipo"];

			$sql="UPDATE personal SET ID_TIPO=1 WHERE ID_PERSONAL='$idPersonal'";
			$sql2="UPDATE proyecto SET ID_ESTADO=2 WHERE ID_PROYECTO='$idProyecto'";
			$resultado=$conexion->query($sql);
			$resultado2=$conexion->query($sql2);

			if($resultado && $resultado2){
				$json_str =json_encode(array('estado' => '1', 'mensaje' => 'Ok' ));
				echo $json_str;
			}else{
				$json_str =json_encode(array('estado' => '2', 'mensaje' => 'Error' ));
				echo $json_str;
			}	

	}


 ?>