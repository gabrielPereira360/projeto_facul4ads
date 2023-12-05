<?php
session_start();

// Se o usuario não estiver logado e tentar acessar a página diretamente pela url
// o mesmo será redirecionado para a tela de login
if (!isset($_SESSION['matricula']) || empty($_SESSION['matricula'])) {
  unset($_SESSION['matricula']);
  header('Location: index.php');
}

$matricula = $_SESSION['matricula'];

include "conexao.php";

$sql = "SELECT * FROM usuarios WHERE matricula_usuario = $matricula;";
$buscar = mysqli_query($conn, $sql);
$arr = mysqli_fetch_array($buscar);
$nivel = $arr['nivel_usuario'];
$nome = $arr['nome_usuario'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <title>Tela Principal</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  

    .efeito:hover {
      transition: 0.5s;
      opacity: 0.7
    }
  </style>
</head>

<body>
  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="active">
      <a href="menu.php" style="display: flex; justify-content: center; align-items: center; margin-bottom: 20%;">
        <img class="efeito" src="img/logo-etaure-branco.svg" alt="Logo da Etaure" style="margin: 20px 0px 10px 0px; width: 60%;">
      </a>
      <ul class="list-unstyled components mb-5">
        <li class="active">
          <a href="?page=home" class="efeito"><span class="fa fa-home"></span> Home</a>
        </li>
        <li>
          <a href="?page=colaboradores" class="efeito"><span class="fa fa-user"></span> RH</a>
        </li>
        <li>
          <a href="?page=tela_ponto" class="efeito"><span class="fa fa-sticky-note"></span> Ponto</a>
        </li>
      </ul>

      <div class="footer">
      </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" style="padding: 1% 1%;">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

          <button type="button" id="sidebarCollapse" class="btn btn-primary efeito" style="padding: 10px 20px;">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">

              <li class="nav-item">
                <a href="index.php" class=" nav-link active btn btn-primary efeito"><span style="color: #FFFFFF; padding: 0 20px">Sair</span></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      </nav>
      <div class="container">
        <div class="row">
          <div class="col mt-5">
            <?php
            include("conexao.php");
            switch (@$_REQUEST["page"]) {
              case "home":
                include("home.php");
                break;

              case "colaboradores":
                include("colaboradores.php");
                break;


              case "tela_ponto":
                include("tela_ponto.php");
                break;
              case "adc_ponto":
                include("adicionar_ponto.php");
                break;
              case "inserir_ponto":
                include("inserir_ponto.php");
                break;

              case "lista_pontos_funcionarios":
                include("listar_pontos_funcionarios.php");
                break;
              case "editar_ponto_funcionarios":
                $id = $_GET['id'];
                include("editar_ponto_funcionarios.php");
                break;

              case "listar_pontos":
                include("listar_pontos.php");
                break;
              case "editar_ponto":
                $id = $_GET['id'];
                include("editar_ponto.php");
                break;
              case "atualizar_ponto":
                include("atualizar_ponto.php");
                break;
              case "deleta_ponto":
                $id = $_GET['id'];
                include("deleta_ponto.php");
                break;

              case "cad_user":
                include("cadastro_usuario.php");
                break;
              case "inserir_user":
                include("inserir_usuario.php");
                break;
              case "listar_user":
                include("listar_usuarios.php");
                break;
              case "editar_user":
                $id = $_GET['id'];
                include("editar_usuario.php");
                break;
              case "deleta_usuario":
                $id = $_GET['id'];
                include("deleta_usuario.php");
                break;
              case "atualizar_user":
                include("atualizar_usuario.php");
                break;
              case "lista_dados":
                include("listar_usuarios_funcionario.php");
                break;

              case "sair":
                include("sair.php");
                break;
              default:
                include("home.php");;
            }
            ?>
          </div>
        </div>
      </div>


      <script type="text/javascript" src="js/bootstrap.js"></script>
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
</body>

</html>