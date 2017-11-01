<?php 

	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");
	if ($_SERVER['REQUEST_METHOD'] == 'GET'){

		if (isset($_GET["id_empresa"])) {
 
        $idEmpresa = $_GET["id_empresa"];
       		 $sql="SELECT ID_PERSONAL,ID_EMPRESA,ID_TIPO,NOMBRE_PERSONAL,
       		 APELLIDO_PERSONAL,DNI_PERSONAL,EDAD_PERSONAL,CORREO_PERSONAL,TELEFONO_PERSONAL,DIRECCION_PERSONAL,OCUPACION,USUARIO,PASSWORD,ESTADO FROM personal WHERE ID_EMPRESA='$idEmpresa'";
			$resultado=$conexion->query($sql);
			$row=$resultado->num_rows;

        	$datos=array();
       		$dato=array();
        	$dato["estado"]=1;
       
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
					   'telefonoPersonal'=>$obj->TELEFONO_PERSONAL,
					   'direccionPersonal'=>$obj->DIRECCION_PERSONAL,
					   'ocupacionPersonal'=>$obj->OCUPACION,
					   'usuarioPersonal'=>$obj->USUARIO,
					   'usuarioPassword'=>$obj->PASSWORD,
					   'estadoPersonal'=>$obj->ESTADO
					   );
		$dato["personalList"]=$datos;
	}
		if($row<=0){
			$dato['estado']=2;
			$dato['personalList']=null;
		}
	print_r(json_encode($dato));
    
    }
	}





 ?>