<?php
include("connect.php");

    

@$nome_produto = $_POST['nome_produto'];
@$codigo_barra = $_POST['codigo_barra'];
@$preco = $_POST['preco'];
@$quantidade = $_POST['quantidade'];



if(isset($_POST['Salvar'])){
	$query = "INSERT INTO produto(nome_produto, codigo_barra, preco, quantidade) VALUES ('$nome_produto','$codigo_barra','$preco','$quantidade')";
	$inserir = mysql_query($query);
	if ($inserir) {
	echo "Cadastrado com sucesso!";
	} else {
	echo "Não foi possível inserir, tente novamente.";
	echo "Dados sobre o erro:" . mysql_error();
	}
	
	@$nome_produto = null;
	@$codigo_barra = null;
	@$preco = null;
	@$quantidade = null;
 }


if(isset($_POST['Editar'])){
	
	
	$query = "SELECT nome_produto, codigo_barra, preco, quantidade FROM produto WHERE codigo_barra = $codigo_barra";
	echo ("<br> $codigo_barra");
	$selecionar = mysql_query($query);
	$row = mysql_fetch_assoc($selecionar);
	foreach( $row as $key => $value )
	{
		$_POST[$key] = $value;
	}
	
}

if(isset($_POST['Excluir'])){
	
	$query = "DELETE FROM produto WHERE codigo_barra = $codigo_barra";
	
	$result_excluir = mysql_query($query);
		
		if ($result_excluir) echo "<h2> Registro excluido com sucesso!!!</h2>";
		else echo "<h2> Nao consegui excluir!!!</h2>";
		
	@$nome_produto = null;
	@$codigo_barra = null;
	@$preco = null;
	@$quantidade = null;

}

?>

<http>

	<head>
		<title>Cadastro produto</title>
		<script type="text/javascript" src="script.js"></script>

	</head>


	<body>
		<form action=# method=POST>
			<h2>Cadastro Produto</h2>
	
	
			<label>Nome:</label><input id="" name="nome_produto" class="" value="<?php echo @$nome_produto; ?>" type="text"> <br>
			<label>Quantidade:</label><input id="" name="quantidade" class="" value="<?php echo @$quantidade; ?>" type="text"><br> 
			<label>codigo de barras:</label><input id="" name="codigo_barra" class="" value="<?php echo @$codigo_barra; ?>" type="text"><br> 
			<label>Preco:</label><input id="" name="preco" class="" value="<?php echo @$preco; ?>" type="text"> <br> 
	
			<input name="Salvar" type="submit" value="Salvar">
			<input name="Editar" type="submit" value="Editar">
			<input name="Excluir" type="submit" value="Excluir">
	

		</form>

	</body>



</http>


