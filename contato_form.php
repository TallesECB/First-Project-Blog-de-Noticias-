<?php
$nome = "";
$numero = "";
$email = "";  
$texto = "";
$enviar = "";	
$vetErros = array();  
//isset descobre se uma variável está criada

if(isset($_REQUEST['nome'])){
	$nome = $_REQUEST['nome'];
	if(strlen($nome) == 0){
		$vetErros['nome'] = "Nome é obrigatorio";                                     
	}
}

if(isset($_REQUEST['numero'])){
	$numero = $_REQUEST['numero'];
	if(strlen($numero) == 0){
		$vetErros['numero'] = "Numero é obrigatorio";                                  
	}
}

if(isset($_REQUEST['email'])){
	$email = $_REQUEST['email'];
	if(strlen($email) == 0){
		$vetErros['email'] = "Email é obrigatorio";                                  
	}
}

if(isset($_REQUEST['texto'])){
	$texto = $_REQUEST['texto'];
	if(strlen($texto) == 0){
		$vetErros['texto'] = "Texto é obrigatorio";                                  
	}
}

//testa se o botao enviar foi pressionadoa
if(isset($_REQUEST['enviar'])){
	//testa se aconteceu algum erro de validacao
	if (count($vetErros) == 0){
			$nome = $_REQUEST['nome'];
			$numero = $_REQUEST['numero'];
			$email = $_REQUEST['email'];
			$texto = $_REQUEST['texto'];
			$sql = "insert into pessoa (nome,numero,email,texto) values ('$nome','$numero','$email','$texto')";
			echo("$sql<br>");
			try {
				//$link foi criado no conecta.php
				$consulta = $link->prepare($sql);
				$consulta->execute();
				echo ("Incluido com sucesso!<br>");
			}
			catch(PDOException $ex){
				echo($ex->getMessage());
			}	
		echo("Enviado com sucesso!<br>");
		//zerar as variaveis nome e cidade, apos enviado
		$numero = "";
		$email = "";
		$nome = "";
		$texto = "";
	}
	else {
		//se aconteceu, monstra as mensagens correspondentes
		foreach ($vetErros as $key => $value) {
			echo ("$value <br>");
		}
	}
}	

?>
<!DOCTYPE html>
<html lang="pt-BR">

  <head>
    <meta charset="UTF-8">
    <meta name="description" content="Curiosidades sobre Jogos">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Talles Eduardo"> 
    <title>Fale Conosco</title>
    <link rel="stylesheet" type="text/css" href="css/contato.css">

  </head>
      <body class="contato">
		<!-- Início container -->
		<div id="container">

	      <!-- Início topo -->
	      <div id="topo"> 
	        <h1 class="logo">Notícias G10</h1>
	        <ul id="navegacao">
	          <li class="primeiro">
	            <a id="home" href="index.php">Home</a>
	          </li>
	          <li>
	            <a id="contato" href="contato.php">Contato</a>
	          </li> 
	          <li>
	            <a id="sobre" href="sobre.php">Sobre</a>
	          </li>
	        </ul>
	      </div><!-- fim /topo -->

      <body style="background-image: url('imagens/registro.png');background-size: cover"> 
      	<br><br>
		<div id="paidetodos">
			<form method="post">
		     <h1> Formulario de Contato</h1>
		     <br>
			     <p class="name">
			         Nome Completo: <input type="text"
			        name="nome" size="25" value="<?=$nome?>"/>
			      </p><br>
			      <p class="numerocontato">
			         Número Para Contato: <input type="text"
			        name="numero" size="15" value="<?=$numero?>"/>
			      </p><br>
			      <p class="email">
			         Endereço de Email Para Contato: <input type="text"
			        name="email" size="25" value="<?=$email?>"/>
			      </p><br>
		      <p class="estado">
		        Estado Civil
		        <select name="estadocivil" value="<?=$estadocivil?>">
			        <option value="solteiro">Solteiro</option>
			        <option value="casado">Casado</option>
			        <option value="divorciado">Divorciado</option>
			        <option value="viúvo">Viúvo</option>
			        <option value="lagrimas">Em Lagrimas</option>     
		        </select> 
		      </p>   <br>
		    <div>
		      <h2>Fale Conosco</h2>
		        <label>
		          <textarea rows="5" cols="50" name="texto" value="<?=$texto?>"></textarea>
		        </label>
		        <br>
		        <label>
		          <select value="<?=$Selecione?>" name="Selecione">
		            <option value="" disabled selected>Selecione seu Gênero</option>
		            <option value="">Masculino</option>
		            <option value="">Feminino</option>
		          </select>
		        </label>
		        <br>
		        <br><br>
		        <label class="form" value="<?=$form?>" name="form">
		          <input type="checkbox">Dúvidas
		          <input type="checkbox">Reclamações
		          <input type="checkbox">Sugestões
		          <input type="checkbox">De sua opnião
		        </label>
		        <br><br>
		        <label>
		          <button type="submit" name="enviar" value="Enviar">Enviar</button>
		        </label>
		      </form> 
		    </div>
		</div>
    <br><br><br><br><br><br><br>
    <div id="container-rodape" style="clear: both;">
      <div id="rodape"><center>
        &copy; Copyright 2019 Noticias G10 - Talles Balardin / Alison Orcelli
      </div></center>
    </div>    
 	</body>

</html>
