<?php
include"../base/conexao.php";

if(isset($_POST['id_usuario'])){
	$id_usuario = $_POST['id_usuario'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$data_nasc = $_POST['data_nasc'];
	
	$sql = "select id_usuario,email from usuario where email='$email'";
	$seleciona = mysqli_query($conexao,$sql);
	
	$dados = mysqli_fetch_array($seleciona);
	
	$existe = mysqli_num_rows($seleciona);
	
	if($existe==1&&($id_usuario!=$dados['id_usuario'])){
		//se o email já existe, pode ser o email do proprio usuario que esta sendo alterado.
		//se o email ja existe mas pertence a um id de usuario diferente deste, significa que o email esta sendo usado por
		//outro usuario. Então não será possível utilizá-locale_get_default
		
		echo"<script>
			alert('O Email informado já pertence a outro usuário. Informe um email diferente.');
			history.go(-1);
		</script>";
	}
	else{
	
		$sql = "update usuario set nome='$nome',email='$email',data_nasc='$data_nasc' where id_usuario=$id_usuario";
		$update = mysqli_query($conexao,$sql);
		
		if($update){
			
			if(!$_SESSION){
			session_start();
			}
			$_SESSION['nome'] = $nome; 
			$_SESSION['email'] = $email;
			$_SESSION['data_nasc'] = $data_nasc; 
			
			echo"<script>
			alert('Usuário Atualizado com sucesso!');
			history.go(-1);
		</script>";
		}
		else{
			mysqli_error($conexao);
			echo"<script>
			alert('Problema ao atualizar os dados do usuário. Tente novamente mais tarde ou contate o adminsitrador do site');
			history.go(-1);
		</script>";
		}
	}
}
else{
	echo"<script>
		alert('Pagina Não Encontrada ou Removida. Retornando à Página inicial.');
		window.location='../base/index.php';
	</script>";
}
?>