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
<TITLE>Gestor Incidencias</TITLE>
</head>  

<body>  
 <?php
$mysqli = new mysqli("127.0.0.1", "root", "", "bbdd",3306);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>

 <?php
 //recupera la información del formulario
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

//consulta en la bbdd si existe el usuario
$resultado = $mysqli->query("SELECT tipo,provincia,nombre FROM usuarios WHERE nombre='$usuario' AND clave='$pass'");
//comprueba si existe el usuario, si devuelve 0 columnas es que no existe
$devuelto = $resultado->num_rows;

if (!$mysqli) {
    die('Consulta no válida: ' . mysql_error());
}

	// Cierra la conexion con la bbdd
	mysqli_close($mysqli);
	
if ($devuelto == 0){
	//si no existe el usuario, se cierra la session y se regresa a la pagina de login
	session_unset();
	header("Location: Login.php"); 
}else{
	//si es correcto, se continua a la pagina de menu
	//primero se guarda en la sesion el tipo de usuario que se está logueando
	$tipo_usuario = $resultado->fetch_assoc();
	$_SESSION["usuario"] = $tipo_usuario["tipo"];
	$_SESSION["provincia"] = $tipo_usuario["provincia"];
	$_SESSION["nombre"] = $tipo_usuario["nombre"];
	echo $tipo_usuario["tipo"];
	echo $tipo_usuario["provincia"];
	echo $tipo_usuario["nombre"];
	header('Location: menu.php');
}
?>
 </body>  

</html> 


