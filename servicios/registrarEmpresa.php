<?php 
	
	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$body=json_decode(file_get_contents("php://input"),true);

		
		$tipo_empresa=test($body['tipo_empresa']);
		$nombre_empresa=test($body['nombre']);
		$correo_empresa=test($body['correo']);
		$direccion_empresa=test($body['direccion']);
		$ruc_empresa=test($body['ruc']);
		$usuario=test($body['usuario']);
		$hash_pass=hashPassword($body['password']);

	
		if(!usuarioExiste($usuario)){
			
			$stmt=$conexion->prepare("INSERT INTO empresa(ID_TIPO_EMPRESA,NOMBRE_EMPRESA,CORREO_EMPRESA,DIRECCION_EMPRESA,
			RUC_EMPRESA,USUARIO,PASSWORD,TIPO_USUARIO) VALUES(?,?,?,?,?,?,?,'ADMIN')");
			$stmt->bind_param('issssss',$tipo_empresa,$nombre_empresa,$correo_empresa,$direccion_empresa,$ruc_empresa,$usuario,$hash_pass);
			$res=$stmt->execute();
			
			if($res){
				$json_str =json_encode(array('estado' => '1', 'mensaje' => 'Registrado Exitosamente!' ));
				echo $json_str;
			}else{
				$json_str =json_encode(array('estado' => '2', 'mensaje' => 'No se pudo registrar' ));
				echo $json_str;
			}
				
		}else{

			$json_str =json_encode(array('estado' => '3', 'mensaje' => 'Usuario ya fue Registrado' ));
			echo $json_str;
			
		}
	}
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept");
 ?>


 