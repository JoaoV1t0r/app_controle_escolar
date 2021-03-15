<? require_once('valida_acesso.php') ; ?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Controle Escolar</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-abrir-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
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

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
              Abertura de chamado
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form action="nota_controller.php?acao=cadastrarNota" method="post" >
                    <div class="form-group">
                      <label>Nome do Aluno</label>
                      <input name="nome_aluno" type="text" class="form-control" placeholder="Nome do Aluno">
                    </div>

                    <div class="form-group">
                      <h3 class="form-group">Disciplina: <?php
                      echo $_SESSION['materia'];
                      ?></h3>
                    </div>
                    
                    <div class="form-group">
                      <label>Nota 1ª Semestre</label>
                      <input class="form-control" max="10" min="0" type="number" name="nota1">
                    </div>

                    <div class="form-group">
                      <label>Nota 2ª Semestre</label>
                      <input class="form-control" max="10" min="0" type="number" name="nota2">
                    </div>

                    <div class="form-group">
                      <label>Nota 3ª Semestre</label>
                      <input class="form-control" max="10" min="0" type="number" name="nota3">
                    </div>

                    <div class="form-group">
                      <label>Nota 4ª Semestre</label>
                      <input class="form-control" max="10" min="0" type="number" name="nota4">
                    </div>

                    <? if(isset($_GET['campo']) && $_GET['campo'] == 'vazio'){ ?>

                    <div class="text-danger">
                      Preencha todos os campos
                    </div>

                    <? } ?>


                    <div class="row mt-5">
                      <div class="col-6">
                        <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-info btn-block" type="submit">Cadastrar</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>