<!DOCTYPE html>
<html lang="pt-br">



<head>
    <?php
        include("style.php");
    ?>


</head>

<body>
    <!-- Start Page Loading 
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    End Page Loading -->

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
                @$petid = $_GET['idpet'];

                if(isset($_POST['Salvar'])){

                  
                  if(trim($_GET['idpet']) != ''){ 
                    $query = "UPDATE animal SET nome = '$nome_pet',
                                                    nascimento = '$nascimento',
                                                    id_tipo = '$tipo',
                                                    raca = '$raca',
                                                    peso = '$peso',
                                                    id_tutor = '$id_tutor',
                                                    sexo = '$sexo'
                              WHERE id_animal = '$petid'";
                  }
                  else{ 
                  $query = "INSERT INTO animal(nome, nascimento, id_tipo, raca, peso, id_tutor, sexo) VALUES ('$nome_pet','$nascimento','$tipo','$raca','$peso', '$id_tutor', '$sexo' )";
                  }


                  $executar = mysql_query($query);
                  if ($executar) {
                  //echo '<script type="text/javascript">Materialize.toast("salvo!")</script>';
                    echo '<script type="text/javascript">alert("salvo!")</script>';
                  } else {
                  echo "Não foi possível inserir, tente novamente.";
                  echo "Dados sobre o erro:" . mysql_error();
                  }
                 } 
                   $pesquisa_pet = "SELECT a.id_animal as id_pet,
                                                        a.nome as nome_pet,
                                                        a.id_tutor as id_tutor,
                                                        a.id_tipo as id_tipo,
                                                        tp.tipo_animal_nome as nome_tipo,
                                                        a.nascimento as nascimento,
                                                        a.peso as peso,
                                                        a.raca as raca,
                                                        c.nome as nome_tutor,
                                                        a.sexo as sexo
                                      FROM animal as a 
                                      INNER JOIN cliente AS c 
                                      ON c.id_cliente=a.id_tutor
                                      INNER JOIN tipo_animal as tp
                                      on tp.id_tipo_animal=a.id_tipo
                                      WHERE a.id_animal = '$petid'"; 
                  $result = mysql_query($pesquisa_pet) or die(mysql_error());
                  $linha = mysql_fetch_assoc($result);
            ?>         
            </form>
            <section id="content">
              <!--start container-->
              <div class="container">
                <!--Formulário-->          
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="card-panel">
                      <h4 class="header2">MANUTENçÃO DE PETS</h4>
                      <div class="row">
                        <form action="pets.php?idpet=<?php echo $linha['id_pet'];?>" method="POST" class="col s12">
                          <div class="card-panel z-depth-2">
                          <div class="row">
                            <div class="input-field col s6">
                              <input value="<?php echo $linha['nome_pet']; ?>" name="pet_nome" id="pet_nome" type="text" >
                              <input type="hidden" name="id_pet" value="<?php echo $linha['id_pet'] ?>">
                              <label <?php if(isset($linha['nome_pet']))echo 'class="active"' ?> for="nome_pet">Nome</label>
                            </div>
                            <div class="input-field col s3">
                              <input value="<?php echo $linha['nascimento']; ?>" name="nascimento" type="date" class="datepicker" >
                              <label <?php if(isset($linha['nascimento']))echo 'class="active"' ?> for="nascimento">Nasc.</label>
                            </div>
                            <div class="input-field col s3">
                              <select name="sexo">
                                <option value="" disabled selected>Escolha o genero</option>
                                <option <?php echo selected('Macho',$linha['sexo']); ?> value="Macho">Macho</option>
                                <option <?php echo selected('Fêmea',$linha['sexo']);?>value="Fêmea">Fêmea</option>
                              </select>
                              <label>Genero</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s6">
                              <select name ="tipo">
                                <option value="" disabled selected>Escolha o tipo</option>
                                <option <?php echo selected('1',$linha['id_tipo']); ?> value="1">Cães</option>
                                <option <?php echo selected('2',$linha['id_tipo']);?>value="2">Gatos</option>
                                <option <?php echo selected('3',$linha['id_tipo']);?>value="3">Aves</option>
                                <option <?php echo selected('4',$linha['id_tipo']);?>value="4">Peixes</option>
                              </select>
                              <label>Tipo</label>
                            </div>
                            <div class="input-field col s3">
                              <input value="<?php echo $linha['raca']; ?>" name="raca" id="raca" type="text">
                              <label <?php if(isset($linha['raca']))echo 'class="active"' ?> for="raca">Raça</label>
                            </div>
                            <div class="input-field col s3">
                              <input value="<?php echo $linha['peso']; ?>" name="peso" id="peso" type="text">
                              <label <?php if(isset($linha['peso']))echo 'class="active"' ?> for="peso">Peso</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s3">
                              <input value="<?php echo $linha['id_tutor']; ?>" name="id_tutor" id="id_tutor" type="text">
                              <label <?php if(isset($linha['id_tutor']))echo 'class="active"' ?>>Id</label>
                            </div>
                            <div class="input-field col s9 disabled">
                              <input disabled value="<?php echo $linha['nome_tutor']; ?>" name="nome_tutor" id="nome_tutor" type="text">
                              <label <?php if(isset($linha['nome_tutor']))echo 'class="active"' ?>>Tutor</label>
                            </div>
                          </div>
                          </div>
                          <div class="row"><br>
                            <div class="row">
                              <div class="col s12 m8 l9">
                                  <button class="btn waves-effect waves-light green" type="submit" name="Salvar" value="Salvar">Salvar</button>
                                  <a href="petlst.php" class="btn waves-effect waves-light blue"  name="Pesquisar" value="Salvar">Pesquisar</a>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </section>

            
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