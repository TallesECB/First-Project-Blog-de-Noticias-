<?php
//em todos os módulos da administração, incluir esta
//linha no topo
include ("verificalogin.php");
$titulo = "";
$subtitulo = "";  
$textonoticia = "";
$enviar = "";	
$vetErros = array();  
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Blog - Noticias</title>
		<meta charset="utf-8">

		<!-- Estilo customizado -->
		<link rel="stylesheet" type="text/css" href="css/adminedit.css">
		<style type="text/css">
			input[type=file]{
				height: 20px;
			    border:1px solid #000000;
			    background:#BEBEBE;
			    border-color: #1C1C1C;
			    border-radius: 10px;
			    -moz-border-radius:10px;
			    -webkit-border-radius:10px;
			    -moz-box-shadow: 1px 1px 2px blue;
			    -webkit-box-shadow: 1px 1px 2px blue;
			}   
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
						<a href="index.php">Inclui Noticia</a>
					</li>					
					<li>
						<a href="indexaltera.php">Alterar Noticia</a>
					</li>
					<li>
						<a id="home" href="indexconsulta.php">Consulta Noticia</a>
					</li>					
					<li>
						<a href="indexexclui.php">Exclui Noticia</a>
					</li>
				</ul>
			</div><!-- fim /topo -->
			<br><br><br><br>
			<div id="noticia">
					<?php
						include("uploadnoticia/consulta.php");
					?>
			</div>
			<br><br><br><br><br><br><br><br><br>
		</div><!-- fim /container -->	
		<div id="container-rodape" style="clear: both;">
			<div id="rodape"><center>
				&copy; Copyright 2019 Noticias G10 - Talles Balardin / Alison Orcelli
			</div></center>
		</div>

	</body>

</html>
