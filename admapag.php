<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
<script src=https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js></script>
    <title>Home</title>
</head>
<ul>

<li><a href = "./sair.php" class = "active">Sair</a></li>
<ol>Petrol Combustiveis</ol>
</ul>
<style>
    .active{
        background-color:deepskyblue;
        color:black;
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
        transition: 0.3s;
        background-color:grey;
        color:white;
    }
    ol{
        text-align:center;
        position:absolute;
        color:white;
        font-size:30px;
        margin-left:500px;
    }
    body{
      background:DarkSeaGreen;
      height:100vh;
    }
    button{
        border-radius:25px;
        padding:10px;
        border:none;
        background-color:deepskyBlue;
       
        cursor:pointer;

    }
    button:hover{
        transition: 0.3s;
        background-color:grey;
        color:white;
    }
    strong{
        font-size:20px;
        
    }
</style>
</head>

<body>

    <?php
    session_start();
//verificando se existe as sessions de nome e senha do usuário
    if((isset ($_SESSION['nome']) == true) and (isset ($_SESSION['senha']) == true)){
        $nome = $_SESSION['nome'] ;
        $senha = $_SESSION['senha'] ;
  
            $con = new mysqli("localhost", "root", "", "cursos") or die("ERRO NO BANCO DE DADOS!!!!!!");
            $result = $con->query("SELECT * FROM usuario WHERE nome = '$nome' AND senha = '$senha' ");
            $resultado =mysqli_fetch_assoc($result);
       
    }
//se o usuário  for do tipo '1', ele será redirecionado para a tela de ADM.
            if($_SESSION['tipo'] == "1"):
  else:
      
    //se o usuário nao for do tipo '1', ele será redirecionado para a tela de usuário.      
                header("location:logado.php");
            endif; 

    echo "<strong>Seja Bem-Vindo ".$_SESSION['user']."!</strong><br><br>";

    echo'
            <a href="mudar_info.php">
                <button>Informações dos frentistas</button>
            </a><br><br>
        ';

        echo "
            <a href='cada_frentista.php'>
                <button> Relatório diário dos frentistas</button>
            </a><br><br>
        ";
        
        echo "
            <a href='combustiveis_vendidos.php'> 
                <button> Combustíveis mais vendidos </button> 
            </a><br><br>
        ";

        echo "
            <a href='cadastro.php'> 
                <button> Cadastrar um novo frentista </button> 
            </a><br><br>
        ";

        echo "
            <a href='bomba_restante_grafico.php'>
                <button> Litros restante nos tanques</button>
            </a> <br><br>
        ";

        echo "
            <a href='formas_pagamento.php'>
                <button> Formas de pagamento </button>
            </a>
        ";
    ?>

    </body>
</html>
