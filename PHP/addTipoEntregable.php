<?php 
	require 'config/conexion.php';

	if (!empty($_POST)) {
		$idTE=$conexion->real_escape_string($_POST['idTE']);
		$des=$conexion->real_escape_string($_POST['descripcion']);

		$sql="INSERT INTO tipo_entregable(ID_CATEGORIA,NOMBRE_CATEGORIA) VALUES('$idTE','$des')";
		$resul=$conexion->query($sql);
		if ($resul) {
			echo "SE agrego correctamente";
		} else {
			echo "Problema al agregar ";
		}
		
	}

 ?>