<?php

//Inicia las variables de sesión para usarse en la página principal de user o de admin

// Se escapan las variables POST para evitar injecciones SQL
$nombre = $conexion->escape_string($_POST['nombre']);
$apellidos = $conexion->escape_string($_POST['apellidos']);
$correo = $conexion->escape_string($_POST['correo']);
$contrasena = $conexion->escape_string(password_hash($_POST['contrasena'], PASSWORD_BCRYPT));
$hash = $conexion->escape_string( md5( rand(0,1000) ) );
      
// Verifica si el usuario con un correo determinado ya existe.
$result = $conexion->query("SELECT * FROM usuarios WHERE correo='$correo'") or die($conexion->error());

if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'El correo electrónico ya se encuentra registrado en la base de datos.';
    header("location: error.php");
    
}
else {
    $sql = "INSERT INTO usuarios (nombre, apellidos, correo, contrasenia, hash) " 
            . "VALUES ('$nombre','$apellidos','$correo','$contrasena', '$hash')";

    // Añadir usuario a la base de datos
    if ( $conexion->query($sql) ){
        $_SESSION['message'] = "Registro efectuado con éxito.";

        header("location: index.php"); 

    }

    else {
        $_SESSION['message'] = 'Fallo en el proceso de registro.';
        header("location: error.php");
    }

}