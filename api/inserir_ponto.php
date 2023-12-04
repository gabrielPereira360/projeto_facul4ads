<?php

// Se o usuário não estiver logado e tentar acessar a página diretamente pela url
// o mesmo será redirecionado para a tela de login
if (!isset($_SESSION['matricula']) || empty($_SESSION['matricula'])) {
  unset($_SESSION['matricula']);
  header('Location: index.php');
}

$matricula = $_SESSION['matricula'];

include "conexao.php";

$entradaExp = $_POST['entradaExp'];
$entradaAlm = $_POST['entradaAlm'];
$saidaAlm   = $_POST['saidaAlm'];
$saidaExp   = $_POST['saidaExp'];
$descricao  = $_POST['descricao'];

function formataData($date)
{
  $newDate = str_replace("/", "-", $date);
  $newDate = explode("-", $newDate);
  $newDate2 = explode(" ", $newDate[2]);

  return $newDate2[0] . "-" . $newDate[1] . "-" . $newDate[0] . " " . $newDate2[1] . "<br>";
}

$sql = "INSERT INTO `registro` (`inicio_expediente`, `inicio_almoco`, 
                                `fim_almoco`, `fim_expediente`, `descricao`, `userid`)
        VALUES('" . formataData($entradaExp) . "', '" . formataData($entradaAlm) . "', '" .
  formataData($saidaAlm) . "', '" . formataData($saidaExp) . "', '$descricao', $matricula)";

$inserir = mysqli_query($conn, $sql);

if($inserir==true){
  print "<script>alert('Ponto Adicionado com sucesso');</script>";
  print "<script>location.href='?page=home';</script>";
}else{
  print "<script>alert('Não foi possível adicionar o ponto');</script>";
  print "<script>location.href='?page=home';</script>";
}

?>

<title>Ponto Marcado</title>