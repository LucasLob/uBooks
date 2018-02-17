<?php
include "conexion.php";

$consulta3 = "INSERT INTO libros(titulo,anoLanz,paginas,encuadernacion,unidades,editoras_idEditora,autores_idAutor)
            VALUES ('".$_POST["nuevolibro"]."'," . $_POST["nuevoano"] . "," . $_POST["nuevapagina"] . ",'" .
            $_POST["nuevaencu"] . "'," . $_POST["nuevauni"] . "," . $_POST["idedinueva"] . "," . $_POST["idautnuevo"] .")";

$conexion->query($consulta3);

include "listadouBooks.php";
?>
