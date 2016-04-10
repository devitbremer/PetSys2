<?php

$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}
mysql_select_db('petshop', $link);
//mysql_close($link);
?>