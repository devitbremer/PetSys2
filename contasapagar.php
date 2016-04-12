<?php
include("connect.php");

?>

<html lang="pt-br">
<head>
		<title>Contas a Pagar</title>
		<script type="text/javascript" src="script.js"></script>

</head>
<body>
<form action="#" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan=5 align="center">Periodo</td>
  </tr>
  <tr>
    <td width="18%" align="right">Inicio:</td>
    <td width="23%"><input type="text" name="data_inicio"  /></td>
    <td width="16%" align="right">Fim:</td>
    <td width="23%"><input type="text" name="data_vencimento" size="15" /></td>
    <td width="20%"><input type="submit" name="botao" value="Gerar" /></td>
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
<label>Total a receber:<?php echo @$total ?></label>
<label>Total a Vencer:<?php echo @$total; ?></label>
</body>

</html>