<!doctype html>
<html lang="pt-br">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Login</title>
	<style>
		.card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
      .cadastro{
        text-align: center;
        margin-top: 10px;
        padding: 0;
      }
	</style>

</head>

<body>

	<nav class="navbar navbar-dark bg-info">
	  <a class="navbar-brand" href="#">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
		  <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
		</svg>
		Controle Escolar
	  </a>
	</nav>


	<div class="container">    
        <div class="row">

          <div class="card-login">
            <div class="card">
              <div class="card-header">
                Cadastro
              </div>
              <div class="card-body">
                <form action="user_controller.php?acao=cadastro" method="post">
                  <div class="form-group">
                    <input name="nome" type="name" class="form-control" placeholder="Nome">
                  </div>
                  <div class="form-group">
                    <input name="email" type="email" class="form-control" placeholder="E-mail">
                  </div>
                  <div class="form-group">
                    <input name="senha" type="password" class="form-control" placeholder="Senha">
                  </div>
                  <div class="form-group">
                    <input name="materia" type="text" class="form-control" placeholder="Matéria Ministrada">
                  </div>

                  <? if(isset($_GET['erro']) && $_GET['erro'] == '1'){ ?>

                    <div class="text-danger">
                      Preencha todos os campos.
                    </div>

                  <?} ?>

                  <? if(isset($_GET['erro']) && $_GET['erro'] == '2'){ ?>

                    <div class="text-danger">
                      Usuário já cadastrado. Use um E-mail diferente.
                    </div>

                  <? } ?>

                  <button class="btn btn-lg btn-info btn-block" type="submit">Cadastrar</button>
                </form>
                <p class="cadastro">Já possui uma conta? <a class="btn btn-info btn-sm" href="index.php">Faça Login</a> </p>
              </div>
            </div>
          </div>
      </div>
    </div>


</body>

</html>