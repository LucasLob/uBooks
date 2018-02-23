<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'uBooks';

$conexion = new mysqli($host,$user,$pass);

if ($conexion->connect_errno > 0) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $conexion->connect_error);
} else {
        $conexion->select_db($db);
        $conexion->set_charset("utf8");
}
?>
