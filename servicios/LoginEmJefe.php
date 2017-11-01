<?php 
	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$body=json_decode(file_get_contents("php://input"),true);

		$usuario=$body['usuario']; /*$_GET['usuario'];*/ 
		$password=$body['password'];/*$_GET['password'];*/

		
		$sql="SELECT * FROM empresa WHERE USUARIO='$usuario'";
		$res=$conexion->query($sql);
		$row=$res->num_rows;
		if($row==1){
			$pass=sacar_pass($usuario);
			$Veripass=password_verify($password,$pass);

			if($Veripass){
				$sql1="SELECT ID_EMPRESA,NOMBRE_EMPRESA,RUC_EMPRESA,CORREO_EMPRESA,USUARIO FROM empresa WHERE USUARIO='$usuario'";
				$resul=$conexion->query($sql1);
				$datos["estado"]=1;
				while($fila=$resul->fetch_object()){
				$datos["datoJson"]=array(
						'idUser'=>$fila->ID_EMPRESA,
						'idEmpresa'=>0,
						'nombreUser'=>$fila->NOMBRE_EMPRESA,
						'idProyecto'=>0,
						'identificadorUSer'=>$fila->RUC_EMPRESA,
						'correoUser'=>$fila->CORREO_EMPRESA,
						'usuario'=>$fila->USUARIO
					);}
				$datos["mensaje"]='bien';
				print_r(json_encode($datos));

			}else{
				$json_str =json_encode(array('estado' => 2, 'datoJson' => null ,'mensaje'=>'error'));
				echo $json_str;
			}

		}
		if($row==0){
			$sql="SELECT * FROM personal WHERE USUARIO='$usuario' AND PASSWORD='$password'";
			$resultado=$conexion->query($sql);
			$row=$resultado->num_rows;
			if($row==1){
				$sql1="SELECT e.ID_PERSONAL as idPersonal,e.ID_PROYECTO as idProyecto,ID_TIPO,ID_EMPRESA,NOMBRE_PERSONAL,
       				 DNI_PERSONAL,CORREO_PERSONAL,USUARIO  FROM equipop e
       				 JOIN personal p ON p.ID_PERSONAL=e.ID_PERSONAL
       				 WHERE ID_TIPO=1 AND USUARIO='$usuario'";
					$res=$conexion->query($sql1);
					$row2=$res->num_rows;
					if($row2>0){
							$datos["estado"]=1;
							while($fila=$res->fetch_object()){
							$datos["datoJson"]=array(
									'idUser'=>$fila->idPersonal,
									'idEmpresa'=>$fila->ID_EMPRESA,
									'nombreUser'=>$fila->NOMBRE_PERSONAL,
									'idProyecto'=>$fila->idProyecto,
									'identificadorUSer'=>$fila->DNI_PERSONAL,
									'correoUser'=>$fila->CORREO_PERSONAL,
									'usuario'=>$fila->USUARIO
								);}
							$datos["mensaje"]='bien';
							print_r(json_encode($datos));
						}else{
							$json_str =json_encode(array('estado' => 4, 'datoJson' => null ,'mensaje'=>'ya no es jefe'));
							echo $json_str;
						}
			}else{
				$json_str =json_encode(array('estado' => 3, 'datoJson' => null ,'mensaje'=>'no Exoste'));
				echo $json_str;
			}
		}
	}
 ?>