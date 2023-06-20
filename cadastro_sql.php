<?php
 session_start();
    require_once 'connect.php';
   
    
    $user = $_POST['user'];
    $password = $_POST['password_user'];
    $cep = $_POST['cep'];
    $cpf = $_POST['cpf'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $email = $_POST['email'];

    $sql_cpf = "SELECT * FROM frentista where cpf = '$cpf'";
    $result= $con -> query($sql_cpf);

    $sql_user = "SELECT * FROM frentista where user = '$user'";
    $result_user  = $con -> query($sql_user);


    
    if($result -> num_rows == 0 && $result_user -> num_rows == 0){
        $sql = "INSERT INTO frentista values('', '$user', '$password', 0, '$cpf', '$cep', '$email')";
        $result = $con -> query($sql);

    } 
    
    elseif( $result -> num_rows > 0){
        echo "
            <center>
            <h2>
                Já existe um frentista com esse CPF, caso tenha esquecido a senha, <a href='#'> Clique aqui</a>
            </h2>

            <a href='cadastro.php'>
                <button> Voltar para o cadastro </button>
            </a>
            </center>
        ";
    } 
    
    elseif ($result_user -> num_rows > 0){
        echo "
            <center>
            <h2>
                Já existe um frentista com esse User, tenha esquecido a senha, <a href='#'> Clique aqui</a>
            </h2>

            <a href='cadastro.php'>
                <button> Voltar para o cadastro </button>
            </a>
            </center>
        ";
    }
?>