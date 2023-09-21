<?php

   //Esee arquivo ira destruir a sessaão do usuário, e redireciona-lo para a tela de login.
    session_start();
    session_destroy();

    $_SESSION = array();
    header('location:index.php');
?>
