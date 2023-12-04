<?php

// Se o usuário não estiver logado e tentar acessar a página diretamente pela url
// o mesmo será redirecionado para a tela de login
if (!isset($_SESSION['matricula']) || empty($_SESSION['matricula'])) {
  unset($_SESSION['matricula']);
  header('Location: index.php');
}

$matricula = $_SESSION['matricula'];

include "conexao.php";

$iduser = $_POST['id'];
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



$sql = "UPDATE `usuarios` SET `nome_usuario`='$nomeusuario',`matricula_usuario`='$matriculausuario',`senha_usuario`='$senha',`nivel_usuario`='$nivelUsuario',`cpf_usuario`='$cpfusuario',`nis_usuario`='$nisusuario',`estado_civil_usuario`='$estadocivil',`telefone_usuario`='$telefone',`cep_usuario`='$cep',`endereco_usuario`='$endereco',`cidade_usuario`='$cidade',`estado_usuario`='$estado',`email_usuario`='$email',`numero_usuario`='$numero',`data_nasc`='$datanascusuario' WHERE `id_usuario` = $iduser";


$res = mysqli_query($conn, $sql);

if($res==true){
    print "<script>alert('Editado com sucesso');</script>";
    print "<script>location.href='?page=home';</script>";
}else{
    print "<script>alert('Não foi possível Editar');</script>";
    print "<script>location.href='?page=home';</script>";
}
?>