<?php
    session_start();
    require_once 'connect.php';
   
    $user = $_POST['login_user'];
    $password = $_POST['password_user'];
    $result = $con -> query("UPDATE `frentista` SET `id_frentista`='null',`user`='$user',`password`='$password',`tipo`='0')");
    
    header('location:login.php');  
    exit();
    ?>
?>