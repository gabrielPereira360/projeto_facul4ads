<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <title>Acesso ao Sistema</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <div class="container__principal">
    <div class="container__principal__imagem">
      <img class="principal__imagem" src="img/logo_etaure.svg" alt="Logo da Empresa Etaure">
    </div>
    <form class="principal__form" action="index1.php" method="post">
      <div class="principal__form__group">
        <div class="principal__form__label">
          <img class="principal__form__group__img" src="img/user.svg" alt="Logo representativa de usuario">
          <label class="principal__form__texto">Matricula</label>
        </div>
        <input class="principal__form__input" type="number" name="matricula" placeholder="Informe sua matrícula" autocomplete="off" min="0" required="required">
      </div>
      <div class="principal__form__group">
        <div class="principal__form__label">
          <img class="principal__form__group__img" src="img/cadeado.svg" alt="Logo representativa de usuario">
          <label class="principal__form__texto">Senha</label>
        </div>
        <input class="principal__form__input" type="password" name="senha" placeholder="Informe sua senha" autocomplete="off" required="required">
      </div>
      <div class="principal__form__button">
        <button class="principal__form__submit" type="submit">Entrar</button>
      </div>
    </form>
  </div>
</body>

</html>