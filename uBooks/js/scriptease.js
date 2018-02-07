$(document).ready(function(){
	var idCategoria;
	var nomCategoria;


	// Función encargada del autocompletado.
	$(document).on("keypress keyup","#buscalibros",function(){

		var valor= $("#buscalibros").val();
		$.post("listadouBooks.php",{q:valor},function(data){
			$("#listado").html(data);
		});
	});



	// Función para el filtrado por Categoria
	$(document).on("change","#idCategoria",function(){
		idCategoria = $("#idCategoria").val();
		$.ajax({
			url: "listadouBooks.php",
			data:{idCategoria:idCategoria},
			type: "get",
			success:filtratabla,
			cache: false
		});

		function filtratabla(data){			
			$("#listado").html(data);
		}
	});

	// Añadir nuevo libro
	$(document).on("click","#anadirLibro",function(){
		$.post("nuevo_registro_formulario.php",function(data){
			
			$("#listado").prepend(data);
			
			$("#idEdinueva option[value='" + $("#idEdi").val() + "']").attr("selected",true);
			
			$("#anadirLibro").hide();
			
		});

	});

	$(document).on("click","#cancNuevo",function(){

		$("#formNuevo").hide();
		$("#anadirLibro").show();

	});

	$(document).on("click","#acepNuevo",function(){
		
		$.post("nuevo_registro_insertar.php", {
					"nuevolibro":$("#nuevoLibro").val(),
					"nuevoano":$("#nuevoAno").val(),
					"nuevapagina":$("#nuevaPagina").val(),
					"nuevaencu":$("#nuevaEnc").val(),
					"nuevauni":$("#nuevaUni").val(),
					"idedinueva":$("#idEdinueva").val()
				},function(data){
					//Pinta de nuevo la tabla
					$("#listado").html(data);
					//Vuelve a mostrar el boton de nuevo
					$("#anadirLibro").show();		
				})//post
		
	});
});
	   
