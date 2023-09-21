<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Informações dos frentistas</title>

        <style>
        a {
            text-decoration:none;
        }
        </style>
    </head>
    <body>
        <header align='center'>
            <a href="admapag.php"> Home</a> <span>>></span> <a href="mudar_info.php">Informações dos frentistas</a>
        </header>

        <?php
        
            session_start();

            
            include_once('connect.php');


           
            if(!isset($_SESSION['user']) and !isset($_SESSION['password'])){
                header('location:index.php');
                exit;
            
            }
            
            echo '<h1>Frentistas</h1>';

            //conexão com o banco.
            $conexao = new mysqli("localhost", "root", "", "venda_combustivel") or die("ERRO NO BANCO DE DADOS");

           //tipo 1(ADM), 0(Usuário)
            $sql = "SELECT * FROM frentista WHERE tipo = 0";

            $result = $conexao->query($sql);

         
            $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
                        
        ?>
        
        <div>

          
            <table class = "table table-bordered">
                <thead class="thead-dark">
                    <tr>
                    
                        <th scope = "col">ID do frentista</th>
                        <th scope = "col">Nome do frentista</th>
                        <th scope = "col">
                            
                        </th>
                        <th scope = "col">
                            
                        </th>
            
                    </tr>
                </thead>
                <tbody>
        
                <?php

                    
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                    
                        echo "<td>".$user_data['id_frentista']."</td>";
                        echo "<td>".$user_data['user']."</td>";
                        echo "<td>
                        <a href='edit.php?id_frentista=$user_data[id_frentista]'><button>Mudar informações</button>
                        </td>";
                        echo "<td>";
                        echo"<a href='excluir.php?id_frentista=$user_data[id_frentista]'><button id = 'exit'>Deletar frentista</button> <span class = 'bi bi-pencil '></span>";
                        echo "</td>";
                        echo"</tr>";
                    }
            
                ?>
            </table>
        </div>
        


    </body>
</html>
<style>
    body{
        background:darkseagreen;
    }
    tr{
        background:gainsboro;
    }
    button{
        border-radius:15px;
        border:none;
        background-color:deepskyblue;
        padding:10px;
        cursor:pointer;
    }
#exit{
        border-radius:12px;
        border:none;
        background-color:rgba(255,0,0,0.7);
        padding:10px;
        cursor:pointer;
    }
    #exit:hover{
        transition:0.3s;
        background-color:gray;
        color:white;
    }
    button:hover{
        transition:0.3s;
        background-color:gray;
        color:white;
    }
</style>
