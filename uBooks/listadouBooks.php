<?php include "conexion.php";

// Definimos el número de registros por página
define("NREG",5);

// Variables para autocompletado,categorias y order by
$categorias = $_GET["idCategoria"];
$asc = $_GET["title"];
$autoC = $_GET["q"];





// Consulta para el listado inicial.
if(empty($autoC) || ($categorias = "all")){

    $consulta = "SELECT l.idLibro,l.titulo,l.anoLanz,l.paginas,l.encuadernacion,l.unidades,l.editoras_idEditora,e.nomEditora
        FROM libros l, editoras e
        WHERE l.editoras_idEditora = e.idEditora";

}

//Consulta para el autocompletado

if (isset($autoC)){

        $consulta = "SELECT l.idLibro,l.titulo,l.anoLanz,l.paginas,l.encuadernacion,l.unidades,l.editoras_idEditora,e.nomEditora
        FROM libros l, editoras e
        WHERE l.editoras_idEditora = e.idEditora AND l.titulo LIKE '%" . $autoC . "%'";
    

}

// Consulta para el filtrado por categorias.
if (isset($categorias) && ($categorias != "all")) {

    $consulta = "SELECT h.libros_idLibro , h.categorias_idCategoria,l.idLibro, l.titulo, l.anoLanz,l.encuadernacion,l.paginas,l.unidades,l.editoras_idEditora,e.nomEditora
    FROM libros_has_categorias h,libros l,editoras e
    WHERE h.categorias_idCategoria = $categorias AND h.libros_idLibro = l.idLibro AND l.editoras_idEditora = e.idEditora";

}

if (isset($_GET["title"]) && !isset($_GET["idCategoria"]))  {

    $consulta .= " ORDER BY l.titulo ASC";


}

?>

<?php $resultado = $conexion->query($consulta);
?>



<table id = "tablaLibros" class="table table-hover">
    <thead> 
        <tr class="table-primary">
            <th class ="orden">Título </th>
            <th>Año</th>
            <th>Páginas</th>
            <th>Encuadernación</th>
            <th>Unidades</th>
            <th class ="orden">Editora </th>
            <th>Acciones </th>
        </tr>
    </thead>


<?php if ($resultado->num_rows) { 
    while ($fila = $resultado->fetch_object()) {?>


    <tr id="idLibro_<?=$fila->idLibro?>" data-idLibro="<?=$fila->idLibro?>"class="table-light" >
        <td class = "titulo"><?=$fila->titulo?></td>
        <td class = "ano"><?=$fila->anoLanz?></td>
        <td class = "paginas"><?=$fila->paginas?></td>
        <td class = "encuadernacion"><?=$fila->encuadernacion?></td>
        <td class = "unidades"><?=$fila->unidades?></td>
        <td class = "ideditora" data-ideditora="<?=$fila->editoras_idEditora?>"><?=$fila->nomEditora?></td>
        <td><button class ="modificar btn btn-outline-primary btn-sm"><span class="badge badge-danger">Modificar</span></button>
            <button class ="borrar btn btn-outline-primary btn-sm"><span class="badge badge-primary">Borrar</span></button>
        </td>
    </tr>
   

<?php }};?>
</table>

