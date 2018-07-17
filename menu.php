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

<body>  
<div id="caja_global"><!-- global-->
<!--caja superior de datos de usuario-->
<div class="caja_login">
<p class="titu_login">
	<img class="imgtitu1" src="recursos/usuario.png">
	<?php echo $_SESSION["nombre"]?>
		<img class="imgtitu2" src="recursos/fecha.png"> <?php echo date("Y-m-d");?></p>
<p class="titu_login"><img class="imgtitu1" src="recursos/puesto.png">  <?php
		  if($_SESSION["usuario"] == "0"){
	 	  	echo "Delegado provincial de ";echo $_SESSION["provincia"];
			$menu = 0;
		  }else{
			echo "Técnico de soporte";
			$menu = 1;
		  } 
	  ?></p>

</div>

<?php
if ($menu == 0){
?>

<!-- desplegable de opciones del usuario logueado-->
	<div id="header">
			<ul class="nav">
				<li ><a href="">Altas y Bajas</a>
					<ul>
						<li><a href="rellenar_integrante.php" target="resultados_iframe">Alta Trabajador</a></li>
                        <li><a href="baja_integrante.php" target="resultados_iframe">Baja Trabajador</a>
						<li><a href="crear_incidencia.php" target="resultados_iframe">Crear Nueva Incidencia</a>						
                </li>
                </li>
					</ul>
				</li>
				<li><a href="">Consultas</a>
					<ul>
						<li><a href="consulta_fecha.php" target="resultados_iframe">Por Fecha</a></li>
						<li><a href="consulta_tipo.php" target="resultados_iframe">Por Tipo</a></li>
						<li><a href="consulta_integrante.php" target="resultados_iframe">Por T&eacute;cnico</a></li>
                        <li><a href="ver_incidencia.php" target="resultados_iframe">Incidencias Abiertas</a></li>
					</ul>
				</li>
                <li><a href="">Estad&iacute;sticas</a>
					<ul>
						<li><a href="estadisticas_mes.php" target="resultados_iframe">Incidencias agrupadas por Mes</a></li>
						<li><a href="estadisticas_anuales.php" target="resultados_iframe">Incidencias totales y resueltas en el A&ntilde;o</a></li>
						<li><a href="consulta_estad_tecnico.php" target="resultados_iframe">Total de Incidencias anuales por T&eacute;cnico</a></li>
						<li><a href="consulta_estad_tipo.php" target="resultados_iframe">Total de incidencias anuales por Tipo</a></li>
					</ul>
				</li>
                <li><a href="">Salir</a>
                	<ul>
						<li><a href="login.php"><img src="recursos/off.png" 
                        width="20px"  height	="20px" /> Login Off</a></li>
					</ul>
                </li>
			</ul>
	</div>
    
<?php
}elseif ($menu == 1){
?>	
<!-- desplegable de opciones del usuario logueado-->
	<div id="header">
			<ul class="nav">
				<li><a href="">Partes</a>
					<ul>
						<li><a href="partes.php" target="resultados_iframe">Cerrar Parte</a>			
                </li>
					</ul>
				</li>
				<li><a href="">Consultas</a>
					<ul>
						<li><a href="consulta_fecha.php" target="resultados_iframe">Por Fecha</a></li>
						<li><a href="consulta_tipo.php" target="resultados_iframe">Por Tipo</a></li>
						<li><a href="consulta_integrante.php" target="resultados_iframe">Por T&eacute;cnico</a></li>
					</ul>
				</li>
                <li><a href="">Salir</a>
                	<ul>
						<li><a href="login.php"><img src="recursos/off.png" 
                        width="20px"  height	="20px" /> Login Off</a></li>
					</ul>
                </li>
			</ul>
	</div>

  <?php    
}
?>
<div>  
<iframe name="resultados_iframe" id="iframe" scrolling="YES" src="presentacion.php"></iframe>
</div>
<div id="pie_pagina">Gestor de Incidencias</div>    
</div><!-- global-->

 </body>  

</html> 


