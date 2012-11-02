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
          <?php 
          if (!empty($result)) {
              foreach ($result as $value) { 
                echo '["' . $value['nombre'] . '",  ' . $value['votos'] . '],';
              }
          }          
          ?>
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
                <li <?= activate('barras') ?>>
                <a href="reporte.php">Barras</a>
                </li>
                <li <?= activate('torta') ?>><a href="reporte.php?report=torta">Torta</a></li>
                <li <?= activate('tabla') ?>><a href="reporte.php?report=tabla">Tabla</a></li>
            </ul>
            <?php 
            if (isset($_GET['report'])) {
                switch ($_GET['report']) {
                    case 'torta':
                        ?>
                        <div id="chart_div2" style="width: 900px; height: 500px;"></div>
                        <?php
                        break;
                    case 'tabla':
                        ?>
                        <table class="table table-hover table-condensed">
                             <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Votos</th>
                                </tr>
                            </thead>
                            <tbody>    
                                <?php
                                $index = 0;
                                foreach ($result as $value) {
                                    if ($index < 11) {
                                        echo '<tr class="success"><td>' . $value['nombre'] . '</td><td>' . $value['votos'] . '</td></tr>';
                                    } else {
                                        echo '<tr class="error"><td>' . $value['nombre'] . '</td><td>' . $value['votos'] . '</td></tr>';
                                    }
                                    $index++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                }
            } else {
                ?>
                <div id="chart_div" style="width: 900px; height: 500px;"></div>
                <?php
            }
                ?>
        </div>
  </body>
</html>