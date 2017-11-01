<?php 
	
	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$body=json_decode(file_get_contents("php://input"),true);		
		$usuario=$body['usuario'];
		$password=$body['password'];


		$pass=sacar_pass($usuario);
		$Veripass=password_verify($password,$pass);
	
		$row=loginEmpresa($usuario);
		if($row>0){
			if($Veripass){
			/*	$json_str =json_encode(array('estado' => '1', 'mensaje' => 'correcto' ));
				echo $json_str;
				$id=ID($usuario);
				$user['estado']=1;
				$user['usuario']=$id;
				$user['mensaje']='bien';
				print_r(json_encode($user));*/
			$sql="SELECT ID_EMPRESA,NOMBRE_EMPRESA,RUC_EMPRESA,CORREO_EMPRESA,USUARIO FROM empresa WHERE USUARIO='$usuario'";
				$resultado=$conexion->query($sql);	
			$user=array();
			$user["estado"]=1;

				while($obj=$resultado->fetch_object()){

					$user["empresa"]=array(
								   'idEmpresa'=>$obj->ID_EMPRESA,
								   'nombreEmpresa'=>$obj->NOMBRE_EMPRESA,								 
								   'rucEmpresa'=>$obj->RUC_EMPRESA,
								   'correoEmpresa'=>$obj->CORREO_EMPRESA,
								   'usuario'=>$obj->USUARIO
								   );
				
		    	}
			$user["mensaje"]='bien';
				print_r(json_encode($user));
				
			}else{
				$json_str =json_encode(array('estado' => '2', 'usuario' => '-1' ,'mensaje'=>'error'));
				echo $json_str;
			}
		}else{
			$json_str =json_encode(array('estado' => '3', 'usuario' => '0','mensaje'=>'no existe' ));
				echo $json_str;
		}
	}
	
		header('Content-type:application/json');
		header('Access-Control-Allow-Origin:*');

 ?>