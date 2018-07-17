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

$provincia = $_SESSION["provincia"];

//consulta en la bbdd los tipos existentes
$resultado = $mysqli->query("SELECT tipo FROM tipos");
$resultado2 = $mysqli->query("SELECT nombre FROM usuarios WHERE provincia='$provincia' &&	tipo=1");

if (!$mysqli) {
    die('Consulta no válida: ' . mysql_error());
}


?>	
<body>
<div id="visor_central">

<form action="alta_incidencia.php" method="post" target="resultados_iframe">
         <p>Provincia: </p><input name="provincia" type="text" size="8" value="<?php 	
		 echo $provincia?>" readonly />
<p></p>
 <p>Fecha Entrada: </p><input type="date" name="fecha" min="2018-01-01" max="2030-12-31" 
 step="1" value="<?php echo date("Y-m-d");?>" size="10" readonly>
 <p></p>

 <p>Tipo: 
			<select name="tipo" required>
<?php
			for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
				$resultado->data_seek($num_fila);
				$fila = $resultado->fetch_assoc();
?>	  
			<option value="<?php echo $fila['tipo']; ?>"><?php echo $fila['tipo']; ?></option>
<?php
			}
?>	     
   </select>
		 </p>
<p></p>         
<p>Trabajador asignado: 
			<select name="integrante"  required>
<?php
			for ($num_fila = $resultado2->num_rows - 1; $num_fila >= 0; $num_fila--) {
				$resultado2->data_seek($num_fila);
				$fila = $resultado2->fetch_assoc();
?>	  
			<option value="<?php echo $fila['nombre']; ?>"><?php echo $fila['nombre']; ?></option>
<?php
			}
?>	     
   </select>
		 </p>
         <p>Resumen: <textarea name="resumen" rows="2" cols="35"   required> -Describa muy breve mente el problema-</textarea>
         
        <p class="bot_alta_inci"><button type="submit"><img class="efecto_bot" src="recursos/button_alta.png">
			</button></p>
</form>
<?php 
// Cierra la conexion con la bbdd
	mysqli_close($mysqli);
?>
</div>
 </body>  
</html>