<?php
require 'config/conexion.php';
if (!empty($_POST)) {
	$nombreE  = $conexion->real_escape_string($_POST['nombreEmpresa']);
	$tipoE    = $conexion->real_escape_string($_POST['tipo']);
	$rucE     = $conexion->real_escape_string(trim($_POST['numberRuc']));
	$correoE  = $conexion->real_escape_string($_POST['correoEmpresa']);
	$addressE = $conexion->real_escape_string($_POST['addressEmpresa']);
	$userE    = $conexion->real_escape_string(trim($_POST['usuarioEmpresa']));
	$passE    = $conexion->real_escape_string($_POST['contraEmpresa']);
	$passHash = password_hash($passE, PASSWORD_DEFAULT);

$validar  = "SELECT RUC_EMPRESA, USUARIO FROM empresa WHERE RUC_EMPRESA='$rucE' OR USUARIO='$userE'";
$consulta = $conexion->query($validar);
if ($consulta->num_rows == 1) {
 $datos = $consulta->fetch_assoc();
 if ($rucE == $datos['RUC_EMPRESA'] && $userE == $datos['USUARIO']) {
  echo 2;
  // echo "Existe empresa registrado";
 } else if ($rucE == $datos['RUC_EMPRESA']) {
  echo 1;
  // echo "Existe  RUC rgistrado ";
 } else {
  echo 0;
  // echo "Existe nombre de usuario";
 }
} else {
 $insertar = "INSERT INTO empresa(ID_TIPO_EMPRESA,NOMBRE_EMPRESA,CORREO_EMPRESA,DIRECCION_EMPRESA,RUC_EMPRESA,USUARIO,PASSWORD,TIPO_USUARIO)
	VALUES('$tipoE','$nombreE','$correoE','$addressE','$rucE','$userE','$passHash','ADMIN')";

 $result = $conexion->query($insertar);

}
}
