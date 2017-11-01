<?php 
	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");

		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$body=json_decode(file_get_contents("php://input"),true);
			
			$idProyecto=$body["idProyecto"];
			$descripcion=$body["descripcion"];
	
			$date=date("Y-m-d");
			$sql="INSERT INTO personal_historial(ID_PROYECTO,DESCRIPCION,FECHA_R) VALUES('$idProyecto','$descripcion','$date')";

			$res=$conexion->query($sql);

			if($res){
				$json_str =json_encode(array('estado' => '1', 'mensaje' => 'se registro en historial' ));
				echo $json_str;
			}else{
				$json_str =json_encode(array('estado' => '2', 'mensaje' => 'No se pudo registrar' ));
				echo $json_str;
			}
		}	


 ?>