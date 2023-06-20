<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    
    <style>
      a {
        text-decoration: none;
      }
    </style>

    <script src="main.js" DEFER></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>

      
      $(document).ready(function() {
        
        $('#cep').on('blur', function() {
          var cep = $(this).val().replace(/\D/g, '');

         
          if (cep !== '') {

           
            var url = 'https://viacep.com.br/ws/' + cep + '/json/';


            
            $.getJSON(url, function(data) {

              
              if (!("erro" in data)) {

                
                $('#logradouro').val(data.logradouro);
                $('#bairro').val(data.bairro);
                $('#cidade').val(data.localidade);
                $('#uf').val(data.uf);
              }
            });
          }
        });
      });
    </script>   

    <script type = text/javascript>



      document.addEventListener("keydown", function(e) {

     
      if(e.keyCode === 13) {  
          e.preventDefault();
        }
      });

    
    const CPF = document.querySelector('cpf');

    
    function validarCPF(CPF) {

     
      CPF = CPF.replace(/[^\d]+/g, '');

      
      if (CPF == '') return false;
      
      if (CPF.length != 11) return false;

      
      var igual = true;

      
      for (var i = 1; i < CPF.length; i++) {
        if (CPF[i] != CPF[0]) {
          igual = false;
          break;
        }
      }

      
      if (igual == true) return false;

       
        var soma = 0;
        var resto;

       
        for (var i = 1; i <= 9; i++) {
          soma = soma + parseInt(CPF[i - 1]) * (11 - i);
      }


      
      resto = (soma * 10) % 11;


      
      if ((resto == 10) || (resto == 11)) {
        resto = 0;
      }


      
      if (resto != parseInt(CPF[9])) {
        return false;
      }

      soma = 0;
      
      for (var i = 1; i <= 10; i++) {
        soma = soma + parseInt(CPF[i - 1]) * (12 - i);
      }
        
      
      resto = (soma * 10) % 11;


      
      if ((resto == 10) || (resto == 11)) {
        resto = 0;
      }


      
      if (resto != parseInt(CPF[10])) {
        return false;
      }

        return true;
      }

  
      function validar(){



        const CPFValor = document.getElementById("cpf");

        
        const CPF = CPFValor.value;


        
        if (validarCPF(CPF)) {

          
          const outputElement = document.getElementById("result");

          
          outputElement.innerHTML = "CPF válido!";

          
          document.getElementById('regist').style.display = "block";


        } 
        
        else {
          
          const outputElement = document.getElementById("result");

          
          outputElement.innerHTML = "CPF inválido!";

         
          document.getElementById('regist').style.display = "none";
        }
      }

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" DEFER></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" DEFER></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" DEFER></script>
  </head>
  <body>
      <header align='center'>
          <a href="admapag.php"> Home</a> <span> >> </span> <a href="mudar_info.php">Informações dos frentistas</a> <span> >> </span> <a href="#"> Editar Informações do frentista</a>
      </header>
    <?php


      

      include_once  'connect.php';
      $id = $_GET['id_frentista'];

      
      $sql = "SELECT * FROM frentista where id_frentista = '$id'";

      
      $result  = $con->query($sql);

      $_SESSION['id'] = $id;

      
      if($result-> num_rows > 0){
        echo "
          <center>
            <main id='main'>
              <h1> Informações do Frentista</h1>
              <br><br>
              <form method='POST' action='save.php'>
        ";

        while($data = $result -> fetch_assoc()){

          echo "     
            <label>
              <span class='text'> <b>NOME</b> </span>
              <input type='text' class='form-control login-input' name='user' value=".$data['user']." placeholder='Digite o seu nome aqui' required/>
            </label>
          
            <br><br>

            <label>
              <span class='text'> <b>Senha</b> </span>
              <div id='impSenha'></div>
              <div id='impForcaSenha'></div>
              <div id='erroSenhaForca'></div> <br>
              <input type='password' class='form-control login-input'  name='password_user' id='password_user' value=".$data['password']." required onkeyup='validarSenhaForca()'/>
            </label>

            <label>
              <span class='text'> <b>Email</b> </span>
              <input type='email' class='form-control login-input' name='email' value=".$data['email']." required/>
            </label>

            <label>
              <span class='text'> <b>CPF</b> </span>
              <input type='text' class='form-control login-input'  name='cpf' id='cpf' value=".$data['CPF']." required autocomplete='off' maxlength ='14' onkeyup='validar()'/>
              <div id='result'></div>
            </label>

            <label>
              <span class='text'> <b>CEP</b> </span>
              <input type='text' class='form-control login-input'  name='cep' id='cep' value=".$data['CEP']." required/>
            </label>

            <label>
              <span class='text'> <b>Cidade</b> </span>
              <input type='text' class='form-control login-input'  id='cidade' required/>
            </label>

            <label>
              <span class='text'> <b>Bairro</b> </span>
              <input type='text' class='form-control login-input'  id='logradouro' required/>
            </label>

            <label>
              <span class='text'> <b>UF</b> </span>
              <input type='text' class='form-control login-input' id='uf' required/>
            </label>
          ";
        }

        echo "                        
          <br><br>
          <input type='submit' class='btn btn-primary' value='Enviar' id='regist'>
          </form>
          <a href = 'mudar_info.php' class = 'btn btn-danger'>VOLTAR</a>
          </main>
          <center>
        ";
      }
    ?> 
  </body>
</html>
