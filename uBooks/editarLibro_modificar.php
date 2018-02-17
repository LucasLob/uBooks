<form id="formulario">
Titulo:<input type="text" id="tituloEdit" value=""><br>
Año:<input type="text" id="anoEdit" value=""><br>
Páginas:<input type="text" id="paginasEdit" value=""><br>
Encuadernación:<input type="text" id="encuEdit" value=""><br>
Unidades:<input type="text" id="unidadesEdit" value=""><br>
Editora:<select id="idEditoraEdit">
<?php
$consulta6 = "SELECT idEditora,nomEditora
              FROM editoras
              ORDER BY nomEditora";
$resultado2 = $conexion->query($consulta6);
while ($fila2 = $resultado2->fetch_object()){?>
<option value="<?= $fila2->idEditora?>"><?= $fila2->nomEditora?></option>
<?php } ?>
</select>
<br>
</form>
