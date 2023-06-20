<?php
   
   
    session_start();

    
    require_once 'connect.php';
    

    $user = $_POST['user'];
    $pass = $_POST['pass'];


   
    $sql = "SELECT * FROM frentista WHERE user= '$user' AND `password` = '$pass'";

    
    $sql = $con->query("SELECT * FROM frentista WHERE user = '$user' AND `password` = '$pass' ");
    $result = mysqli_fetch_assoc($sql);



    
    if(isset($result)){


        
        $_SESSION['user'] = $result['user'];
        $_SESSION['password'] = $result['password'];
        $_SESSION['tipo'] = $result['tipo'];

        
        if($_SESSION['tipo'] == '1'){

                
                $_SESSION['id_user'] = $result['id_frentista'];
                $_SESSION['user'] = $result['user'];
                $_SESSION['password'] = $result['password'];
                $_SESSION['tipo'] = $result['tipo'];


                
                header("location:admapag.php");


        }elseif($_SESSION['tipo'] == '0'){

            $_SESSION['id_user'] = $result['id_frentista'];
            $_SESSION['user'] = $result['user'];
            $_SESSION['password'] = $result['password'];
            $_SESSION['tipo'] = $result['tipo'];

            
            header("location:logado.php");
        }

    
    }else{
        
        echo "
            <center>
                <h1> Usuário não encontrado, sentimos muito</h1>
                <span>
                    Caso seja do seu interesse, <a href='login.php'> Clique aqui</a> para voltar para a página de LOGIN
                </span>
                <br>
                <span> 
                    Caso tenha esquecido a senha, <a href=''#> Clique aqui</a> para recuperá-la
                </span>
            </center>
        ";
    }
?>