<?php
/* Se destruyen todas las variables de sesion*/
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Logout</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <div class="form">
          <h1>Gracias por visitarnos</h1>
              
          <p><?= 'Has sido desconectado.'; ?></p>
          
          <a href="index.php"><button class="button button-block"/>Inicio</button></a>

    </div>
</body>
</html>