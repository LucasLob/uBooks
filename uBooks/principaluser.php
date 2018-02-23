<?php
session_start();

// Verifica si el usuario está logueado usando la variable de session logged_in.
if ($_SESSION['logged_in'] != 1) {
  $_SESSION['message'] = "Necesitas estar logueado para ver esta página";
  header("location: error.php");    
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Mi script -->
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/scriptease2.js"></script>
    <link rel="stylesheet" href="./css/misestilos.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/journal/bootstrap.min.css" rel="stylesheet" integrity="sha384-/qQob+A1P2FeRYphuSbqp7heEKdhjZxqgAz/yWLX9CQKU9FTB8wKTexI0IiFlIXC" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        

     

    
    <title>uBooks - Venta de libros y eBooks</title>
</head>
<nav class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top">
  <a class="navbar-brand" href="principaluser.php">uBooks</a>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <b><span class = "navbar-text" >Filtrar por categoria: </span></b>
      </li>
      <li class="nav-item">
        <a class="nav-link"><?php include "selector_generos.php" ?></a>
      </li>
      <a href="apiRecieve.php"><type="button" class="btn btn-warning" name="logout"/>Buscador API</button></a>
    </ul>
    <form class="form-inline my-1 my-sm-0">
        <label class="col-form-label">Búsqueda: </label>
        <input id = "buscalibros"  type="text" class="form-control" placeholder="Escribe el titulo..." >
    </form>
    <a href="logout.php"><type="button" class="btn btn-danger" name="logout"/>Log Out</button></a>
  </div>
</nav>
<body >

<div id = "listado">
<?php include "listadouBooks2.php"?>
</div>
</body>
</html>