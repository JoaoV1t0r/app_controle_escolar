<?php

class UserService{
	
	private $conexao;
	private $user;

	public function __construct(Conexao $conexao,User $user){
		$this->conexao = $conexao->conectar();
		$this->user = $user;
	}

	public function validaEmail(){
		$query = "select email from tb_professores where email = :email ";    
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':email', $this->user->email);
		$stmt->execute();
		$validacao_email = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (isset($validacao_email[0]['email']) && $validacao_email[0]['email'] == $this->user->email) {
			return false;
		}else{
			return true;
		}	
	}

	public function cadastrar(){
		$query = "insert into tb_professores(nome,email,senha,materia)value(:nome,:email,:senha,:materia) ";    
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':nome', $this->user->nome);
		$stmt->bindValue(':email', $this->user->email);
		$stmt->bindValue(':senha', $this->user->senha_user);
		$stmt->bindValue(':materia', $this->user->materia);
		$stmt->execute();
		header('Location: index.php?login=acesso1');
	}

	public function login(){

		$usuario_autenticado = false;
		$usuario_id = null;
		$materia_user = null;

		$query = "select * from tb_professores where email = :email AND senha = :senha ";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':email', $this->user->email);
		$stmt->bindValue(':senha', $this->user->senha_user);
		$stmt->execute();
		$usuario = $stmt->fetch();

		if ($this->user->email == $usuario['email'] && $this->user->senha_user == $usuario['senha']) {
			$usuario_autenticado = true;
			$usuario_id = $usuario['id'];
			$materia_user = $usuario['materia'];
		}
		if ($usuario_autenticado) {
			$_SESSION['autenticado'] = 'SIM';
			$_SESSION['id'] = $usuario_id;
			$_SESSION['materia'] = $materia_user;
			header('Location: home.php');
		}else{
			$_SESSION['autenticado'] = 'NAO';
			header('Location: index.php?login=erro');
		}
	}
}