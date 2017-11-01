<?php 

	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");

		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$body=json_decode(file_get_contents("php://input"),true);
			
			$id_empresa =$body["idEmpresa"];
			$categoria=$body["idCategoriaP"];
			$name=$body["nombreProyecto"];
			$codigo=$body["codigoProyecto"];
			$comenta=$body["descripcionProyecto"];
			$dateI=$body["dateStart"];
			$dateF=$body["dateEnd"];
			$monto=$body["monto"];
			
			$date=date("Y-m-d");


			$sql="INSERT INTO proyecto(ID_ESTADO,ID_EMPRESA,ID_CATEGORIA_P,NOMBRE_PROYECTO,
				CODIGO_PROYECTO,DESCRIPCION_PROYECTO,DATESTART,DATEEND,DATEENDFAKE,MONTO,FECHA_REGISTRO_P) VALUES('1','$id_empresa','$categoria','$name','$codigo','$comenta','$dateI','$dateF',null,'$monto','$date')";

			$res=$conexion->query($sql);

			if($res){
				$json_str =json_encode(array('estado' => '1', 'mensaje' => 'Se registro un proyecto' ));
				echo $json_str;
			}else{
				$json_str =json_encode(array('estado' => '2', 'mensaje' => 'No se pudo registrar' ));
				echo $json_str;
			}
		}	


 ?>