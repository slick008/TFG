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
<?php
$provincia = $_SESSION["provincia"];
//consulta en la bbdd las provincias existentes
$resultado = $mysqli->query("SELECT nombre FROM usuarios WHERE provincia='$provincia' &&	tipo=1");

if (!$mysqli) {
    die('Consulta no válida: ' . mysql_error());
}
?>	

<form class="interior_caja_log" action="borrar_integrante.php" method="post" target="resultados_iframe">
   <p>Trabajador a dar de Baja:</p>
   <p></p>
   <p></p> 
   <select name="integrante">
<?php
	for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
		$resultado->data_seek($num_fila);
		$fila = $resultado->fetch_assoc();
	?>	  
	<option value="<?php echo $fila['nombre']; ?>"><?php echo $fila['nombre']; ?></option>
	<?php
	}
	?>	     
   </select>
 <p class="bot_login"><button type="submit"><img class="efecto_bot" src="recursos/button_baja.png">
			</button></p>
</form>

<?php 
// Cierra la conexion con la bbdd
	mysqli_close($mysqli);
 ?>
 
</div>

</body>  

</html> 