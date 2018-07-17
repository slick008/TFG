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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
<br /> 
 <?php
 //se comprueba si ha sido enviado el formulario para consultar tipos de incidencias o no
if(isset($_POST['opc'])){ //if_1 
 	$opcion = $_POST['opc'];
	
	//consulta en la bbdd el tipo elegido
	$resultado = $mysqli->query("SELECT * FROM partes WHERE tipo='$opcion'");
	if (!$mysqli) {
    	die('Consulta no válida: ' . mysql_error());
	}
	
		//comprueba si existen resultados, de no existir no crea la tabla
	if($resultado->num_rows == 0){
?>
	<h1>No hay resultados</h1>
<?php
	}else{

		for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {//for_2
				$resultado->data_seek($num_fila);
				$fila = $resultado->fetch_assoc();
?>
        <table class="tabla_resultado">
          <tr>
            <td><p class="texto_consulta">Tipo</p></td>
            <td><p class="texto_consulta">Fecha</p></td>
            <td><p class="texto_consulta">S.O.</p></td>
            <td><p class="texto_consulta">Version</p></td>
            <td><p class="texto_consulta">T&eacute;cnico</p></td>
            <td><p class="texto_consulta">Provincia</p></td> 
          </tr>
           <tr>
             <td><p class="texto_result2"><?php echo $fila['tipo'] ?></p></td>
             <td><p class="texto_result2"><?php echo $fila['fecha'] ?></p></td>
             <td><p class="texto_result2"><?php echo $fila['so'] ?></p></td>
             <td><p class="texto_result2"><?php echo $fila['version'] ?></p></td>
             <td><p class="texto_result2"><?php echo $fila['integrante'] ?></p></td>
             <td><p class="texto_result2"><?php echo $fila['provincia'] ?></p></td>
           </tr>
                  <p></p>
                  <p></p>
          <table>
            <tr>
              <td><p class="texto_consulta">Resumen</p></td>
              <td><p class="texto_result2"><?php echo $fila['resumen'] ?></p></td>
            </tr>
          </table>
		</table>
<?php		
	}//for_2
?>
<?php
	}
 }//if_1
 
  
 //se comprueba si ha sido enviado el formulario para consultar fechas o no
if(isset($_POST['fecha_min'])&&isset($_POST['fecha_max'])){ //if_2
 	$opcion1 = $_POST['fecha_min'];
	$opcion2 = $_POST['fecha_max'];
	
	//consulta en la bbdd las fechas indicadas
	$resultado = $mysqli->query("SELECT * FROM partes WHERE fecha BETWEEN CAST('$opcion1' AS DATE) AND CAST('$opcion2' AS DATE);");
	
	if (!$mysqli) {
    	die('Consulta no válida: ' . mysql_error());
	}

	//comprueba si existen resultados, de no existir no crea la tabla
	if($resultado->num_rows == 0){
?>
	<h1>No hay resultados</h1>
<?php
	}else{ //if_3
?>
<?php
		for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {//for_2
				$resultado->data_seek($num_fila);
				$fila = $resultado->fetch_assoc();
?>
        <table class="tabla_resultado">
          <tr>
            <td><p class="texto_consulta">Tipo</p></td>
            <td><p class="texto_consulta">Fecha</p></td>
            <td><p class="texto_consulta">S.O.</p></td>
            <td><p class="texto_consulta">Version</p></td>
            <td><p class="texto_consulta">T&eacute;cnico</p></td>
            <td><p class="texto_consulta">Provincia</p></td> 
          </tr>
           <tr>
             <td><p class="texto_result2"><?php echo $fila['tipo'] ?></p></td>
             <td><p class="texto_result2"><?php echo $fila['fecha'] ?></p></td>
             <td><p class="texto_result2"><?php echo $fila['so'] ?></p></td>
             <td><p class="texto_result2"><?php echo $fila['version'] ?></p></td>
             <td><p class="texto_result2"><?php echo $fila['integrante'] ?></p></td>
             <td><p class="texto_result2"><?php echo $fila['provincia'] ?></p></td>
           </tr>
                  <p></p>
                  <p></p>
          <table>
            <tr>
              <td><p class="texto_consulta">Resumen</p></td>
              <td><p class="texto_result2"><?php echo $fila['resumen'] ?></p></td>
            </tr>
          </table>
		</table>
<?php		
	}//for_2
?>
<?php
	}//if_3
 }//if_2


 //se comprueba si ha sido enviado el formulario para consultar trabajadores o no
if(isset($_POST['opct'])){ //if_4
 	$opcion = $_POST['opct'];
	
	//consulta en la bbdd ek tipo elegido
	$resultado = $mysqli->query("SELECT * FROM partes WHERE integrante='$opcion'");
	if (!$mysqli) {
    	die('Consulta no válida: ' . mysql_error());
	}

	//comprueba si existen resultados, de no existir no crea la tabla
	if($resultado->num_rows == 0){
?>
	<h1>No hay resultados</h1>
<?php
	}else{
		
		for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {//for_2
				$resultado->data_seek($num_fila);
				$fila = $resultado->fetch_assoc();
?>
        <table class="tabla_resultado">
          <tr>
            <td><p class="texto_consulta">Tipo</p></td>
            <td><p class="texto_consulta">Fecha</p></td>
            <td><p class="texto_consulta">S.O.</p></td>
            <td><p class="texto_consulta">Version</p></td>
            <td><p class="texto_consulta">T&eacute;cnico</p></td>
            <td><p class="texto_consulta">Provincia</p></td> 
          </tr>
           <tr>
             <td><p class="texto_result2"><?php echo $fila['tipo'] ?></p></td>
             <td><p class="texto_result2"><?php echo $fila['fecha'] ?></p></td>
             <td><p class="texto_result2"><?php echo $fila['so'] ?></p></td>
             <td><p class="texto_result2"><?php echo $fila['version'] ?></p></td>
             <td><p class="texto_result2"><?php echo $fila['integrante'] ?></p></td>
             <td><p class="texto_result2"><?php echo $fila['provincia'] ?></p></td>
           </tr>
                  <p></p>
                  <p></p>
          <table>
            <tr>
              <td><p class="texto_consulta">Resumen</p></td>
              <td><p class="texto_result2"><?php echo $fila['resumen'] ?></p></td>
            </tr>
          </table>
		</table>
<?php		
	}//for_2
?>
<?php
	}
 }//if_4


// Cierra la conexion con la bbdd
	mysqli_close($mysqli); 
 ?>
 </div>
 </body>  

</html> 