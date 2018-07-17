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
?>
<p class="texto_origen_result">¿Desea borrar la incidencia?:</p>
 
<table class="tabla_opciones">
        <tr>
          <td>
        <form action="borrar_incidencia.php" method="post">
        <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>" />
        <button type="submit"><img class="efecto_bot" src="recursos/si.png">
			</button></form>
		</td>
        <td width="40px;"></td>
		<td>	
        <form action="ver_incidencia.php" method="post">
        <button type="submit"><img class="efecto_bot" src="recursos/no.png">
			</button></form>
		</td>
        </tr>
</table>


 <?php
 
// Cierra la conexion con la bbdd
	mysqli_close($mysqli);	

 ?>
 </div>
 </body>  

</html> 