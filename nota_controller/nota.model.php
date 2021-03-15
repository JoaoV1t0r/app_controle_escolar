<?php

class Nota{
	private $id_prof;
	private $nome_aluno;
	private $materia;
	private $nota1;
	private $nota2;
	private $nota3;
	private $nota4;
	private $media;
	private $resultado_aluno;

	public function __set($value,$newValue){
		$this->$value = $newValue;
	}

	public function __get($value){
		return $this->$value;
	}
}