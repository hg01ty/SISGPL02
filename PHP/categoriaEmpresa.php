<?php
require 'config/conexion.php';
$lista = $conexion->query("SELECT * FROM categoria_proyecto");
