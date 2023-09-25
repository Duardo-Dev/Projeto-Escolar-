<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>

    <style>
        body{
            background:darkseagreen;
            height: 100vh
        }
        table{
            margin-left:380px;          
            background:lightgray;
            font-size:20px;
            border: 2px solid black;    
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header align='center'>
        <a href='admapag.php'> Home </a> <span>>></span> <a href="cada_frentista.php"> Relatório dos frentistas </a>
    </header>
    <?php
        require_once 'connect.php';

        
        $dataAtual = new DateTime();  

        
        $dataAtual->setTimezone(new DateTimeZone('America/Fortaleza'));


        $data = $dataAtual -> format('Y-m-d');


        //relacionar todos as tabelas de acordo com o id, em uma única variável que vai ser $data.
        $sql = "SELECT *, sum(valor_pagar) as total FROM nota_fiscal as n, frentista as f, bomba as b, combustivel as c WHERE
        f.id_frentista = n.id_frentista and b.id_bomba = n.id_bomba and
        c.id_combustivel = b.id_combustivel  and n.data = '$data' GROUP BY n.id_frentista";

        $result = $con -> query($sql);//executa a linha do sql.

        //verificar se existe alguma linha na tabela.
        if($result -> num_rows > 0){

            //puxa os dados das tabelas.
            while($data = $result -> fetch_assoc()){
                //criação da tabela dos abastecimentos feitos.
                echo "
                        <table border=1>
                            <tr>
                                <th> Id do frentista </th>
                                <th> Nome do frentista </th>
                                <th> Valor recebido ao dia</th>
                            </tr>
    
                            <tr>
                                <td>".$data['id_frentista']."</td>
                                <td>".$data['user']."</td>
                                <td>R$ ".number_format($data['total'], 2, '.', ',')."</td>
                            </tr>
                        </table>
                ";
            }
        } else {
            echo "
                <center>
                    <table border=1 align='center'>
                        <tr>
                            <th>
                                Não foi feito nenhum abastecimento até o momento atual neste mesmo dia
                            </th>
                        </tr>
                    </table>
                </center>
            ";
        }

    ?>


</body>
</html>
