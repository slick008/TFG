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

if(isset($_SESSION["in_abiertas"])){
	

?>

    <div id = "container" style = "width: 550px; height: 400px; margin: 0 auto">
      </div>
   <script language = "JavaScript">

   
   totales = <?php echo $_SESSION["in_abiertas"]; ?>;
   resueltas = <?php echo $_SESSION["in_cerradas"]; ?>;


         function drawChart() {
            // Define la tabla
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Browser');
            data.addColumn('number', 'Percentage');
            data.addRows([
               ['Totales', totales],
               ['Resueltas', resueltas]
            ]);
               

            // Define las opciones
            var options = {'title':'Incidencias Anuales y Resueltas en <?php echo $_SESSION["provincia"]; ?>', 'width':550, 'height':400};

            // Instanciar y dibujar la tabla
            var chart = new google.visualization.PieChart(document.getElementById ('container'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
      </script>

<?php
}else{
	
	header("Location: calculos_estadisticas_an.php");
}
?>
</div>
</body>  

</html> 