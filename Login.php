<?php
//primero cierra cualquier sesion existente
session_unset();
//crear la sesión al iniciar la página
session_start();
//almacenar las variables de sesión del usuario
$_SESSION["id_sesion"] = session_id();
?>
<!DOCTYPE html>
<html>  
<head>  
<link rel="stylesheet" type="text/css" href="estilos.css"> 
<TITLE>Gestor Incidencias</TITLE>  
</head>  

<body>  
<div id="caja_global">
<h1><p class="titulo"><img src="recursos/titulo.png"></p></h1>
<h3><p class="titulo"><img src="recursos/logo.png"></p></h3>
<div id="visor_central">
 <form class="interior_caja_log" action="Loguearse.php" method="post">
          <p class="titu_login">Usuario:</p> <input name="usuario" type="text"  size="30" required/>
          <p></p>          <p></p>
		 <p class="titu_login">Contraseña:</p> <input name="pass" type="password"  size="12" required />
         <p></p>
        <p class="bot_login"><button type="submit"><img class="efecto_bot" src="recursos/login.png">
			</button></p>
</form>
</div>
</div>
</body>  

</html> 


