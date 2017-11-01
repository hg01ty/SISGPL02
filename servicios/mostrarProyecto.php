<?php 
include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");
	if ($_SERVER['REQUEST_METHOD'] == 'GET'){

		if (isset($_GET['id_empresa'])) {
 
        $id_empresa = $_GET['id_empresa'];
       		 $sql="SELECT ID_PROYECTO,/*e.DESCRIPCION DESCRIPCION_ESTADO*/ID_ESTADO,ID_EMPRESA,/*c.DESCRIPCION*/ID_CATEGORIA_P,NOMBRE_PROYECTO,CODIGO_PROYECTO,
			DESCRIPCION_PROYECTO,DATESTART,DATEEND,DATEENDFAKE,MONTO FROM proyecto /*p*/ 
		/*	JOIN estado_proyecto e
			ON p.ID_ESTADO=e.ID_ESTADO
			JOIN categoria_proyecto c
			ON p.ID_CATEGORIA_P=c.ID_CATEGORIA_P*/
			WHERE ID_EMPRESA='$id_empresa'";
			$resultado=$conexion->query($sql);
			$row=$resultado->num_rows;

       
       		
        	$dato["estado"]=1;
       
		while($obj=$resultado->fetch_object()){

		$datos[]=array(
					 'idProyecto'=>$obj->ID_PROYECTO,	
					 //  'DESCRIPCION_ESTADO'=>$obj->DESCRIPCION_ESTADO,
					   'idEstado'=>$obj->ID_ESTADO,
					   'id_Empresa'=>$obj->ID_EMPRESA,
					  // 'DESCRIPCION'=>$obj->DESCRIPCION,
					   'idCategoriaP'=>$obj->ID_CATEGORIA_P,
					   'nombreProyecto'=>$obj->NOMBRE_PROYECTO,
					   'codigoProyecto'=>$obj->CODIGO_PROYECTO,
					   'descripcionProyecto'=>$obj->DESCRIPCION_PROYECTO,
					   'dateStart'=>$obj->DATESTART,
					   'dateEnd'=>$obj->DATEEND,
					   'dateEndFake'=>$obj->DATEENDFAKE,
					   'monto'=>$obj->MONTO
					   );
		$dato["proyectoList"]=$datos;
	}
		if($row<=0){
			$dato['estado']=2;
			$dato['proyectoList']=null;
		}
	print_r(json_encode($dato));
    
    }
	}

 ?>