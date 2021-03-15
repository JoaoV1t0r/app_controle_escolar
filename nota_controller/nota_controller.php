<?php

require '../nota_controller/nota.model.php';
require '../nota_controller/nota.service.php';
require '../conexao.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if ($acao == 'cadastrarNota') {

	session_start();

	$nota = new Nota();
	$nota->id_prof = $_SESSION['id'];
	$nota->nome_aluno = $_POST['nome_aluno'];
	$nota->materia = $_SESSION['materia'];
	$nota->nota1 = $_POST['nota1'];
	$nota->nota2 = $_POST['nota2'];
	$nota->nota3 = $_POST['nota3'];
	$nota->nota4 = $_POST['nota4'];

	if ($nota->nome_aluno == '' || $nota->nota1 == '' || $nota->nota2 == '' || $nota->nota3 == ''  || $nota->nota4 == '') {
		header('Location: cadastrar_nota.php?campo=vazio');
		die();
	}else{
		$nota->media = ($nota->nota1 + $nota->nota2 + $nota->nota3 + $nota->nota4) / 4;
		$nota->resultado_aluno = $nota->media > 7 ? 'APROVADO' : 'REPROVADO';

		$conexao = new Conexao();
		$notaService = new NotaService($conexao, $nota);

		$notaService->cadastrarNota();

		header('Location: cadastrar_nota.php');
	}
} else if($acao == 'recuperar'){
	$nota = new Nota();
	$nota->id_prof = $_SESSION['id'];

	$conexao = new Conexao();
	$notaService = new NotaService($conexao, $nota);

	$relacao_notas = $notaService->recuperar();
}

