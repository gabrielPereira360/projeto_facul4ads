<?php
session_start();
$_SESSION['matricula'] = $_POST['matricula'];
$senha = $_POST["senha"] ?? "";

// Se o usuário não estiver logado e tentar acessar a página diretamente pela url
// o mesmo será redirecionado para a tela de login
if(!isset($_SESSION['matricula']) || empty($_SESSION['matricula']))
{
  unset($_SESSION['matricula']);
  print ("<script>window.location.href = 'index.php'; alert(\"Usuário ou senha incorretos\")</script>");
}

$matricula = $_SESSION['matricula']; 

include "conexao.php";

$sql = "SELECT matricula_usuario, senha_usuario FROM `usuarios` WHERE matricula_usuario = $matricula and senha_usuario = $senha;";
$buscar = mysqli_query($conn, $sql);

$total = mysqli_num_rows($buscar);

if($total > 0 )
{
  $_SESSION['matricula'] = $matricula;
  header("Location: menu.php");
}
else{
  unset ($_SESSION['matricula']);
  print ("<script>window.location.href = 'index.php'; alert(\"Usuário ou senha incorretos\")</script>");
}
?>
