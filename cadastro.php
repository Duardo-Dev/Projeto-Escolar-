<!DOCTYPE html>
<html lang="br">
<head>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de Cadastro</title>

  <style>
    body{
      background: DarkSeaGreen;
    }
    h2{
      color:black;
    }
    label{
      color:black;
    }
    a{
      text-decoration: none;
    }
  </style>


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
  
    const CPF = document.querySelector('CPF');
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

          } else {
            const outputElement = document.getElementById("result");
            outputElement.innerHTML = "CPF inválido!";
            document.getElementById('regist').style.display = "none";
          }
      }

  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" DEFER></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" DEFER></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" DEFER></script>
  <script src="main.js" DEFER></script>
</head>

       
<body>

  <header align='center'>
    <a href="admapag.php"> Home</a> <span> >> </span> <a href="#"> Cadastrar um novo frentista</a>
  </header>
<?php
echo "
    <form method='post' action='cadastro_sql.php'>
    <div class='container py-5 h-100'>
    <div class='row d-flex justify-content-center align-items-center h-100'>
      <div class='col-12 col-md-8 col-lg-6 col-xl-5'>
        <div class='card bg-secondary text-white' style='border-radius: 1rem;'>
          <div class='card-body p-5 text-center'>

          <img src='./imagens/icon.jpg' alt='foto'  height='170' width=center'>

            <div class='mb-md-5 mt-md-4 pb-5'>
  
              <h2 class='fw-bold mb-2 text-uppercase'>CADASTRO</h2>

              <div class='form-outline form-blue mb-4'>
                <label class='form-label' for=''typeTexTX'>NOME</label>
                <input type='text' class='form-control form-control-lg' name= 'user'/>
              </div>

              <div class='form-outline form-white mb-4'>
                <label class='form-label' for='password_user' >SENHA</label>
                <div id='impSenha'></div>
                <div id='impForcaSenha'></div>
                <div id='erroSenhaForca'></div> <br>
                <input type='password' class='form-control form-control-lg' name='password_user' id='password_user' required onkeyup='validarSenhaForca()'/>           
              </div>

              <div class='form-outline form-blue mb-4'>
                <label class='form-label' for='email'>EMAIL</label>
                <input type='email' class='form-control form-control-lg' name= 'email' id='email' required/>
              </div>

              <div class='form-outline form-blue mb-4'>
                <label class='form-label' for=''cpf'>CPF</label>
                <input type='text' class='form-control form-control-lg' name= 'cpf' id='cpf' required autocomplete='off' maxlength ='14' onkeyup='validar()'/>
                <div id='result'></div>
              </div>

              <div class='form-outline form-blue mb-4'>
                <label class='form-label' for='cep'>CEP</label>
                <input type='text' class='form-control form-control-lg' name= 'cep' id='cep' required/>
              </div>

              <div class='form-outline form-blue mb-4'>
                <label class='form-label' for='logradouro'>Rua</label>
                <input type='text' class='form-control form-control-lg' name= 'logradouro' id='logradouro' required/>
              </div>

              <div class='form-outline form-blue mb-4'>
                <label class='form-label' for='bairro'>BAIRRO</label>
                <input type='text' class='form-control form-control-lg' name= 'bairro' id='bairro' required/>
              </div>

              <div class='form-outline form-blue mb-4'>
                <label class='form-label' for='cidade'>CIDADE</label>
                <input type='text' class='form-control form-control-lg' name= 'cidade' id='cidade' required/>
              </div>

              <div class='form-outline form-blue mb-4'>
                <label class='form-label' for='uf'>UF</label>
                <input type='text' class='form-control form-control-lg' name= 'uf' id='uf' required/>
              </div>

              <center><button type='submit' class='btn btn-primary' id='regist'>Cadastrar</button> <center><br><br>
              <a href ='admapag.php' class='btn btn-danger'>Voltar</a><br><br>

            </div>

            <div>
              <p class='mb-0'>Já tem uma conta?<a href='login.php' class='text-white-100 fw-bold'>Faça Login!</a> </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</form>

";
?>
</body>
</html>