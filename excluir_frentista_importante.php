<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar frentista</title>
</head>
<body>
    <?php
        session_start();
        include_once 'connect.php';

        $id = $_SESSION['id_frentista'];

        $sql_dados = "DELETE from nota_fiscal where id_frentista = '$id'";
        $sql = "DELETE from frentista where id_frentista = '$id'";

        
        if($con -> query($sql_dados) === TRUE){
            if($con -> query($sql) === TRUE){
                header('location:mudar_info.php');
            }
        }
    ?>
</body>
</html>