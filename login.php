<?php
session_start();
if(isset($_REQUEST['login'])){
//login
	if($_REQUEST['login'] == 'Logar') {
		//pega os dados vindos do formulario
		@$senha = $_REQUEST['pass'];
		@$usuario = $_REQUEST['user'];
		//se senha e usuário estão ok
		//estes valores deverão posteriormente serem consultados no banco de dados!
		//aqui é sómente um exemplo !!!!!
		if (($usuario == "admin") && ($senha == '1234') ){
			//cria campo usuario na sessao
			$_SESSION['usuario'] = $usuario;
			//redireciona para o index
			header("Location: index.php");
		}
		else {
			//inclui o formulário de login para nova tentativa
			include("loginform.php");
			//dá mensagem de erro
			echo("Usuário ou senha inválido(s)");
		}
	}

//logout
	if($_REQUEST['login'] == 'Sair'){
		//destroi a sessao
		session_destroy();
		//redireciona para o index
		header("Location: index.php");
	}

}


?>