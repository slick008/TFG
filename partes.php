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
//consulta en la bbdd los partes abiertos para el usuario
$nombre = $_SESSION["nombre"];
$resultado = $mysqli->query("SELECT * FROM incidencias WHERE asignacion='$nombre' AND estado ='abierta'");

if (!$mysqli) {
    die('Consulta no válida: ' . mysql_error());
}
?>	
<body>
 
<div id="visor_central">

<form action="rellenar_partes.php" method="post" target="resultados_iframe">
        <p>Incidencias Abiertas para <?php echo $nombre ?>: 
        </p></p>
			<select name="opc"  required>
<?php
			for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
				$resultado->data_seek($num_fila);
				$fila = $resultado->fetch_assoc();
?>	  
			<option value="<?php echo $fila['id_incidencia']; ?>">Id: <?php echo $fila['id_incidencia']; ?> de <?php echo $fila['tipo']; ?> con fecha <?php echo $fila['fecha']; ?></option>
<?php
			}
?>	     
   </select>
		 </p>
        <p class="presentacion"><button type="submit"><img class="efecto_bot" src="recursos/button_consultar.png">
			</button></p>
</form>
<?php 
// Cierra la conexion con la bbdd
	mysqli_close($mysqli);
?>
</div> 
 </body>  

</html> 