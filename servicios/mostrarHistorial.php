<?php 

	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");
	if ($_SERVER['REQUEST_METHOD'] == 'GET'){

		if (isset($_GET['id_proyecto'])) {
 
        $id_proyecto = $_GET['id_proyecto'];
       		 $sql="SELECT ID_HISTORIAL,ID_PROYECTO,DESCRIPCION,FECHA_R FROM personal_historial WHERE ID_PROYECTO='$id_proyecto'";
			$resultado=$conexion->query($sql);
			$row=$resultado->num_rows;

        	$datos=array();
       		$dato=array();
        	$dato["estado"]=1;
       
		while($obj=$resultado->fetch_object()){

		$datos[]=array(
					   'idHistorial'=>$obj->ID_HISTORIAL,	
					   'idProyecto'=>$obj->ID_PROYECTO,
					   'descripcion'=>$obj->DESCRIPCION,
					   'fecha'=>$obj->FECHA_R
					   );
		$dato["historialList"]=$datos;
	}
		if($row<=0){
			$dato['estado']=2;
			$dato['historialList']=null;
		}
	print_r(json_encode($dato));
    
    }
	}



 ?>