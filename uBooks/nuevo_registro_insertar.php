<?php
include "conexion.php";

$consulta3 = "INSERT INTO libros (titulo,anoLanz,paginas,encuadernacion,unidades,editoras_idEditora)
            VALUES ('".$_POST["nuevolibro"]."'," . $_POST["nuevoano"] . "," . $_POST["nuevapagina"] . ",'" .
            $_POST["nuevaencu"] . "'," . $_POST["nuevauni"] . "," . $_POST["idedinueva"] . ")";

$conexion->query($consulta3);

include "listadouBooks.php";
?>
