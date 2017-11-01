	<!--<script  src="../../assets/js/Cpersonal.js"></script>-->
	<?php	
		require 'config/conexion.php';
	 $action = (isset($_REQUEST['action']) && $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	  if($action=="datos"){ 
	  session_start();
	?>
		<div class="table-responsive">
			<table class="table table-striped projects" id="tablePersonal">
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
            <tbody>
			<?php 
				$idEmpresa = $_SESSION['usuario']['ID_EMPRESA'];
				$sql="SELECT * FROM personal WHERE ID_EMPRESA='$idEmpresa'";
				$resultado=$conexion->query($sql);
				while($row=$resultado->fetch_assoc()){
			 ?>
				<tr>
					<td><?php echo $row['ID_PERSONAL'] ?></td>
					<td><?php echo $row['NOMBRE_PERSONAL'] ?></td>
					<td><?php echo $row['APELLIDO_PERSONAL'] ?></td>
					<td><?php echo $row['DNI_PERSONAL'] ?></td>
					<td><?php echo $row['EDAD_PERSONAL'] ?></td>
					<td><?php echo $row['CORREO_PERSONAL'] ?></td>
					<td><?php echo $row['DIRECCION_PERSONAL'] ?></td>
					<td><?php echo $row['OCUPACION'] ?></td>
					<td>
					<a href="#" class="btn btn-primary btn-xs herra" data-toggle="modal" data-target="#ModVerPersonal" data-id="<?php echo $row['ID_PERSONAL'];?>" data-nombre="<?php echo $row['NOMBRE_PERSONAL']?>" data-apellido="<?php echo $row['APELLIDO_PERSONAL'];?>"  data-dni="<?php echo $row['DNI_PERSONAL'];?>" data-edad="<?php echo $row['EDAD_PERSONAL'];?>" data-correo="<?php echo $row['CORREO_PERSONAL'];?>" data-direccion="<?php echo $row['DIRECCION_PERSONAL'];?>" data-telefono="<?php echo $row['TELEFONO_PERSONAL'];?>" data-ocupacion="<?php echo $row['OCUPACION'];?>"><i class="fa fa-folder"></i> Ver </a>

                    <a href="#" class="btn btn-info btn-xs herra" data-toggle="modal" data-target="#ModiPersonal" data-id="<?php echo $row['ID_PERSONAL'];?>" data-nombre="<?php echo $row['NOMBRE_PERSONAL']?>" data-apellido="<?php echo $row['APELLIDO_PERSONAL'];?>"  data-dni="<?php echo $row['DNI_PERSONAL'];?>" data-edad="<?php echo $row['EDAD_PERSONAL'];?>" data-correo="<?php echo $row['CORREO_PERSONAL'];?>" data-direccion="<?php echo $row['DIRECCION_PERSONAL'];?>" data-telefono="<?php echo $row['TELEFONO_PERSONAL'];?>" data-ocupacion="<?php echo $row['OCUPACION'];?>" data-usuario="<?php echo $row['USUARIO'];?>" data-password="<?php echo $row['PASSWORD'];?>"><i class="fa fa-pencil"></i> Editar </a>

                    <a href="#" class="btn btn-danger btn-xs herra" data-toggle="modal" data-target="#modalElim" data-id="<?php echo $row['ID_PERSONAL']; ?>"><i class="fa fa-trash-o"></i> Eliminar </a>
				 	</td>
				</tr>
			<?php } ?>
			</tbody>	
			</table>

		</div>
		<?php }?>
