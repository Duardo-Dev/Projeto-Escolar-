<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <header align='center'>
        <a href="admapag.php" style='text-decoration:none;'> Home</a> <span> >> </span> <a href="#"> Combustíveis mais vendidos </a>
    </header>

    <style>
      body{
        background:darkseagreen;
      }

      #donutchart {
        background: dar seagreen;
      }
      a {
        style='text-decoration:none;
      }
    </style>

    <?php
      include_once('connect.php');

      $tipo_combustivel = array();
      $total_vendas = array();
      $i = 0;

      
      $result = $con->query("SELECT *, sum(n.quantidade_litros) as total from nota_fiscal as n, combustivel as c, bomba as b
          WHERE n.id_bomba = b.id_bomba and b.id_combustivel = c.id_combustivel
          GROUP BY c.id_combustivel ORDER BY total DESC
      ;");

      while ($row = mysqli_fetch_assoc($result)){
        $tipo= $row['tipo_combustivel'];
        $total = $row['total'];
        $tipo_combustivel[$i] = $tipo;
        $total_vendas[$i] = $total;



        $i = $i + 1;
      }
    ?>
        

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
            <?php 
                
            
              $k = $i;

              
              for ($i=0; $i < $k; $i++) { 
                ?>['<?php echo $tipo_combustivel[$i]; ?>', <?php echo $total_vendas[$i] ?>],
                <?php
              }

            ?>
        ]);

        var options = {
          title: 'Combustiveis mais vendidos em litros',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }

    </script>
  </head>
  <body>
  
    <center><div id="donutchart" style="width: 900px; height: 500px;"></div></center>
    
    <?php
        
      ?>
  </body>
</html>

