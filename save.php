<?php


session_start();


include_once('connect.php');



if($_POST){
  
    
    $id = $_SESSION['id'];
    $password = $_POST['password_user'];
    $user= $_POST['user'];
    $cep= $_POST['cep'];
    $cpf= $_POST['cpf'];
    $email= $_POST['email'];

    
    $sql ="UPDATE frentista SET user = '$user',`password` = '$password', CEP = '$cep', CPF = '$cpf', email = '$email' WHERE id_frentista  = '$id'";
    $resultado = $con -> query($sql);
    
}

//Volta para a tela de Administrador
header('location:admapag.php');
?>
