<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci a senha</title>

    <?php
        include_once 'connect.php';
        if($_POST){

            $email = $_POST['email'];
            $check_email = mysqli_query($con, "SELECT * FROM frentista where email='$email'");

            $res = mysqli_num_rows($check_email);

            if($res>0){
                $message = "
                    <div>
                        <p> Hello!</p>
                        <p> Você está recebendo isso porque nos recebemos um pedido para resetar a senha da sua conta</p>
                        <p>
                            <button> <a href='resetarSenha.php?secret=".base64_encode($email)."'> Resetar senha </a></button>
                        </p> <br>
                        <p>
                            Se você não pediu, não faça as futuras ações requisitadas
                        </p>
                    </div>
                ";

                if(mail($email, 578, $message)){
                    echo "deu certo";
                }
  
            } else {
                echo "não existe esse email";
            }
        }
    ?>
</head>
<body>
    <form method='post'>
        <label>
            <span> Insira o email cadastrado </span>
            <input type='email' name='email' id='email' required data-parsley-type='email' data-parsley-trigger='keyup'/>
        </label>

        <input type='submit' id='login' name='pwdrst' value='Enviar link de recuperação'/>

        <p class='error'>
            <?php if(!empty($msg)) { echo $msg; };?>                
        </p>
    </form>
    
</body>
</html>