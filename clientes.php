<!DOCTYPE html>

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

echo ("$genero");
function selected( $value, $selected ){
    return $value==$selected ? ' selected="selected"' : '';
}

if(isset($_POST['Salvar'])){
	//INSERT endereco//
	$query_valida = "SELECT * FROM cliente WHERE cpf = $cpf";
	$sqlcheckn = mysql_query($query_valida);
	@$row = mysql_fetch_assoc($sqlcheckn);
	$rowsn = mysql_num_rows($sqlcheckn);
	foreach( $row as $key => $value )
			{
				$_POST[$key] = $value;
			}
		@$id_contato = $value;
	if ($rowsn == 0) {
		
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
		
	}else{
		$result_update_contato = mysql_query("UPDATE contato 
								SET tipo=$tipo,telefone= $numero_contato
								WHERE $id_contato");
		$result_update_endereco = mysql_query("UPDATE endereco 
								SET nome_rua=$rua,numero=$numero_endereco,bairro=$bairro,cidade=$cidade,estado=$estado,cep=$CEP 
								WHERE id_endereco");
		$result_update_cliente = mysql_query("UPDATE cliente 
								SET nome=$nome_pessoa,cpf=$cpf,nasc_data=$data_nascimento,id_endereco=$id_endereco,id_contato= $id_contato,sexo= $genero
								WHERE $id_cliente");

								
		
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


<html lang="pt-br">



<head>
    <?php
        include("style.php");
    ?>


</head>

<body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- INICIO HEADER -->
    <?php
        include("top_menu.php");
    ?>
    <!-- FIM HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- INCLUI MENU LATERAL-->
            <?php
                include("menu.php");
            ?>

            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- INICIO DO CONTEUDO -->          

            </form>-->

            
            <section id="content">

              <!--start container-->
              <div class="container">
                <!--Formulário-->          
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="card-panel">
                      <h4 class="header2">CADASTRO DE CLIENTES</h4>
                      <div class="row">
                        <form class="col s12" action=# method=POST>
                          <div class="row">
                            <div class="input-field col s4">
                              <input name="nome_pessoa" id="nome_pessoa" type="text" value="<?php echo @$nome_pessoa; ?>">
                              <label for="nome_pessoa">Nome</label>
							</div>
                            <div class="input-field col s3">
                              <input name="CPF" id="CPF" type="text" value="<?php echo @$cpf; ?>">
                              <label for="CPF">CPF</label>
                            </div>
                            <div class="input-field col s2">
                              <input type="date" class="datepicker" name="data_nascimento" value="<?php echo @$data_nascimento; ?>>
                              <label for="dob">Nasc.</label>
                            </div>
                            <div class="input-field col s3">
                              <select name="genero">
                                <option value="" disabled selected>Escolha o sexo</option>
                                <option value="Masculino" <?php echo selected( 'Masculino', $genero ); ?>>Masculino</option>
                                <option value="Feminino" <?php echo selected( 'Feminino', $genero ); ?>>Feminino</option>
                                <option value="Outros" <?php echo selected( 'Outros', $genero ); ?>>Outros</option>
								
                              </select>
                              <label>Sexo</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s6">
                              <input name="rua" id="rua" type="text" value="<?php echo @$rua; ?>">
                              <label for="rua">Rua</label>
                            </div>
                            <div class="input-field col s3">
                              <input name="numero_endereco" id="numero_endereco" type="text" value="<?php echo @$numero_endereco; ?>">
                              <label for="numero_endereco">Numero</label>
                            </div>
                            <div class="input-field col s3">
                              <input name="CEP" id="CEP" type="text" value="<?php echo @$CEP; ?>">
                              <label for="CEP">CEP</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s4">
                              <input name="bairro" id="bairro" type="text" value="<?php echo @$bairro; ?>">
                              <label for="bairro">Bairro</label>
                            </div>
                            <div class="input-field col s4">
                              <input name="cidade" id="cidade" type="text" value="<?php echo @$cidade; ?>">
                              <label for="cidade">Cidade</label>
                            </div>
                            <div class="input-field col s4">
                              <select name="estado">
                                <option value="" disabled selected>Escolha um estado</option>
								<option value="AC" <?php echo selected( 'AC', $estado ); ?>>Acre</option>
								<option value="AL" <?php echo selected( 'AL', $estado ); ?>>Alagoas</option>
								<option value="AP" <?php echo selected( 'AP', $estado ); ?>>Amapá</option>
								<option value="AM" <?php echo selected( 'AM', $estado ); ?>>Amazonas</option>
								<option value="BA" <?php echo selected( 'BA', $estado ); ?>>Bahia</option>
								<option value="CE" <?php echo selected( 'CE', $estado ); ?>>Ceará</option>
								<option value="DF" <?php echo selected( 'DF', $estado ); ?>>Distrito Federal</option>
								<option value="ES" <?php echo selected( 'ES', $estado ); ?>>Espirito Santo</option>
								<option value="GO" <?php echo selected( 'GO', $estado ); ?>>Goiás</option>
								<option value="MA" <?php echo selected( 'MA', $estado ); ?>>Maranhão</option>
								<option value="MS" <?php echo selected( 'MS', $estado ); ?>>Mato Grosso do Sul</option>
								<option value="MT" <?php echo selected( 'MT', $estado ); ?>>Mato Grosso</option>
								<option value="MG" <?php echo selected( 'MG', $estado ); ?>>Minas Gerais</option>
								<option value="PA" <?php echo selected( 'PA', $estado ); ?>>Pará</option>
								<option value="PB" <?php echo selected( 'PB', $estado ); ?>>Paraíba</option>
								<option value="PR" <?php echo selected( 'PR', $estado ); ?>>Paraná</option>
								<option value="PE" <?php echo selected( 'PE', $estado ); ?>>Pernambuco</option>
								<option value="PI" <?php echo selected( 'PI', $estado ); ?>>Piauí</option>
								<option value="RJ" <?php echo selected( 'RJ', $estado ); ?>>Rio de Janeiro</option>
								<option value="RN" <?php echo selected( 'RN', $estado ); ?>>Rio Grande do Norte</option>
								<option value="RS" <?php echo selected( 'RS', $estado ); ?>>Rio Grande do Sul</option>
								<option value="RO" <?php echo selected( 'RO', $estado ); ?>>Rondônia</option>
								<option value="RR" <?php echo selected( 'RR', $estado ); ?>>Roraima</option>
								<option value="SC" <?php echo selected( 'SC', $estado ); ?>>Santa Catarina</option>
								<option value="SP" <?php echo selected( 'SP', $estado ); ?>>São Paulo</option>
								<option value="SE" <?php echo selected( 'SE', $estado ); ?>>Sergipe</option>
								<option value="TO" <?php echo selected( 'TO', $estado ); ?>>Tocantins</option>
                              </select>
                              <label>Estado</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s4">
                              <select name="tipo">
                                <option value="" disabled selected>Escolha um tipo</option>
                                <option value="Celular" <?php echo selected( 'Celular', $tipo ); ?>>Celular</option>
                                <option value="Fixo" <?php echo selected( 'Fixo', $tipo ); ?>>Fixo</option>
                              </select>
                              <label>Tipo</label>
                            </div>
                            <div class="input-field col s4">
                              <input name="numero_contato" id="numero_contato" type="text" value="<?php echo @$numero_contato; ?>">
                              <label for="numero_contato">Contato</label>
                            </div>
                          </div>                                                   
                          <div class="row"><br>
                            <div class="row">
                              <div class="col s12 m8 l9">
                                  <button class="btn waves-effect waves-light green" type="submit" name="Salvar" value="Salvar">Salvar</button>
                                  <button class="btn waves-effect waves-light yellow darken-2" type="submit" name="Editar" value="Editar">Editar</button>
                                  <button class="btn waves-effect waves-light red" type="submit" name="Excluir" value="Excluir">Excluir</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- END CONTENT -->

            
            <!-- FIM DO CONTEUDO -->

            <!-- //////////////////////////////////////////////////////////////////////////// -->


        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
       

    <!-- chartist 
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   

    <!-- chartjs 
    <script type="text/javascript" src="js/plugins/chartjs/chart.min.js"></script>
    <script type="text/javascript" src="js/plugins/chartjs/chart-script.js"></script>

    <!-- sparkline --
    <script type="text/javascript" src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="js/plugins/sparkline/sparkline-script.js"></script>
    
    <!--jvectormap--
    <script type="text/javascript" src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script type="text/javascript" src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="js/plugins/jvectormap/vectormap-script.js"></script>-->
    
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>
    <!-- Toast Notification 
    <script type="text/javascript">
    // Toast Notification
    $(window).load(function() {
        setTimeout(function() {
            Materialize.toast('<span>Hiya! I am a toast.</span>', 1500);
        }, 3000);
        setTimeout(function() {
            Materialize.toast('<span>You can swipe me too!</span>', 3000);
        }, 5500);
        setTimeout(function() {
            Materialize.toast('<span>You have new order.</span><a class="btn-flat yellow-text" href="#">Read<a>', 3000);
        }, 18000);
    });
    
    </script>-->
</body>

</html>