<?php 

	session_start();

	$nome_aluno = $_POST['nome_aluno'];
	$materia = $_SESSION['materia'];
	$nota1 = $_POST['nota1'];
	$nota2 = $_POST['nota2'];
	$nota3 = $_POST['nota3'];
	$nota4 = $_POST['nota4'];

	if ($nome_aluno == '' || $nota1 == '' || $nota2 == '' || $nota3 == ''  || $nota4 == '') {
		header('Location: cadastrar_nota.php?campo=vazio');
		die();
	}

	$media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;
	if ($media < 7) {
		$resultado_aluno = 'REPROVADO';
		
	}else{
		$resultado_aluno = 'APROVADO';
		
	}
	
	$dsn = 'mysql:host=localhost;dbname=db_controle_escolar';
	$usuario = 'root';
	$senha = '';
	try{

		$conexao = new PDO($dsn,$usuario,$senha);

		$query = "insert into tb_alunos(
				id_prof,nome_aluno,nota1,nota2,nota3,nota4,media,resultado_aluno,materia
			) value(
				:id_prof,:nome_aluno,:nota1,:nota2,:nota3,:nota4,:media,:resultado_aluno,:materia
		)";
			

		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id_prof', $_SESSION['id']);
		$stmt->bindValue(':nome_aluno', $_POST['nome_aluno']);
		$stmt->bindValue(':nota1', $_POST['nota1']);
		$stmt->bindValue(':nota2', $_POST['nota2']);
		$stmt->bindValue(':nota3', $_POST['nota3']);
		$stmt->bindValue(':nota4', $_POST['nota4']);
		$stmt->bindValue(':media', $media);
		$stmt->bindValue(':resultado_aluno', $resultado_aluno);
		$stmt->bindValue(':materia', $materia);
		$stmt->execute();		

	}catch(PDOException $e){
		echo "Erro: " . $e->getCode() . '<br> Mensagem: ' . $e->getMessage();
	}
	
	header('Location: cadastrar_nota.php');


?>