<?php

// Se o usuário não estiver logado e tentar acessar a página diretamente pela url
// o mesmo será redirecionado para a tela de login
if (!isset($_SESSION['matricula']) || empty($_SESSION['matricula'])) {
  unset($_SESSION['matricula']);
  header('Location: index.php');
}

$matricula = $_SESSION['matricula'];

include "conexao.php";

$sql = "SELECT nivel_usuario FROM usuarios WHERE matricula_usuario = $matricula";
$buscar = mysqli_query($conn, $sql);
$arr = mysqli_fetch_array($buscar);
$nivel = $arr['nivel_usuario'];

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <title>Listagem dos Usuários Cadastrados</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://kit.fontawesome.com/8786c39b09.js"></script>
  <style>
    .navbar-nav {
      margin-left: 40px;
    }

    .btn-primary {
      background-color: #4C4570;
      border: none;
    }

    .btn-primary:hover {
      background-color: #6D639C;
    }

    .btn-primary:active {
      background-color: #B3AADF !important;
    }

    .table {
      font-family: 'Montserrat', sans-serif;
      font-weight: 500 ;
      color: #4C4570;
    }

    .img:hover{
      opacity: 0.8;
    }
  </style>
</head>

<body>
  <div class="container" style="margin-top: 40px; width: 100vw;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <h1 style="font-weight: 700;">Usuários Cadastrados</h1>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav" style="margin-left: 90%;">
          <a class="btn btn-primary" href="?page=colaboradores" role="button" style="color: white;">Voltar</a>
        </div>
      </div>
    </nav>

    <table class="table" style="margin-top: 5%;">
      <thead>
        <tr>
          <th scope="col" style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 700;color: #4C4570;">Nome do Usuario</th>
          <th scope="col" style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 700;color: #4C4570;">Matrícula</th>
          <th scope="col" style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 700;color: #4C4570;">CPF</th>
          <th scope="col" style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 700;color: #4C4570;">Telefone</th>
          <th scope="col" style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 700;color: #4C4570;">Email</th>
          <th style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 700;color: #4C4570;">Ação</th>
        </tr>
      </thead>
      <?php
      include "conexao.php";

      $sql = "SELECT * FROM usuarios ORDER BY nome_usuario;";
      $busca = mysqli_query($conn, $sql);

      while ($array = mysqli_fetch_array($busca)) {
        $iduser = $array['id_usuario'];
        $nome = $array['nome_usuario'];
        $matricula = $array['matricula_usuario'];
        $cpf = $array['cpf_usuario'];
        $telefone = $array['telefone_usuario'];
        $email = $array['email_usuario'];
      ?>
        <tr style="font-size: 14px">
          <td style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 600;color: #4C4570;"><?php echo ($nome); ?></td>
          <td style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 600;color: #4C4570;"><?php echo ($matricula); ?></td>
          <td style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 600;color: #4C4570;"><?php echo ($cpf); ?></td>
          <td style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 600;color: #4C4570;"><?php echo ($telefone); ?></td>
          <td style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 600;color: #4C4570;"><?php echo ($email); ?></td>
          <td style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 600;color: #4C4570;">
            <?php
            if (($nivel == 1) || $nivel == 2) {
            ?>
              <a href="?page=editar_user&id=<?php echo $iduser; ?>"><img class="img" src="img/edit.svg" alt="Icone de Editar">
              </a>
            <?php } else
              echo "Sem permissão para alterar ou excluir. Solicite ao seu Gerente/Supervisor"
            ?>
          </td>
        <?php } ?>
        </tr>
    </table>
  </div>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>