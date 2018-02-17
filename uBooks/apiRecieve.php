<?php

$dta = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=inauthor:asimov&key=AIzaSyAAaZQIvMOjCfSj_6x3y3tqOOreiTM58Y8");
$info = json_decode($dta);

/*echo "<pre>";
print_r($info);
echo "</pre>";*/

foreach ($info->items as $i => $valor){
    echo "Libro: {$valor->volumeInfo->title}</br>";
    echo "Año : {$valor->volumeInfo->publishedDate}</br>";
    echo "Páginas : {$valor->volumeInfo->pageCount}</br>";
    echo "Editorial : {$valor->volumeInfo->publisher}</br>";
    echo "<br>";
}  



?>