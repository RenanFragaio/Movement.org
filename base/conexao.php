<?php
	/*$local = "localhost";
	$usuario = "id6802051_renanfragaio";
	$senha = "movement101";
	$banco = "id6802051_movement";*/
	
	$local = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "movement";
	
	$conexao = mysqli_connect($local,$usuario,$senha,$banco);
	
	header("Content-Type: text/html; charset=utf-8");
	mysqli_query($conexao,"SET NAMES 'utf-8'");
	mysqli_query($conexao,"SET caracter_set_connection = urf-8");
	mysqli_query($conexao,"SET caracter_set_client = utf-8");
	mysqli_query($conexao,"SET caracter_set_results = utf-8");
?>