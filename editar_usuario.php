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
  <title>Dados de Usuário</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <style>
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

<body onLoad="consultarCEP()">

  <?php
  include "conexao.php";
  $sql = "SELECT * FROM `usuarios` where id_usuario = $id";

  $buscar = mysqli_query($conn, $sql);
  while ($array = mysqli_fetch_array($buscar)) {
    $iduser = $array['id_usuario'];
    $nomeusuario = $array['nome_usuario'];
    $datanascusuario = $array['data_nasc'];
    $cpfusuario = $array['cpf_usuario'];
    $nisusuario = $array['nis_usuario'];
    $estadocivil = $array['estado_civil_usuario'];
    $telefone = $array['telefone_usuario'];
    $cep = $array['cep_usuario'];
    $endereco = $array['endereco_usuario'] ?? "";
    $cidade = $array['cidade_usuario'] ?? "";
    $estado = $array['estado_usuario'] ?? "";
    $numero = $array['numero_usuario'];
    $email = $array['email_usuario'];
    $senha = $array['senha_usuario'];
    $matriculausuario = $array['matricula_usuario'];
    $nivelUsuario = $array['nivel_usuario'];
  }
  ?>

  <div class="container" style="width: 80%">

    <div style="text-align: right">
      <a href="?page=listar_user" role="button" class="btn btn-primary" style="margin-left: 25px">Voltar</a>
    </div>

    <br>

    <h1><strong>Dados do Usuário</strong></h1>

    <form id="meuFormulario" action="?page=atualizar_user" method="post">
      <input type="number" name="id" value="<?php echo $id; ?>" style="display: none;">
      <div class="form-group">
        <label>Nome Usuário</label>
        <input type="text" name="nomeusuario" class="form-control" required="required" autocomplete="off" placeholder="Nome completo do usuário" value="<?= $nomeusuario ?>">
      </div>
      <div class="form-group">
        <label>Data de Nascimento</label>
        <input type="date" name="datanascusuario" class="form-control" required="required" autocomplete="off" placeholder="DD/MM/AAAA" value="<?= str_replace(" ", "T", $datanascusuario); ?>">
      </div>
      <div class="form-group">
        <label>CPF</label>
        <input type="text" name="cpfusuario" id="cpf" class="form-control" required="required" maxlength="11" autocomplete="off" placeholder="Informe somente os números" value="<?= $cpfusuario ?>">
      </div>
      <div class="form-group">
        <label>Número do NIS</label>
        <input type="text" name="nisusuario" class="form-control" required="required" maxlength="11" placeholder="Informe somente os números" autocomplete="off" value="<?= $nisusuario ?>">
      </div>
      <div class="form-group">
        <label>Estado Civl</label>
        <select name="estadocivilusuario" class="form-control" value="<?= $estadocivil ?>">
          <option value="1">Solteiro</option>
          <option value="2">Casado</option>
        </select>
      </div>

      <hr style="border: 1px solid purple;">

      <div class="form-group">
        <label>Número de Telefone</label>
        <input type="text" name="telefoneusuario" class="form-control" required="required" autocomplete="off" placeholder="Informe somente os números" value="<?= $telefone ?>">
      </div>

      <div class="form-group">
        <label>CEP</label>
        <input type="text" name="cepusuario" id="cepusuario" class="form-control" required="required" autocomplete="off" placeholder="Informe somente os números" maxlength="8" value="<?= $cep ?>">
        <button type="button" class="btn btn-primary" style="margin-top: 2%;" onclick="consultarCEP()">Consultar</button>
      </div>
      <p id="resultado"></p>
      <hr style="border: 1px solid purple;">

      <div class="form-group">
        <label>Matrícula Usuário</label>
        <input type="text" name="matriculausuario" class="form-control" required="required" autocomplete="off" placeholder="Matrícula do usuário" value="<?= $matriculausuario ?>">
      </div>
      <div class="form-group">
        <label>Nível de acesso</label>
        <select name="nivelUsuario" class="form-control" value="<?= $nivelUsuario ?>">
          <option value="3">Funcionário</option>
          <option value="1">Gerente</option>
          <option value="2">Supervisor</option>
        </select>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="emailusuario" class="form-control" required="required" autocomplete="off" placeholder="Email do usuário" value="<?= $email ?>">
      </div>
      <div class="form-group">
        <label>Senha</label>
        <input type="text" name="senhausuario" class="form-control" required="required" autocomplete="off" placeholder="Senha do usuário" value="<?= $senha ?>">
      </div>

      <div style="text-align: left;margin-top: 40px">
        <button type="submit" onclick="validarFormulario()" class="btn btn-primary">Atualizar</button>
          <a class="btn btn-primary" href="?page=deleta_usuario&id=<?php echo $iduser; ?>" role="button" style="margin-left: 25px">Excluir</a>
        </div>
    </form>
  </div>


  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script>
    function validarCPF(cpf) {
      cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos

      if (cpf.length !== 11) {
        alert("CPF deve ter 11 dígitos.");
        return false;
      }

      // Verifica se todos os dígitos são iguais
      if (/^(\d)\1+$/.test(cpf)) {
        alert("CPF inválido.");
        return false;
      }

      // Calcula os dígitos verificadores
      let soma = 0;
      for (let i = 0; i < 9; i++) {
        soma += parseInt(cpf.charAt(i)) * (10 - i);
      }

      let resto = 11 - (soma % 11);
      let digito1 = (resto >= 10) ? 0 : resto;

      soma = 0;
      for (let i = 0; i < 10; i++) {
        soma += parseInt(cpf.charAt(i)) * (11 - i);
      }

      resto = 11 - (soma % 11);
      let digito2 = (resto >= 10) ? 0 : resto;

      // Verifica se os dígitos calculados são iguais aos fornecidos
      if (digito1 !== parseInt(cpf.charAt(9)) || digito2 !== parseInt(cpf.charAt(10))) {
        alert("CPF inválido.");
        return false;
      }
      return true;
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
                <input type="text" id="enderecousuario" name="enderecousuario" class="form-control" required="required" autocomplete="off" value="${endereco.logradouro}, ${endereco.bairro}">
              </div>
              <div class="form-group">
                <label>Cidade</label>
                <input type="text" id="cidadeusuario" name="cidadeusuario" class="form-control" required="required" autocomplete="off" value="${endereco.localidade}" >
              </div>
              <div class="form-group">
                <label>Estado</label>
                <input type="text" id="estadousuario" name="estadousuario" class="form-control" required="required" autocomplete="off" value="${endereco.uf}">
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
          document.getElementById('resultado').innerHTML = `Erro ao consultar o CEP`;
        }
      };

      xhr.send();
    }
  </script>

</body>

</html>