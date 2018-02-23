<?php
session_start();
// Verifica si el usuario está logueado usando la variable de session logged_in.
if ($_SESSION['logged_in'] != 1) {
  $_SESSION['message'] = "Necesitas estar logueado para ver esta página";
  header("location: error.php");    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>uBooks- Buscador de libros</title>
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="js/apiscript.js"></script>
    <link rel="stylesheet" href="./css/misestilos.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/journal/bootstrap.min.css" rel="stylesheet" integrity="sha384-/qQob+A1P2FeRYphuSbqp7heEKdhjZxqgAz/yWLX9CQKU9FTB8wKTexI0IiFlIXC" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<style>
#resultados {
  width: 60%;
  margin: 0 auto;
  text-align:justify;
}
</style>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">uBooks</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="principaluser.php">Home <span class="sr-only">(current)</span></a>
      </li>

    </ul>
      <input id ="buscadorApi" placeholder = "Titulo o Autor"></input>
      <button class="btn btn-secondary my-2 my-sm-0" type="button" id ="botonApi">Buscar</button>
  </div>
</nav>

<body>

<div id = "resultados">
<h2> Busqueda en la parte superior derecha para buscar libro o título usando la API.</h2>
</div>


<?php
/*
$dta = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=inauthor:asimov&key=AIzaSyAAaZQIvMOjCfSj_6x3y3tqOOreiTM58Y8");
$info = json_decode($dta);

echo "<pre>";
print_r($info);
echo "</pre>";

foreach ($info->items as $i => $valor){
    echo "Libro: {$valor->volumeInfo->title}</br>";
    echo "Año : {$valor->volumeInfo->publishedDate}</br>";
    echo "Páginas : {$valor->volumeInfo->pageCount}</br>";
    echo "Editorial : {$valor->volumeInfo->publisher}</br>";
    echo "<br>";
}*/



?>



    
</body>
</html>


