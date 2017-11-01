<?php 


	include("../PHP/config/conexion.php");
	include("../PHP/funciones/funciones.php");
	if ($_SERVER['REQUEST_METHOD'] == 'GET'){

		if (isset($_GET['idEmpresa'])) {
 
        	$idEmpresa = $_GET['idEmpresa'];
       		
        	 $sql="SELECT ID_ESTADO FROM proyecto WHERE ID_EMPRESA='$idEmpresa' ";
			$resultado=$conexion->query($sql);
			$row=$resultado->num_rows;
	$a=0;
	$b=0;$c=0;$d=0;$e=0;
		while($obj=$resultado->fetch_object()){

			if($obj->ID_ESTADO==1){
				$a=$a+1;
			}
			if($obj->ID_ESTADO==2){
				$b=$b+1;
			}
			if($obj->ID_ESTADO==3){
				$c=$c+1;
			}
			if($obj->ID_ESTADO==4){
				$d=$d+1;
			}
			if($obj->ID_ESTADO==5){
				$e=$e+1;
			}
		}

       		$dato[]=array(
				'enEspera'=>$a,
				'Ganado'=>$b,
				'Inconcluso'=>$c,
				'Perdido'=>$d,
				'Finalizado'=>$e);
		$datos["cantidad"]=$dato;
	print_r(json_encode($datos));

    
   	 	}
	}



 ?>