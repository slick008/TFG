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

<div id="visor_central">
 <?php
$mysqli = new mysqli("127.0.0.1", "root", "", "bbdd",3306);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$id= $_POST['id'];

//borra los datos obtenidos
$mysqli->query("DELETE FROM `incidencias` WHERE id_incidencia='$id'");
 
// Cierra la conexion con la bbdd
	mysqli_close($mysqli);
		
header("Location: ver_incidencia.php");
 ?>
 </div>
 </body>  

</html> 