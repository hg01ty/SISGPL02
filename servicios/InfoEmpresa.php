<?php 
	/*include("../php/config/conexion.php");
	include("../php/funciones/funciones.php");
	if ($_SERVER['REQUEST_METHOD'] == 'GET'){

		if (isset($_GET['id_empresa'])) {
 
        $id_empresa = $_GET['id_empresa'];
       		 $sql="SELECT NOMBRE_EMPRESA,ID_TIPO_EMPRESA,RUC_EMPRESA,CORREO_EMPRESA,USUARIO FROM empresa
			WHERE ID_EMPRESA='$id_empresa'";
			$resultado=$conexion->query($sql);	
			$rows=$resultado->fetch_assoc();

			if ($rows) {
	            $usuario["estado"] = 1;		
	            $usuario["empresa"] = $rows;
	            print_r(json_encode($usuario));

       		 } else {	
	            print_r(json_encode(
	                array(
	                    'estado' => '2',
	                    'mensaje' => 'No se obtuvo el registro'
	                )
	            ));
      		 }    
   		}
	}*/

	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");
	if ($_SERVER['REQUEST_METHOD'] == 'GET'){

			
			$id_empresa = $_GET['id_empresa'];

       		 $sql="SELECT NOMBRE_EMPRESA,ID_TIPO_EMPRESA,RUC_EMPRESA,CORREO_EMPRESA,USUARIO FROM empresa
			WHERE ID_EMPRESA='$id_empresa'";
			$resultado=$conexion->query($sql);	
			$datos=array();
			$datos["estado"]=1;

				while($obj=$resultado->fetch_object()){

					$datos["empresa"]=array(
								   'nombreEmpresa'=>$obj->NOMBRE_EMPRESA,								
								   'idTipoEmpresa'=>$obj->ID_TIPO_EMPRESA,								 
								   'rucEmpresa'=>$obj->RUC_EMPRESA,
								   'correoEmpresa'=>$obj->CORREO_EMPRESA,
								   'usuario'=>$obj->USUARIO
								   );
				
		    	}
		    	print_r(json_encode($datos));
	   	

	}		
 ?>