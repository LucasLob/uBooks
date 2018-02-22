<?php
//Escapa el correo para evitar injecciones de código.

$email = $conexion->escape_string($_POST["correo"]);
$result = $conexion->query("SELECT * FROM usuarios WHERE correo='$email'");

if ( $result->num_rows == 0 ){ // Si la consulta devuelve 0 resultados el usuario no existe en la bd.
    $_SESSION['message'] = "El usuario introducido no existe en la base de datos.";
    header("location: error.php");
}
else { // Si el usuario existe se crea una sesión con su correo,nombre y apellidos.
    $user = $result->fetch_assoc();

    if(password_verify($_POST['contrasena'], $user['contrasenia']) ){
        
        $_SESSION['email'] = $user['correo'];
        $_SESSION['first_name'] = $user['nombre'];
        $_SESSION['last_name'] = $user['apellidos'];
        
        // Con esta variable se controla si el usuario está logueado o no.
        $_SESSION['logged_in'] = true;

        // Si la consulta de user[admin] devuelve un 1 entonces se inicia sesión como administrador y se le redirige a la página admin.
        if($user["admin"] == 1){
            $_SESSION["admin"] = 1;
        header("location: principaladmin.php");
        } else { // En caso contrario se crea una sesion como usuario normal y se le redirige a la página de usuarios.
            $_SESSION["admin"] = 0;
            header("location: principaluser.php");
        }
        
    } else { // En caso contrario se le redirige a una pagina de error, que a su vez nos dará la opcion de volver a la pagina de login.
        $_SESSION['message'] = "Información erronea, introdúzca sus datos otra vez.";
        header("location: error.php");
    }
}