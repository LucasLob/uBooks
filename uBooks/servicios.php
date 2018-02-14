<?php

    //$_GET["api_key"] = "da39a3ee5e6b4b0d3255bfef95601890afd80709";


    $cop = $_GET["editoriales"];

	$lnk = @new mysqli("localhost","root","Th3bl4cKD34tH") ;

	if ($lnk->connect_errno>0) {
		echo "ERROR ($lnk->connect_errno): $lnk->connect_error<br/>" ;
		exit() ;
    }
    

	// Configurar la conexión para que acepte codificación UTF8
	$lnk->set_charset("utf8") ;

	// Accedemos a la base de datos
	$lnk->select_db("uBooks") ;

	// Respuesta
    $ans = [] ;
    

    // ##############################################################
	function editoriales() {

		global $lnk ;
		global $ans ;
		$asg = [] ;

		$sql = "SELECT idEditora,nomEditora FROM editoras" ;
	
		$res = $lnk->query($sql) ;

		if (!$res->num_rows) {
			$ans["status_message"] = "No se han encontrado editoras en la base de datos." ;
			$ans["success"] = false ;
		} else {

			while ($obj = $res->fetch_object()) { 
				array_push($asg,["id"=>$obj->idEditora,"nombre"=>$obj->nomEditora]);
			}

			// Construir la salida
			$ans["status_message"] = "" ;
			$ans["success"] = true ;
			$ans["data"] = $asg ;
		}
	}



    // ##############################################################
    

    // Buscamos en la URL la API_KEY del usuario.
    // $api = $_GET["api_key"]??"" ;
        $api = "01467cc09cf5742808253c123f3e953e79c1704c";
    
   /* $sql = "SELECT * FROM usuarios" ;
    $res = $lnk->query($sql) ;
    $obj = $res;
    $hola = SHA1($obj->nombre,$obj->apellidos);
    print_r($hola);
    */

	if (empty($api)) { 	
		$ans["status_message"] = "API KEY INVÁLIDA." ;
		$ans["success"] = false ;
		
	} else {

		// LUCAS: 01467cc09cf5742808253c123f3e953e79c1704c
        $sql = "SELECT * FROM usuarios WHERE SHA1(CONCAT (nombre,apellidos)) = '$api' ; " ;
		$res = $lnk->query($sql) ;

		if (!$res->num_rows) { 			
			$ans["status_message"] = "No hay usuarios en la base de datos." ;
			$ans["success"] = false ;
		} else {
			
            editoriales();
		}
	}

	// Respondemos a la petición
	header("Content-Type: application/json;charset=utf-8") ;
	echo json_encode($ans) ;
