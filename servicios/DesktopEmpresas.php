<?php 

	
	include("../PHP/config/conexion.php");

	/*$sql="SELECT * FROM proyecto";
	$sql="SELECT ID_EMPRESA,ID_TIPO_EMPRESA,NOMBRE_EMPRESA,CORREO_EMPRESA,DIRECCION_EMPRESA,
		RUC_EMPRESA,USUARIO FROM empresa";
	$res=$conexion->query($sql);

	while($obj=$res->fetch_object()){

		$datos[]=array(			
					   'idEmpresa'=>$obj->ID_EMPRESA,
					   'idTipoEmpresa'=>$obj->ID_TIPO_EMPRESA,
					   'nombreEmpresa'=>$obj->NOMBRE_EMPRESA,
					   'correoEmpresa'=>$obj->CORREO_EMPRESA,
					   'direccionEmpresa'=>$obj->DIRECCION_EMPRESA,
					   'rucEmpresa'=>$obj->RUC_EMPRESA,
					   'usuario'=>$obj->USUARIO
					   );
	}
	print_r(json_encode($datos));*/
	
	$sql="SELECT ID_EMPRESA,t.DESCRIPCION as tipoEmpresa,NOMBRE_EMPRESA,CORREO_EMPRESA, DIRECCION_EMPRESA,
		RUC_EMPRESA,USUARIO FROM empresa e
		JOIN tipo_empresa t ON e.ID_TIPO_EMPRESA=t.ID_TIPO_EMPRESA";
	$resultado=$conexion->query($sql);

	while($obj=$resultado->fetch_object()){

		$datos[]=array(			
					   'idEmpresa'=>$obj->ID_EMPRESA,
					   'tipoEmpresa'=>$obj->tipoEmpresa,
					   'nombreEmpresa'=>$obj->NOMBRE_EMPRESA,
					   'correoEmpresa'=>$obj->CORREO_EMPRESA,
					   'direccionEmpresa'=>$obj->DIRECCION_EMPRESA,
					   'rucEmpresa'=>$obj->RUC_EMPRESA,
					   'usuario'=>$obj->USUARIO
					   );
	}
	print_r(json_encode($datos));

	header('Access-Control-Allow-Origin:*');

 ?>