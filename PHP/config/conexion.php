<?php

$host    = "mysql.hostinger.es";
$usuario = "u834670470_fisi";
$pass    = "unmsmarqui";
$bd      = "u834670470_sgpl";

$conexion = new mysqli($host, $usuario, $pass, $bd);
if ($conexion->connect_errno):
 echo "Error al conectarse debiado ah" . $conexion->connect_errno;

endif;
