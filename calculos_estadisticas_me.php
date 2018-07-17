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
	
	$opcion1 = "2018-01-01";
	$opcion2 = "2018-01-31";
	$resultado = $mysqli->query("SELECT * FROM incidencias WHERE 		
	provincia='$provincia' AND fecha BETWEEN '2018-01-01' AND '2018-01-31';");
	
	$_SESSION["enero"] = $resultado->num_rows;
	
	$opcion1 = "2018-02-01";
	$opcion2 = "2018-02-31";
	$resultado2 = $mysqli->query("SELECT * FROM incidencias WHERE 		
	provincia='$provincia' AND fecha BETWEEN '2018-02-01' AND '2018-02-31';");

	$_SESSION["febrero"] = $resultado2->num_rows;
	
	$opcion1 = "2018-03-01";
	$opcion2 = "2018-03-31";
	$resultado3 = $mysqli->query("SELECT * FROM incidencias WHERE 		
	provincia='$provincia' AND fecha BETWEEN '2018-03-01' AND '2018-03-31';");

	$_SESSION["marzo"] = $resultado3->num_rows;
	
	$opcion1 = "2018-04-01";
	$opcion2 = "2018-04-31";
	$resultado4 = $mysqli->query("SELECT * FROM incidencias WHERE 		
	provincia='$provincia' AND fecha BETWEEN '2018-04-01' AND '2018-04-31';");

	$_SESSION["abril"] = $resultado4->num_rows;
	
	$opcion1 = "2018-05-01";
	$opcion2 = "2018-05-31";
	$resultado5 = $mysqli->query("SELECT * FROM incidencias WHERE 		
	provincia='$provincia' AND fecha BETWEEN '2018-05-01' AND '2018-05-31';");

	$_SESSION["mayo"] = $resultado5->num_rows;

	
	$opcion1 = '2018-06-01';
	$opcion2 = '2018-06-31';
	$resultado6 = $mysqli->query("SELECT * FROM incidencias WHERE 		
	provincia='$provincia' AND fecha BETWEEN '2018-06-01' AND '2018-06-31';");
	
	$_SESSION["junio"] = $resultado6->num_rows;
	
	$opcion1 = "2018-07-01";
	$opcion2 = "2018-07-31";
	$resultado7 = $mysqli->query("SELECT * FROM incidencias WHERE 		
	provincia='$provincia' AND fecha BETWEEN '2018-07-01' AND '2018-07-31';");

	$_SESSION["julio"] = $resultado7->num_rows;
	
	$opcion1 = "2018-08-01";
	$opcion2 = "2018-08-31";
	$resultado8 = $mysqli->query("SELECT * FROM incidencias WHERE 		
	provincia='$provincia' AND fecha BETWEEN '2018-08-01' AND '2018-08-31';");

	$_SESSION["agosto"] = $resultado8->num_rows;
	
	$opcion1 = "2018-09-01";
	$opcion2 = "2018-09-31";
	$resultado9 = $mysqli->query("SELECT * FROM incidencias WHERE 		
	provincia='$provincia' AND fecha BETWEEN '2018-09-01' AND '2018-09-31';");
	
	$_SESSION["septiembre"] = $resultado9->num_rows;
	
	$opcion1 = "2018-10-01";
	$opcion2 = "2018-10-31";
	$resultado10 = $mysqli->query("SELECT * FROM incidencias WHERE 		
	provincia='$provincia' AND fecha BETWEEN '2018-010-01' AND '2018-10-31';");

	$_SESSION["octubre"] = $resultado10->num_rows;
	
	$opcion1 = "2018-11-01";
	$opcion2 = "2018-11-31";
	$resultado11 = $mysqli->query("SELECT * FROM incidencias WHERE 		
	provincia='$provincia' AND fecha BETWEEN '2018-11-01' AND '2018-11-31';");
	$_SESSION["noviembre"] = $resultado11->num_rows;
	
	$opcion1 = "2018-12-01";
	$opcion2 = "2018-12-31";
	$resultado12 = $mysqli->query("SELECT * FROM incidencias WHERE 		
	provincia='$provincia' AND fecha BETWEEN '2018-12-01' AND '2018-12-31';");
	
	$_SESSION["diciembre"] = $resultado12->num_rows;
	

	if (!$mysqli) {
    	die('Consulta no válida: ' . mysql_error());
	}	
?>	
 <?php
  // Cierra la conexion con la bbdd
	mysqli_close($mysqli);
	header("Location: estadisticas_mes.php");	
 ?>
</div>
</body>  

</html> 