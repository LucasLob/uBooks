$(document).ready(function(){

    $(document).on('click',"#botonApi",function(){
        var busq = document.getElementById("buscadorApi").value;
        document.getElementById("resultados").innerHTML = "";
        console.log("busq");

        $.ajax({
            url: "https://www.googleapis.com/books/v1/volumes?q=" + busq + "&key=AIzaSyAAaZQIvMOjCfSj_6x3y3tqOOreiTM58Y8",
            dataType: "json",
            success: function(data){
                for(i = 0; i < data.items.length; i++){
                resultados.innerHTML += "<h3>" + data.items[i].volumeInfo.title + "</h3><br>"
                resultados.innerHTML += "<img src = " + data.items[i].volumeInfo.imageLinks.thumbnail + "><br>"
                resultados.innerHTML += "<b>Autor</b>: " + data.items[i].volumeInfo.authors + "<br>";
                resultados.innerHTML += "<b>Editora</b>: " + data.items[i].volumeInfo.publisher + "<br>";
                resultados.innerHTML += "<b>Fecha de publicación</b>: " + data.items[i].volumeInfo.publishedDate+ "<br>";
                resultados.innerHTML += "<b>Descripción</b>: " + data.items[i].volumeInfo.description+ "<br><br>";            
                }
            },

            type:"GET"

        });
    });
});
