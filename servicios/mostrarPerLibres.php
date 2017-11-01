<?php 

	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");
	if ($_SERVER['REQUEST_METHOD'] == 'GET'){

		if (isset($_GET['id_empresa'])) {
 
        $id_empresa= $_GET['id_empresa'];
       		 $sql="SELECT ID_PERSONAL,NOMBRE_PERSONAL,
       		 APELLIDO_PERSONAL,OCUPACION FROM personal WHERE ESTADO=0 AND ID_EMPRESA='$id_empresa'";
			$resultado=$conexion->query($sql);
			$row=$resultado->num_rows;

        	$datos=array();
       		$dato=array();
        	$dato["estado"]=1;
       
		while($obj=$resultado->fetch_object()){

		$datos[]=array(
					   'idPersonal'=>$obj->ID_PERSONAL,	
					   'nombrePersonal'=>$obj->NOMBRE_PERSONAL,
					   'apellidoPersonal'=>$obj->APELLIDO_PERSONAL,
					   'ocupacionPersonal'=>$obj->OCUPACION
					   );
		$dato["perList"]=$datos;
	}
		if($row<=0){
			$dato['estado']=2;
			$dato['perList']=null;
		}
	print_r(json_encode($dato));
    
    }
	}



 ?>