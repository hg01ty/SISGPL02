<?php 
	
	
	function ultimoPersonal(){
		require 'config/conexion.php';
		$idE=$_SESSION['usuario']['ID_EMPRESA'];
		$sql="SELECT CONCAT(NOMBRE_PERSONAL,' ',APELLIDO_PERSONAL) AS NOMBRE,OCUPACION,EDAD_PERSONAL,TELEFONO_PERSONAL FROM personal WHERE ID_EMPRESA='$idE' ORDER BY ID_PERSONAL DESC LIMIT 4" ;
		$resultado=$conexion->query($sql) or trigger_error($mysqli->error);

		return $resultado;
	}

	function ultimosProyectos(){
		require 'config/conexion.php';
		$idE=$_SESSION['usuario']['ID_EMPRESA'];
		$sql="SELECT NOMBRE_PROYECTO,(SELECT DESCRIPCION FROM categoria_proyecto WHERE categoria_proyecto.ID_CATEGORIA_P=proyecto.ID_CATEGORIA_P) AS TIPO,MONTO FROM proyecto WHERE ID_EMPRESA='$idE' ORDER BY  ID_PROYECTO DESC LIMIT 4 ";
		$resultado1=$conexion->query($sql) or trigger_error($mysqli->error);

		return $resultado1;
	}

	function ultimosDocumentos(){
		require 'config/conexion.php';
		$idE=$_SESSION['usuario']['ID_EMPRESA'];
		$sql="SELECT NOMBRE_DOCUMENTO,(SELECT NOMBRE_CATEGORIA FROM tipo_entregable WHERE tipo_entregable.ID_CATEGORIA=entregable.ID_CATEGORIA) AS CATEGORIA,VERSION_DOCUMENTO FROM entregable WHERE ID_PROYECTO= (SELECT ID_PROYECTO FROM proyecto WHERE ID_EMPRESA='$idE' AND ID_PROYECTO=entregable.ID_PROYECTO) ORDER BY ID_DOCUMENTO DESC LIMIT 4 ";
		$resultado2=$conexion->query($sql) or trigger_error($mysqli->error);

		return $resultado2;
	}

 ?>
 