<!DOCTYPE html>
<html lang="br">
  <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tela de Login</title>

      <style>
        a {
          text-decoration:none;
        }
      </style>

      <header align='center'>
        <a href="index.php"> Petrol Combustíveis </a> <span> >> </span> <a href="#"> Login </a>
      </header>
  </head>

  </body>
    <?php
      echo "
        <form method='post' action='login_sql.php'>
        
          <div class='container py-5 h-100'>
            <div class='row d-flex justify-content-center align-items-center h-100'>
              <div class='col-12 col-md-8 col-lg-6 col-xl-5'>
                <div class='card bg-secondary text-white' ;'>
                  <div class='card-body p-5 text-center'>
                  <h2 class='fw-bold mb-2 text-uppercase'>Login</h2>
                    <div class='mb-md-5 mt-md-4 pb-5'>
                   
                  
          
                     

                      <div class='form-outline form-blue mb-4'>
                      <label class='form-label' for=''typeTexTX'>USUÁRIO</label>
                      <input type='text'placeholder = 'Digite seu nome' class='form-control form-control-lg' name= 'user'/>
                        
                      </div>

                      <div class='form-outline form-white mb-4'>
                      <label class='form-label' for='typePasswordX' name='password'>SENHA</label>
                      <input type='password' placeholder = 'Digite sua senha' id='typePasswordX' name='pass' class='form-control form-control-lg'/>
                        
                      </div>

                      <input type='submit' class='btn btn-primary' id= 'a' value='Entrar'><br><br>
                      <a href ='index.php' class='btn btn-danger' id = 'b'>Voltar</a><br><br>

                    </div>

                    <div>
                      <p class='mb-0'> Esqueceu a senha?<a href='esqueciasenha.php' class='text-white-100 fw-bold'> Recupere já!</a> </p>
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
.card{
  background:lightgray;
}
#a{
  width: 350px;
  margin-left:0px;
}
#b{
  width: 350px;
  margin-left:0px;
}
</style>
