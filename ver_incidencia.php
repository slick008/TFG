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

//consulta en la bbdd las incidencias existentes
$resultado = $mysqli->query("SELECT * FROM incidencias WHERE provincia='$provincia' &&
								estado='abierta'");

if (!$mysqli) {
    die('Consulta no válida: ' . mysql_error());
}

?>	
<table class="tabla_resultado">
  	<tr>
        <td><p class="texto_consulta">Id </p></td>
        <td><p class="texto_consulta">Provincia</p></td>
        <td><p class="texto_consulta">Tipo</p></td>
        <td><p class="texto_consulta">Técnico</p></td>
        <td><p class="texto_consulta">Fecha</p></td>
        <td><p class="texto_consulta">Estado</p></td>
    </tr>
    <p></p>
    <p></p>
<?php
	for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {//for_1
		$resultado->data_seek($num_fila);
		$fila = $resultado->fetch_assoc();
?>
     <tr>
        <td><p class="texto_result"><?php echo $fila['id_incidencia'] ?></p></td>
        <td><p class="texto_result"><?php echo $fila['provincia'] ?></p></td>
        <td><p class="texto_result"><?php echo $fila['tipo'] ?></p></td>
        <td><p class="texto_result"><?php echo $fila['asignacion'] ?></p></td>
        <td><p class="texto_result"><?php echo $fila['fecha'] ?></p></td>
        <td><p class="texto_result"><?php echo $fila['estado'] ?></p></td>
        <td><p class="texto_result"><p class="bot_borrar">
        <form action="confirmar_borrar_incidencia.php" method="post">
        <input type="hidden" name="id" value="<?php echo $fila['id_incidencia']; ?>" />
        <button type="submit"><img class="efecto_bot" src="recursos/borrar.png" alt="Eliminar">
			</button></form></p></p></td>
      </tr>
<?php
	}//for_1
?>
</table>
 <?php
  // Cierra la conexion con la bbdd
	mysqli_close($mysqli);	

 ?>
 </div>
 </body>  

</html> 