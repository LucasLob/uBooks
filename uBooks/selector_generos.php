<?php include "conexion.php"; ?>

<form method="GET">
<?php

	$sql = "SELECT idCategoria,nomCategoria FROM categorias ORDER BY nomCategoria;";
	$res = $conexion->query($sql) or die ("ERR: $conexion->error.");


	echo "<select id=\"idCategoria\" name=\"idCategoria\" required class=\"form-control mr-sm-2\">";
	echo "<option value =\"all\">Todos</option>";
	

	while($obj = $res->fetch_object()):

	echo "<option value =\"$obj->idCategoria\">$obj->nomCategoria</option>";

	endwhile;

	echo "</select>";
?>
</form>