<?php

class User{

	private $nome;
	private $email;
	private $senha_user;
	private $materia;

	public function __set($value, $newValue){
		$this->$value = $newValue;
		return $this;
	}

	public function __get($value){
		return $this->$value;
	}
}