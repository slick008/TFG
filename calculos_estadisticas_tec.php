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

<body>  
<div id="visor_central_resultados">
<?php

$mysqli = new mysqli("127.0.0.1", "root", "", "bbdd",3306);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$provincia = $_SESSION["provincia"];
$tecnico = $_SESSION["tecnico"];
	
	$resultadores = $mysqli->query("SELECT * FROM incidencias WHERE 		
	(provincia='$provincia') AND (asignacion= '$tecnico')");
	
	$_SESSION["in_tecnico"] = $resultadores->num_rows;
	
	$resultadocerr = $mysqli->query("SELECT * FROM incidencias WHERE 		
	(provincia='$provincia') AND (asignacion= '$tecnico') AND (estado = 'cerrada')");
	
	$_SESSION["in_cerradas_tecnico"] = $resultadocerr->num_rows;
	

	if (!$mysqli) {
    	die('Consulta no válida: ' . mysql_error());
	}	
?>	
 <?php
  // Cierra la conexion con la bbdd
	mysqli_close($mysqli);
	header("Location: estadisticas_tecnico.php");	
 ?>
</div>
</body>  

</html> 