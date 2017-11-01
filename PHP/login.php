<?php
$chooseUser=$_POST['authadmin'];
if ($chooseUser=='admin') {
  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
 require 'config/conexion.php';
 session_start();
 $conexion->set_charset('utf8');
 $usuario = $conexion->real_escape_string($_POST['usuario']);
 $pass    = $conexion->real_escape_string($_POST['password']);

  $nueva_consulta="SELECT ID_EMPRESA,USUARIO,PASSWORD,TIPO_USUARIO from empresa where USUARIO='$usuario'";
  $resultado=$conexion->query($nueva_consulta);
  if ($resultado->num_rows == 1) {
    $datos = $resultado->fetch_assoc();
    if (password_verify($pass, $datos['PASSWORD'])) {
      $_SESSION['usuario'] = $datos;
      echo json_encode(array(
     'error'        => false,
     'tipo_usuario' => $datos['TIPO_USUARIO'],
      ));
    } else {
      echo json_encode(array('error' => true));
    }
  } else {
    echo json_encode(array('error' => true));
  }
  
 
}
}else{
  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
  require 'config/conexion.php';
  session_start();
  $conexion->set_charset('utf8');
  $usuario = $conexion->real_escape_string($_POST['usuario']);
  $pass    = $conexion->real_escape_string($_POST['password']);

  $nueva_consulta="SELECT ID_PERSONAL,NOMBRE_PERSONAL,ID_EMPRESA,USUARIO,PASSWORD,(SELECT DESCRIPCION FROM tipo_personal WHERE tipo_personal.ID_TIPO='1') AS TIPO_USUARIO
  from personal
  where DNI_PERSONAL='$usuario'";
  $resultado=$conexion->query($nueva_consulta);
  if ($resultado->num_rows == 1) {

   $datos = $resultado->fetch_assoc();
   $busqueda=$datos['ID_PERSONAL'];
   $sql="SELECT ID_PROYECTO from equipo_proyecto where ID_PERSONAL='$busqueda'";
   $resu=$conexion->query($sql);
   $dat1=$resu->fetch_assoc();
   $combina=array_merge($datos,$dat1);
   if ($pass==$datos['PASSWORD']) {
    $_SESSION['usuario'] = $combina;
    echo json_encode(array(
     'error'        => false,
     'tipo_usuario' => $datos['TIPO_USUARIO'],
    ));
   } else {
    echo json_encode(array('error' => true));
   }
  } else {
   echo json_encode(array('error' => true));
  }

}
}
$conexion->close();
