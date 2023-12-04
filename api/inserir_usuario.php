<?php


// Se o usuário não estiver logado e tentar acessar a página diretamente pela url
// o mesmo será redirecionado para a tela de login
if(!isset($_SESSION['matricula']) || empty($_SESSION['matricula']))
{
  unset($_SESSION['matricula']);
  header('Location: index.php');
}

$matricula = $_SESSION['matricula'];

include "conexao.php";

$nomeusuario = $_POST['nomeusuario'];
$datanascusuario = $_POST['datanascusuario'];
$cpfusuario = $_POST['cpfusuario'];
$nisusuario = $_POST['nisusuario'];
$estadocivil = $_POST['estadocivilusuario'];
$telefone = $_POST['telefoneusuario'];
$cep = $_POST['cepusuario'];
$endereco = $_POST['enderecousuario'] ?? "";
$cidade = $_POST['cidadeusuario'] ?? "";
$estado = $_POST['estadousuario'] ?? "";
$numero = $_POST['numerousuario'];
$email = $_POST['emailusuario'];
$senha = $_POST['senhausuario'];
$matriculausuario = $_POST['matriculausuario'];
$nivelUsuario = $_POST['nivelUsuario'];

$sql = "INSERT INTO `usuarios`(`nome_usuario`, `matricula_usuario`, `senha_usuario`, `nivel_usuario`, `cpf_usuario`, `nis_usuario`, `estado_civil_usuario`, `telefone_usuario`, `cep_usuario`, `endereco_usuario`, `cidade_usuario`, `estado_usuario`, `email_usuario`, `numero_usuario`, `data_nasc`) VALUES ('$nomeusuario','$matriculausuario','$senha','$nivelUsuario','$cpfusuario','$nisusuario','$estadocivil','$telefone','$cep','$endereco','$cidade','$estado','$email','$numero','$datanascusuario')";
$inserir = mysqli_query($conn, $sql);

if($inserir==true){
  print "<script>alert('Usuário Cadastrado com sucesso');</script>";
  print "<script>location.href='?page=home';</script>";
}else{
  print "<script>alert('Não foi possível adicionar o usuário');</script>";
  print "<script>location.href='?page=home';</script>";
}
?>

<title>Inclusão de Usuário</title>
