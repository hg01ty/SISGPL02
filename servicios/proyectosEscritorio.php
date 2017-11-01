<?php 

	include("../PHP/config/conexion.php");

/*	$sql="SELECT * FROM proyecto";
	$resultado=$conexion->query($sql);

	while($obj=$resultado->fetch_object()){

		$datos[]=array(
					 	'idProyecto'=>$obj->ID_PROYECTO,				
					   'idEstado'=>$obj->ID_ESTADO,
					   'idEmpresa'=>$obj->ID_EMPRESA,
					   'idCategoriaP'=>$obj->ID_CATEGORIA_P,
					   'nombreProyecto'=>$obj->NOMBRE_PROYECTO,
					   'codigoProyecto'=>$obj->CODIGO_PROYECTO,
					   'descripcionProyecto'=>$obj->DESCRIPCION_PROYECTO,
					   'dateStart'=>$obj->DATESTART,
					   'dateEnd'=>$obj->DATEEND,
					   'dateEndFake'=>$obj->DATEENDFAKE,
					   'monto'=>$obj->MONTO
					   );
	}
	print_r(json_encode($datos));*/
	
	$sql="SELECT ID_PROYECTO,ep.DESCRIPCION AS estado,e.NOMBRE_EMPRESA AS empresa,c.DESCRIPCION as categoria,NOMBRE_PROYECTO,CODIGO_PROYECTO,DESCRIPCION_PROYECTO,DATESTART,DATEEND,DATEENDFAKE,MONTO 
	FROM proyecto p
	JOIN estado_proyecto ep	ON p.ID_ESTADO=ep.ID_ESTADO
	JOIN empresa e ON p.ID_EMPRESA=e.ID_EMPRESA
	JOIN categoria_proyecto c ON p.ID_CATEGORIA_P=c.ID_CATEGORIA_P";
	$resultado=$conexion->query($sql);

	while($obj=$resultado->fetch_object()){

		$datos[]=array(
					 	'idProyecto'=>$obj->ID_PROYECTO,				
					   'estadoProyecto'=>$obj->estado,
					   'empresaProyecto'=>$obj->empresa,
					   'categoriaProyecto'=>$obj->categoria,
					   'nombreProyecto'=>$obj->NOMBRE_PROYECTO,
					   'codigoProyecto'=>$obj->CODIGO_PROYECTO,
					   'descripcionProyecto'=>$obj->DESCRIPCION_PROYECTO,
					   'dateStart'=>$obj->DATESTART,
					   'dateEnd'=>$obj->DATEEND,
					   'dateEndFake'=>$obj->DATEENDFAKE,
					   'monto'=>$obj->MONTO
					   );
	}
	print_r(json_encode($datos));

	header('Access-Control-Allow-Origin:*');

 ?>