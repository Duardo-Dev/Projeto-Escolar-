<head>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>        
        body{
            background:darkseagreen;
        }

        fieldset{
            background:gainsboro;
            position:absolute;
            margin-top:100px;
            margin-left:300px;
            padding:40px;
            font-size:30px;
        }
        a {
            text-decoration:none;
        }

    </style>
</head>

<header align='center'>
    <a href="logado.php"> Home </a> <span> >> </span> <a href="bomba.php">Abastecer</a> <span> >> </span> <a href="#">Nota Fiscal</a>
</header>

<?php
    session_start();//Iniciar a sessão 
    require_once 'connect.php';// puxar do arquivo connect os dados do servidor

    if(!isset($_SESSION['user']) and !isset($_SESSION['password'])){
        header('location:login.php');
        exit;//Se o usuário nao tiver logado, ele não vai conseguir entrar no site
       
    }

    
    if($_POST){

        
        $dataAtual = new DateTime();//definindo para a nova variável, que ela vai ser de data
        
        $dataAtual->setTimezone(new DateTimeZone('America/Fortaleza'));//mudando para data e hora de fortaleza
        //pegando variáveis dadas
        $id_bomb = $_GET['id'];
        $id_tank = $_GET['id_tank'];
        $qtd_desejada = $_POST['qtd_desejada'];
        $forma_pagamento = $_POST['forma_pagamento'];
        $id_user = $_SESSION['id_user'];
        $sql_forma_de_pagamento = "SELECT * FROM formas_pagamento where id_pagamento = '$forma_pagamento'";// selecionando dessa tabela de acordo com o id do usuário
        $result_pagamento = $con -> query($sql_forma_de_pagamento);
        $data = $result_pagamento -> fetch_assoc();

        $forma_pagamento = $data['forma_pagamento'];
        $id_pagamento = $data['id_pagamento'];

       
        $sql = "SELECT * FROM tanque as t, bomba as b, combustivel as c where t.id_tank = $id_tank and b.id_bomba = '$id_bomb' and t.id_bomba = b.id_bomba and c.id_combustivel = b.id_combustivel";


       
        $result = $con -> query($sql);
        $data = $result -> fetch_assoc();

        $preco_comb = $data['preco'];
        $nome_comb = $data['tipo_combustivel'];
        $litros = $data['combustivel_restante'];
        //equações para fazer o preço da gasolina
        $preco_pagar = ($preco_comb) * ($qtd_desejada);
        $litros_restantes = $litros - $qtd_desejada;


        
        echo "<fieldset>";
        echo "<legend align='center'> NOTA FISCAL</legend>";

        echo "Nome do combustível: ".$nome_comb."<br>";
        echo "Quantidade de litros desejada: ".$qtd_desejada." Litros <br>";
        echo "Preço do litro do combustível escolhido: R$ ".number_format($preco_comb, 2, ',', '.')."<br>";
        echo "Preço à se pagar: R$ ".number_format($preco_pagar, 2, ',', '.')."<br>";
        echo "Forma de pagamento escolhida: ".$forma_pagamento."<br>";
        echo "Data do abastecimento: ".$dataAtual -> format('d/m/Y')."<br>";

        $data = $dataAtual -> format('Y/m/d');
        $hora = $dataAtual -> format('h:i:s');
        
        echo "</fieldset>";
        

       //Adicionando na tabela os valores dados
        $sql_comb = "INSERT INTO nota_fiscal values('', '$id_user', '$id_bomb', '$qtd_desejada', '$preco_pagar', '$data', '$id_pagamento')";

        //Atualizando os dados da table
        $sql_bomba = "UPDATE tanque SET combustivel_restante = '$litros_restantes' WHERE id_tank='$id_tank'";

        $con -> query($sql_comb);
        $con -> query($sql_bomba);
        
    }
?>
