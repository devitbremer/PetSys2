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

            <!-- START CONTENT -->
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
                      <div class="input-field col s6">
                        <input id="first_name" type="text">
                        <label for="first_name">Nome</label>
                      </div>
                    
                      <div class="input-field col s6">
                        <input id="last_name" type="text">
                        <label for="last_name">Last Name</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="email5" type="email">
                        <label for="email">Email</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="password6" type="password">
                        <label for="password">Password</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <select>
                          <option value="" disabled selected>Choose your profile</option>
                          <option value="1">Manager</option>
                          <option value="2">Developer</option>
                          <option value="3">Business</option>
                        </select>
                        <label>Select Profile</label>
                      </div>                        
                      <div class="input-field col s6">
                        <input type="date" class="datepicker">
                        <label for="dob">DOB</label>
                      </div>
                      
                    </div>
                    
                    <div class="row">
                      <div class="file-field input-field col s6">
                        <input class="file-path validate" type="text"/>
                        <div class="btn">
                          <span>Age</span>
                          <input type="file" />
                        </div>
                      </div>
                      <div class="input-field col s6">                          
                         <span>Image</span>
                         <p class="range-field">
                          <input type="range" id="test5" min="0" max="100" />
                        </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <textarea id="message5" class="materialize-textarea" length="120"></textarea>
                        <label for="message">Message</label>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                            <i class="mdi-content-send right"></i>
                          </button>
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