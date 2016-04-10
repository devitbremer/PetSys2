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
                $query_carrega_select_tipo_animal = mysql_query("SELECT  id_tipo_animal,tipo_animal_nome FROM tipo_animal");
                $query_carrega_select_tutor =  mysql_query("SELECT  id_cliente,nome FROM cliente");


                //Carregando variaveis
                @$nome_pet = $_POST['nome_pet'];
                @$nascimento = $_POST['nascimento'];
                @$sexo = $_POST['sexo'];
                @$tipo = $_POST['tipo'];
                @$raca = $_POST['raca'];
                @$peso = $_POST['peso'];
                @$id_tutor = $_POST['id_tutor'];

                //Salvando
                if(isset($_POST['Salvar'])){
                  $query = "INSERT INTO animal(nome, nascimento, id_tipo, raca, peso,id_tutor,sexo) VALUES ('$nome_pet','$nascimento',$tipo','$raca','$peso','$id_tutor',$sexo)";
                  $inserir = mysql_query($query);
                  if ($inserir) {echo "Cadastrado com sucesso!";} 
                  else {
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
                    <div class="card-panel">
                      <h4 class="header2">CADASTRO DE PETS</h4>
                      <div class="row">
                        <form class="col s12">
                          <div class="row">
                            <div class="input-field col s6">
                              <input name="nome_pet" id="nome_pet" type="text">
                              <label for="nome_pet">Nome</label>
                            </div>
                            <div class="input-field col s3">
                              <input name="nascimento" type="date" class="datepicker">
                              <label for="nascimento">Nasc.</label>
                            </div>
                            <div class="input-field col s3">
                              <select name="sexo">
                                <option value="" disabled selected>Escolha o sexo</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                              </select>
                              <label>Sexo</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s6">
                              <select name ="tipo">
                                <option value="" disabled selected>Escolha o tipo</option>
                                <?php while($tp = mysql_fetch_array($query_carrega_select_tipo_animal)) { ?>
                                <option value="<?php echo $tp['id_tipo_animal'] ?>"><?php echo $tp['tipo_animal_nome'] ?></option>
                                <?php } ?>
                              </select>
                              <label>Tipo</label>
                            </div>
                            <div class="input-field col s3">
                              <input name="raca" id="raca" type="text">
                              <label for="raca">Raça</label>
                            </div>
                            <div class="input-field col s3">
                              <input name="peso" id="peso" type="text">
                              <label for="peso">Peso</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <select name = "id_tutor">
                                <option value="" disabled selected>Selecione o Tutor</option>
                                <?php while($tt = mysql_fetch_array($query_carrega_select_tutor)) { ?>
                                <option value="<?php echo $tt['id_cliente'] ?>"><?php echo $tt['nome'] ?></option>
                                <?php } ?>
                              </select>
                              <label>Tutor</label>
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