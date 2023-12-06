<?php


// Se o usuário não estiver logado e tentar acessar a página diretamente pela url
// o mesmo será redirecionado para a tela de login
if (!isset($_SESSION['matricula']) || empty($_SESSION['matricula'])) {
  unset($_SESSION['matricula']);
  header('Location: index.php');
}

$matricula = $_SESSION['matricula'];

include "conexao.php";

$sql = "SELECT * FROM `usuarios` where id_usuario = $id";

$buscar = mysqli_query($conn, $sql);
while ($array = mysqli_fetch_array($buscar)) {
  $matriculausuario = $array['matricula_usuario'];
}

if ($matricula == $matriculausuario) {
  print "<script>alert('Não é possível excluir um administrador por aqui!');</script>";
  print "<script>location.href='?page=home';</script>";
} else {
  $sql = "DELETE FROM `usuarios` WHERE id_usuario = $id;";


  $res = mysqli_query($conn, $sql);


  if ($res == true) {
    print "<script>alert('Exclusão com sucesso');</script>";
    print "<script>location.href='?page=home';</script>";
  } else {
    print "<script>alert('Não foi possível excluir');</script>";
    print "<script>location.href='?page=home';</script>";
  }
}
