			       
<!-- inclui_form.php -->
<form action="index.php" method="post" enctype="multipart/form-data">
	<h1> Insira a Noticia</h1><br>	
					
	<p>  
		Titulo da Noticia: <input type="text" name="titulo" size="25" value="<?=$titulo?>"/>
	</p><br>

    <p>
	Sub-Titulo da Noticia: <input type="text" name="subtitulo" size="25" value="<?=$subtitulo?>"/>
	</p><br> 
	<p>
	Imagem: <input type="file" name="imagem" value="<?=$imagem?>"/>
	</p><br> 

	<div id="textonoticia">Texto da Noticia</div>
	<label>
		<textarea rows="5" cols="50" name="textonoticia" value="<?=$textonoticia?>"></textarea>
	</label><br><br>
	<div id="datatext">
	Data:
	<input type="text" name="dia" size="2" maxlength="2"> /
	<input type="text" name="mes" size="2" maxlength="2"> /
	<input type="text" name="ano" size="4" maxlength="4"><br><br>
	<label>
		<button type="submit" name="enviar" value="Enviar">Enviar</button>
	</label><br>
</form><br>

<?php
$titulo = "";
$subtitulo = "";  
$textonoticia = "";
$enviar = "";
$imagem = "";
$data = "";
$vetErros = array(); 

if(isset($_REQUEST['titulo'])){
	$titulo = $_REQUEST['titulo'];
	if(strlen($titulo) == 0){
		$vetErros['titulo'] = "Titulo é obrigatorio";                                  
	}
}

if(isset($_REQUEST['subtitulo'])){
	$subtitulo = $_REQUEST['subtitulo'];
		if(strlen($subtitulo) == 0){
		$vetErros['subtitulo'] = "SubTitulo é obrigatorio";                                  
	}
}

if(isset($_REQUEST['textonoticia'])){
	$textonoticia = $_REQUEST['textonoticia'];
	if(strlen($textonoticia) == 0){
		$vetErros['textonoticia'] = "Texto é obrigatorio<br>";                                  
	}
}

if(isset($_REQUEST['imagem'])){
	$imagem = $_REQUEST['imagem'];
	if(strlen($imagem) == 0){
		$vetErros['imagem'] = "Nome da imagem upada é obrigatorio<br>";                                  
	}
}

//testa se o botao enviar foi pressionadoa
if(isset($_REQUEST['enviar'])){

	$diretorio_alvo = "uploadimagem/uploads/";
	$arquivo_alvo = $diretorio_alvo . basename($_FILES["imagem"]["name"]);
	$uploadOk = 1;

	if (count($vetErros) == 0){
		if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $arquivo_alvo)) {
			$titulo = $_REQUEST['titulo'];
			$subtitulo = $_REQUEST['subtitulo'];
			$textonoticia = $_REQUEST['textonoticia'];
			$imagem = $_FILES["imagem"]["name"]; 
			$data = $_REQUEST['ano'] . "-" . $_REQUEST['mes'] . "-" . $_REQUEST['dia'];

			//monta a consulta para inserir no banco
			$sql = "insert into posts (titulo,subtitulo,textonoticia,imagem,data) values ('$titulo','$subtitulo','$textonoticia', '$imagem', '$data')";
		    echo "Arquivo ". basename( $_FILES["imagem"]["name"]). " foi enviado com sucesso.<br>";
	    } else {
		    echo "Ocorreu um erro enviando seu arquivo.<br>";
	    }   	
		try {
			$consulta = $link->prepare($sql);
			$consulta->execute();
			echo ("Incluido com sucesso!<br>");
		}
		catch(PDOException $ex){
			echo($ex->getMessage());
		}
		echo("Enviado com sucesso!");
			$titulo = "";
			$subtitulo = "";
			$textonoticia = "";
			$imagem = "";
			$data = "";
		}
	else {
		foreach ($vetErros as $key => $value) {
			echo ("$value <br>");
		}
	}
}	
?>