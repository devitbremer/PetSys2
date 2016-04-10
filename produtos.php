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

            <!-- LÓGICA-->
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
                  
                  @$nome_produto = null;
                  @$codigo_barra = null;
                  @$preco = null;
                  @$quantidade = null;
                  
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

              <!-- INICIO DO FORM -->      
              <section id="content">

                <!--start container-->
                <div class="container">
                  <!--Formulário-->          
                  <div class="row">
                    <div class="col s12 m12 l12">
                      <div class="card-panel">
                        <h4 class="header2">CADASTRO DE Produtos</h4>
                        <div class="row">
                          <form action=# method=POST class="col s12">
                            <div class="row">
                              <div class="input-field col s12">
                                <input value="<?php echo @$nome_produto;?>" name="nome_produto" id="nome_produto" type="text">
                                <label for="nome_produto">Produto</label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="input-field col s3">
                                <input value="<?php echo @$quantidade;?>" name="quantidade" id="quantidade" type="text">
                                <label for="quantidade">Quantidade</label>
                              </div>
                              <div class="input-field col s6">
                                <input value="<?php echo @$codigo_barra;?>" name="codigo_barra" id="codigo_barra" type="text">
                                <label for="codigo_barra">Código de Barras</label>
                              </div>
                              <div class="input-field col s3">
                                <input value="<?php echo @$preco;?>" name="preco" id="preco" type="text">
                                <label for="preco">Preço</label>
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
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            
            <!-- FIM DO FORM -->

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