<!DOCTYPE html>
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
            <?php
                include("connect.php");

                //Carregando selects
                $query_carrega_select_tutor_e_pet = mysql_query("SELECT a.id_animal as id_pet, 
                                                                        a.nome as nome_pet,
                                                                        a.id_tutor as id_tutor,
                                                                        c.nome as nome_tutor
                                                                        FROM animal as a INNER JOIN cliente AS c ON c.id_cliente=a.id_tutor ORDER BY c.nome DESC");


                //Carregando variaveis
                @$nome_pet = $_POST['pet_nome'];
                @$nascimento = $_POST['nascimento'];
                @$sexo = $_POST['sexo'];
                @$tipo = $_POST['tipo'];
                @$raca = $_POST['raca'];
                @$peso = $_POST['peso'];
                @$id_tutor = $_POST['id_tutor'];

                //Selecionando Selects
                function selected( $value, $selected ){
                  return $value==$selected ? ' selected="selected"' : '';
                }

                //Salvando
                if(isset($_POST['Salvar'])){
                  $query = "INSERT INTO animal(nome, nascimento, id_tipo, raca, peso, id_tutor, sexo) VALUES ('$nome_pet','$nascimento','$tipo','$raca','$peso', '$id_tutor', '$sexo' )";
                  $inserir = mysql_query($query);
                  if ($inserir) {
                  echo "Cadastrado com sucesso!";
                  } else {
                  echo "Não foi possível inserir, tente novamente.";
                  echo "Dados sobre o erro:" . mysql_error();
                  }
                 } 
            ?>         
            </form>
            <section id="content">
              <!--start container-->
              <div class="container">
                <!--Formulário-->          
                <div class="row">
                  <div class="col s12 m12 l12">
                  <div class = "card-panel">
                    <h4 class="header2">PESQUISA</h4>
                    <div class="row">
                      <form action="" method="POST" class="col s12">
                        <div class="row">
                            <div class="input-field col s8">
                              <input value="" name="nome_cliente" id="nome_cliente" type="text" >
                              <label for="nome_cliente">Nome do Cliente</label>
                            </div>
                            <div class="input-field col s4">
                              <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light" type="submit" name="Pesquisar"><i class="mdi-action-search"></i> PESQUISAR</button>
                              </div>
                            </div><br>
                          </div>
                          <div class="row card-panel" id="table">
                            <div class="col s12 m12 l12">
                              <div class="row">
                                  <h4 class="header">Clientes Cadastrados</h4>
                              </div>
                                <table class="striped bordered">
                                </thead>
                                <tbody>
                                    <?php
                                      @$nome_cliente = $_POST['nome_cliente'];
                                      $pesquisa_cliente = "SELECT c.id_cliente as id_cliente,
                                                               c.nome as nome_cliente,
                                                               c.cpf as cpf,
                                                               c.nasc_data as nascimento,
                                                               c.sexo as sexo,
                                                               e.nome_rua as rua,
                                                               e.numero as numero,
                                                               e.bairro as bairro,
                                                               e.cep as cep,
                                                               e.cidade as cidade,
                                                               e.estado as estado,
                                                               tp.tipo as tipo_tel,
                                                               ct.telefone as telefone
                                                                                                           
                                                        FROM cliente as c 
                                                        INNER JOIN endereco AS e 
                                                        ON c.id_endereco=e.id_endereco
                                                        INNER JOIN contato as ct
                                                        on c.id_contato=ct.id_contato
                                                        INNER JOIN tel_tipo as tp
                                                        on tp.id_tipo=ct.tipo
                                                        WHERE c.nome like '%aline%'"; 

                                      //Pesquisar Pet
                                      if(isset($_POST['Pesquisar'])){
                                        $result = mysql_query($pesquisa_cliente);
                                        while($dados = mysql_fetch_array($result)){
                                          echo '<tr>';

                                            echo '<td>';
                                              echo '<p class ="bold">Cod: </p>'.$dados['id_cliente'];
                                            echo '</td>';

                                            echo '<td>';
                                              echo '<p class ="bold">Nome: </p>'.$dados['nome_cliente'];
                                            echo '</td>';

                                            echo '<td>';
                                              echo '<p class ="bold">CPF: </p>'.$dados['cpf'];
                                            echo '</td>';

                                            echo '<td>';
                                              echo '<p class ="bold">Nasc: </p>'.$dados['nascimento'];
                                            echo '</td>';

                                            echo '<td>';
                                              echo '<p class ="bold">Endereço: </p>'.$dados['rua'].', '.$dados['numero'];
                                            echo '</td>';

                                            echo '<td>';
                                              echo '<p class ="bold">Bairro: </p>'.$dados['bairro'];
                                            echo '</td>';

                                            echo '<td>';
                                              echo '<p class ="bold">CEP: </p>'.$dados['cep'];
                                            echo '</td>';

                                            echo '<td>';
                                              echo '<p class ="bold">Cidade: </p>'.$dados['cidade'];
                                            echo '</td>';

                                            echo '<td>';
                                              echo '<p class ="bold">Estado: </p>'.$dados['estado'];
                                            echo '</td>';

                                            echo '<td>';
                                              echo '<p class ="bold">'.$dados['tipo_tel'].': </p>'.$dados['telefone'];
                                            echo '</td>';

                                          echo '</tr>';
                                        }                                       
                                      }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            
            <!-- FIM DO CONTEUDO -->


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