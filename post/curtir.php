<?php
session_start();
if(isset($_POST['id_post'])){
	include"../base/conexao.php";
	$id_post = $_POST['id_post'];
	$id_usuario = $_SESSION['id_usuario'];
	
	$sql= "update post set curtidas = curtidas + 1 where id_post=$id_post";
	$update = mysqli_query($conexao,$sql);
	
	/*if(!$update){
	echo"erro";
	}
	else{*/
	
	$sql2 = "insert into curtir(id_usuario,id_post) values($id_usuario,$id_post)";
	$insere = mysqli_query($conexao,$sql2) or die(mysqli_error($conexao));
	
	$sql3 = "select curtidas from post where id_post=$id_post limit 1";
	$seleciona3 = mysqli_query($conexao,$sql3) or die(mysqli_error($conexao));
	
		while ($dado = mysqli_fetch_array($seleciona3)){
		
		echo $dado['curtidas']." Curtiram";
		}
	/*}*/
	
}
else{
	echo"<script>alert('Ocorreu um Erro inesperado. Atualize a pagina e tente novamente mais tarde.')</script>";
	echo"?? Curtiram";
}
?>