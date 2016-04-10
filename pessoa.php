<?php
session_start();
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
	
	@$nome_pessoa = null;
	@$cpf = null;	
	@$data_nascimento = null;
	@$genero = null;
	@$rua = null;
	@$numero_endereco = null;
	@$bairro = null;
	@$cidade = null;
	@$estado = null;
	@$CEP = null;
	@$numero_contato = null;
	@$tipo = null;
	
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
	$selecionar_endereco = mysql_query($query_endereco);
	$row_end = mysql_fetch_assoc($selecionar_endereco);
	foreach( $row_end as $key => $value )
	{
		$_POST[$key] = $value;
	}
	
	$query_contato = "SELECT * FROM contato WHERE id_contato = $id_contato";
	$selecionar_contato = mysql_query($query_contato);
	$row_contato = mysql_fetch_assoc($selecionar_contato);
	foreach( $row_contato as $key => $value )
	{
		$_POST[$key] = $value;
	}
	
	
	@$nome_pessoa = $_POST['nome'];
	@$cpf = $_POST['cpf'];	
	@$data_nascimento = $_POST['nasc_data'];
	@$genero = $_POST['sexo'];
	@$rua = $_POST['nome_rua'];
	@$numero_endereco = $_POST['numero'];
	@$bairro = $_POST['bairro'];
	@$cidade = $_POST['cidade'];
	@$estado = $_POST['estado'];
	@$CEP = $_POST['cep'];
	@$numero_contato = $_POST['telefone'];
	@$tipo = $_POST['tipo'];
	$_SESSION['id_contato'] = $id_contato;
	$_SESSION['id_endereco'] = $id_endereco;
	$_SESSION['cpf'] = $cpf;
	
	
}

if(isset($_POST['Excluir'])){
	
	
	$id_contato = $_SESSION['id_contato'];
	$id_endereco = $_SESSION['id_endereco'];
	$cpf = $_SESSION['cpf'];
	
	$query_contato = "DELETE FROM contato WHERE id_contato = $id_contato";
	$query_endereco = "DELETE FROM endereco WHERE id_endereco = $id_endereco";
	$query_pessoa = "DELETE FROM cliente WHERE cpf = $cpf";
	
	$result_excluir_contato = mysql_query($query_contato);
		
		if ($result_excluir_contato) echo "<h2> contato excluido com sucesso!!!</h2>";
		else echo "<h2> Nao consegui excluir!!!</h2>";
		
	$result_excluir_endereco = mysql_query($query_endereco);
		
		if ($result_excluir_endereco) echo "<h2> endereco excluido com sucesso!!!</h2>";
		else echo "<h2> Nao consegui excluir!!!</h2>";
		
	$result_excluir_pessoa = mysql_query($query_pessoa);
		
		if ($result_excluir_endereco) echo "<h2> pessoa excluido com sucesso!!!</h2>";
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
	
	
			<label>Nome:</label><input id="" name="nome_pessoa" class="" value="<?php echo @$nome_pessoa; ?>" type="text"> 
			<label>CPF:</label><input id="" name="CPF" class="" value="<?php echo @$cpf; ?>" type="text"> <br>
			<label>Data Nascimento:</label><input id="" name="data_nascimento" class="" value="<?php echo @$data_nascimento; ?>" type="text"><br>
			<label>Sexo:</label>
			<input type="radio" name="genero" value="Masculino" <?php echo (@$genero == "Masculino" ? " checked" : "" );?>> Masculino
			<input type="radio" name="genero" value="Feminino" <?php echo (@$genero == "Feminino" ? " checked" : "" );?>> Feminino
			<input type="radio" name="genero" value="Outros" <?php echo (@$genero == "Outros" ? " checked" : "" );?>> Outros
			<!--Endereco-->
			<hr>
			<label>Rua:</label><input id="" name="rua" class="" value="<?php echo @$rua; ?>" type="text">
			<label>Numero:</label><input id="" name="numero_endereco" class="" value="<?php echo @$numero_endereco; ?>" type="text"> <br>
			<label>Bairro:</label><input id="" name="bairro" class="" value="<?php echo @$bairro; ?>" type="text">
			<label>Cidade:</label><input id="" name="cidade" class="" value="<?php echo @$cidade; ?>" type="text"> <br>
			<label>Estado:</label><input id="" name="estado" class="" value="<?php echo @$estado; ?>" type="text">
			<label>CEP:</label><input id="" name="CEP" class="" value="<?php echo @$CEP; ?>" type="text"> <br>
			<!--Contato-->
			<hr>
			<label>Numero:</label><input id="" name="numero_contato" class="" value="<?php echo @$numero_contato; ?>" type="text">
			<label>Tipo:</label><input id="" name="tipo" class="" value="<?php echo @$tipo; ?>" type="text"> <br><br>
			<!--Botoes-->
			<input name="Salvar" type="submit" value="Salvar">
			<input name="Editar" type="submit" value="Editar">
			<input name="Excluir" type="submit" value="Excluir">
	

		</form>

	</body>



</http>


