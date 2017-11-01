<?php

$idEmpresa = $_SESSION['usuario']['ID_EMPRESA'];
require 'config/conexion.php';
$sql       = "SELECT ID_PROYECTO,CODIGO_PROYECTO,NOMBRE_PROYECTO,(SELECT DESCRIPCION FROM estado_proyecto WHERE estado_proyecto.ID_ESTADO=proyecto.ID_ESTADO) AS ESTADO,(SELECT DESCRIPCION FROM categoria_proyecto WHERE categoria_proyecto.ID_CATEGORIA_P=proyecto.ID_CATEGORIA_P) AS CATEGORIA,DESCRIPCION_PROYECTO,DATESTART,DATEEND,DATEENDFAKE,MONTO FROM proyecto WHERE ID_EMPRESA='$idEmpresa'";
$proyectos = $conexion->query($sql);
