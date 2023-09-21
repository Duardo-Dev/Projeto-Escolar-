<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js></script>
    <title>Combustíves</title>

    <ul>
        <li>
            <a href = "./logado.php" class = "active">Voltar</a>
        </li>
        <ol>Abastecer</ol>
    </ul>

    <style>
        .active{
            background-color:LightBlue;
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
            cursor:pointer;
        }

        li a {
            display:block;
            color:white;
            text-align:center;
            padding:14px 16px;
            text-decoration:none;
            cursor:pointer;

        }

        li a:hover{
            transition: 0.3s;
            background-color:grey;
        }

        ol{
            text-align:center;
            position:absolute;
            color:white;
            font-size:30px;
            margin-left:780px;
        }
        .container{
            border-radius:px;
            display:flex;
            flex-direction:row;
        }
        strong{
          
        } 
        a {
            text-decoration: none;
        }

    
    </style>
</head>

<body style='background: DarkSeaGreen'>
    <header align='center'>
        <a href="logado.php"> Home</a>  <span>>></span> <a href="bomba.php"> Abastecer </a>
    </header>

    <div>
        <h1 style="text-align: center;">Escolha Uma Bomba <img src="imagens/bomba.png" width='100px' height='70px' alt=""></h1>
    </div>
    
    <?php 
       
        session_start();

        //verificando se existe sessions de usuário e senha, se não voltar para tela de login.
        if(!isset($_SESSION['user']) and !isset($_SESSION['password'])){
            header('location:login.php');
            exit;
        }
   
       //conectando no banco de dados.
        $con =new mysqli("localhost", "root", "", "venda_combustivel") or die("ERRO NO BANCO DE DADOS");
        
    
        $sql =  "SELECT * FROM bomba as b, tanque as t, combustivel as c WHERE t.id_bomba = b.id_bomba and t.id_combustivel = c.id_combustivel";

        
        $query = mysqli_query($con, $sql) or die(mysqli_error($con));

        while ($array = mysqli_fetch_assoc($query)) {

            
            $max = $array['combustivel_restante'];

            echo '
                <div id="div" > 
                
                    <div class="container" style= background:Gainsboro; position:center; >
                    <form method="post" action="abastecer.php?id='.$array['id_bomba'].'&id_tank='.$array['id_tank'].'">

                        <h1 style= margin-left:px;>'.'Bomba '.$array["id_bomba"].'</h1>

                        <p class="price">
                            <strong>Litros Disponiveis:  </strong>' .$array['combustivel_restante'] .'
                        </p>
                            
                        <p> 
                            <strong> Quantidade desejada: </strong><input type="number" name="qtd_desejada" min="1" max="'.$max.'" />
                        </p>
                            <strong>Tipo:</strong> '.$array['tipo_combustivel'].'
                        </p>
                                
                        <br>

                        <select name="forma_pagamento" >
                            <option value="1"> PIX </option>
                            <option value="2"> Cartão de crédito </option>
                            <option value="3"> Débito </option>
                            <option value="4"> Dinheiro em espécie </option>
                        </select>

                        <input type="submit" value="escolher" style= background-color:LightBlue;/>
                    </form>
                    </div>
                </div>&emsp;
            ';
        }

    ?>
    
    <br><br>
</body>
</html>
