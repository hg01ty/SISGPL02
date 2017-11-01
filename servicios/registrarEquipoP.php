<?php 

	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$body=json_decode(file_get_contents("php://input"),true);

		$idProyecto=$body["idProyecto"];
		$idPersonal=$body["idPersonal"];

		

			$sql="INSERT INTO equipop(ID_PROYECTO,ID_PERSONAL,TAREA,FECHA_I,FECHA_F,FECHA_R,FECHA_MOD) VALUES('$idProyecto','$idPersonal',null,null,null,null,null)";
			$res=$conexion->query($sql);

			$sql2="UPDATE personal SET ESTADO='1' WHERE ID_PERSONAL='$idPersonal'";
			$res2=$conexion->query($sql2);
			if($res && $res2){
				$json_str =json_encode(array('estado' => '1', 'mensaje' => 'Registrado Exitosamente!' ));
				echo $json_str;
			}else{
				$json_str =json_encode(array('estado' => '2', 'mensaje' => 'No se pudo registrar' ));
				echo $json_str;
			}
	}

?>