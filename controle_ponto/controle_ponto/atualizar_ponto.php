<?php

// Se o usuário não estiver logado e tentar acessar a página diretamente pela url
// o mesmo será redirecionado para a tela de login
if (!isset($_SESSION['matricula']) || empty($_SESSION['matricula'])) {
  unset($_SESSION['matricula']);
  header('Location: index.php');
}

$matricula = $_SESSION['matricula'];

include "conexao.php";

$id = $_POST['id'];
$entradaExp = $_POST['entradaExp'];
$entradaAlm = $_POST['entradaAlm'];
$saidaAlm   = $_POST['saidaAlm'];
$saidaExp   = $_POST['saidaExp'];
$descricao  = $_POST['descricao'];

print $entradaAlm;

function formataData($date){
  $newDate = str_replace("/", "-", $date);
  $newDate = explode("-", $newDate);
  $newDate2 = explode(" ", $newDate[2]);
  
  return $newDate2[0]."-".$newDate[1]."-".$newDate[0]." ".$newDate2[1]."<br>";
}

$sql = "UPDATE `registro` SET 
  `inicio_expediente` ='$entradaExp',
  `inicio_almoco` ='$entradaAlm',
  `fim_almoco` ='$saidaAlm',
  `fim_expediente` ='$saidaExp',
  `descricao`='$descricao'
  WHERE iduser = $id;";


$res = mysqli_query($conn, $sql);

if($res==true){
    print "<script>alert('Editado com sucesso');</script>";
    print "<script>location.href='?page=listar_pontos';</script>";
}else{
    print "<script>alert('Não foi possível Editar');</script>";
    print "<script>location.href='?page=home';</script>";
}
?>