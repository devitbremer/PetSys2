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
                        <form class="col s12">
                          <div class="row">
                            <div class="input-field col s4">
                              <input name="nome_pessoa" id="nome_pessoa" type="text">
                              <label for="nome_pessoa">Nome</label>
                            </div>
                            <div class="input-field col s3">
                              <input name="CPF" id="CPF" type="text">
                              <label for="CPF">CPF</label>
                            </div>
                            <div class="input-field col s2">
                              <input type="date" class="datepicker">
                              <label for="dob">Nasc.</label>
                            </div>
                            <div class="input-field col s3">
                              <select>
                                <option value="" disabled selected>Escolha o sexo</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outros">Outros</option>
                              </select>
                              <label>Sexo</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s6">
                              <input name="rua" id="rua" type="text">
                              <label for="rua">Rua</label>
                            </div>
                            <div class="input-field col s3">
                              <input name="numero_endereco" id="numero_endereco" type="text">
                              <label for="numero_endereco">Numero</label>
                            </div>
                            <div class="input-field col s3">
                              <input name="CEP" id="CEP" type="text">
                              <label for="CEP">CEP</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s4">
                              <input name="bairro" id="bairro" type="text">
                              <label for="bairro">Bairro</label>
                            </div>
                            <div class="input-field col s4">
                              <input name="cidade" id="cidade" type="text">
                              <label for="cidade">Cidade</label>
                            </div>
                            <div class="input-field col s4">
                              <select>
                                <option value="" disabled selected>Escolha um estado</option>
                                <option value="1">Paraná</option>
                                <option value="2">Santa Catarina</option>
                                <option value="3">Rio Grande do Sul</option>
                              </select>
                              <label>Estado</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s4">
                              <select>
                                <option value="" disabled selected>Escolha um tipo</option>
                                <option value="1">Celular</option>
                                <option value="2">Fixo</option>
                              </select>
                              <label>Tipo</label>
                            </div>
                            <div class="input-field col s4">
                              <input name="bairro" id="bairro" type="text">
                              <label for="bairro">Contato</label>
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