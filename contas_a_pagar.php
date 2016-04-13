<?php
include("connect.php");

?>

<html lang="pt-br">
<head>
		<title>Contas a Pagar</title>
		<script type="text/javascript" src="script.js"></script>
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
	<!-- INICIO HEADER -->
    <?php
        include("top_menu.php");
    ?>
    <!-- FIM HEADER -->
	
	<!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- INCLUI MENU LATERAL-->
            <?php
                include("menu.php");
            ?>
			
			
			<section id="content">
              <!--start container-->
              <div class="container">
                <!--Formulário-->          
                <div class="row">
                  <div class="col s12 m12 l12">
                  <div class = "card-panel">
                    <h4 class="header2">CONTAS A PAGAR</h4>
                    <div class="row">
					
					<form action="" method="post" name="form1" class="col s12">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan=5 align="center">Periodo</td>
  </tr>
  <tr>
	<div class="input-field col s2">
    <label for="dob">Data inicial</label>
    <input type="date" class="datepicker" name="data_inicio"  />
	</div>
	<div class="input-field col s2">
    <label for="dob">Data Final</label>
    <input type="date" class="datepicker" name="data_vencimento" size="15" />
	</div>
	<div class="input-field col s4">
                              <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light" type="submit" name="botao" value="Gerar"><i class="mdi-action-search"></i> GERAR</button>
                              </div>
                            </div>
  </tr>
</table>
</form>

<?php if (@$_REQUEST['botao'] == "Gerar"){ ?>

<table width="95%" border="1" align="center">
  <tr bgcolor="#9999FF">
    <th width="5%">Situacao</th>
    <th width="30%">Forma de pagamento</th>
    <th width="15%">DT Vencimento</th>
    <th width="12%">Valor a receber</th>
    <th width="12%">Recebido</th>
  </tr>

<?php

	
	function diferenca_dias($inicial,$final){
   $inicial = strtotime($inicial); // 07/04/2003 (mm/dd/aaaa) data menor
   $final = strtotime($final);    // 07/10/2003 (mm/dd/aaaa) data maior
   return ($final-$inicial)/86400; //transformação do timestamp em dias 
 }


	$sql = "SELECT v.data_vencimento,p.preco, fpg.tipo\n"
     . "FROM itens_venda as iv\n"
     . "INNER JOIN venda as v\n"
     . "ON iv.id_venda = v.id_venda\n"
     . "INNER JOIN produto as p\n"
     . "ON p.id_produto = iv.id_produto\n"
     . "INNER JOIN forma_pg as fpg\n"
     . "ON fpg.id_forma_pg = v.id_forma_pg";

	// $sql = "SELECT * FROM `venda`";
	//$query = "SELECT *
	//		  FROM cliente 
	//		  WHERE id > 0 ";
	//$query .= ($data_inicio ? " AND nome LIKE '%$nome%' " : "");
	//$query .= ($data_fim ? " AND idade = '$idade' " : "");
	//$query .= " ORDER by id";
	
	$result = mysql_query($sql);
	$data_atual = date("n/j/Y");
	
	while ($coluna=mysql_fetch_array($result)) 
	{
		$data_vencimento = $coluna['data_vencimento'];
		
		
	?>
    
    <tr>
      <th width="5%"><?php echo diferenca_dias($data_atual,$data_vencimento); ?></th>
      <th width="30%"><?php echo $coluna['tipo']; ?></th>
      <th width="15%"><?php echo $coluna['data_vencimento']; ?></th>
      <th width="12%"><?php echo $coluna['preco']; ?></th>
      <th width="12%"><?php echo $coluna['preco']; ?></th>

	  <?php	  @$total += $coluna['preco'];
	  ?>
    </tr>

    <?php
	
	} // fim while
?>
</table>
<?php	
}
?>
<div class="input-field col s4">
<label><h5>TOTAL A RECEBER R$:<?php echo @$total ?></h5></label>
</div>
<div class="input-field col s4">
<label><h5>TOTAL A PAGAR R$:<?php echo @$total; ?></h5></label>
</div>
					
					
					
					
					</div>
				  </div>
				 </div>
				</div>
			  </div>
			</section>
			
			
		
	</div>	
	
	
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