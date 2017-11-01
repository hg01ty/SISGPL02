<?php
require 'config/conexion.php';
$tipos = $conexion->query('SELECT * FROM tipo_empresa');
