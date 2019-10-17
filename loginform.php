<!DOCTYPE html>
<html>
	<head>
		<title>Blog - Noticias</title>
		<meta charset="utf-8">
   		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Estilo customizado -->
		<link rel="stylesheet" type="text/css" href="css/usuario.css">
	</head>
		<body class="home">
			<div id="login">
				<form method="post" action="login.php">
					<input type="text" name="user" placeholder="Usuário" size="8">
					<input type="password" name="pass" placeholder="Senha" size="8">
					<input type="submit" name="login" value="Logar">
				</form>	
			</div>
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
				<form action=" " method="post">
				  <label id="labelbuscar" for="busca">Buscar</label>
				  <div id="buscar">  
				    <input type="search" id="busca" name="campobusca">
						<button id="buttuonbuscar" type="submit" name="enviar">&#128269;<div id="buscartag"> Buscar </div></button>
				  </div>

				</form>
				<!-- Início conteudo -->
				<div id="conteudo">
					

				<?php 

				include("uploadnoticia/conecta.php");


				//inicializando varáveis
				//$inicial vai ser usada para o LIKE do SQL
				$data = "";
				//$sqlAux é uma variável que será usada para modificar 
				//a variável $sql original
				$sqlAux = "";
				//$ordenacao irá conter a forma de ordenação do SQL (ASC ou DESC)
				$ordenacao = "desc";
				$campobusca = "";
				//se o botao enviar foi pressionado
				if(isset($_REQUEST['enviar'])){
					//atribui às variáveis os campos de $_REQUEST
					$campobusca = $_REQUEST['campobusca'];
				}
				if(isset($_REQUEST['campobusca'])){
					$sql = "select cdpost,titulo,subtitulo,textonoticia,imagem from posts where titulo like '%$campobusca%' order by data $ordenacao";
				}else{
					$sql = "select cdpost,titulo,subtitulo,textonoticia,imagem from posts order by data $ordenacao";	
				} 
					

				//-----------------------------

				try {
					//$link foi criado no conecta.php
					$consulta = $link->prepare($sql);
					$consulta->execute();
					//enquanto tem registros disponíveis 
					//na consulta, copia cada um deles 
					//para o vetor associativo $registro 
					while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
						$cdpost = $registro['cdpost'];
						//acerta acentuação para UTF8
						$titulo = utf8_encode($registro['titulo']);
						$subtitulo = utf8_encode($registro['subtitulo']);
						$textonoticia = utf8_encode($registro['textonoticia']);
						$imagem = utf8_encode($registro['imagem']);
								echo('<div id="primario">');
										echo('<div class="caixa">');
											echo("<h2>$titulo - $cdpost</h2>");
											echo('<div class="caixa-conteudo">');
												echo("<h3>$subtitulo</h3>");
												echo("<img class='imagem-principal' src='uploadimagem/uploads/$imagem' width='100%'>");
												echo('<div id="texthover">');
													echo("<p style='max-width: 100%; word-break: break-all;'>");
														echo("$textonoticia");
													echo("</p>");
												echo('</div>');

											echo("</div>");
										echo("</div>");
								echo("</div>");
					}
				}
				catch(PDOException $ex){
					echo($ex->getMessage());
				}
				?>


					
				</div><!-- fim /conteudo -->

			</div><!-- fim /container -->	
			<div id="container-rodape" style="clear: both;">
				<div id="rodape">
				<a href="https://pt-br.facebook.com/talleseduardo.carpes"><img id="facebookimg" src="https://image.flaticon.com/icons/svg/1051/1051360.svg"></a>
					&copy; Copyright 2019 Noticias G10 - Talles Balardin / Alison Orcelli 
				<a href="https://www.instagram.com/tallesecb/"><img id="instagramimg" src="https://image.flaticon.com/icons/svg/1051/1051364.svg"></a>
				</div>
			</div>

	</body>

</html>				