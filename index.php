<?php
//em todos os módulos da administração, incluir esta
//linha no topo
include ("verificalogin.php");
$titulo = "";
$subtitulo = "";  
$textonoticia = "";
$imagem = "";
$enviar = "";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Blog - Noticias</title>
		<meta charset="utf-8">

		<!-- Estilo customizado -->
		<link rel="stylesheet" type="text/css" href="css/adm.css">
		<style type="text/css">
		</style>
	</head>
	<body class="home">
		<!-- Início container -->
		<div id="container">
			<!-- Início topo -->
			<div id="topo">
				<h1 class="logo">Notícias G10</h1>
				<ul id="navegacao">
					<li class="primeiro">
						<a id="home" href="index.php">Inclui Noticia</a>
					</li>
					<li>
						<a href="indexaltera.php">Alterar Noticia</a>
					</li>
					<li>
						<a href="indexconsulta.php">Consulta Noticia</a>
					</li>
					<li>
						<a href="indexexclui.php">Exclui Noticia</a>
					</li>
				</ul>
			</div><!-- fim /topo -->
			<br><br><br><br>
			<div id="noticia">	
			       	<?php
			       		include("uploadnoticia/inclui.php");
					?>
			</div>
			<br><br><br>	
		</div><!-- fim /container -->	
		<div id="container-rodape">
			<div id="rodape"><center>
				&copy; Copyright 2019 Noticias G10 - Talles Balardin / Alison Orcelli
			</div></center>
		</div>

	</body>

</html>
