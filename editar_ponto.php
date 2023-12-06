<?php

// Se o usuário não estiver logado e tentar acessar a página diretamente pela url
// o mesmo será redirecionado para a tela de login
if (!isset($_SESSION['matricula']) || empty($_SESSION['matricula'])) {
  unset($_SESSION['matricula']);
  header('Location: index.php');
}

$matricula = $_SESSION['matricula'];


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <title>Editar Ponto</title>
  <link rel="stylesheet" href="css/bootstrap.css">

  <style>
    #tamanhoContainer {
      width: 700px;
    }

    .element::-webkit-input-placeholder {
      color: black;
      font-weight: bold;
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
  </style>

</head>

<body>
  <div class="container" id="tamanhoContainer">

    <h1 style="font-weight: 700; margin-bottom: 5%">Editar Ponto</h1>


    <form action="?page=atualizar_ponto" method="post">
      <input type="number" name="id" value="<?php echo $id; ?>" style="display: none;">
      <?php
      include "conexao.php";

      $sql = "SELECT * FROM `registro` where iduser = $id";
      $buscar = mysqli_query($conn, $sql);
      while ($array = mysqli_fetch_array($buscar)) {
        $iduser = $array['iduser'];
        $inicio_expediente = $array['inicio_expediente'];
        $inicio_almoco = $array['inicio_almoco'];
        $fim_almoco = $array['fim_almoco'];
        $fim_expediente = $array['fim_expediente'];
        $descricao = trim($array['descricao']);
      ?>
        <div class="form-group">
          <label for="entrada"><strong>Entrada</strong></label>
          <div class="input-group mb-3">
            <div class="input-group-append">
              <input type="datetime-local" name="entradaExp" value="<?= str_replace(" ", "T", $inicio_expediente); ?>">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="saidaAlmoco"><strong>Entrada Almoço</strong></label>
          <div class="input-group mb-3">
            <div class="input-group-append">
              <input type="datetime-local" name="entradaAlm" value="<?= str_replace(" ", "T", $inicio_almoco); ?>">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="saidaAlmoco"><strong>Saída Almoço</strong></label>
          <div class="input-group mb-3">
            <div class="input-group-append">
              <input type="datetime-local" name="saidaAlm" value="<?= str_replace(" ", "T", $fim_almoco); ?>">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="saidaExp"><strong>Saída</strong></label>
          <div class="input-group mb-3">
            <div class="input-group-append">
              <input type="datetime-local" name="saidaExp" value="<?= str_replace(" ", "T", $fim_expediente); ?>">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="descricao"><strong>Descrição</strong></label>
          <div class="input-group mb-3">
            <div class="input-group-append">
              <textarea class="element" name="descricao" rows="5" cols="33" minlength="20" maxlength="100"><?php echo htmlspecialchars($descricao, ENT_QUOTES, 'UTF-8') ?>
                  </textarea>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" > Atualizar</button>
        <a class="btn btn-primary"  href="?page=deleta_ponto&id=<?php echo $iduser; ?>">Excluir</a>
        <a class="btn btn-primary" href="?page=listar_pontos" role="button">Voltar</a>
      <?php } ?>
    </form>
  </div>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>