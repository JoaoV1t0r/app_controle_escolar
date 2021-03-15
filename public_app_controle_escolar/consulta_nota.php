<?php

  require('valida_acesso.php') ;
  $acao = 'recuperar'; 
  require('nota_controller.php')

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Controle Escolar</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 30px 0;
        width: 100%;
        margin: 0 auto;
      }
      .conteudo-geral{
        display: flex;
        flex-flow: row wrap;
        align-items: stretch;
        align-content: stretch;
        justify-content: space-between;
      }
      .conteudo{
        width: 290px;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-info">
      <a class="navbar-brand" href="home.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
          <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
        </svg>
        App Controle Escolar
      </a>
      <ul class="navbar-nav">
        <li class="nav-iten">
          <a href="logoff.php" class="nav-link">
            SAIR
          </a>
        </li>
      </ul>
    </nav>

    <div class="container">
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                Consulta de Notas: <?= $_SESSION['materia'];?>
              </h3>
            </div>
              
            <div class="conteudo-geral card-body">
              <? foreach ($relacao_notas as $aluno) { ?>
                <div class="conteudo card mb-2 bg-light">
                   <div class="card-body">
                      <h4 class="card-title">Nome: <?= $aluno['nome_aluno']?></h4>
                      <p class="card-text">Nota 1º Semestre: <?= $aluno['nota1'] ?></p>
                      <p class="card-text">Nota 2º Semestre: <?= $aluno['nota2'] ?></p>
                      <p class="card-text">Nota 3º Semestre: <?= $aluno['nota3'] ?></p>
                      <p class="card-text">Nota 4º Semestre: <?= $aluno['nota4'] ?></p>
                      <h6 class="card-subtitle mb-2 text-muted">Média: <?= $aluno['media']  ?></h6>
                      <h5 class="card-subtitle mb-2 text-muted">Resultado: <?= $aluno['resultado_aluno']  ?></h5>
                    </div>
                 </div>
              <? } ?>

            </div>
                <div class="card-consultar-chamado row mt-5">
                  <div class="col-6">
                    <a href="home.php" class="voltar btn btn-lg btn-warning btn-block" >Voltar</a>
                  </div>
                </div>
          </div>
        </div>
      </div>          
    </div>
        </div>
      </div>
    </div>
  </body>
</html>