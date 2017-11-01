<?php 
session_start();
require 'config/conexion.php';
$idEmpresa = $_SESSION['usuario']['ID_EMPRESA'];
$salida = '';
if(isset($_POST["query"]))
{
 $search = $conexion->real_escape_string($_POST["query"]);
 $query = "
  SELECT ID_PROYECTO,CODIGO_PROYECTO,NOMBRE_PROYECTO,(SELECT DESCRIPCION FROM estado_proyecto WHERE estado_proyecto.ID_ESTADO=proyecto.ID_ESTADO) AS ESTADO,(SELECT DESCRIPCION FROM categoria_proyecto WHERE categoria_proyecto.ID_CATEGORIA_P=proyecto.ID_CATEGORIA_P) AS CATEGORIA,DESCRIPCION_PROYECTO,DATESTART,DATEEND,DATEENDFAKE,MONTO FROM proyecto WHERE ID_EMPRESA='$idEmpresa' and (CODIGO_PROYECTO LIKE '%".$search."%' OR NOMBRE_PROYECTO LIKE '%".$search."%')";
}
else
{
 $query = "SELECT ID_PROYECTO,CODIGO_PROYECTO,NOMBRE_PROYECTO,(SELECT DESCRIPCION FROM estado_proyecto WHERE estado_proyecto.ID_ESTADO=proyecto.ID_ESTADO) AS ESTADO,(SELECT DESCRIPCION FROM categoria_proyecto WHERE categoria_proyecto.ID_CATEGORIA_P=proyecto.ID_CATEGORIA_P) AS CATEGORIA,DESCRIPCION_PROYECTO,DATESTART,DATEEND,DATEENDFAKE,MONTO FROM proyecto WHERE ID_EMPRESA='$idEmpresa'";
}
$result = $conexion->query($query);
if($result->num_rows > 0)
{
 while ($dat=$result->fetch_array()) {
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
echo $salida;
}
else
{
echo "No encontrado";
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


 ?>