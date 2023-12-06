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

function formataData($date)
{
  $newDate = explode("-", $date);
  $newDate2 = explode(" ", $newDate[2]);

  return $newDate2[0] . "-" . $newDate[1] . "-" . $newDate[0] . " " . $newDate2[1] . "<br>";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <title>Listagem de Ponto</title>
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
  </style>
</head>

<body>
  <div class="container" style="margin-top: 40px; width: 1000px">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h1 style="font-weight: 700;">Meus Pontos Registrados</h1>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav" style="margin-left: 27%;">
          <a class="btn btn-primary" href="?page=adc_ponto" role="button" style="color: white; width: 15em;">Registrar Ponto</a>
          <a class="btn btn-primary" href="?page=tela_ponto" role="button" style="color: white; margin-left: 5%">Voltar</a>
        </div>
      </div>
    </nav>

    <table class="table table-striped">
      <thead>
        <tr>
          <th style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 700;color: #4C4570;" scope="col">Matrícula</th> 
          <th style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 700;color: #4C4570;" scope="col">Nome</th>
          <th style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 700;color: #4C4570;" scope="col">Entrada</th>
          <th style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 700;color: #4C4570;" scope="col">Ida Almoço</th>
          <th style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 700;color: #4C4570;" scope="col">Volta Almoço</th>
          <th style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 700;color: #4C4570;" scope="col">Saída</th>

          <th style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 700;color: #4C4570;">Ação</th>
        </tr>
      </thead>
      <?php
      include "conexao.php";

      $sql = "SELECT * FROM registro INNER JOIN usuarios ON registro.userid = usuarios.matricula_usuario WHERE usuarios.matricula_usuario = $matricula ORDER BY inicio_expediente DESC;";
      $busca = mysqli_query($conn, $sql);

      while ($array = mysqli_fetch_array($busca)) {
        $iduser = $array['iduser'];
        $userid = $array['userid'];
        $nome = $array['nome_usuario'];
        $inicio_expediente = $array['inicio_expediente'];
        $inicio_almoco = $array['inicio_almoco'];
        $fim_almoco = $array['fim_almoco'];
        $fim_expediente = $array['fim_expediente'];
        $descricao = $array['descricao'];
      ?>
        <tr style="font-size: 14px">
          <td style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 600;color: #4C4570;"><?php echo ($userid); ?></td>
          <td style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 600;color: #4C4570;"><?php echo ($nome); ?></td>
          <td style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 600;color: #4C4570;"><?php echo formataData($inicio_expediente); ?></td>
          <td style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 600;color: #4C4570;"><?php echo formataData($inicio_almoco); ?></td>
          <td style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 600;color: #4C4570;"><?php echo formataData($fim_almoco); ?></td>
          <td style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 600;color: #4C4570;"><?php echo formataData($fim_expediente); ?></td>

          <td style="background: #CAC8D4; text-align:center;font-family: 'Montserrat', sans-serif;font-weight: 600;color: #4C4570;">
            <?php
            if (($nivel == 1) || $nivel == 2) {
            ?>
              <a class="btn btn-warning btn-sm" href="?page=editar_ponto_funcionarios&id=<?php echo $iduser; ?>" role="button">Visualizar
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