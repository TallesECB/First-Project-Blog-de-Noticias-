<?php
include("conecta.php");
include("consulta_form.php");

//inicializando varáveis
//$inicial vai ser usada para o LIKE do SQL
$data = "";
//$sqlAux é uma variável que será usada para modificar 
//a variável $sql original
$sqlAux = "";
//$ordenacao irá conter a forma de ordenação do SQL (ASC ou DESC)
$ordenacao = "";
//se o botao enviar foi pressionado
if(isset($_REQUEST['enviar'])){
	//atribui às variáveis os campos de $_REQUEST
	$data = $_REQUEST['data'];
	$ordenacao = $_REQUEST['ordenacao'];
}
//se $data não estiver vazia
if ($data != ""){
		//monta em $sqlAaux o where que será usado no SQL
		$sqlAux = " where nome LIKE '$data%' ";
}
$sql = "select cdpost,titulo,subtitulo,textonoticia,imagem,data from posts $sqlAux order by data $ordenacao";
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
		$data =  strftime("%d/%m/%Y",strtotime($registro['data']));	
		echo("Codigo = $cdpost <br> Titulo  = $titulo <br> SubTitulo = $subtitulo <br> Imagem = $imagem <br> Texto = $textonoticia <br> Data = $data<br>");
		echo("<hr>");
	}
	echo("<br>");
}
catch(PDOException $ex){
	echo($ex->getMessage());
}

?>