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

     <!-- CONTEUDO -->
     <div class="container" style="margin-top: 100px">
       <div class="row">
         <div class="col-sm-6">
           <div class="card">
             <div class="card-body">
               <h5 class="card-title">Adicionar Registro de Ponto</h5>
               <p class="card-text">Opção para gravar marcações diárias dentro do expediente de trabalho.</p>
               <a href="?page=adc_ponto" class="btn btn-primary">Adicionar Registro</a>
             </div>
           </div>
         </div>
         <?php
          if ($nivel == 3) {
          ?>
           <div class="col-sm-6">
             <div class="card">
               <div class="card-body">
                 <h5 class="card-title">Listar Registros de Pontos</h5>
                 <p class="card-text">Opção para visualizar, editar e excluir registros cadastrados por este usuário.</p>
                 <a href="?page=lista_pontos_funcionarios" class="btn btn-primary">Listar Registros</a>
               </div>
             </div>
           </div>
         <?php
          }
          if (($nivel == 1) || $nivel == 2) {
          ?>
           <div class="col-sm-6">
             <div class="card" style="height: 100%;">
               <div class="card-body">
                 <h5 class="card-title">Editar/Excluir Ponto</h5>
                 <p class="card-text">Alteraração ou exclusão de pontos de funcionários.</p>
                 <a href="?page=listar_pontos" class="btn btn-primary" style="margin-top: 5%;">Gerenciar Pontos de funcionários</a>
               </div>
             </div>
           </div>
         <?php } ?>
       </div>
     </div>
     </div>
     </div>