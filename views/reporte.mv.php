<html>
  <head>
    <title>Elecciones Independiente M&iacute;stico</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/myForm.css" rel="stylesheet"/>
    <link type="text/css" href="css/smoothness/jquery-ui-1.8.23.custom.css" rel="Stylesheet" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>    	
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Candidato', 'Votos'],
          <?php foreach ($result as $value) { 
            echo '["' . $value['nombre'] . '",  ' . $value['votos'] . '],';
          }?>
        ]);

        var options = {
          title: 'Resultado de la eleccion',
          hAxis: {title: 'Votos', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
     <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Candidato', 'Votos'],
          <?php foreach ($result as $value) { 
            echo '["' . $value['nombre'] . '",  ' . $value['votos'] . '],';
          }?>
        ]);

        var options = {
          title: 'Resultado de la eleccion',
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
        <div class="container">
            <div class="page-header">
                <h1>Reporte Elecciones Independiente M&iacute;stico</h1>
            </div>
            <ul class="nav nav-tabs">
                <li class="active">
                <a href="reporte.php">Barras</a>
                </li>
                <li><a href="reporte.php?report=torta">Torta</a></li>
                <li><a href="reporte.php?report=votantes">Votantes</a></li>
            </ul>
            <?php if (isset($_GET['report'])) {
                if ($_GET['report'] == 'torta') {
                ?>
                <div id="chart_div2" style="width: 900px; height: 500px;"></div>            
            <?php }
            } else { ?>
            <div id="chart_div" style="width: 900px; height: 500px;"></div>    
            <?php
                } 
            ?>
        </div>
  </body>
</html>