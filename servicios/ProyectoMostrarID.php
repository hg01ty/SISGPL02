<?php 
include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");
	if ($_SERVER['REQUEST_METHOD'] == 'GET'){

		if (isset($_GET['idProyecto'])) {
 
        $idProyecto= $_GET['idProyecto'];
       		 $sql="SELECT ID_PROYECTO,ID_ESTADO,ID_EMPRESA,ID_CATEGORIA_P,NOMBRE_PROYECTO,CODIGO_PROYECTO,
			DESCRIPCION_PROYECTO,DATESTART,DATEEND,DATEENDFAKE,MONTO FROM proyecto /*p*/ 
			WHERE ID_PROYECTO='$idProyecto'";
			$resultado=$conexion->query($sql);
			$row=$resultado->num_rows;
            		
        	$dato["estado"]=1;
       
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