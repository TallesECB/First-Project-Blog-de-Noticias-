<!-- altera_form.php -->
<form method="post" enctype="multipart/form-data">
	Cod:<input type="text" name="codigo" size="2" value="<?=$codigo?>" readonly="readonly"><br>
	<h1> Insira a Noticia</h1><br>	
					
	<p>   
	   Titulo da Noticia: <input type="text" name="titulo" size="25" value="<?php echo($titulo);?>"/>
	</p><br>

    <p>
	    Sub-Titulo da Noticia: <input type="text" name="subtitulo" size="25" value="<?php echo($subtitulo);?>"/>
    </p><br> 

		Imagem Atual - <?php echo("$imagem");?> | Alterar: <input type="file" name="imagem" value="<?=$imagem?>"/>

	</p><br> 
	Data:
	<input type="text" name="dia" size="2" maxlength="2"> /
	<input type="text" name="mes" size="2" maxlength="2"> /
	<input type="text" name="ano" size="4" maxlength="4"><br><br>

	<div id="textonoticia">Texto da Noticia</div>
	<label>
	    <textarea rows="5" cols="50" name="textonoticia" value="<?php echo($textonoticia); ?>"></textarea>
    </label><br>
	<label>
	    <input type="submit" name="enviar" value="SALVAR">
    </label><br>
</form>

<br>


