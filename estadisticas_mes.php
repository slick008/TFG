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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart']});
  google.charts.setOnLoadCallback(drawChart);
</script>
<TITLE>Gestor Incidencias</TITLE>  
</head>  

<body>  
<div id="visor_central_resultados">
<?php

if(isset($_SESSION["enero"])){
	
?>

    <div id = "container" style = "width: 550px; height: 400px; margin: 0 auto">
      </div>
   <script language = "JavaScript">

   
   enero = <?php echo $_SESSION["enero"]; ?>;
   febrero = <?php echo $_SESSION["febrero"]; ?>;
   marzo = <?php echo $_SESSION["marzo"]; ?>;
   abril = <?php echo $_SESSION["abril"]; ?>;
   mayo = <?php echo $_SESSION["mayo"]; ?>;
   junio = <?php echo $_SESSION["junio"]; ?>;
   julio = <?php echo $_SESSION["julio"]; ?>;
   agosto = <?php echo $_SESSION["agosto"]; ?>;
   septiembre = <?php echo $_SESSION["septiembre"]; ?>;
   octubre = <?php echo $_SESSION["octubre"]; ?>;
   noviembre = <?php echo $_SESSION["noviembre"]; ?>;
   diciembre = <?php echo $_SESSION["diciembre"]; ?>;


         function drawChart() {
            // Define la tabla
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Browser');
            data.addColumn('number', 'Percentage');
            data.addRows([
               ['Enero', enero],
               ['Febrero', febrero],
               ['Marzo', marzo],
               ['Abril', abril],
               ['Mayo', mayo],
			   ['Junio', junio],
			   ['Julio', julio],
			   ['Agosto', agosto],
			   ['Septiembre', septiembre],
			   ['Octubre', octubre],
			   ['Noviembre', noviembre],
               ['Diciembre', diciembre]
            ]);
               

            // Define las opciones
            var options = {'title':'Incidencias al Mes en el año actual en <?php echo $_SESSION["provincia"]; ?>', 'width':550, 'height':400};

            // Instanciar y dibujar la tabla
            var chart = new google.visualization.PieChart(document.getElementById ('container'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
      </script>

<?php
}else{
	
	header("Location: calculos_estadisticas_me.php");
}
?>
</div>
</body>  

</html> 