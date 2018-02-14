<?php include "conexion.php";

$categorias = $_GET["idCategoria"];



if(empty($_POST["q"]) || ($categorias = "all")){

    $consulta = "SELECT l.idLibro,l.titulo,l.anoLanz,l.paginas,l.encuadernacion,l.unidades,l.editoras_idEditora,e.nomEditora
        FROM libros l, editoras e
        WHERE l.editoras_idEditora = e.idEditora";


} 

if ($_POST["q"]){

        $consulta = "SELECT l.idLibro,l.titulo,l.anoLanz,l.paginas,l.encuadernacion,l.unidades,l.editoras_idEditora,e.nomEditora
        FROM libros l, editoras e
        WHERE l.editoras_idEditora = e.idEditora AND l.titulo LIKE '%" . $_POST["q"] . "%'";
    

}

if (isset($categorias) && ($categorias != "all")) {

    $consulta = "SELECT h.libros_idLibro , h.categorias_idCategoria,l.idLibro, l.titulo, l.anoLanz,l.encuadernacion,l.paginas,l.unidades,l.editoras_idEditora,e.nomEditora
    FROM libros_has_categorias h,libros l,editoras e
    WHERE h.categorias_idCategoria = $categorias AND h.libros_idLibro = l.idLibro AND l.editoras_idEditora = e.idEditora";

}
?>

<?php $resultado = $conexion->query($consulta);
?>



<table id = "tablaLibros" class="table table-hover">
    <thead> 
        <tr class="table-primary">
            <th>Título </th>
            <th>Año</th>
            <th>Páginas</th>
            <th>Encuadernación</th>
            <th>Unidades</th>
            <th>Editora </th>
            <th>Acciones </th>
        </tr>
    </thead>


<?php while ($fila = $resultado->fetch_object()) {?>


    <tr id="idLibro_<?=$fila->idLibro?>" data-idLibro="<?=$fila->idLibro?>"class="table-light" >
        <td><?=$fila->titulo?></td>
        <td><?=$fila->anoLanz?></td>
        <td><?=$fila->paginas?></td>
        <td><?=$fila->encuadernacion?></td>
        <td><?=$fila->unidades?></td>
        <td><?=$fila->nomEditora?></td>
        <td><button class ="modificar btn btn-outline-primary btn-sm"><span class="badge badge-danger">Modificar</span></button>
            <button class ="borrar btn btn-outline-primary btn-sm"><span class="badge badge-primary">Borrar</span></button>
        </td>
    </tr>
   

<?php };?>
</table>