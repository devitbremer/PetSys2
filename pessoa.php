<?php
include("connect.php");

    

@$nome_pessoa = $_POST['nome_pessoa'];
@$cpf = $_POST['CPF'];
@$data_nascimento = $_POST['data_nascimento'];
@$genero = $_POST['genero'];
@$rua = $_POST['rua'];
@$numero_endereco = $_POST['numero_endereco'];
@$bairro = $_POST['bairro'];
@$cidade = $_POST['cidade'];
@$estado = $_POST['estado'];
@$CEP = $_POST['CEP'];
@$numero_contato = $_POST['numero_contato'];
@$tipo = $_POST['tipo'];


if(isset($_POST['Salvar'])){
	//INSERT endereco//
	$query_endereco = "INSERT INTO endereco(nome_rua, numero, bairro, cidade, estado, cep) 
						VALUES ('$rua','$numero_endereco','$bairro','$cidade','$estado','$CEP')";
	$inserir_endereco = mysql_query($query_endereco);
	if ($inserir_endereco) {
		echo "endereco cadastrado com sucesso!";
			$query_sel_endereco = "SELECT MAX(id_endereco) FROM endereco";
	
			$selecionar_id_end = mysql_query($query_sel_endereco);
			@$row_end = mysql_fetch_assoc($selecionar_id_end);
			foreach( $row_end as $key => $value )
			{
				$_POST[$key] = $value;
			}
			 $id_endereco = $value;
		} else {
			echo "endereco nao cadastrado!";
		}
		//INSERT contato//
	$query_contato = "INSERT INTO contato(tipo, telefone) VALUES ('$tipo','$numero_contato')";
	$inserir_contato = mysql_query($query_contato);
	if ($inserir_contato) {
	echo "contato cadastrado com sucesso!";
		$query_sel_contato = "SELECT MAX(id_contato) FROM contato";
	
		$selecionar_id_contato = mysql_query($query_sel_contato);
		$row_contato = mysql_fetch_assoc($selecionar_id_contato);
		foreach( $row_contato as $key => $value )
			{
				$_POST[$key] = $value;
			}
			 $id_endereco = $value;
		@$id_contato = $value;
	} else {
	}
	//INSERT Pessoa//
	$query_pessoa = "INSERT INTO cliente (nome, cpf, nasc_data, id_endereco, id_contato, sexo) 
						VALUES ('$nome_pessoa', '$cpf', '$data_nascimento', '$id_endereco', '$id_contato', '$genero')";
	$inserir_pessoa = mysql_query($query_pessoa);
	if ($inserir_pessoa) {
	echo "Pessoa cadastrado com sucesso!";
	} else {
	echo "Não foi possível inserir, tente novamente.";
	echo "Dados sobre o erro:" . mysql_error();
	}
	
	
 }


if(isset($_POST['Editar'])){
	
	
	$query_pessoa = "SELECT * FROM cliente WHERE cpf = $cpf";
	$selecionar = mysql_query($query_pessoa);
	$row = mysql_fetch_assoc($selecionar);
	foreach( $row as $key => $value )
	{
		$_POST[$key] = $value;
	}
	$id_endereco = $row['id_endereco'];
	$id_contato = $row['id_contato'];
	$query_endereco = "SELECT * FROM endereco WHERE id_endereco = $id_endereco";
	$selecionar = mysql_query($query_endereco);
	$row = mysql_fetch_assoc($selecionar);
	foreach( $row as $key => $value )
	{
		$_POST[$key] = $value;
	}
	$query_contato = "SELECT * FROM contato WHERE id_contato = $id_contato";
	$selecionar = mysql_query($query_contato);
	$row = mysql_fetch_assoc($selecionar);
	foreach( $row as $key => $value )
	{
		$_POST[$key] = $value;
	}
	

	
}

if(isset($_POST['Excluir'])){
	
	$query_contato = "DELETE FROM contato WHERE id_contato = $id_contato";
	$query_endereco = "DELETE FROM contato WHERE id_endereco = $id_endereco";
	$query_pessoa = "DELETE FROM contato WHERE cpf = $cpf";
	
	$result_excluir = mysql_query($query);
		
		if ($result_excluir) echo "<h2> Registro excluido com sucesso!!!</h2>";
		else echo "<h2> Nao consegui excluir!!!</h2>";
		
}

?>

<http>

	<head>
		<title>Cadastro Pessoa</title>
		<script type="text/javascript" src="script.js"></script>

	</head>


	<body>
		<form action=# method=POST>
			<h2>Cadastro Pessoa</h2>
	
	
			<label>Nome:</label><input id="" name="nome_pessoa" class="" value="<?php echo @$nome_produto; ?>" type="text"> 
			<label>CPF:</label><input id="" name="CPF" class="" value="" type="text"> <br>
			<label>Data Nascimento:</label><input id="" name="data_nascimento" class="" value="" type="text"><br>
			<label>Sexo:</label>
			<input type="radio" name="genero" value="Masculino"> Masculino
			<input type="radio" name="genero" value="Feminino"> Feminino
			<input type="radio" name="genero" value="Outros"> Outros
			<!--Endereco-->
			<hr>
			<label>Rua:</label><input id="" name="rua" class="" value="" type="text">
			<label>Numero:</label><input id="" name="numero_endereco" class="" value="" type="text"> <br>
			<label>Bairro:</label><input id="" name="bairro" class="" value="" type="text">
			<label>Cidade:</label><input id="" name="cidade" class="" value="" type="text"> <br>
			<label>Estado:</label><input id="" name="estado" class="" value="" type="text">
			<label>CEP:</label><input id="" name="CEP" class="" value="" type="text"> <br>
			<!--Contato-->
			<hr>
			<label>Numero:</label><input id="" name="numero_contato" class="" value="" type="text">
			<label>Tipo:</label><input id="" name="tipo" class="" value="" type="text"> <br><br>
			<!--Botoes-->
			<input name="Salvar" type="submit" value="Salvar">
			<input name="Editar" type="submit" value="Editar">
			<input name="Excluir" type="submit" value="Excluir">
	

		</form>

	</body>



</http>


