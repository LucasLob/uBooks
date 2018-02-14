$(document).ready(function(){
	var idCategoria;
	var nomCategoria;
	var idLibro;


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

	// Botón de cancelar nuevo registro
	$(document).on("click","#cancNuevo",function(){

		$("#formNuevo").hide();
		$("#anadirLibro").show();

	});

	// Botón aceptar nuevo registro y hace la introducción de los datos en la tabla libros
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



	// Borrado del registro en el listado html
	$(document).on("click",".borrar",function(){

		idLibro = $(this).parents("tr").data("idlibro");
		$("#borrarDialog").dialog("open");

	});


	//Dialogo para el borrado
	$("#borrarDialog").dialog({
		autoOpen:false,
		resizable:false,
		height:"auto",
		width:400,
		modal:true,

		buttons: {
			"Borrar": function() {
				$.get("borrarLibro.php", {"idlibro":idLibro},function(data,status){				
					$("#idLibro_" + idLibro).fadeOut(500);
				})
				$(this).dialog( "close" );
			},
			"Cancelar": function() {
			  $(this).dialog( "close" );
			}
		  }
	});	

	$( "#editDialog" ).dialog({
		autoOpen: false,
		resizable: false,
		modal: true,
		buttons: {
		"Guardar": function() {			
			$.post("inmueble_modificar.php", {
				idinmueblemodificar : idinmueble,
				direccionmodificar : $("#direccionmodificar").val() ,
				idtipomodificar: $("#idtipomodificar").val() ,
				idtipo: $("#idtipo").val() ,
				visitamodificar : $("#visitamodificar").val()
			},function(data,status){				
				$("#contenedor").html(data);
			})//get			
					
			$(this).dialog( "close" );												
					},
		"Cancelar": function() {
				$(this).dialog( "close" );
		}
		}//buttons
	});	

	// Modificado de un libro, rellenando los campos
	$(document).on("click",".modificar",function(){

		idlibro = $(this).parents("tr").data("idlibro");



	});

});
	   
