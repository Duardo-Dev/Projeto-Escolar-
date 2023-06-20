<!-- Não feito  -->
<?php

include_once('include.php');
return array(
  'driver' => 'smtp',
  'smtp' => array(
    'host' => 'sandbox.smtp.mailtrap.io',
    'port' => 2525,
    'username' => 'dudu.monte098@gmail.com',
    'password' => 'dudu2202',
    'timeout' => 5
  ),
  'newline' => "\r\n"
);


function verifica_dados($con){
    if(isset($_POST['env']) && $_POST['env'] == 'form' ){
$email = addslashes($_POST['email']);
        $sql = $con ->prepare("SELECT * FROM frentista WHERE email = ?");
        $sql -> bind_param("s", ($_POST['email']));
        $sql -> execute();
        $get = $sql ->get_result();
        $total  = $get->num_rows;
        if($total > 0 ){
           $dados = $get->fetch_assoc();
           add_dados_recover($con,$email);
           
        }else{
           
        }
    }

    }
    function add_dados_recover($con,$email){
        $rash = md5(rand());
        $sql  = $con ->prepare("INSERT INTO recover(email, rash) VALUES (?, ?)");
        $sql->bind_param("ss",$email , $rash);
      $sql -> execute();
      if($sql -> affected_rows > 0){
        enviar_email($con,$email, $rash);
      }
}
function enviar_email($con, $email, $md5){
$destinatario  = $email ;
$rash = $md5;

$subject = "RECUPERAR SENHA ";
$headers = "MIME-Version: 1.0 \r\n";
$headers .= "Content-Type: text/html; charset = UTF-8 \r\n";
$mensagem = "<html><head>";
$mensagem .= "
<h2>Voce solicitou uma nova senha?</h2>
<hr>
<h3>Se sim aqui esta o link para recuperar a sua senha :</h3>
<p>Para recuperar sua senha , acesse este link: <a href='".sitedir."?pagina=alterar&rash={$rash}'>".sitedir."?pagina=alterar&rash={$rash}</a></p>
<hr>
";
$mensagem .="</head></html>";

if(mail($destinatario,$subject,$mensagem,$headers)){

echo "<div class = 'alert alert-success'>Dados enviados com Sucesso!</div> ";
}else{
    echo "<div class = 'alert alert-danger'>Erro ao enviar os dados</div> ";
}
}
?>