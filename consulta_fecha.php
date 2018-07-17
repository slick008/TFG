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
//consulta en la bbdd los tipos existentes
$resultado = $mysqli->query("SELECT tipo FROM tipos");

if (!$mysqli) {
    die('Consulta no válida: ' . mysql_error());
}
?>	
<body>
<div id="visor_central">

<form action="resultados.php" method="post" target="resultados_iframe">
  <!-- Campo de entrada de fecha -->
  <p></p>
   <p class="texto_origen_result">Fecha a consultar:</p> 
  <p></p>
  <p></p>
  <p></p>
  <p></p>
<h2>De </h2><input class="campo_fechas" type="date" name="fecha_min" min="2016-01-01"
                                  max="2030-12-31" step="1" required>
                                  <p></p>
								   <h2>Al </h2> 
  <input class="campo_fechas" type="date" name="fecha_max" min="2016-01-01"
                                  max="2030-12-31" step="1" 
                                  value="<?php echo date("Y-m-d");?>" required>
<p class="bot_login"><button type="submit"><img class="efecto_bot" src="recursos/button_consultar.png">
			</button></p>
</form>

<?php 
// Cierra la conexion con la bbdd
	mysqli_close($mysqli);
 ?>
 
</div>

</body>  

</html> 