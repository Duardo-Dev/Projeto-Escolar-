<!-- Conexão com o BD -->
<?php
    $localhost = 'localhost';
    $bd = 'venda_combustivel';
    $pass = '';
    $root = 'root';

    $con = new mysqli($localhost,$root,$pass,$bd);
?>