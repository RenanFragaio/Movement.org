<?php
include "../base/conexao.php";

if(isset($_POST['email'])){
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	
	$sql = "select * from usuario where email='$email' and senha='$senha'";
	$testelogin = mysqli_query($conexao,$sql) or die (mysqli_error($conexao));
	
	$existe = mysqli_num_rows($testelogin);
	
	if($existe){
		$exibe = mysqli_fetch_array($testelogin);
		session_start();
		
		$_SESSION['email'] = $email;
		$_SESSION['nome'] = $exibe['nome'];
		$_SESSION['foto_perfil'] = $exibe['foto_perfil'];
		$_SESSION['id_usuario'] = $exibe['id_usuario'];
		
		$nivel = $exibe['nivel'];
		$_SESSION['nivel'] = $nivel;
		
		if($nivel=='adm'){
			header("location: ../base/inicio_adm.php");
		}
		else{
			header("location: ../base/index.php");	
		}
		
	}
	else{
		echo"<script>
			alert('Acesso Negado. Usuário ou senha inválidos.');
			history.go(-1);
		</script>";
	}
}
else{
	echo"<script>
			alert('Página Não encontrada ou removida. Retornando à página inicial.');
			history.go(-1);
		</script>";
}
?>
