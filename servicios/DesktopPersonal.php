<?php 

	
	/*include("../php/config/conexion.php");

	$sql="SELECT * FROM personal";
	$resultado=$conexion->query($sql);

	while($obj=$resultado->fetch_object()){

		$datos[]=array(			
					   'idPersonal'=>$obj->ID_PERSONAL,
					   'idEmpresa'=>$obj->ID_EMPRESA,
					   'idTipo'=>$obj->ID_TIPO,
					   'nombrePersonal'=>$obj->NOMBRE_PERSONAL,
					   'apellidoPersonal'=>$obj->APELLIDO_PERSONAL,
					   'dniPersonal'=>$obj->DNI_PERSONAL,
					   'edadPersonal'=>$obj->EDAD_PERSONAL,
					   'correoPersonal'=>$obj->CORREO_PERSONAL,
					   'direccionPersonal'=>$obj->DIRECCION_PERSONAL,
					   'telefonoPersonal'=>$obj->TELEFONO_PERSONAL,
					   'ocupacion'=>$obj->OCUPACION,
					   'estado'=>$obj->ESTADO
					   );
	}
	print_r(json_encode($datos));

	header('Access-Control-Allow-Origin:*');*/
	
	include("../PHP/config/conexion.php");

	$sql="SELECT ID_PERSONAL,e.NOMBRE_EMPRESA as EMPRESAPERSONAL,t.DESCRIPCION as TIPO,
	NOMBRE_PERSONAL,APELLIDO_PERSONAL,DNI_PERSONAL,EDAD_PERSONAL,CORREO_PERSONAL,DIRECCION_PERSONAL,TELEFONO_PERSONAL,
	OCUPACION,ESTADO FROM personal p
	JOIN empresa e ON p.ID_EMPRESA=e.ID_EMPRESA
	JOIN tipo_personal t ON p.ID_TIPO=t.ID_TIPO";
	$resultado=$conexion->query($sql);
	while($obj=$resultado->fetch_object()){

		$datos[]=array(			
					   'idPersonal'=>$obj->ID_PERSONAL,
					   'empresaPersonal'=>$obj->EMPRESAPERSONAL,
					   'tipoPersonal'=>$obj->TIPO,
					   'nombrePersonal'=>$obj->NOMBRE_PERSONAL,
					   'apellidoPersonal'=>$obj->APELLIDO_PERSONAL,
					   'dniPersonal'=>$obj->DNI_PERSONAL,
					   'edadPersonal'=>$obj->EDAD_PERSONAL,
					   'correoPersonal'=>$obj->CORREO_PERSONAL,
					   'direccionPersonal'=>$obj->DIRECCION_PERSONAL,
					   'telefonoPersonal'=>$obj->TELEFONO_PERSONAL,
					   'ocupacion'=>$obj->OCUPACION,
					   'estado'=>$obj->ESTADO
					   );
	}
	print_r(json_encode($datos));

	header('Access-Control-Allow-Origin:*');


 ?>