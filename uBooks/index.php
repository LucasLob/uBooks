<?php 
require 'conexion.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>uBooks</title>
  <?php include 'css/css.html'; ?>
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST["entrar"])) { //Si se recibe la variable post "entrar" se le envia a la pagina de login.

        require 'login.php';
        
    }
    
    elseif (isset($_POST["registro"])) { // Si se recibe la variable post "registro" se le envia a la página de registro.
        
        require 'registro.php';
        
    }
}
?>
<body>
  <div  id ="formPrinc" class="form">
      
      <ul class="tab-group">
        <li class="tab"><a href="#registro">Regístrate</a></li>
        <li class="tab active"><a href="#login">Entrar</a></li>
      </ul>
      
      <div class="tab-content">

         <div id="login">   
          <h1>Bienvenido</h1>
          
          <form action="index.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              Correo electrónico<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="correo"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Contraseña<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="contrasena"/>
          </div>

          
          <button class="button button-block" name="entrar" />Entrar</button>
          
          </form>

        </div>
          
        <div id="registro">   
          <h1>Regístro</h1>
          
          <form action="index.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Nombre<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='nombre' />
            </div>
        
            <div class="field-wrap">
              <label>
                Apellidos<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='apellidos' />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Correo<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='correo' />
          </div>
          
          <div class="field-wrap">
            <label>
              Contraseña<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='contrasena'/>
          </div>
          
          <button type="submit" class="button button-block" name="registro" />Regístrame</button>
          
          </form>

        </div>  
        
      </div>
      
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
