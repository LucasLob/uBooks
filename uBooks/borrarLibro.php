<?php
include "conexion.php";


$consulta4 ="DELETE FROM libros_has_categorias WHERE libros_idLibro = ". $_GET["idlibro"];
			

$conexion->query($consulta4);

$consulta4 ="DELETE FROM libros WHERE idLibro = ". $_GET["idlibro"];
		

$conexion->query($consulta4);
?>