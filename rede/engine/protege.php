<?php
session_start();
if(!empty($_SESSION["email"]) && !empty($_SESSION["senha"]) && !empty($_SESSION["id"])){

	$email = $_SESSION["email"];
	$senha = $_SESSION["senha"];
	$id_gen = base64_decode($_SESSION["id"]); 

	$autentica = mysqli_query($conecta, "SELECT * FROM user WHERE id='$id_gen' AND email='$email' AND senha='$senha';"); 
	$rs = mysqli_fetch_array($autentica);
	$id = $rs["id"]; 

	if (mysqli_num_rows($autentica) > 0) {
		class User extends conexao{
			public $conecta;
			public $id;
			public $email;
			public $nome;
			public $sobrenome;
			public $senha;
			public $foto;
			public $data_nasc;
			public $telefone;
			public $descricao;
			public $cidade;
			public $estado;
			public $regiao;
			public $pais;
			public $sexo;
			public $epp;
			public $hash_recup;
			public $hash_ativa;
			public $hash_email;
			
			function __construct(){
				$this->conecta = mysqli_connect($this->bd_server, $this->bd_user, $this->bd_pass, $this->bd_name);
				$this->id = base64_decode($_SESSION["id"]); 
				$csql = mysqli_query($this->conecta, "select * from user where id = '$this->id';");
				$rsql = mysqli_fetch_array($csql);
				$this->email = $rsql['email'];
				$this->nome = $rsql['nome'];
				$this->sobrenome = $rsql['sobrenome'];
				$this->senha = $rsql['senha'];
				$this->foto = $rsql['foto'];
				$this->data_nasc = $rsql['data_nasc'];
				$this->telefone = $rsql['telefone'];
				$this->descricao = $rsql['descricao'];
				$this->cidade = $rsql['cidade'];
				$this->estado = $rsql['estado'];
				$this->regiao = $rsql['regiao'];
				$this->pais = $rsql['pais'];
				$this->sexo = $rsql['sexo'];
				$this->epp = $rsql['epp'];
				$this->hash_recup = $rsql['hash_recup'];
				$this->hash_ativa = $rsql['hash_ativa'];
				$this->hash_email = $rsql['hash_email'];
			}
			function update($id){
				$csql = mysqli_query($this->conecta, "update user set 
					email = '$this->email', 
					nome = '$this->nome', 
					sobrenome = '$this->sobrenome', 
					senha = '$this->senha', 
					foto = '$this->foto',
					data_nasc = '$this->data_nasc', 
					telefone = '$this->telefone', 
					descricao = '$this->descricao', 
					cidade = '$this->cidade', 
					estado = '$this->estado', 
					regiao = '$this->regiao', 
					pais = '$this->pais', 
					epp = '$this->epp', 
					hash_recup = '$this->hash_recup',  
					hash_ativa = '$this->hash_ativa', 
					hash_email = '$this->hash_email' 
					where id = '$id';");
				if($csql){
					return 1;
				}else{
					return 0;
				}
			}
		}
		$user = new User;
		$mysqlq = mysqli_query($conecta, "SELECT * FROM user WHERE id='$id'"); 
		$row = mysqli_fetch_array($mysqlq);
	}else{
		header ("Location: sair.php");
	}
}else{
	header ("Location: logar.php");
	exit();
}

?>