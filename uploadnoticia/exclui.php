<?php
include("conecta.php");
include("funcoes.php");
//faz exclusao!!!!!!
if(isset($_REQUEST['enviar'])){
	$codigo = $_REQUEST['codigo'];
	//verifica se quer mesmo excluir
	if ($_REQUEST['enviar'] == 'Deletar'){

		include("exclui_confirma_form.php");
	}
	else if ($_REQUEST['enviar'] == "SIM") {
		
		try {
			$sql = "delete from posts where cdpost=$codigo";
			$consulta = $link->prepare($sql);
			$consulta->execute();

		}
		catch(PDOException $ex){
		echo($ex->getMessage());
		}	
	}
}// fim exclusao

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
		$imagem = $registro['imagem'];
		$textonoticia = $registro['textonoticia'];	
		$data =  strftime("%d/%m/%Y",strtotime($registro['data']));	
		abreTag("input",array("name"=>"codigo",
							  "value"=>"$cdpost",
							  "type"=>"radio"));
		echo("Codigo = $cdpost <br> Titulo  = $titulo <br> SubTitulo = $subtitulo <br> Imagem = $imagem <br> Texto = $textonoticia <br> Data = $data <br>");
		echo("<hr>");
	}
	abreTag("input",array("name"=>"enviar",
							  "value"=>"Deletar",
							  "type"=>"submit"));
	fechaTag("form");
	echo("<br>");
}
catch(PDOException $ex){
	echo($ex->getMessage());
}

?>