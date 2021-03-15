<?php

require "../conexao.php";
require "../user_controller/user.service.php";
require "../user_controller/user.model.php";


$acao = $_GET['acao'];

if ($acao == 'login') {

	session_start();

	if (!empty($_POST['email']) && !empty($_POST['senha'])){

		$user = new User();
		$user->email = $_POST['email'];
		$user->senha_user = $_POST['senha'];

		$conexao = new Conexao();
		$user_service = new UserService($conexao, $user);

		$user_service->login();

	}else{
		header('Location: index.php?login=erro');
	}



} else if($acao == 'cadastro'){

	if($_POST['nome'] == '' || $_POST['email'] == '' || $_POST['senha'] == '' || $_POST['materia'] == ''){
		header('Location: cadastro_usuario.php?erro=1');
		die();
	}else{

		$user = new User();
		$user->nome = $_POST['nome'];
		$user->email = $_POST['email'];
		$user->senha_user = $_POST['senha'];
		$user->materia = $_POST['materia'];

		$conexao = new Conexao();
		$user_service = new UserService($conexao, $user);
		
		if ($user_service->validaEmail()){
			$user_service->cadastrar();
			echo "ok";
		}else{
			header('Location: cadastro_usuario.php?erro=2');
		}
	}
}
