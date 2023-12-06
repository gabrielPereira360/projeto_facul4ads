<head>
  <title>Colaboradores</title>
  <style>
    .btn-primary{
      background-color: #4C4570;
      border: none;
    }

    .btn-primary:hover{
      background-color: #6D639C;
    }

    .btn-primary:active{
      background-color: #B3AADF !important;
    }
  </style>
</head>

<!-- CONTEUDO -->
<h1 style="font-weight: 700; margin-left: 10%">Tela de Colaboradores</h1>
<div class="container" style="margin-top: 100px">
  <div class="row">
    <?php
    if ($nivel == 1) {
    ?>
      <div class="col-sm-6" style="margin-top: 20px">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Adicionar Usuário</h5>
            <p class="card-text">Opção para adicionar usuário com permissão já incluída e com cadastro sem necessidade de aprovação.</p>
            <a href="?page=cad_user" class="btn btn-primary">Adicionar Usuário</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6" style="margin-top: 20px">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Listar Usuário</h5>
            <p class="card-text">Opção para visualizar dados dos usuários cadastrados no sistema.</p>
            <a href="?page=listar_user" class="btn btn-primary efeito" style="margin-top: 5%;">Listar Usuários</a>
          </div>
        </div>
      </div>
    <?php
    }
    if (($nivel == 2) || ($nivel == 3)) {
    ?>
      <div class="col-sm-6" style="margin-top: 20px">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Listar Meus Dados</h5>
            <p class="card-text">Opção para listar os dados do usuário logado no Sistema.</p>
            <a href="?page=lista_dados" class="btn btn-primary efeito">Mostrar meus dados</a>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</div>