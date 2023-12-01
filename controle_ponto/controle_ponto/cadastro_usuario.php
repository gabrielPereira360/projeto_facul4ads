<?php
session_start();

// Se o usuário não estiver logado e tentar acessar a página diretamente pela url
// o mesmo será redirecionado para a tela de login
if(!isset($_SESSION['matricula']) || empty($_SESSION['matricula']))
{
  unset($_SESSION['matricula']);
  header('Location: index.php');
}

$matricula = $_SESSION['matricula']; 
?>

<!DOCTYPE html>
<html lang="pt-BR"> 
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="css/bootstrap.css">
  </head>

  <body>
    <div class="container" style="width: 400px; margin-top: 40px">
      
      <div style="text-align: right">
        <a href="menu.php" role="button" class="btn btn-success btn-sm" style="margin-left: 25px">Voltar</a>
      </div>
      
      <br>
      
      <h1><strong>Cadastrar Usuário</strong></h1>
      
      <form action="inserir_usuario.php" method="post">
        <div class="form-group">
          <label>Nome Usuário</label>
          <input type="text" name="nomeusuario" class="form-control" required="required" 
                 autocomplete="off"
                 placeholder="Nome completo do usuário">
        </div>
        <div class="form-group">
          <label>Matrícula Usuário</label>
          <input type="text" name="matriculausuario" class="form-control" required="required" 
                 autocomplete="off"
                 placeholder="Matrícula do usuário">
        </div>
        <div class="form-group">
          <label>Nível de acesso</label>
          <select name="nivelUsuario" class="form-control">
            <option value="3">Funcionário</option>
            <option value="1">Gerente</option>
            <option value="2">Supervisor</option>
          </select>
        </div>
        <div style="text-align: right">
          <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
        </div>
      </form>
    </div>
    
    
    <script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
</html>
