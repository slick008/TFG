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
<div id="visor_central_resultados">
 <?php
 //se comprueba si ha sido enviado el formulario 
if(isset($_POST['opc'])){ //if_1 
 	$opcion = $_POST['opc'];
	
	//consulta en la bbdd los tipos existentes
	$resultado = $mysqli->query("SELECT tipo FROM tipos");
	$resultado2 = $mysqli->query("SELECT so FROM so");

	if (!$mysqli) {
		die('Consulta no válida: ' . mysql_error());
	}

?>
		 <form action="alta_parte.php" method="post" target="resultados_iframe" style="padding-left:10px;padding-top:10px;">
		 <p>ID Incidencia: <input name="id_incidencia" type="text" value="<?php echo $opcion?>" size="4" readonly /></p>
         <p>Integrante: <input name="integrante" type="text"  value="<?php echo $_SESSION['nombre']?>" readonly /></p>
         <p>Provincia: <input name="provincia" type="text" size="4" value="<?php echo $_SESSION['provincia']?>" readonly /></p>
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
         <p>Fecha Resolucion: <input type="date" name="fecha" min="2018-01-01" max="2030-12-31" step="1" value="<?php echo date("Y-m-d");?>" required></p>
         <p>Sistema Operativo: 
		 <select name="so" required>
<?php
			for ($num_fila = $resultado2->num_rows - 1; $num_fila >= 0; $num_fila--) {
				$resultado2->data_seek($num_fila);
				$fila2 = $resultado2->fetch_assoc();
?>	  
			<option value="<?php echo $fila2['so']; ?>"><?php echo $fila2['so']; ?></option>
<?php
			}
?>	     
	    </select>
		</p>
         <p>Versión: <input type="text" name="version" size="6" required/></p>
         <p>Resumen: <textarea name="resumen" rows="10" cols="70"   required> -Escriba aqui el resumen de la incidencia-</textarea></p>		 
 
		
        <p class="bot_alta_inci"><button type="submit"><img class="efecto_bot" src="recursos/button_alta.png">
			</button></p>
		</form>

<?php
	
 }else{ //if_1
	 echo"  es null el tipo  ";
 }
 
 ?>
</div>
 </body>  

</html> 