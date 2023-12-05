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
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <title>Cadastro de Usuário</title>
  <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
  <div class="container" style="width: 80%">

    <div style="text-align: right">
      <a href="menu.php" role="button" class="btn btn-success btn-sm" style="margin-left: 25px">Voltar</a>
    </div>

    <br>

    <h1><strong>Cadastrar Usuário</strong></h1>

    <form id="meuFormulario" action="?page=inserir_user" method="post">
      <div class="form-group">
        <label>Nome Usuário</label>
        <input type="text" name="nomeusuario" class="form-control" required="required" autocomplete="off" placeholder="Nome completo do usuário">
      </div>
      <div class="form-group">
        <label>Data de Nascimento</label>
        <input type="date" name="datanascusuario" class="form-control" required="required" autocomplete="off" placeholder="DD/MM/AAAA">
      </div>
      <div class="form-group">
        <label>CPF</label>
        <input type="text" name="cpfusuario" id="cpf" class="form-control" required="required" maxlength="11" autocomplete="off" placeholder="Informe somente os números">
      </div>
      <div class="form-group">
        <label>Número do NIS</label>
        <input type="text" name="nisusuario" class="form-control" required="required" maxlength="11" placeholder="Informe somente os números" autocomplete="off">
      </div>
      <div class="form-group">
        <label>Estado Civl</label>
        <select name="estadocivilusuario" class="form-control">
          <option value="1">Solteiro</option>
          <option value="2">Casado</option>
        </select>
      </div>

      <hr style="border: 1px solid purple;">

      <div class="form-group">
        <label>Número de Telefone</label>
        <input type="text" name="telefoneusuario" class="form-control" required="required" autocomplete="off" placeholder="Informe somente os números">
      </div>
      <div class="form-group">
        <label>CEP</label>
        <input type="text" name="cepusuario" id="cepusuario" class="form-control" required="required" autocomplete="off" placeholder="Informe somente os números" maxlength="8">
        <button type="submit" class="btn btn-sm btn-success" style="margin-top: 2%;" onclick="consultarCEP()">Consultar</button>
      </div>
      <p id="resultado"></p>


      <hr style="border: 1px solid purple;">

      <div class="form-group">
        <label>Matrícula Usuário</label>
        <input type="text" name="matriculausuario" class="form-control" required="required" autocomplete="off" placeholder="Matrícula do usuário">
      </div>
      <div class="form-group">
        <label>Nível de acesso</label>
        <select name="nivelUsuario" class="form-control">
          <option value="3">Funcionário</option>
          <option value="1">Gerente</option>
          <option value="2">Supervisor</option>
        </select>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="emailusuario" class="form-control" required="required" autocomplete="off" placeholder="Email do usuário">
      </div>
      <div class="form-group">
        <label>Senha</label>
        <input type="password" name="senhausuario" class="form-control" required="required" autocomplete="off" placeholder="Senha do usuário">
      </div>

      <div style="text-align: right">
        <button type="submit" onclick="validarFormulario()" class="btn btn-sm btn-success">Cadastrar</button>
      </div>
    </form>
  </div>


  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script>
    function consultarCEP() { //Verifica o CEP
      // Obter o valor do CEP digitado pelo usuário
      var cep = document.getElementById('cepusuario').value;

      // Montar a URL da API do ViaCEP
      var url = `https://viacep.com.br/ws/${cep}/json/`;

      // Fazer uma requisição AJAX usando XMLHttpRequest
      var xhr = new XMLHttpRequest();
      xhr.open('GET', url, true);

      xhr.onload = function() {
        if (xhr.status == 200) {
          // Converter a resposta JSON para um objeto JavaScript
          var endereco = JSON.parse(xhr.responseText);

          // Verificar se o CEP é válido
          if (!endereco.erro) {
            // Exibir as informações na página
            document.getElementById('resultado').innerHTML = `
              <div class="form-group">
                <label>Endereço</label>
                <input type="text" id="enderecousuario" name="enderecousuario" class="form-control" required="required" autocomplete="off" value="${endereco.logradouro}, ${endereco.bairro}" readonly="on">
              </div>
              <div class="form-group">
                <label>Cidade</label>
                <input type="text" id="cidadeusuario" name="cidadeusuario" class="form-control" required="required" autocomplete="off" value="${endereco.localidade}" readonly="on">
              </div>
              <div class="form-group">
                <label>Estado</label>
                <input type="text" id="estadousuario" name="estadousuario" class="form-control" required="required" autocomplete="off" value="${endereco.uf}" readonly="on">
              </div>    
              <div class="form-group">
                <label>Número</label>
                <input type="test" id="numerousuario" name="numerousuario" class="form-control" required="required" autocomplete="off">
              </div>         
            `;
          } else {
            // Se o CEP for inválido, exibir uma mensagem de erro
            document.getElementById('resultado').innerHTML = `<strong>CEP não encontrado (Informe manualmente)</strong>,<br>
              <div class="form-group">
                <label>Endereço</label>
                <input type="text" id="enderecousuario" name="enderecousuario" class="form-control" required="required" autocomplete="off">
              </div>
              <div class="form-group">
                <label>Cidade</label>
                <input type="text" id="cidadeusuario" name="cidadeusuario" class="form-control" required="required" autocomplete="off">
              </div>
              <div class="form-group">
                <label>Estado</label>
                <input type="text" id="estadousuario" name="estadousuario" class="form-control" required="required" autocomplete="off">
              </div>    
              <div class="form-group">
                <label>Número</label>
                <input type="test" id="numerousuario" name="numerousuario" class="form-control" required="required" autocomplete="off">
              </div>         
            `;
          }
        } else {
          // Exibir uma mensagem de erro se a requisição falhar
          document.getElementById('resultado').innerHTML = 'Erro ao consultar o CEP';
        }
      };

      xhr.send();
    }
  </script>
     <script>
        function validarCPF(cpf) {
            cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos

            if (cpf.length !== 11) {
                alert("CPF deve ter 11 dígitos.");
                return false;
            }
        }

        function validarFormulario() {
            const cpfInput = document.getElementById("cpf");
            const cpf = cpfInput.value;

            if (validarCPF(cpf)) {
                // Faça algo quando o CPF for válido, como enviar o formulário
                const formulario = document.getElementById("meuFormulario");
                formulario.submit();
            }
        }
    </script>
</body>

</html>