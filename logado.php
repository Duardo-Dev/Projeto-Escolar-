<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
      <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js></script>
      <title>Combustíves</title>

      <style>
        ul {
          list-style-type: none;
          margin: 0;
          padding: 0;
          overflow: hidden;
          background-color: #333;
        }

        li {
          float: left;
          background:deepskyblue;
        }

        li a {
          display: block;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          cursor:pointer;
        }

        li a:hover {
          transition: 0.3s;
          background-color:gray;
        }

        body{
          background:DarkSeaGreen;
        }

        h1{
          color:white;
          margin-left:750px;
          font-size:40px;
          font-style:italic;
        }

        th{
          font-size:40px;
          font-style:italic;
        }

        td{
          font-size:30px;
          font-style:italic;
        }

        button{
          margin-left:500px;
          border:none;
          background-color:deepskyblue;
          border-radius:25px;
          padding:10px;
          cursor:pointer;
        }

        button:hover{
          transition: 0.3s;
          background-color:gray;
          color:white;
        }

        strong{
          font-size:20px;
          margin-left:530px;
          margin-top:650px;
        }

        ol{
          text-align:center;
          position:absolute;
          color:white;
          font-size:30px;
          margin-left:750px;
        } 
      </style>
  </head>
  <body>

    <ul>
      <li><a class="active" href="index.php">SAIR</a></li>
      <ol>Petrol Combustíves</ol>
    </ul>

    <?php
      
      session_start();

     //Verifica se as Session existem
      if(!isset($_SESSION['user']) and !isset($_SESSION['password'])){
        header('location:login.php');
        exit;
      }

      echo "<strong> Seja Bem-vindo(a) ".$_SESSION['user']."!</strong><br><br>";
      echo'<a href="bomba.php"><button> Abastecer </button></a><br><br>';
    ?>
  </body>
</html>
