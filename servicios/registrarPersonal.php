<?php 

	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");

		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$body=json_decode(file_get_contents("php://input"),true);
			
			$idEmpresa=$body["idEmpresa"];
			$nombreP=$body["nombrePersonal"];
			$apellidoP=$body["apellidoPersonal"];
			$dniP=$body["dniPersonal"];
			$edadP=$body["edadPersonal"];
			$correoP=$body["correoPersonal"];
			$telefonoP=$body["telefonoPersonal"];
			$direccionP=$body["direccionPersonal"];
			$ocupacionP=$body["ocupacionPersonal"];
			//usuario
			//pass

			$sql="INSERT INTO personal(ID_EMPRESA,ID_TIPO,NOMBRE_PERSONAL,
				APELLIDO_PERSONAL,DNI_PERSONAL,EDAD_PERSONAL,CORREO_PERSONAL,DIRECCION_PERSONAL,TELEFONO_PERSONAL,OCUPACION,
				USUARIO,PASSWORD,ESTADO) VALUES('$idEmpresa','2','$nombreP','$apellidoP','$dniP','$edadP','$correoP','$direccionP','$telefonoP','$ocupacionP',null,null,0)";

			$res=$conexion->query($sql);

			if($res){
				$json_str =json_encode(array('estado' => '1', 'mensaje' => 'personal registrado' ));
				echo $json_str;
			}else{
				$json_str =json_encode(array('estado' => '2', 'mensaje' => 'No se pudo registrar' ));
				echo $json_str;
			}
		}	


 ?>