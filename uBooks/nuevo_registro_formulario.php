<?php include "conexion.php"?>
<div id ="formNuevo">
Introduce un nuevo registro:
<table align="center">
<br>
<td class = "id"> <input class="form-control form-control-sm" placeholder="Título" type="text" id ="nuevoLibro" value=""></td>
<td class = "id"> <input class="form-control form-control-sm" placeholder="Año" type="number" id ="nuevoAno" value=""></td>
<td class = "id"> <input class="form-control form-control-sm" placeholder="Páginas" type="number" id ="nuevaPagina" value="" min="1"></td>
<td class = "id"> <input class="form-control form-control-sm" placeholder="Encuadernación" type="text" id ="nuevaEnc" value=""></td>
<td class = "id"> <input class="form-control form-control-sm" placeholder="Unidades" type="number" id ="nuevaUni" value="" min="0"></td>
<td class = "id">
<h6>Editora:</h6>
<select placeholder="Editora" id="idEdinueva">
<?php
$consulta2 = "SELECT idEditora,nomEditora FROM editoras ORDER BY nomEditora";
$resultado2 = $conexion->query($consulta2);
while ($fila2 = $resultado2->fetch_object()){?>
<option value="<?php echo $fila2->idEditora?>"><?php echo $fila2->nomEditora?></option>
<?php }?>
</select>
</td>

<td>
<h6>Autor:</h6><select placeholder="Autor" id="idAutNuevo">
<?php
$consulta2 = "SELECT idAutor,nombreAutor FROM autores ORDER BY nombreAutor";
$resultado2 = $conexion->query($consulta2);
while ($fila2 = $resultado2->fetch_object()){?>
<option value="<?php echo $fila2->idAutor?>"><?php echo $fila2->nombreAutor?></option>
<?php }?>

</select>
</td>
<td class = "id"><button type ="submit"  id="acepNuevo" class="btn btn-success btn-sm" title="Agregar libro">Aceptar</button></td>
<td class = "id"><button type ="submit" id="cancNuevo" class="btn btn-primary btn-sm" title="Cancelar">Cancelar</button></td>
</table>
<br>
</div>