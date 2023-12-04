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
  <title>Listagem dos Meus Dados</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://kit.fontawesome.com/8786c39b09.js"></script>
  <style>
    .navbar-nav {
      margin-left: 40px;
    }
  </style>
</head>

<body>
  <div class="container" style="margin-top: 40px; width: 100%">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <h1>Meus Dados</h1>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav" style="margin-left: 70%;">
          <a class=" nav-link active btn btn-primary efeito" href="?page=home" role="button" style="color: white; margin-left: 300%">Voltar</a>
        </div>
      </div>
    </nav>

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Nome do Usuario</th>
          <th scope="col">Matrícula</th>
          <th scope="col">CPF</th>
          <th scope="col">Telefone</th>
          <th scope="col">Email</th>

          <th>Ação</th>
        </tr>
      </thead>
      <?php
      include "conexao.php";

      $sql = "SELECT * FROM usuarios WHERE matricula_usuario = $matricula";
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
          <td><?php echo ($nome); ?></td>
          <td><?php echo ($matricula); ?></td>
          <td><?php echo ($cpf); ?></td>
          <td><?php echo ($telefone); ?></td>
          <td><?php echo ($email); ?></td>
          <td>
            <?php
            if (($nivel == 1) || $nivel == 2) {
            ?>
              <a class="btn btn-warning btn-sm" href="?page=editar_user&id=<?php echo $iduser; ?>" role="button">Visualizar
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