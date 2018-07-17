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
<div id="visor_central_resultados_resumen">
 <?php
$mysqli = new mysqli("127.0.0.1", "root", "", "bbdd",3306);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
<br /> 
 <?php
 //se comprueba si ha sido enviado el formulario
if(isset($_POST['id_incidencia'])){ //if_1 

//comprobar visualmente que llega	
?>

<p class="texto_origen_result">Id: <span class="texto_result"><?php echo $_POST['id_incidencia']?></span></p>
 <p class="texto_origen_result">Integrante: <span class="texto_result"><?php echo $_POST['integrante']?></span></p>
  <p class="texto_origen_result">Provincia: <span class="texto_result"><?php echo $_POST['provincia']?></span></p>
  <p class="texto_origen_result">Tipo: <span class="texto_result"><?php echo $_POST['tipo']?></span></p>
  <p class="texto_origen_result">Fecha: <span class="texto_result"><?php echo $_POST['fecha']?></span></p>
  <p class="texto_origen_result">S.O.: <span class="texto_result"><?php echo $_POST['so']?></span></p>
  <p class="texto_origen_result">Versión: <span class="texto_result"><?php echo $_POST['version']?></span></p>
  <p class="texto_origen_result">Resumen: </p><p class="texto_result"> <?php echo $_POST['resumen']?></p>
  <p></p>

<p><span class="bot_login" style="padding-left:25%;">       <img src="recursos/correcto.png"></span></p>
<img class="boton_volver" alt="Volver" src="recursos/volver.png" onclick="window.location.href='presentacion.php'" alt="Volver">


<?php

$incidencia = $_POST['id_incidencia'];
$integrante = $_POST['integrante'];
$provincia = $_POST['provincia'];
$tipo = $_POST['tipo'];
$fecha = $_POST['fecha'];
$so = $_POST['so'];
$version = $_POST['version'];
$resumen = $_POST['resumen'];


//inserta los datos obtenidos
$resultado = $mysqli->query("INSERT INTO `partes`(`id_incidencia`, `tipo`, `fecha`, `so`, `version`, `resumen`, `integrante`, `provincia`) 
 VALUES (
 '$incidencia',
 '$tipo',
 '$fecha',
 '$so',
 '$version',
 '$resumen',
 '$integrante',
 '$provincia')");

 // hay que marcar el parte como cerrado para que no se pueda repetir

$resultado3 = $mysqli->query("UPDATE `incidencias` SET `estado`='cerrada' WHERE  `id_incidencia`='$incidencia'");

if (!$mysqli) {
	die('Consulta no válida: ' . mysql_error());
}

 // Cierra la conexion con la bbdd
	mysqli_close($mysqli);	
 }else{ //if_1
	 echo"  es null el tipo  ";
 }
 
 ?>
</div>
 </body>  

</html> 