<?php 
		session_start();
		require 'config/conexion.php';
		$idEmpresa = $_SESSION['usuario']['ID_EMPRESA'];

		$salida="";

		$query="SELECT * FROM personal";

		if(isset($_POST['data'])){
			$dato=$conexion->real_escape_string($_POST['data']);
			$query="SELECT ID_EMPRESA,ID_PERSONAL,NOMBRE_PERSONAL,APELLIDO_PERSONAL,DNI_PERSONAL,EDAD_PERSONAL,
				CORREO_PERSONAL,DIRECCION_PERSONAL,OCUPACION FROM personal WHERE NOMBRE_PERSONAL LIKE '%".$dato."%' AND ID_EMPRESA='$idEmpresa'";
			$resultado=$conexion->query($query);


			$salida.="<div class='table-responsive'>
						<table class='table table-striped projects' >
						<thead>
							<tr>
								<th>Codigo</th>
                				<th>Nombre</th>
				                <th>Apellido</th>
				                <th>DNI</th>
				                <th>Edad</th>
				                <th>Correo</th>
				                <th>Direccion</th>
				                <th>Ocupacion</th>
				                <th>Opciones</th>
				            </tr>
            			</thead>
								";
			while($row=$resultado->fetch_assoc()){
			$salida.="<tr>
						<td>".$row['ID_PERSONAL']."</td>
						<td>".$row['NOMBRE_PERSONAL']."</td>
						<td>".$row['APELLIDO_PERSONAL']."</td>
						<td>".$row['DNI_PERSONAL']."</td>
						<td>".$row['EDAD_PERSONAL']."</td>
						<td>".$row['CORREO_PERSONAL']."</td>
						<td>".$row['DIRECCION_PERSONAL']."</td>
						<td>".$row['OCUPACION']."</td>
						<td>
						<a href='#' class='btn btn-primary btn-xs herra' data-toggle='modal' data-target='#ModVerPersonal' data-id='".$row['ID_PERSONAL']."'><i class='fa fa-folder'></i> Ver </a>
						<a href='#'class='btn btn-info btn-xs herra' data-toggle='modal' data-target='#ModiPersonal' data-id='".$row['ID_PERSONAL']."' data-nombre='".$row['NOMBRE_PERSONAL']."' data-apellido='".$row['APELLIDO_PERSONAL']."' data-dni='".$row['DNI_PERSONAL']."' data-edad='".$row['EDAD_PERSONAL']."' data-correo='".$row['CORREO_PERSONAL']."' data-direccion='".$row['DIRECCION_PERSONAL']."' data-ocupacion='".$row['OCUPACION']."'><i class='fa fa-pencil'></i> Editar </a>
						<a href='#' class='btn btn-danger btn-xs herra' data-toggle='modal' data-target='#modalElim' data-id='".$row['ID_PERSONAL']."'><i class='fa fa-trash-o'></i> Eliminar </a>
						</td>
					</tr>";
			}
			$salida.="</tbody></table>";

			echo $salida;
		}

 ?>