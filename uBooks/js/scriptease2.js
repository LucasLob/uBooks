$(document).ready(function(){
	carga();
	var idCategoria;
	var nomCategoria;
	var idLibro;
	var pagina = 1;
	var vez = 1;


	// Función encargada del autocompletado.
	$(document).on("keypress keyup","#buscalibros",function(){

		var valor= $("#buscalibros").val();
		$.get("listadouBooks2.php",{q:valor},function(data,status){
			$("#listado").html(data);
		});
	});



	// Función para el filtrado por Categoria
	$(document).on("change","#idCategoria",function(){
		idCategoria = $("#idCategoria").val();
		$.ajax({
			url: "listadouBooks2.php",
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
					"idedinueva":$("#idEdinueva").val(),
					"idautnuevo":$("#idAutNuevo").val()
				},function(data){
					console.log(data);
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

	// Dialogo de modificar
	$( "#editDialog" ).dialog({
		autoOpen: false,
		resizable: false,
		modal: true,
		buttons: {
		"Guardar": function() {			
			$.post("editarLibro.php", {
				idlibroEdit : idlibro,
				tituloEdit : $("#tituloEdit").val() ,
				anoEdit: $("#anoEdit").val() ,
				paginasEdit: $("#paginasEdit").val() ,
				encuEdit: $("#encuEdit").val() ,
				unidadesEdit : $("#unidadesEdit").val(),
				idEditoraEdit : $("#idEditoraEdit").val(),
				textoEdi: $("#idEditoraEdit :selected").text()

			},function(data,status){
				$("#idLibro_" + idlibro).fadeOut(200);
				$("#idLibro_" + idlibro).fadeIn(200);
				$("#idLibro_" + idlibro).html(data);
				
			})		
					
			$(this).dialog( "close" );												
					},
		"Cancelar": function() {
				$(this).dialog( "close" );
		}
		}//buttons
	});	

	// Botón de modificado de un libro, rellenando los campos.
	$(document).on("click",".modificar",function(){

		//Coge el idlibro del parent del elemento que se ha hecho click cuyo nombre sea "tr".
		idlibro = $(this).parents("tr").data("idlibro");

		// Se recoge el valor del titulo del elemento que se ha hecho click.
		$("#tituloEdit").val($(this).parent().siblings("td.titulo").html());

		var a = $.trim($(this).parent().siblings("td.ano").text());
		$("#anoEdit").val(a);

		$("#paginasEdit").val($(this).parent().siblings("td.paginas").html());

		$("#encuEdit").val($(this).parent().siblings("td.encuadernacion").html());

		$("#unidadesEdit").val($(this).parent().siblings("td.unidades").html());

		var idEditora = $(this).parent().siblings("td.ideditora").data("ideditora");
		$("#idEditoraEdit option[value='" + idEditora + "']").attr("selected",true);

		$("#editDialog").dialog("open");

	});

	$(document).on("click",".orden",function(){

		var valor= "titulo";
		$.get("listadouBooks2.php",{title:valor},function(data){
			if(vez == 1){
			$("#listado").html(data);
			}
			vez++;
		});



	});

	function carga(){
		$.ajax({
			method: "post",
			url: "listadouBooks2.php",
			dataType: "html",
			data: {"pag": pagina}
		})
			.done(function(html){

				if (html["filas"] > 0) {
					$("#listado").append(html);
					pagina++;
				}

			});

	}



	$(document).on("click","#paginacion",function(){

		carga();
		console.log(pagina);
		return(false);

	});

});
	   
