<?php include_once "conexion.php"?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Mi script -->
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/scriptease.js"></script>
    <link rel="stylesheet" href="./css/misestilos.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/journal/bootstrap.min.css" rel="stylesheet" integrity="sha384-/qQob+A1P2FeRYphuSbqp7heEKdhjZxqgAz/yWLX9CQKU9FTB8wKTexI0IiFlIXC" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        

     

    
    <title>uBooks - Venta de libros y eBooks</title>
</head>
<nav class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top">
  <a class="navbar-brand" href="index.php">uBooks</a>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <b><span class = "navbar-text" >Filtrar por categoria: </span></b>
      </li>
      <li class="nav-item">
        <a class="nav-link"><?php include "selector_generos.php" ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link">       </a>
      </li>
      <li class="nav-item active">
      <b><span class = "navbar-text" >Añadir libro:   </b><button id = "anadirLibro" type="button" class="btn btn btn-success">+</button></span >
      </li>
    </ul>
    <form class="form-inline my-2 my-sm-0">

        <label class="col-form-label" for="inputDefault">Búsqueda: </label>
        <input id = "buscalibros"  type="text" class="form-control" placeholder="Escribe el titulo..." >
    </form>
  </div>
</nav>
<body >

<div id = "listado">
<?php include "listadouBooks.php"?>
</div>

</body>
</html>