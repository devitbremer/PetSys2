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
            <section id="content">
              <!--start container-->
              <div class="container">
                <!--Formulário-->          
                <div class="row">
                  <div class="col s12 m12 l12">
                  <div class = "card-panel">
                    <h4 class="header2">VENDA</h4>
                    <div class="row">
                      <form action="" method="POST" class="col s12">
                        <div class="row">
                            <div class="input-field col s8">
                              <input value="" name="cod_barra" id="cod_barra" type="text" autofocus>
                              <label for="cod_barra">CODIGO DE BARRAS</label>
                            </div>
                            <div class="input-field col s4">
                              <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light" type="submit" name="Pesquisar"><i class="mdi-action-search"></i> PESQUISAR</button>
                              </div>
                            </div>
                          </div>
                          <div class="row card-panel z-depth-2">
                          <div class="row" id="table">
                            <div class="col s12 m12 l12">
                              <table class="hoverable" id="tabela">
                                <thead>
                                  <tr>
                                    <th data-field="id">Item</th>
                                    <th data-field="nome">Nome</th>
                                    <th data-field="preco">Valor</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      @$cod_barra = $_POST['cod_barra'];
                                      
                                      $pesquisa = "SELECT id_produto,
                                                        nome_produto,
                                                        codigo_barra,
                                                        preco
                                      FROM produto 
                                      WHERE codigo_barra = '$cod_barra'"; 

                                      //Pesquisar Pet
                                      if(isset($_POST['Pesquisar'])){
                                        $result = mysql_query($pesquisa);
                                        while($dados = mysql_fetch_array($result)){
                                          @$total=$total+$dados['preco'];
                                          echo '<tr>';
                                            echo '<td>';
                                              echo $dados['id_produto'];
                                            echo '</td>';
                                            echo '<td>';
                                              echo $dados['nome_produto'];
                                            echo '</td>';
                                            echo '<td>';
                                              echo $dados['preco'];
                                            echo '</td>';
                                          echo '</tr>';
                                          
                                        }                                       
                                      }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                            </div>
                          </div>
                      </form>
                    </div>
                    <div class="row">
                      <div class="input-field col s4">
                        <button class="btn green waves-effect waves-light" type="submit" name="Salvar"><i class="mdi-action-save"></i> Salvar</button>
                      </div>
                      <div class="input-field col s4"></div>
                      <div class="input-field col s4">
                        <?php echo 'TOTAL R$:'.@$total; ?>
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