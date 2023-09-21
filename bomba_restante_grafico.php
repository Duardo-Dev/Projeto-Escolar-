<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <title>Combustíves</title>

    <header align='center'>
        <a href="admapag.php"> Home</a> <span> >> </span> <a href="#"> Litros restante nos tanques</a>
    </header>

    <style>  
        columnchart_values{
            background:gainsboro;
        } 

        .active{
            background-color:red;
        }

        li{
            border-right:1px solid #bbb;
        }

        ul{
            list-style-type:none;
            margin:0;
            padding:0;
            overflow:hidden;
            background-color:#333;
        }

        li{
            float:left;
        }

        li a {
            display:block;
            color:white;
            text-align:center;
            padding:14px 16px;
            text-decoration:none;
        }

        li a:hover{
            background-color:#222;
        }

        ol{
            text-align:center;
            position:absolute;
            color:white;
            font-size:30px;
            margin-left:400px;
        }

        a {
            text-decoration:none;
        }
        body{
            background:darkseagreen;
        }
    </style>

    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "Bomba", { role: "style" } ],
                <?php

                    include_once ('connect.php');
                    $sql = "SELECT * FROM tanque";//selecionando a tabela do tanque.
                    $busca = mysqli_query($con,$sql);
                    while($dados = mysqli_fetch_array($busca)){
                        $cidade = $dados['combustivel_restante'];
                        $id = $dados['id_tank'];

                ?>

                [<?php echo $id ?>,<?php echo $cidade ?>,  "opacity: 1",],

                <?php
        }
                ?>
            ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn:1,
                         type: "string",
                         role: "annotation" },
                       2]);

        var options = {
            title: "Quantidade dos Tanques  ",
            width:600,
            height: 400,
            bar: {groupWidth: "60%"},
            legend: { position: "none" },
        };

        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));//converte o gráfico para colunas.
        chart.draw(view);
        }
    </script>
   
    <center><div id="columnchart_values" style="width: 900px; height: 300px;"></div></center>
   
</head>
<body>
    <?php
        session_start();

       //verificação se existe o usuário.
        if(!isset($_SESSION['user']) and !isset($_SESSION['password'])){
            header('location:index.php');
            exit;
        }   
    ?>

</body>
</html>
