<?php 
	function obtenerDatos(){
		require 'config/conexion.php';
		$idEmpresa = $_SESSION['usuario']['ID_EMPRESA'];
		$salida="";
		$select="SELECT ID_PROYECTO,CODIGO_PROYECTO,NOMBRE_PROYECTO,(SELECT DESCRIPCION FROM estado_proyecto WHERE estado_proyecto.ID_ESTADO=proyecto.ID_ESTADO) AS ESTADO,(SELECT DESCRIPCION FROM categoria_proyecto WHERE categoria_proyecto.ID_CATEGORIA_P=proyecto.ID_CATEGORIA_P) AS CATEGORIA,DESCRIPCION_PROYECTO,DATESTART,DATEEND,DATEENDFAKE,MONTO FROM proyecto WHERE ID_EMPRESA='$idEmpresa'";
		$resultado=$conexion->query($select);

		while ($dat=$resultado->fetch_array()) {
			$salida .='
				<tr>
					<td>'.$dat['CODIGO_PROYECTO'].'</td>				
					<td>'.$dat['NOMBRE_PROYECTO'].'</td>
					<td class="hidden-xs">
            <div class="progress progress-striped active barra" >
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">               
              </div>                
            </div>                
            <small>80% completado</small>                
          </td>
          <td>'.$dat['CATEGORIA'].'</td>
          <td><a class="btn btn-'.returnStatus($dat['ESTADO']).'">'.ucfirst(strtolower($dat['ESTADO'])).'</a></td>
          <td>
            <a href="verproyecto.php?comen='.base64_encode($dat['DESCRIPCION_PROYECTO']).'&codigo='. base64_encode($dat['CODIGO_PROYECTO']).'&name='.base64_encode($dat['NOMBRE_PROYECTO']).'&est='.base64_encode($dat['ESTADO']).'&cat='.base64_encode($dat['CATEGORIA']).'&dateI='. base64_encode($dat['DATESTART']).'&dateF='.base64_encode($dat['DATEEND']).'&id='.base64_encode($dat['ID_PROYECTO']).'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>                
            <a class="btn btn-info btn-xs editar" id="'.$dat['ID_PROYECTO'].'" data-target="#modaledit" data-toggle="modal"><i class="fa fa-pencil"></i> Editar </a>                
            <a class="btn btn-danger btn-xs eliminar" id="'.$dat['ID_PROYECTO'].'"><i class="fa fa-trash-o"></i> Eliminar </a>                
          </td>                                
				</tr>' ;
}
return $salida;
}

function returnStatus($esta){
    switch ($esta) {
      case 'EN ESPERA':$status='espera';
        break;
      case 'GANADO':$status='ganado';
        break;  
      case 'PERDIDO':$status='perdido';
        break;
      case 'INCONCLUSO':$status='inconcluso';
        break;
      case 'FINALIZADO':$status='finalizado';
        break;    
      default:
        break;
    }
    return $status;
  }


	function obtenerDatos1($idP){
		require 'config/conexion.php';
		$sql="SELECT ID_EQUIPOP,ID_PERSONAL,ID_PROYECTO,(SELECT CONCAT(NOMBRE_PERSONAL,' ',APELLIDO_PERSONAL) FROM personal WHERE personal.ID_PERSONAL=equipop.ID_PERSONAL) AS NOMBRE_COMPLETO,TAREA,FECHA_I,FECHA_F,FECHA_R FROM equipop WHERE ID_PROYECTO='$idP'";

		$resul2=$conexion->query($sql);
		$salida1="";

		while ($dato=$resul2->fetch_array()) {
			$salida1.='
				<tr>
					<td>'.$dato['NOMBRE_COMPLETO'].'</td>
					<td>'.$dato['TAREA'].'</td>
					<td>'.$dato['FECHA_I'].'</td>
					<td>'.$dato['FECHA_F'].'</td>
					<td>'.$dato['FECHA_R'].'</td>
					<td>
						<a class="btn btn-info edit" data-target="#editEquipo" data-toggle="modal" id="'.$dato['ID_EQUIPOP'].'"><i class="fa fa-pencil"></i> Editar</a>
            <a class="btn btn-danger delete" id="'.$dato['ID_EQUIPOP'].'" data-persona="'.$dato['ID_PERSONAL'].'" data-proyecto="'.$dato['ID_PROYECTO'].'"><i class="fa fa-trash-o"></i> Eliminar</a>                          
					</td>
				</tr>';	
		}
		return $salida1;
	}

	function obtenerDatos2($idE){
		require 'config/conexion.php';
		$sql="SELECT ID_PERSONAL,CONCAT(NOMBRE_PERSONAL,'',APELLIDO_PERSONAL) AS NOMBRE_COMPLETO FROM personal WHERE ID_EMPRESA='$idE' and ESTADO='0'";
	$res=$conexion->query($sql);
	$salida2='<option value disabled selected>Seleccione personal:</option>';
	while ($dato2=$res->fetch_array()) {
		$salida2.='
			<option value='.$dato2['ID_PERSONAL'].'>'.$dato2['NOMBRE_COMPLETO'].'</option>	
		
		 ';
	}
	return $salida2;
	}


	function  obtenerDatos3($pro){
		require 'config/conexion.php';
		$sql2="SELECT (SELECT NOMBRE_CATEGORIA FROM tipo_entregable WHERE tipo_entregable.ID_CATEGORIA=entregable.ID_CATEGORIA) as NOMBRE,(SELECT CONCAT(NOMBRE_PERSONAL,' ',APELLIDO_PERSONAL) FROM personal WHERE personal.ID_PERSONAL=entregable.ID_PERSONAL) as RESPONSABLE,NOMBRE_DOCUMENTO,VERSION_DOCUMENTO,COMENTARIO_DOCUMENTO,DATECREATED,URL_DOCUMENTO FROM entregable WHERE ID_PROYECTO='$pro' ";
		$resul4=$conexion->query($sql2);
		$salida3="";
		while ($data=$resul4->fetch_array()) {
			$salida3.='
				<tr>
					<td>'.$data['NOMBRE'].'</td>
					<td>'.$data['NOMBRE_DOCUMENTO'].'</td>
					<td>'.$data['VERSION_DOCUMENTO'].'</td>
					<td>'.$data['DATECREATED'].'</td>
					<td>'.$data['COMENTARIO_DOCUMENTO'].'</td>
					<td>'.$data['RESPONSABLE'].'</td>
					<td style="text-align: center;">
						<a href="'.$data['URL_DOCUMENTO'].'" class="btn btn-default" download><i class="fa fa-download" aria-hidden="true"></i></a>
					</td>
				</tr>';	 
		}
		return $salida3;
	}
	
	function obtenerDatos4($pro){
		require 'config/conexion.php';
		$sql1="SELECT ID_PERSONAL,ID_PROYECTO,(SELECT CONCAT(NOMBRE_PERSONAL,' ',APELLIDO_PERSONAL) FROM personal WHERE personal.ID_PERSONAL=equipop.ID_PERSONAL) AS NOMBRE_COMPLETO FROM equipop where ID_PROYECTO='$pro'";
$resul3=$conexion->query($sql1);
	$salida4='<option value disabled selected>Seleccione responsable:</option>';
	while ($dato3=$resul3->fetch_array()) {
		$salida4.='
			<option value='.$dato3['ID_PERSONAL'].'>'.$dato3['NOMBRE_COMPLETO'].'</option>	
		
		 ';
	}
	return $salida4;
	}
 ?>