<?php
session_start();
//si la sesion no es valida, vuelve al login
if($_SESSION['id_sesion'] != session_id()){
	//se cierra la sesion 
	session_unset();
	header("Location: Login.php"); 
}
?>

<!DOCTYPE html>
<html>  
<head>  
<link rel="stylesheet" type="text/css" href="estilos.css">
<TITLE>Gestor Incidencias</TITLE>  
</head>  

<?php

$mysqli = new mysqli("127.0.0.1", "root", "", "bbdd",3306);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
<body>
<div id="visor_central">
  
  <form action="alta_integrante.php" method="post" target="resultados_iframe">
          <p>Integrante:</p> <input name="integrante" type="text"  value=""  size="30" required/>
          <p></p>
		 <p>Clave Provisional:</p> <input name="clave" type="password" value="" size="12" required />
         <p></p>
         <p>Provincia:</p> <input name="provincia" type="text" size="10" value="<?php echo $_SESSION['provincia']?>" readonly border="1" />
         <p></p>
	     <p>Nivel:   <select name="tipo" required>
   			<option value="1">Especialista</option> 
			<option value="0">Jefe</option>   
	    </select></p>
        <p class="bot_login"><button type="submit"><img class="efecto_bot" src="recursos/button_alta.png">
			</button></p>
</form>

<?php 
// Cierra la conexion con la bbdd
	mysqli_close($mysqli);
 ?>
 
</div>

</body>  

</html> 