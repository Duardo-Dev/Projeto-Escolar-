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
        //pega o id do usuário, apartir da session.
        $id = $_SESSION['id_frentista'];
        //delete primeiramente o usuário das notas fiscais que ele esta incluida.
        $sql_dados = "DELETE from nota_fiscal where id_frentista = '$id'";
        //Depois ele deleta o usuário.
        $sql = "DELETE from frentista where id_frentista = '$id'";

        
        if($con -> query($sql_dados) === TRUE){
            if($con -> query($sql) === TRUE){
                header('location:mudar_info.php');
            }
        }
    ?>
</body>
</html>
