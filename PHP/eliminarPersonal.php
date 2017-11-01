<?php 

	require 'config/conexion.php';
	
	if(is_numeric($id=$_POST['id'])){;
	
		$stmt=$conexion->prepare("DELETE FROM personal WHERE ID_PERSONAL=?");
		$stmt->bind_param('i',$id);
		$resultado=$stmt->execute();
		if($resultado){
			echo true;
		}else{
			echo false;
		}
	}

 ?>