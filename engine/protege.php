<?php
session_start();
if(!empty($_SESSION["login"]) && !empty($_SESSION["senha"]) && !empty($_SESSION["id"])){

	$login = $_SESSION["login"];
	$senha = $_SESSION["senha"];
	$id_gen = base64_decode($_SESSION["id"]); 

	$autentica = mysqli_query($conecta, "SELECT * FROM $tabela WHERE id='$id_gen' AND login='$login' AND senha='$senha';"); 
	$rs = mysqli_fetch_array($autentica);
	$id = $rs["id"]; 

	if (mysqli_num_rows($autentica) > 0) {
		class User{
			public $login;
			public $nome;
			public $sobrenome;
			public $senha;
			public $email;
			public $foto;
			public $epp;
			public $rec;
			public $data_nasc;
			public $telefone;
			public $telefone2;
			public $descricao1;
			public $descricao2;
			public $cidade;
			public $estado;
			public $regiao;
			public $pais;
			public $conecta;
			/*function set_conexao($conecta){
				$this->conecta = $conecta;
			}*/
			function __construct($conecta) {
			    $this->conecta = $conecta;
			}
			function start($id){
				$csql = mysqli_query($this->conecta, "select * from user where id = '$id';");
				$rsql = mysqli_fetch_array($csql);
				$this->login = $rsql['login'];
				$this->nome = $rsql['nome'];
				$this->sobrenome = $rsql['sobrenome'];
				$this->senha = $rsql['senha'];
				$this->email = $rsql['email'];
				$this->foto = $rsql['foto'];
				$this->epp = $rsql['epp'];
				$this->rec = $rsql['rec'];
				$csql = mysqli_query($this->conecta, "select * from perfil where id = '$id';");
				$rsql = mysqli_fetch_array($csql);
				$this->data_nasc = $rsql['data_nasc'];
				$this->telefone = $rsql['telefone'];
				$this->telefone2 = $rsql['telefone2'];
				$this->descricao1 = $rsql['descricao1'];
				$this->descricao2 = $rsql['descricao2'];
				$this->cidade = $rsql['cidade'];
				$this->estado = $rsql['estado'];
				$this->regiao = $rsql['regiao'];
				$this->pais = $rsql['pais'];
			}
			function update($id){
				$csql = mysqli_query($this->conecta, "update user set login = '$this->login', nome = '$this->nome', sobrenome = '$this->sobrenome', senha = '$this->senha', email = '$this->email', foto = '$this->foto', epp = '$this->epp', rec = '$this->rec'  where id = '$id';");
				$csql = mysqli_query($this->conecta, "update user set data_nasc = '$this->data_nasc', telefone = '$this->telefone', telefone2 = '$this->telefone2', descricao1 = '$this->descricao1', cidade = '$this->cidade', estado = '$this->estado', regiao = '$this->regiao', pais = '$this->pais'  where id = '$id';");
			}
		}
		$user = new User($conecta);
		$user->start($id);
		$mysqlq = mysqli_query($conecta, "SELECT * FROM user WHERE id='$id'"); 
		$row = mysqli_fetch_array($mysqlq);
		$mysqlq2 = mysqli_query($conecta, "SELECT * FROM perfil WHERE id='$id'");
		$row2 = mysqli_fetch_array($mysqlq2);
	}else{
		header ("Location: sair.php");
	}
}else{
	header ("Location: logar.php");
	exit();
}

?>