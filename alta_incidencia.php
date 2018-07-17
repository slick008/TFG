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
<div id="visor_central2">
 <?php
$mysqli = new mysqli("127.0.0.1", "root", "", "bbdd",3306);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
<br /> 
 <?php
 //se comprueba si ha sido enviado el formulario
if(isset($_POST['integrante'])){ //if_1 

//comprobar visualmente que llega	
?>

<p class="texto_origen_result">Integrante: </p><p class="texto_result"> <?php echo $_POST['integrante']?></p>
 <p class="texto_origen_result">Provincia: </p><p class="texto_result"> <?php echo $_POST['provincia']?></p>
  <p class="texto_origen_result">Tipo: </p><p class="texto_result"> <?php echo $_POST['tipo']?></p>
   <p class="texto_origen_result">Fecha: </p><p class="texto_result"> <?php echo $_POST['fecha']?></p>

<p><span class="bot_login"><img src="recursos/correcto.png"></span></p>
<img class="boton_volver" alt="Volver" src="recursos/volver.png" onclick="window.location.href='presentacion.php'" alt="Volver">
<?php

$integrante = $_POST['integrante'];
$provincia = $_POST['provincia'];
$tipo = $_POST['tipo'];
$fecha = $_POST['fecha'];
$resumen = $_POST['resumen'];

//inserta los datos obtenidos
$resultado = $mysqli->query("INSERT INTO `incidencias`(`provincia`, `tipo`, `asignacion`, `fecha`, `resumen`) 
 VALUES (
 '$provincia',
 '$tipo',
 '$integrante',
 '$fecha',
 '$resumen'
 )");

 // Cierra la conexion con la bbdd
	mysqli_close($mysqli);	
 }else{ //if_1
	 echo"  es null el tipo  ";
 }
 
 ?>
 </div>
 </body>  

</html> 