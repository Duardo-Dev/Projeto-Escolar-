<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js></script>
        <title>Combustíves</title>

        <ul>
            <li>
                <a href = "./sair.php" class = "active">Sair</a>
            </li>
            <ol>ADM</ol>
        </ul>

        <style>
            .active{
                background-color:lightskyblue;
            }

            li{
                border-right:1px solid #bbb;
            }

            ul{
                list-style-type:none;
                margin:0;
                padding:0;
                overflow:hidden;
                background-color:#333;
            }

            li{
                float:left;
            }

            li a {
                display:block;
                color:white;
                text-align:center;
                padding:14px 16px;
                text-decoration:none;
            }

            li a:hover{
                background-color:#222;
            }

            ol{
                text-align:center;
                position:absolute;
                color:lightblue;
                font-size:30px;
                margin-left:550px;
            }

        </style>
    </head>

    <body>

        <?php
            session_start();
        ?>

    </body>
</html>