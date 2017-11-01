<?php 
	require 'config/conexion.php';
	include 'datosTabla.php';

	if (!empty($_POST)) {
		$mensaje="";
		$mensajeDoc="";
		$mensajeError="";
		$idDoc=$conexion->real_escape_string($_POST['doc']);
		$idPer=$conexion->real_escape_string($_POST['responsableDoc']);
		$idPro=$conexion->real_escape_string($_POST['idProyecto']);
		$nombre=$conexion->real_escape_string($_POST['nameDoc']);
		$version=$conexion->real_escape_string($_POST['versionDoc']);
		$dateReDoc=date("Y-m-d H:i:s");
		$comen=$conexion->real_escape_string($_POST['comenDoc']);
		$formatos=['.jpg','jpeg','.pdf','.doc','.xlsx'];
		$nombreArchivo=$_FILES['fileDoc']['name'];
		$dir_subida="../servicios/archivos/";
		$origen_ruta="http://proyectos2017.esy.es/HOME-CONTENT/servicios/archivos/".$nombreArchivo;
		$ruta=$dir_subida.basename($_FILES['fileDoc']['name']);
		//$dir_bajada="../$ruta";
		//echo $ruta;
		//$nombreTmpArchivo=$_FILES['fileDoc']['tmp_name'];
		$ext=substr($nombreArchivo, strrpos($nombreArchivo,'.'));
		if (in_array($ext,$formatos )) {
			if (move_uploaded_file($_FILES['fileDoc']['tmp_name'], $ruta)) {
				//echo "Felicitaciones archivo $nombreArchivo subido exitosamente";
				//$origen_ruta=$origen_ruta.$ruta;
				$sql="INSERT INTO entregable(ID_CATEGORIA,ID_PERSONAL,ID_PROYECTO,NOMBRE_DOCUMENTO,VERSION_DOCUMENTO,DATECREATED,COMENTARIO_DOCUMENTO,URL_DOCUMENTO) VALUES('$idDoc','$idPer','$idPro','$nombre','$version','$dateReDoc','$comen','$origen_ruta')";
				$result=$conexion->query($sql);
				if ($result) {
					$mensaje="Documento registrado con exito";
					$contenido=obtenerDatos3($idPro);
				}else{
					$mensaje="Error al registrar documento";
				}
			}else{
				$mensajeDoc="ocurrio un error";
			}
		}else{
			$mesajeDocError="Archivo no permitido";
		}
	echo json_encode(array('mensaje'=>$mensaje,'contenido'=>$contenido,'mensajeDoc'=>$mensajeDoc,'mensajeError'=>$mensajeError));
	}

 ?>