<?php 

	

	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");
	if ($_SERVER['REQUEST_METHOD'] == 'GET'){

		if (isset($_GET['id_proyecto'])) {
 
        $idProyecto = $_GET['id_proyecto'];
       		 $sql="SELECT e.ID_PERSONAL as idPersonal,e.ID_PROYECTO as idProyecto,ID_TIPO,NOMBRE_PERSONAL,
       		 APELLIDO_PERSONAL,OCUPACION  FROM equipop e
       		 JOIN personal p ON p.ID_PERSONAL=e.ID_PERSONAL
       		 WHERE e.ID_PROYECTO='$idProyecto'";
			$resultado=$conexion->query($sql);
			$row=$resultado->num_rows;

        	$datos=array();
       		$dato=array();
        	$dato["estado"]=1;
       
		while($obj=$resultado->fetch_object()){

		$datos[]=array(
					   'idPersonal'=>$obj->idPersonal,	
					   'idTipo'=>$obj->ID_TIPO,
					   'nombrePersonal'=>$obj->NOMBRE_PERSONAL,
					   'apellidoPersonal'=>$obj->APELLIDO_PERSONAL,
					   'ocupacionPersonal'=>$obj->OCUPACION
					   );
		$dato["equipoList"]=$datos;
	}
		if($row<=0){
			$dato['estado']=2;
			$dato['equipoList']=null;
		}
	print_r(json_encode($dato)); 
    
    }
	}
?>