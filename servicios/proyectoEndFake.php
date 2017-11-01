<?php 
	
	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");


	if($_SERVER['REQUEST_METHOD']=='POST'){
			
		$body=json_decode(file_get_contents("php://input"),true);
		$idProyecto=$body["idProyecto"];
		$fecha=$body["dateEndFake"];


			$sql="UPDATE proyecto SET DATEENDFAKE='$fecha',ID_ESTADO=4
				WHERE ID_PROYECTO='$idProyecto'";
			$resultado=$conexion->query($sql);
			
			$sql2="UPDATE personal p
       			 JOIN  equipop e ON p.ID_PERSONAL=e.ID_PERSONAL SET p.ESTADO=0,p.ID_TIPO=2  
       			 WHERE e.ID_PROYECTO='$idProyecto'";
       		 	$resul=$conexion->query($sql2);
			
			$sql3="DELETE FROM equipop WHERE ID_PROYECTO='$idProyecto'";
			$resul=$conexion->query($sql3);

			if($resultado && $resul){
				$json_str =json_encode(array('estado' => '1', 'mensaje' => 'ok' ));
				echo $json_str;
			}else{
				$json_str =json_encode(array('estado' => '2', 'mensaje' => 'no' ));
				echo $json_str;
			}	

	}

	



 ?>