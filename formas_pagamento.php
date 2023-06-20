<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formas de pagamento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <header align='center'>
        <a href="admapag.php"> Home </a> <span> >> </span> <a href="#"> Formas de Pagamento </a>
    </header>

    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php
        require_once 'connect.php';

        $sql = "SELECT * FROM formas_pagamento";
        $result = $con -> query($sql);

        echo "<center>";
        echo "<table border='2'>";
        echo "
            <tr>
                <th> Formas de pagamento</th>
            </tr>
        ";
        while($data = $result -> fetch_assoc()){
            echo "
                
                <tr>
                    <td>
                        ".$data['forma_pagamento']."
                    </td>
                </tr>
                ";
            }
        echo "</center>";
    ?>
</body>
</html>
<style>
    body{
        background:darkseagreen;
    }
    th{
        background:gainsboro;
        margin-top:110px;
    }
    td{
        background:gainsboro;
        
    }
</style>