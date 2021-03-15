<?php

class NotaService{
	private $conexao;
	private $nota;

	public function __construct(Conexao $conexao,Nota $nota){
		$this->conexao = $conexao->conectar();
		$this->nota = $nota;
	}

	public function cadastrarNota(){
		$query = "insert into tb_alunos(id_prof,nome_aluno,nota1,nota2,nota3,nota4,media,resultado_aluno,materia)value(:id_prof,:nome_aluno,:nota1,:nota2,:nota3,:nota4,:media,:resultado_aluno,:materia)";

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_prof', $this->nota->id_prof );
		$stmt->bindValue(':nome_aluno', $this->nota->nome_aluno );
		$stmt->bindValue(':nota1', $this->nota->nota1 );
		$stmt->bindValue(':nota2', $this->nota->nota2 );
		$stmt->bindValue(':nota3', $this->nota->nota3 );
		$stmt->bindValue(':nota4', $this->nota->nota4 );
		$stmt->bindValue(':media', $this->nota->media );
		$stmt->bindValue(':resultado_aluno', $this->nota->resultado_aluno );
		$stmt->bindValue(':materia', $this->nota->materia );
		$stmt->execute();
	}

	public function recuperar(){
		$query = "select * from tb_alunos where id_prof = :id_prof";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_prof', $this->nota->id_prof );
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}