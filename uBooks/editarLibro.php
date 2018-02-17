<?php
    include "conexion.php";


    $consulta5 = "UPDATE libros SET
    titulo = '" . $_POST["tituloEdit"] ."',
    anoLanz = '" . $_POST["anoEdit"] . "',
    paginas = '" . $_POST["paginasEdit"] . "',
    encuadernacion = '" . $_POST["encuEdit"] . "',
    unidades = '" . $_POST["unidadesEdit"] . "',
    editoras_idEditora = '" . $_POST["idEditoraEdit"] . "'
    WHERE idLibro = " . $_POST["idlibroEdit"];

    
$conexion->query($consulta5);

?>

        <td class = "titulo"><?=$_POST["tituloEdit"]?></td>
        <td class = "ano"><?=$_POST["anoEdit"]?></td>
        <td class = "paginas"><?=$_POST["paginasEdit"]?></td>
        <td class = "encuadernacion"><?=$_POST["encuEdit"]?></td>
        <td class = "unidades"><?=$_POST["unidadesEdit"]?></td>
        <td class = "ideditora" data-ideditora="<?=$_POST["idEditoraEdit"]?>"><?=$_POST["textoEdi"]?></td>
        <td><button class ="modificar btn btn-outline-primary btn-sm"><span class="badge badge-danger">Modificar</span></button>
            <button class ="borrar btn btn-outline-primary btn-sm"><span class="badge badge-primary">Borrar</span></button>
        </td>
