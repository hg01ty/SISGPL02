<?php
	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");
	if ($_SERVER['REQUEST_METHOD'] == 'GET'){

		if (isset($_GET['id_proyecto'])) {
 
        $id_proyecto = $_GET['id_proyecto'];
       		 $sql="SELECT ID_DOCUMENTO,ID_CATEGORIA,COMENTARIO_DOCUMENTO,NOMBRE_DOCUMENTO,VERSION_DOCUMENTO,DATECREATED,URL_DOCUMENTO 
       		 	FROM entregable 
				WHERE ID_PROYECTO='$id_proyecto'";
			$resultado=$conexion->query($sql);
			$row=$resultado->num_rows;

        	$datos=array();
       		$dato=array();
        	$dato["estado"]=1;
       
		while($obj=$resultado->fetch_object()){

		$datos[]=array(
					   'idDocumento'=>$obj->ID_DOCUMENTO,
					   'idCategoria'=>$obj->ID_CATEGORIA,	
					   'nombreDoc'=>$obj->NOMBRE_DOCUMENTO,
					   'versionDoc'=>$obj->VERSION_DOCUMENTO,
					   'dateCreated'=>$obj->DATECREATED,
					   'comentarioDoc'=>$obj->COMENTARIO_DOCUMENTO,
					   'urlDoc'=>$obj->URL_DOCUMENTO
					   );
		$dato["entregableList"]=$datos;
	}
		if($row<=0){
			$dato['estado']=2;
			$dato['entregableList']=null;
		}
	print_r(json_encode($dato));
    
    }
	}


 ?>