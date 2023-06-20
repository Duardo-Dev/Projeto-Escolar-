<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
      <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js></script>
      <title>Petrol Combustiveis</title>
        
      <style>
        ul {
          list-style-type: none;
          margin: 0;
          padding: 0;
          overflow: hidden;
          background-color: #333;
        }

        li {
          float: left;
          background:black;

        }

        li a {
          display: block;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          cursor:pointer;
        }

        li a:hover {
          transition: 0.4s;
          background-color:skyblue;
        }
        body{
          background: ;
          height:100vh;
        }
        h2{
          margin-left:750px;
          font-size:40px;
          font-family:arial;
          position: relative;
left: -230px;
Bottom: -180px;
          
          
        }
        h1{
          color:white;
          margin-left:750px;
          font-size:40px;
          font-family:arial;
        }
        h3{
          color:black;
          margin-left:0px;
          font-size:20px;
          font-family:arial;
        }
        th{
          font-size:40px;
          font-family:arial;
        }
        td{
          font-size:30px;
          font-family:arial;
        }
        ol{
          color:white;
          margin-left:480px;
          font-size:30px;
        }
        .table{
          width:40%;
          position:absolute;
          margin-left:410px;
          margin-top:170px;
          background-color:Aquamarine;
          border: 5px solid black;
          
        }
      </style>
    </head>
    <body>



        <ul>
          
            <li><a class="active" href="login.php">LOGIN</a></li>
            <ol>⛽Petrol Combustiveis</ol>
        </ul>

        <?php

            
            include_once('connect.php');


            //Conexão com o Banco de Dados
            $conexao = new mysqli("localhost", "root", "", "venda_combustivel") or die("ERRO NO BANCO DE DADOS");

           //Selecionar a tb desejada
            $sql = "SELECT * FROM combustivel ";

            
            $result = $conexao->query($sql);

            
            $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
                            
        ?>
       <h2>Tabela de Preços</h2>
           <!-- Criação da Tabela -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope = "col">Combustiveis</th>
                    <th scope = "col"> Preço</th>
                </tr>
            </thead>

            <tbody>
                <?php
                //Transforma as informações em array
                    while($user_data = mysqli_fetch_assoc($result)){
                      echo "<tr>";
                      echo "<td>".$user_data['tipo_combustivel']."</td>";
                      echo "<td>"."R$".number_format($user_data['preco'], 2, ',', '.')."</td>";
                      echo"</tr>";
                    }

                ?>
            </tbody>
        </table>

        <?php
        //Qr code
          echo "<center>";
        echo" <h3>👇Combustiveis Mais Vendidos👇</h3>";
          include ("vendor/autoload.php");
          $data = 'http://192.168.174.181/teste/combustiveis-full/combustiveis_vendidos.php';
         
          echo '<img src="'.(new \chillerlan\QRCode\QRCode())->render($data).'" height="100" />';
          echo "</center>";
        ?>
    </body>
</html>