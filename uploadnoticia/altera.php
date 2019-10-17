<?php 
include("conecta.php");
include("funcoes.php");

//alteracao
if(isset($_REQUEST['enviar'])){
	//carrega dados da posts
	if($_REQUEST['enviar']=='Alterar'){
		//consultar o banco
		$codigo = $_REQUEST['codigo'];
		try {
			$sql = "select * from posts where cdpost=$codigo";
			$consulta = $link->prepare($sql);
			$consulta->execute();
			$registro = $consulta->fetch(PDO::FETCH_ASSOC);
			$titulo = utf8_encode($registro['titulo']);
			$subtitulo = utf8_encode($registro['subtitulo']);
			$textonoticia = utf8_encode($registro['textonoticia']);
			$imagem = utf8_encode($registro['imagem']);
			$dia = substr($registro['data'],8,2);
			$mes = substr($registro['data'],5,2);
			$ano = substr($registro['data'],0,4);			
			//inclui formulario com dados
			include("altera_form.php");

		}
		catch(PDOException $ex){
		echo($ex->getMessage());
		echo($sql);
		}	
	}
	
	$diretorio_alvo = "uploadimagem/uploads/";
	$arquivo_alvo = $diretorio_alvo . basename($_FILES["imagem"]["name"]);
	//faz a gravacao dos dados alterados
	if($_REQUEST['enviar']=='SALVAR'){
		if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $arquivo_alvo)) {
			//consultar o banco
			$codigo = $_REQUEST['codigo'];
			$titulo = $_REQUEST['titulo'];
			$subtitulo = $_REQUEST['subtitulo'];
			$imagem = $_FILES["imagem"]["name"]; 
			$textonoticia = $_REQUEST['textonoticia'];
			$data = $_REQUEST['ano'] . "-" . $_REQUEST['mes'] . "-" . $_REQUEST['dia'];

			try {
				//colocar a data de nascimento no update
				$sql = "update posts set titulo='$titulo', subtitulo='$subtitulo', imagem='$imagem', textonoticia='$textonoticia', data='$data' where cdpost=$codigo";
				$consulta = $link->prepare($sql);
				$consulta->execute();

			}
			catch(PDOException $ex){
			echo($ex->getMessage());
			}	
		}
	}	
} //fim alteracao

//listagem 
try {
	//$link foi criado no conecta.php
	$sql = "select cdpost,titulo,subtitulo,imagem,textonoticia,data from posts order by data";
	$consulta = $link->prepare($sql);
	$consulta->execute();
	//enquanto tem registros disponíveis 
	//na consulta, copia cada um deles 
	//para o vetor associativo $registro 
	abreTag("form");
	while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
		$cdpost = $registro['cdpost'];
		//acerta acentuação para UTF8
		$titulo = $registro['titulo'];
		$subtitulo = $registro['subtitulo'];
		$textonoticia = $registro['textonoticia'];
		$imagem = $registro['imagem'];
		$data =  strftime("%d/%m/%Y",strtotime($registro['data']));
		abreTag("input",array("name"=>"codigo",
							  "value"=>"$cdpost",
							  "type"=>"radio"));
		echo("Codigo = $cdpost <br> Titulo  = $titulo <br> SubTitulo = $subtitulo <br> Imagem = $imagem <br> Texto = $textonoticia <br> Data = $data<br>");
		echo("<hr>");
	}
	abreTag("input",array("name"=>"enviar",
							  "value"=>"Alterar",
							  "type"=>"submit"));
	fechaTag("form");
	echo("<br>");
}
catch(PDOException $ex){
	echo($ex->getMessage());
}


?>