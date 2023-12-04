<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <title>Acesso ao Sistema</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <style type="text/css">
    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>

<body>
  <div class="container" id="tamanho" style="border-radius: 20px; border: 2px solid #f3f3f3; width: 350px;">
    <div style="padding: 15px">
      <center>
        <img src="img/logo_etaure.svg" style="width: 100%; padding: 5%; margin-bottom: 5%">
      </center>
      <form action="index1.php" method="post">
        <div class="form-group">
          <label>Matricula</label>
          <input type="number" name="matricula" class="form-control" placeholder="Informe sua matrícula" autocomplete="off" min="0" required="required">
          <label style="margin-top: 10px;">Senha</label>
          <input type="password" name="senha" class="form-control" placeholder="Informe sua senha" autocomplete="off" required="required">
        </div>

        <div style="text-align: right">
          <button type="submit" class="btn btn-sm btn-success">Entrar</button>
        </div>
      </form>
    </div>
  </div>

  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>