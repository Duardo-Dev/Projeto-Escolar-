<header align='center'>
    <a href="admapag.php"> Home </a> <span> >> </span> <a href="mudar_info.php"> Informações dos frentistas</a> <span> >> </span> <a href="#"> Deletar o frentista</a>
</header>
<style>
    a {
        text-decoration: none;
    }
</style>

<?php
    
    include_once('connect.php');
    session_start();

    
    if(!empty($_GET['id_frentista'])){
        $id = $_GET['id_frentista'];

        $_SESSION['id_frentista'] = $id;

        
        $sql = "SELECT * FROM frentista WHERE id_frentista = $id";
       
        $result  = $con->query($sql);

        $sql_nota = "SELECT * from nota_fiscal where id_frentista = '$id'";
        $result_nota = $con -> query($sql_nota);

        if($result_nota -> num_rows > 0 ){

            echo "
                <h2> O frentista selecionado, possue dados importantes. Você como administrador, deseja mesmo deletar todos os dados relacionados a este frentista?</h2>
                <span> se sim, <a href='excluir_frentista_importante.php'> clique aqui </a></span>
            ";
        } else {
            
            if($result-> num_rows > 0){

                
                $sqldelete = "DELETE FROM frentista  WHERE id_frentista = $id";

                
                $resultdelete  = $con->query($sqldelete);

                
                header('location:mudar_info.php');
            } 
        }
 
    }

?>  